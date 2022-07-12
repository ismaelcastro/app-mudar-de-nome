<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Helpers\MauticHelper;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailNotification;
use App\Models\Call;
use App\Models\Help;
use App\Models\ProposalField;
use App\Rules\ValidateCPFCNPJ;
use D4sign\Client as D4client;
use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ContratacaoController extends Controller
{
    protected $to;
    protected $client;
    protected $aviso;
    protected $client_id;
    protected $client_secret;
    protected $client_id_old;
    protected $client_secret_old;
    

    public function __construct()
    {      
        $this->client_id = 'Client_Id_ccad99d632d33adf58832838cef15965d33e0e18';
        $this->client_secret = 'Client_Secret_016f998c1ce697b7e6037c0479d5db062ae6958c'; 
        
        $this->client_id_old = 'Client_Id_f9bc6849a63ba53190d5a85674bebb66b7a0aabf';
        $this->client_secret_old = 'Client_Secret_72e14b8f5b8c14d89be3104ebca16790c4470387';

        $this->to = 'registro@ratsbonemagri.com.br'; 
    }


    public function _has_call($page)
    {
        $client = auth('client')->user();
        $calls = $client->call;
        $call_count = $calls->count();
        if($call_count == 0){            
            return false;
        }
        return true;
    }

    public function dados_contratante()
    {      
        if(!$this->_has_call('Dados do Contratante')){
            $aviso = $this->aviso;
            return view('client.pages.aviso.index',compact('aviso'));
        }
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id','desc')->first();
        $voidOption = ['' => 'Selecione' ];
        $marital_status = ['' => 'Estado Civil' ]+Client::MARITAL_STATUS;        
        $days_list = ['' => 'Dia' ]+\App\Helpers\Functions::arrayDay();
        $month_list = ['' => 'Mês' ]+\App\Helpers\Functions::arrayMonth();
        $year_list = ['' => 'Ano' ]+\App\Helpers\Functions::arrayYear();

        if(is_null($client->nacionality) && is_null(old('nacionality')))
            $client->nacionality = 'brasileira';

        if(is_null($client->marital_status) && is_null(old('marital_status')) && $call->occupation_area == 'divorcio') 
            $client->marital_status = 'casado';

        return view('client.pages.comercial.dados-contratante', 
            compact('marital_status','client','days_list','month_list','year_list')
        );
    }
    public function dados_contratante_store(Request $request, Client $client)
    {
        $data = $this->_validate_dados($request,$client->id);
        $date_birth = $request->date_birth_year.'-'.$request->date_birth_month.'-'.$request->date_birth_day;

        $idade = \App\Helpers\Functions::calcularIdade($date_birth);
        if($idade<18){
            return redirect()->back()->withInput()->withErrors(['message'=>'O contratante deve ser maior de 18 anos.']);
        }


        $data['date_birth'] = $date_birth;


        $client->fill($data);
        $client->save();

        // stage_call to emissao
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id','desc')->first();
        $call->stage_call = 'emissao';
        $call->save();

        return redirect()->route('client.contratacao.forma')->with('success','Atualizado com sucesso');
    }    


    public function forma_contratacao_store(Request $request)
    {
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id','desc')->first();
        $data = $this->_validate_forma($request,$call);

        // stage_call to assinatura
        //$data['stage_call'] = 'assinatura';

        $call->fill($data);
        $call->save();
        return redirect()->route('client.contratacao.contrato')->with('success','Forma de contratação atualizada com sucesso!');
    }

    public function contrato_store(Request $request)
    {
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id','desc')->first();

        $client_name = $client->name;
        $client_nationality = $client->nacionality;
        $marital_status = $client->marital_status;
        $occupation = $client->job;
        $rg = $client->rg;
        $cpf = $client->cpf_formated;
        $address = $client->addressstreet;
        $complement = $client->addresscomplement;
        $neighborhood = $client->addressdistrict;
        $city = $client->addresscity;
        $state = $client->addressstate;
        $zip_code = $client->addresscep;

        $honorary = $call->call_honorary()->sum('amount');
        $amount = number_format($honorary,2,',','.');
        $by_extenso = \App\Helpers\Functions::valorPorExtenso($honorary);
        $payment_date = date('d/m/Y',strtotime($call->paydate));
        $installments = $call->installments;
        $expiration_day = date('d',strtotime($call->paydate));
        $email = $client->email;

        $setting = \App\Helpers\Setting::getList();

        if ($request->has('agree')) {
            if($call->occupation_area == 'divorcio')
                $token = $setting['setting_d4sign_divorcio_token'];
            else
                $token = $setting['setting_d4sign_retificacao_token'];

            try{
                $d4client = new D4client();                
                $d4client->setAccessToken($token);

                //if($call->occupation_area == 'divorcio')
                    //$d4client->setCryptKey(config('d4sign.crypt_key_divorcio')); //Necessário apenas se o cryptKey estiver habilitado na conta                
                
                if($call->occupation_area == 'divorcio'){
                    $id_template = $call->paymentform == 'gerencianet' ? $setting['setting_d4sign_divorcio_template_gerencianet'] : ($call->paymentform == 'adexitum' ? $setting['setting_d4sign_divorcio_template_exito'] : $setting['setting_d4sign_divorcio_template_avista'] ) ;                    
                }else{
                    $id_template = $call->paymentform == 'gerencianet' ? $setting['setting_d4sign_retificacao_template_gerencianet'] : ($call->paymentform == 'adexitum' ? $setting['setting_d4sign_retificacao_template_exito'] : $setting['setting_d4sign_retificacao_template_avista'] ) ;
                }
                
                $object_of_action = '';
                $fild_action = ProposalField::where('key','object_of_action')->where('call_id',$call->id)->first();
                if($fild_action){
                    $object_of_action = $fild_action->value;
                }



                $templates = [
                    $id_template => [
                        'ACAO'              => $object_of_action,
                        'NOME_DO_CLIENTE'   => $client_name,
                        'nome'              => $client_name,
                        'NACIONALIDADE'     => $client_nationality,
                        'nacionalidade'     => $client_nationality,
                        'ESTADO_CIVIL'      => $marital_status,
                        'estadocivil'       => $marital_status,
                        'PROFISSAO'         => $occupation,
                        'No_RG'             => $rg,
                        'RG'                => $rg,
                        'No_CPF'            => $cpf,
                        'CPF'               => $cpf,
                        'end'               => $address,
                        'ENDERECO'          => $address,
                        'COMPLEMENTO'       => $complement,
                        'comp'              => $complement,
                        'BAIRRO'            => $neighborhood,
                        'CIDADE'            => $city,
                        'ESTADO'            => $state,
                        'cid_est'           => $city.'/'.$state,
                        'N_CEP'             => $zip_code,
                        'CEP'               => $zip_code,
                        'VALOR_TOTAL'       => $amount,
                        'total'             => $amount,
                        'EXTENSO'           => $by_extenso,
                        'escrito'           => $by_extenso,
                        'DATA'              => $payment_date,
                        'N_PARCELAS'        => $installments,
                        'VENCIMENTO'        => $expiration_day,
                        'data'              => $expiration_day,
                        'e_mail'            => $email,
                    ]
                ];                
                $name_document = 'Contrato - '.$client->name;

                if($call->occupation_area == 'divorcio'){
                    $uuid_cofre = $setting['setting_d4sign_divorcio_uuidsafe'];
                    $uuid_pasta = $call->paymentform == 'gerencianet' ? $setting['setting_d4sign_divorcio_folder_gerencianet'] : ($call->paymentform == 'adexitum' ? $setting['setting_d4sign_divorcio_folder_exito'] : $setting['setting_d4sign_divorcio_folder_avista'] );
                }else{
                    $uuid_cofre = $setting['setting_d4sign_retificacao_uuidsafe'];
                    $uuid_pasta = $call->paymentform == 'gerencianet' ? $setting['setting_d4sign_retificacao_folder_gerencianet'] : ($call->paymentform == 'adexitum' ? $setting['setting_d4sign_retificacao_folder_exito'] : $setting['setting_d4sign_retificacao_folder_avista'] ) ;
                }
                
                $return = $d4client->documents->makedocumentbytemplate($uuid_cofre, $name_document, $templates, $uuid_pasta);
                
                //putSignatarios
                /* http://docapi.d4sign.com.br/#add-signatarios
                act
                1 = Assinar
                2 = Aprovar
                3 = Reconhecer
                4 = Assinar como parte
                5 = Assinar como testemunha
                6 = Assinar como interveniente
                7 = Acusar recebimento
                8 = Assinar como Emissor, Endossante e Avalista
                9 = Assinar como Emissor, Endossante, Avalista, Fiador
                10 = Assinar como fiador
                11 = Assinar como parte e fiador
                12 = Assinar como responsável solidário
                13 = Assinar como parte e responsável solidário

                foreign
                0 = Possui CPF (Brasileiro).
                1 = Não possui CPF (Estrangeiro).
                */
                
                $jsonObj = $return;
                $codRetornoDocumento = $jsonObj->uuid;

                if($call->occupation_area == 'divorcio'){
                    $email_emissor = $setting['setting_d4sign_divorcio_emissor'];
                }else{
                    $email_emissor = $setting['setting_d4sign_retificacao_emissor'];
                }
                
                try{                   
                    $signers = array(
                        array("email" => $email, "act" => '4', "foreign" => '0', "certificadoicpbr" => '0', "assinatura_presencial" => '0'),
                        array("email" => $email_emissor, "act" => '4', "foreign" => '0', "certificadoicpbr" => '0', "assinatura_presencial" => '0')
                        
                    );                    
                    $return_signatarios = $d4client->documents->createList($codRetornoDocumento, $signers);

                    //$jsonObjSigner = json_decode($return_signatarios);
                    $jsonObjSigner = $return_signatarios;

                    $codRetornoSigner = $jsonObjSigner->message[0]->key_signer;
                    $codRetornoSigner2 = $jsonObjSigner->message[1]->key_signer;


                    $client->key_signer = $codRetornoSigner;
                    $client->save();
                    
                    $message = 'Prezados, segue o contrato eletrônico para assinatura.';
                    $workflow = 1;  //o segundo signatário só receberá a mensagem de que há um documento aguardando sua assinatura DEPOIS que o primeiro signatário efetuar a assinatura
                    $skip_email = 0; //Os signatários serão avisados por e-mail que precisam assinar um documento
                    
                    $doc = $d4client->documents->sendToSigner($codRetornoDocumento, $message, $workflow, $skip_email);

                    //Webhook
                    $webhook_url = config('app.url').'api/webhook/d4sign/call_id/'.$call->id;
                    $webhook = $d4client->documents->webhookadd($codRetornoDocumento,$webhook_url);

                    // stage_call to assinado
                    $call->uuid_document = $codRetornoDocumento;
                    $call->stage_call = 'assinatura';
                    $call->save();

                    return redirect()->route('client.contratacao.contrato_aviso')->with('success','Contrato enviado por e-mail!');
                    
                    //print_r($return);
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }
                
                //print_r($return);
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        }else{
            return redirect()->back()->with('error','Antes de emitir o contrato, precisamos que confirme que leu a minuta e que os dados do contratante estão corretos');
        }
    }

    public function contrato_aviso()
    {
        $client = auth('client')->user();
        $email = $client->email;

        $helps = Help::where('pages','REGEXP','[[:<:]]assinatura_eletronica[[:>:]]')->orderBy('order','asc')->get();

        return view('client.pages.comercial.contrato_aviso',compact('email','helps'));
    }

    public function contrato()
    {          
        $client =  auth('client')->user();
        $call = $client->call()->orderBy('calls.id','desc')->first();

        $iframe_contrato_name = 'client.contratacao.tempate_avista';

        if($call->occupation_area == 'divorcio'){
            $iframe_contrato_name = 'client.contratacao.tempate_divorcio_consensual_avista';
        }else{
            if($call->paymentform=='gerencianet')
                $iframe_contrato_name = 'client.contratacao.tempate_gerencianet';
            elseif($call->paymentform=='adexitum')
                $iframe_contrato_name = 'client.contratacao.tempate_exito';
        }

        

        $helps = Help::where('pages','REGEXP','[[:<:]]visualizacao_contrato[[:>:]]')->orderBy('order','asc')->get();

        return view('client.pages.comercial.contrato',compact('iframe_contrato_name','helps'));
    }

    

    public function forma_contratacao()
    {
        $client = auth('client')->user();
        $calls = $client->call;
        $call_count = $calls->count();

        if(!$this->_has_call('Forma de Contratação')){
            $aviso = $this->aviso;
            return view('client.pages.aviso.index',compact('aviso'));
        } 

        $call = $client->call()->orderBy('calls.id','desc')->first();
        $call_count = $call->call_honorary()->count();
        if($call_count == 0){
            $to = $this->to;
            $data2 = [
                'aviso' => '<h2>Erro ao acessar a página</h2><p>Cliente '.$client->name.', ID: '.$client->id.', Atendimento: '.$call->id.' tentou acessar página "Forma de Contratação", mas ainda não foi configurado os Honorários</p>'
            ];
            Mail::to($to)->send(new SendMailNotification($data2));

            $aviso = '<h2>Requer dados</h2> 
            <p>
                Para continuar é necessário que um administrador informe os dados financeiros, 
                <strong>você não precisa se preocupar com nada</strong> ao ver esta mensagem nosso time também foi notificado, 
                e já estamos providenciando.
            </p>';
            return view('client.pages.aviso.index',compact('aviso'));
        }else{

            $sum_honrary = $call->call_honorary()->sum('amount');
            $max_installments = !is_null($call->max_installments) ? $call->max_installments : 1;
            $array_installments = \App\Helpers\Functions::number_array_installments($max_installments,$sum_honrary);
            $days_payment = [''=>'Selecione']+\App\Helpers\Functions::days_payment();
            $array_installments = [''=>'Selecione']+$array_installments;

            $helps = Help::where('pages','REGEXP','[[:<:]]forma_contratacao[[:>:]]')->orderBy('order','asc')->get();

            return view('client.pages.comercial.forma-contratacao',
                compact('client','call','sum_honrary','array_installments','days_payment','helps')
            );
        }
            
        
        
    }

    public function tempate_gerencianet()
    {
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id','desc')->first();

        $client_name = $client->name;
        $client_nationality = $client->nacionality;
        $marital_status = $client->marital_status;
        $occupation = $client->job;
        $rg = $client->rg;
        $cpf = $client->cpf_formated;
        $address = $client->addressstreet;
        $complement = $client->addresscomplement;
        $neighborhood = $client->addressdistrict;
        $city = $client->addresscity;
        $state = $client->addressstate;
        $zip_code = $client->addresscep;

        $honorary = $call->call_honorary()->sum('amount');
        $amount = number_format($honorary,2,',','.');
        $by_extenso = \App\Helpers\Functions::valorPorExtenso($honorary);

        $payment_date = date('d/m/Y',strtotime($call->paydate));
        $installments = $call->installments;
        $expiration_day = date('d',strtotime($call->paydate));
        $email = $client->email;

        return view('client.pages.templates_docs.retifica_gerencianet', 
            compact(
                'client_name',
                'client_nationality',
                'marital_status',
                'occupation',
                'rg',
                'cpf',
                'address',
                'complement',
                'neighborhood',
                'city',
                'state',
                'zip_code',
                'amount',
                'by_extenso',
                'payment_date',
                'installments',
                'expiration_day',
                'email'
            )    
        );
    }

    public function tempate_avista()
    {
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id','desc')->first();

        $client_name = $client->name;
        $client_nationality = $client->nacionality;
        $marital_status = $client->marital_status;
        $occupation = $client->job;
        $rg = $client->rg;
        $cpf = $client->cpf_formated;
        $address = $client->addressstreet;
        $complement = $client->addresscomplement;
        $neighborhood = $client->addressdistrict;
        $city = $client->addresscity;
        $state = $client->addressstate;
        $zip_code = $client->addresscep;

        $honorary = $call->call_honorary()->sum('amount');
        $amount = number_format($honorary,2,',','.');
        $by_extenso = \App\Helpers\Functions::valorPorExtenso($honorary);

        $payment_date = date('d/m/Y',strtotime($call->paydate));
        $installments = $call->installments;
        $expiration_day = date('d',strtotime($call->paydate));
        $email = $client->email;

        return view('client.pages.templates_docs.retifica_avista', 
            compact(
                'client_name',
                'client_nationality',
                'marital_status',
                'occupation',
                'rg',
                'cpf',
                'address',
                'complement',
                'neighborhood',
                'city',
                'state',
                'zip_code',
                'amount',
                'by_extenso',
                'payment_date',
                'installments',
                'expiration_day',
                'email'
            )    
        );
    }

    public function tempate_divorcio_consensual_avista()
    {
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id','desc')->first();

        $client_name = $client->name;
        $client_nationality = $client->nacionality;
        $marital_status = $client->marital_status;
        $occupation = $client->job;
        $rg = $client->rg;
        $cpf = $client->cpf_formated;
        $address = $client->addressstreet;
        $complement = $client->addresscomplement;
        $neighborhood = $client->addressdistrict;
        $city = $client->addresscity;
        $state = $client->addressstate;
        $zip_code = $client->addresscep;
        $city_state = $city.'/'.$state;

        $honorary = $call->call_honorary()->sum('amount');
        $amount = number_format($honorary,2,',','.');
        $by_extenso = \App\Helpers\Functions::valorPorExtenso($honorary);

        $payment_date = date('d/m/Y',strtotime($call->paydate));
        $installments = $call->installments;
        $expiration_day = date('d',strtotime($call->paydate));
        $email = $client->email;

        return view('client.pages.templates_docs.divorcio_contrato_consensual_a_vista', 
            compact(
                'client_name',
                'client_nationality',
                'marital_status',
                'occupation',
                'rg',
                'cpf',
                'address',
                'complement',
                'neighborhood',
                'city',
                'state',
                'city_state',
                'zip_code',
                'amount',
                'by_extenso',
                'payment_date',
                'installments',
                'expiration_day',
                'email'
            )    
        );
    }

    public function tempate_exito()
    {
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id','desc')->first();

        $client_name = $client->name;
        $client_nationality = $client->nacionality;
        $marital_status = $client->marital_status;
        $occupation = $client->job;
        $rg = $client->rg;
        $cpf = $client->cpf_formated;
        $address = $client->addressstreet;
        $complement = $client->addresscomplement;
        $neighborhood = $client->addressdistrict;
        $city = $client->addresscity;
        $state = $client->addressstate;
        $zip_code = $client->addresscep;

        $honorary = $call->call_honorary()->sum('amount');
        $amount = number_format($honorary,2,',','.');
        $by_extenso = \App\Helpers\Functions::valorPorExtenso($honorary);

        $payment_date = date('d/m/Y',strtotime($call->paydate));
        $installments = $call->installments;
        $expiration_day = date('d',strtotime($call->paydate));
        $email = $client->email;

        return view('client.pages.templates_docs.retifica_exito', 
            compact(
                'client_name',
                'client_nationality',
                'marital_status',
                'occupation',
                'rg',
                'cpf',
                'address',
                'complement',
                'neighborhood',
                'city',
                'state',
                'zip_code',
                'amount',
                'by_extenso',
                'payment_date',
                'installments',
                'expiration_day',
                'email'
            )    
        );
    }    

    

    protected function _validate_dados(Request $request, $id)
    {
        $marital_status = implode(',',array_keys(Client::MARITAL_STATUS));
        return $this->validate($request, [
            'name'  => 'required|max:191',
            'email'  => 'required|max:191|email|unique:clients,email,'.$id,
            'job' => "nullable",
            'nacionality' => "required",
            'phone' => "required|min:10",
            'cpf' => [
                'required',
                'string',
                'min:11',
                'unique:clients,cpf,'.$id,
                new ValidateCPFCNPJ()
            ],
            'rg' => "nullable",
            'date_birth_day' => 'required|date_format:"d"',
            'date_birth_month' => 'required|date_format:"m"',
            'date_birth_year' => 'required|date_format:"Y"',
            'marital_status' => "nullable|in:$marital_status",
            'addresscep' => "nullable|min:8|max:10",
            'addressstreet' => "nullable",
            'addressnumber' => "nullable",
            'addressdistrict' => "nullable",
            'addresscomplement' => "nullable",
            'addresscity' => "nullable",
            'addressstate' => "nullable|max:2"
        ]);      
    }

    protected function _validate_forma(Request $request, $call)
    {
        if($call->paymentform == 'gerencianet'){
            if(is_null($call->installments) && is_null($call->paydate)){
                return $this->validate($request, [
                    'installments'  => 'required|numeric',
                    'paydate'  => 'required|date'
                ]);  
            }elseif(is_null($call->installments) && !is_null($call->paydate)){
                return $this->validate($request, [
                    'installments'  => 'required|numeric',
                    'paydate'  => 'nullable'
                ]);  
            }elseif(!is_null($call->installments) && is_null($call->paydate)){
                return $this->validate($request, [
                    'installments'  => 'nullable',
                    'paydate'  => 'required|date'
                ]);  
            }else{
                return $this->validate($request, [
                    'installments'  => 'nullable',
                    'paydate'  => 'nullable'
                ]); 
            }
        }elseif($call->paymentform == 'adexitum'){
            return $this->validate($request, [
                'installments'  => 'nullable',
                'paydate'  => 'nullable'
            ]); 
        }else{
            return $this->validate($request, [
                'installments'  => 'nullable',
                'paydate'  => 'required|date'
            ]); 
        }
    }

    public function webhook_procuracao_d4sign(Request $request, Call $call)
    {
       
        if($json = json_decode(file_get_contents("php://input"), true)) {
            $data = $json;
        } else {
            $data = $request->all();
        }
        $uuid = $data['uuid'] ?? '';
        $type_post = $data['type_post'] ?? '';
        $message = $data['message'];
        $data_signed = date('Y-m-d H:i:s');
        $force_pass = $data['force_pass'] ?? '';

        $call_documents = $call->document()->whereNotNull('uuid_document')->get();
        
        foreach($call_documents as $call_document){
            try{
                $token = config('d4sign.token');
                $d4client = new D4client();                
                $d4client->setAccessToken($token);
            
                $docs = $d4client->documents->find($call_document->uuid_document);
            
                //print_r($docs[0]->statusId);
                if(isset($docs[0]->statusId) && $docs[0]->statusId ==  4){
                    $call_document->status = 'approved';
                    $call_document->save();
                }elseif($force_pass == '0505'){
                    $call_document->status = 'approved';
                    $call_document->save();
                }
            } catch (\Exception $e) {
                echo $e->getMessage();
            } 
        }

        //dd($call_documents->count());

        $call_documents_approved = $call->document()->whereNotNull('uuid_document')->where('status','approved')->get();
        //dd($call_documents_approved->count());
        if($call_documents->count() > 0 && $call_documents->count() == $call_documents_approved->count() && $call->stage_case !='aguardando_envio_cliente' ){
            $call->stage_case = 'aguardando_envio_cliente';
            $call->save();

            $email_id = 107;
            $mautic = new MauticHelper();
            $mautic->send_mail($email_id, $call->client->mautic_id);
        }

    }

    public function webhook_d4sign(Request $request, Call $call)
    {
        if($json = json_decode(file_get_contents("php://input"), true)) {
            $data = $json;
        } else {
            $data = $request->all();
        }
        

        $uuid = $data['uuid'] ?? '';
        $type_post = $data['type_post'];
        $message = $data['message'];
        $data_signed = date('Y-m-d H:i:s');

        $setting = \App\Helpers\Setting::getList();
        if($call->occupation_area == 'divorcio'){
            $this->client_id = $setting['setting_gerencianet_divorcio_client_id'];
            $this->client_secret = $setting['setting_gerencianet_divorcio_client_secret'];
        }else{
            $this->client_id = $setting['setting_gerencianet_retificacao_client_id'];
            $this->client_secret = $setting['setting_gerencianet_retificacao_client_secret'];
        }

        
        switch ($type_post) {
            case '1':
                //Retorno de documento finalizado

                $atual_signed = $call->signed;
                $call->signed = $data_signed;
                $call->status = 'assinado';
                $call->stage_call = 'assinado';
                $call->stage_case = 'primeiro_acesso';
                $call->casedate = date('Y-m-d H:i:s');
                $return_call = $call->save();

                $ocupation_area_list = Call::OCCUPATION_AREA;
                $ocupation_area = $ocupation_area_list[$call->occupation_area];
                
              
                if(is_null($atual_signed)){
                    //cliente assinou o contrato
                    
                    $forma_pgto = $call->paymentform;
                    if($forma_pgto=='gerencianet'){
                        $honorary = $call->call_honorary()->sum('amount');
                        $value_total_gerencianet = str_replace('.','',$honorary);

                        $options = [
                            'client_id' => $this->client_id,
                            'client_secret' => $this->client_secret,
                            'sandbox' => false // altere conforme o ambiente (true = desenvolvimento e false = producao)
                        ];			
                        $items =  [
                        [
                            'name' => $ocupation_area, // nome do item, produto ou serviço
                            'amount' => 1, // quantidade
                            'value' => (int)$value_total_gerencianet // valor (1000 = R$ 10,00)
                        ]
                        ];				
                        $customer = [
                            'name' => $call->client->name, // nome do cliente
                            'cpf' => $call->client->cpf , // cpf do cliente
                            'phone_number' => $call->client->phone, // telefone do cliente
                            'email' => $call->client->email // e-mail do cliente
                        ];

                        $body = [
                            'items' => $items,
                            'customer' => $customer,
                            'expire_at' => date('Y-m-d',strtotime($call->paydate)), // data de vencimento da primeira parcela do carnê
                            'repeats' => (int)$call->installments, // número de parcelas do carnê
                            'split_items' => true
                        ];

                        try {
                            $api = new Gerencianet($options);
                            $carnet = $api->createCarnet([], $body);
                            $CarneId = $carnet['data']['carnet_id'];
							$CarneCapa = $carnet['data']['cover'];
                            $CarneBoletos = $carnet['data']['link'];
                            
                            $call->gerencianet_id = $CarneId;
                            $call->save();

                            //$mautic = new MauticHelper();
                            //$mautic->send_mail(88, $call->client->mautic_id);
                            

                        } catch (GerencianetException $e) {
                            $campoErro = $e->errorDescription['property'] ?? '';
                            $descErro = $e->errorDescription['message'] ?? '';

                            $to = $this->to;
                            $data2 = [
                                'aviso' => '<h2>Erro ao gerar boleto do Gerencianet</h2><p>Cliente '.$call->client->name.', ID: '.$call->client->id.', Mensagem: '.$descErro.' <br />campo: '.$campoErro.'</p>'
                            ];
                            Log::error('Erro ao gerar boleto do Gerencianet - Cliente '.$call->client->name.', ID: '.$call->client->id.', Mensagem: '.$descErro.' campo: '.$campoErro);
                            Mail::to($to)->send(new SendMailNotification($data2));
                            
                        } catch (\Exception $e) {
                            Log::error('Entrou no erro sem causa');
							echo '<h2>CATCH 02</h2>';
							print_r($e->getMessage());
							echo '<br />';
                        }

                    }

                    $email_id = ( $forma_pgto=='gerencianet' ? 100 : ($forma_pgto=='deposito' ? 101 : 102 ) );
                    $mautic = new MauticHelper();
                    $mautic->send_mail($email_id, $call->client->mautic_id);

                }



                $call->signed = $data_signed;
                $call->save();
                break;
            case '2':
                //Retorno de e-mail não entregue
                $to = $this->to;
                $data2 = [
                    'aviso' => '<h2>Erro na assinatura do contrato</h2><p>Cliente '.$call->client->name.', ID: '.$call->client->id.', Mensagem: E-mail de contrato não entregue</p>'
                ];
                Mail::to($to)->send(new SendMailNotification($data2));
                break;
            case '3':
                //Retorno de documento cancelado
                $to = $this->to;
                $data2 = [
                    'aviso' => '<h2>Contrato</h2><p>Cliente '.$call->client->name.', ID: '.$call->client->id.', Mensagem: Contrato cancelado</p>'
                ];
                Mail::to($to)->send(new SendMailNotification($data2));
                break;
            case '4':
                //Retorno de assinatura do signatário
                Log::error('O Cliente '.$call->client->name.' do ID: '.$call->client->id.' assinou o contrato  ');
                
                break;
        }

    }

}


