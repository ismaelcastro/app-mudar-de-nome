<?php

namespace App\Http\Controllers\Client;

use App\Helpers\Functions;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Affiliation;
use App\Models\Call;
use App\Models\CallDocument;
use App\Models\CallHonorary;
use App\Models\Client;
use App\Models\Document;
use App\Models\Help;
use App\Models\Rectification;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use D4sign\Client as D4client;

class IniciaisController extends Controller
{
    public function primeiro_acesso()
    {
        return view('client.pages.info-iniciais.primeiro-acesso');
    }

    /**
     * Primeiro Acesso do caso.
     *
     * @return Application|Factory|RedirectResponse|View
     */
    public function start()
    {
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id','desc')->first();
        $percents_claimant = \App\Helpers\Functions::_percents_claimant();
        $percents_itens_breve = \App\Helpers\Functions::_percents_breve();
        $affiliations = $call->Affiliations()->with('client')->get();
        return view('client.pages.info-iniciais.start',compact('call','percents_claimant','percents_itens_breve','affiliations', 'client'));
    }

    public function outros()
    {
        $option_void = ['' => 'Selecione'];
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id','desc')->first();
        $relationship_claimant_list = $option_void+Call::RELATIONSHIP_CLAIMANT;
        $descendants_quantity_list = \App\Helpers\Functions::number_array(16);
        $descendants_quantity_list = $option_void+$descendants_quantity_list;

        $helps = Help::where('pages','REGEXP','[[:<:]]requerente_outros[[:>:]]')->orderBy('order','asc')->get();

        return view('client.pages.info-iniciais.requerente-outros',
            compact('call','relationship_claimant_list','descendants_quantity_list','helps')
        );
    }

    public function outros_store(Request $request)
    {
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id','desc')->first();
        $data = $this->_validate_outros($request);
        $data['is_claimant'] = $data['is_requerente'];
        $call->fill($data);
        $call->save();
        return redirect()->route('client.iniciais.requerente.outros');
    }
    
    public function affiliation(Affiliation $affiliation)
    {

        $client_main = auth('client')->user();
        $call = $client_main->call()->orderBy('calls.id','desc')->first();

        $client = $affiliation->client;        
        if($affiliation->type=='spouse'){
            //conjuge
            return view('client.pages.info-iniciais.conjuge-edit',compact('client'));
        }elseif($affiliation->type=='descendant'){
            //descendente
            $kinship_list = [
                '' => 'Selecione',
                'filho' => 'Filho(a)',
                'neto'  => 'Neto(a)',
                'bisneto'  => 'Bisneto(a)',
            ];    
            return view('client.pages.info-iniciais.descendente-edit', compact('client','kinship_list','call'));

        }elseif($affiliation->type=='claimant'){
            //requerente
            $voidOption = ['' => 'Estado civil' ];
            $marital_status = $voidOption+Client::MARITAL_STATUS;
            $days_list = \App\Helpers\Functions::arrayDay();
            $month_list = \App\Helpers\Functions::arrayMonth();
            $year_list = \App\Helpers\Functions::arrayYear();
            return view('client.pages.info-iniciais.requerente-edit', compact('client','marital_status','days_list','month_list','year_list','call'));
        }
    }

    public function claimant($id)
    {
        $client = Client::find($id);

        $voidOption = ['' => 'Estado civil' ];
        $marital_status = $voidOption+Client::MARITAL_STATUS;
        $days_list = \App\Helpers\Functions::arrayDay();
        $month_list = \App\Helpers\Functions::arrayMonth();
        $year_list = \App\Helpers\Functions::arrayYear();

        return view('client.pages.info-iniciais.requerente-edit', compact('client','marital_status','days_list','month_list','year_list'));
    }

    public function requerente()
    {
        $voidOption = ['' => 'Estado civil' ];
        $marital_status = $voidOption+Client::MARITAL_STATUS;
        $days_list = \App\Helpers\Functions::arrayDay();
        $month_list = \App\Helpers\Functions::arrayMonth();
        $year_list = \App\Helpers\Functions::arrayYear();
        return view('client.pages.info-iniciais.requerente-dados', compact('marital_status','days_list','month_list','year_list'));
    }

    public function requerente_update(Request $request, Client $client)
    {
        $data = $this->_validate_dados($request);
        $client->fill($data);
        $client->save();
        return redirect()->route('client.iniciais.select.outros');
    }

    public function requerente_store(Request $request)
    {
        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
        $password = substr($random, 0, 10);

        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id','desc')->first();
        
        $data = $this->_validate_dados($request);
        $data['email'] = date('YmdHis').'@requerente.com.br';
        $data['password'] = Hash::make($password);
        $requerent = Client::create($data);

        Affiliation::create([
            'call_id' => $call->id, 
            'client_id' => $requerent->id,
            'type' => 'claimant'
        ]);

        return redirect()->route('client.iniciais.requerente.outros');
    }

    public function conjuge()
    {
        return view('client.pages.info-iniciais.conjuge-dados');
    }

    public function conjuge_store(Request $request)
    {
        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
        $password = substr($random, 0, 10);

        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id','desc')->first();
        
        $data = $this->_validate_conjuge($request);

        if(!isset($data['email']) || is_null($data['email']))
            $data['email'] = date('YmdHis').'@conjuge.com.br';

        $data['password'] = Hash::make($password);

        $data['adresstype'] = $client->adresstype;
        $data['addressstreet'] = $client->addressstreet;
        $data['addressnumber'] = $client->addressnumber;
        $data['addressdistrict'] = $client->addressdistrict;
        $data['addresscity'] = $client->addresscity;
        $data['addressstate'] = $client->addressstate;

        $spouse = Client::create($data);

        Affiliation::create([
            'call_id' => $call->id, 
            'client_id' => $spouse->id,
            'type' => 'spouse'
        ]);
        
        return redirect()->route('client.iniciais.requerente.outros');
    }

    public function contractor_address_json()
    {
        $client = auth('client')->user();
        $data['addresscep'] = $client->addresscep;
        $data['addressstreet'] = $client->addressstreet;
        $data['addressnumber'] = $client->addressnumber;
        $data['addresscomplement'] = $client->addresscomplement;
        $data['addressdistrict'] = $client->addressdistrict;
        $data['addresscity'] = $client->addresscity;
        $data['addressstate'] = $client->addressstate;

        return response()->json($data);

    }

    public function conjuge_update(Request $request, Client $client)
    {
        $data = $this->_validate_conjuge($request, $client->id);
        $client->fill($data);
        $client->save();
        return redirect()->route('client.iniciais.select.outros');
    }

    public function descendente()
    {
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id','desc')->first();
        $descendant_count = $call->Affiliations()->where('type','descendant')->count();
        $descendant_count = (int)(1 + $descendant_count);
        $number_position = \App\Helpers\Functions::position($descendant_count);

        $kinship_list = [
            '' => 'Selecione',
            'filho' => 'Filho(a)',
            'neto'  => 'Neto(a)',
            'bisneto'  => 'Bisneto(a)',
        ];

        return view('client.pages.info-iniciais.descendente-dados', compact('number_position','kinship_list','call'));
    }

    public function descendente_update(Request $request, Client $client)
    {
        $data = $this->_validate_descendente($request,$client->id);
        $client->fill($data);
        $client->save();
        return redirect()->route('client.iniciais.select.outros');
    }

    public function descendente_store(Request $request)
    {
        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
        $password = substr($random, 0, 10);

        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id','desc')->first();
        
        $data = $this->_validate_descendente($request);

        if(!isset($data['email']) || is_null($data['email']))
            $data['email'] = date('YmdHis').'@descendente.com.br';
            
        $data['password'] = Hash::make($password);

        $data['adresstype'] = $client->adresstype;
        $data['addressstreet'] = $client->addressstreet;
        $data['addressnumber'] = $client->addressnumber;
        $data['addressdistrict'] = $client->addressdistrict;
        $data['addresscity'] = $client->addresscity;
        $data['addressstate'] = $client->addressstate;

        $descendant = Client::create($data);

        Affiliation::create([
            'call_id' => $call->id, 
            'client_id' => $descendant->id,
            'type' => 'descendant'
        ]);

        return redirect()->route('client.iniciais.requerente.outros');
    }

    public function select_outros()
    {
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id','desc')->first();
        $affiliations = $call->Affiliations()->with('client')->get();
        $type_list = Affiliation::TYPE;
        $helps = Help::where('pages','REGEXP','[[:<:]]requerente_outros[[:>:]]')->orderBy('order','asc')->get();
        return view('client.pages.info-iniciais.select-outros', 
            compact('call','client','affiliations','type_list','helps')
        );

    }

    /**
     * Rendenriza a view para o Breve Relato.
     *
     * @return Application|Factory|View
     */
    public function breve_relato()
    {
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id','desc')->first();

        $helps = Help::where('pages','REGEXP','[[:<:]]breve_relato[[:>:]]')->orderBy('order','asc')->get();

        return view('client.pages.info-iniciais.breve-relato', 
            compact('call','helps')
        );
    }

    /**
     * Salva os dados do Breve Relato.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function breve_relato_store(Request $request)
    {
        if(isset($request->breve_relato)){
            $date_now = date('Y-m-d H:i:s');
            $client = auth('client')->user();
            $call = $client->call()->orderBy('calls.id','desc')->first();
            $call->breve_relato = $request->breve_relato;
            $call->update_breve_relato = $date_now;
            $call->save();
            return redirect()->route('client.iniciais.retificacoes')->with('success','Breve Relato atualizado com sucesso!');
        }
        return redirect()->route('client.iniciais.start');
    }

    public function retificacoes()
    {
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id','desc')->first();
        $rectification = Rectification::where('call_id',$call->id)->count();

        $rectification2= Rectification::where('call_id',$call->id)->first();
        if($rectification2){
            $call->currentname = $rectification2->currentname;
            $call->desiredname = $rectification2->desiredname;
        }


        $qtd_coautor = CallHonorary::where('call_id',$call->id)->where('description','coautor')->count();
        $qtd_retificacoes_permitidas = $qtd_coautor + 1;

        $helps = Help::where('pages','REGEXP','[[:<:]]retificacoes_desejadas[[:>:]]')->orderBy('order','asc')->get();

        return view('client.pages.info-iniciais.retificacoes', 
            compact('call','rectification','qtd_retificacoes_permitidas','helps')
        );
    }

    public function retificacoes_store(Request $request)
    {
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id','desc')->first();

        $call->status_breve_relato = 'new';
        $call->reason_breve_relato = null;
        $call->save();

        $this->atribui_procuracoes($call);

        if(isset($request->atual_name) && isset($request->new_name) && is_array($request->atual_name) && is_array($request->new_name) ){
            $atual_names = $request->atual_name;
            $new_names = $request->new_name;
            if(count($atual_names) == count($new_names)){

                if($new_names[0] != $call->desiredname ){
                    $call->call_register()->create(
                        [
                            'client_id' => $client->id,
                            'description' => $client->first_name.' alterou a Retificação desejada para “'.$new_names[0].'”', 
                            'type' => 'normal',
                            'step' => 'call'
                        ]
                    );
                }

                Rectification::where('call_id',$call->id)->delete();

                $combine = array_combine($atual_names, $new_names);
                foreach($combine as $atual_name => $new_name){
                    if(!empty($atual_name) && !empty($new_name) ){
                        Rectification::create([
                            'call_id'       => $call->id,
                            'currentname'   => $atual_name,
                            'desiredname'   => $new_name
                        ]);
                    }
                }
            }
        }
        

        return redirect()->route('client.iniciais.start');
    }


    protected function _atribui_procuracoes(Call $call, Client $client)
    {
        $procuracao_id = [];
        $is_adulthood = true;
        $is_adulthood = true;
        if(!is_null($client->is_adulthood)){
            if($client->is_adulthood){
                $is_adulthood = true;
            }else{
                $is_adulthood = false;
            }
        }else{
            $client_data_nascimento = $client->date_birth;
            $idade = Functions::calcularIdade($client_data_nascimento);
            if($idade>17){
                $is_adulthood = true;
            }else{
                $is_adulthood = false;
            }
        }
    }

    protected function atribui_procuracoes(Call $call)
    {        
        //$requerente = $call->client;
        $procuracao_id = [];
        $requerente = $call->Affiliations()->where('type','claimant')->first()->client ?? false;
        if(!$requerente){
            $requerente = $call->client;
        }

        $is_adulthood = true;
        if(!is_null($requerente->is_adulthood)){
            if($requerente->is_adulthood){
                $is_adulthood = true;
            }else{
                $is_adulthood = false;
            }
        }else{
            $requerente_data_nascimento = $requerente->date_birth;
            $idade = Functions::calcularIdade($requerente_data_nascimento);
            if($idade>17){
                $is_adulthood = true;
            }else{
                $is_adulthood = false;
            }
        }
        $estado_civil = $requerente->marital_status;
        $name_document = '';
        if($estado_civil == 'casado'){
            if($call->occupation_area == 'retificacao'){
                array_push($procuracao_id, 46);              
            }else{
                array_push($procuracao_id, 50); 
            }            
        }elseif($estado_civil == 'solteiro'){
            if($is_adulthood){
                $procuracao_id_number = $call->occupation_area == 'retificacao' ? 47 : 49;
                array_push($procuracao_id, $procuracao_id_number);
            }else{
                $procuracao_id_number = $call->occupation_area == 'retificacao' ? 48 : 51;
                array_push($procuracao_id, $procuracao_id_number);
            }
        }else{
            $procuracao_id_number = $call->occupation_area == 'retificacao' ? 47 : 49;
            array_push($procuracao_id, $procuracao_id_number);
        }
        CallDocument::where('call_id',$call->id)->delete();





        $documents = Document::whereIn('id',$procuracao_id)->get();                

        foreach($documents as $document){
            $document_name = $document->name;
            $name_document = $document_name.' - '.$requerente->name;
            $replace_names = ['(Thiago)','(Magri)'];
            $name_document = str_replace($replace_names,'',$name_document);
            $data = [
                'user_id' => $call->user_id,
                'call_id' => $call->id,
                'document_id' => $document->id,
                'status' => 'new',
                'client_id' => $requerente->id,
                'name' => $document_name
            ];

            Validator::make($data, [
                'client_id' => 'required|numeric',
                'document_id' => 'required|numeric',
                'name' => 'required|min:3'
            ])->validate();
            $call_document = CallDocument::create($data);            
        }


    }

    protected function _validate_outros(Request $request)
    {

        if ( !$request->has('is_requerente') ||  !$request->has('has_descendente') ){
            return $this->validate($request, [
                'is_requerente'  => 'required|numeric',
                'has_descendente'  => 'required|numeric',
                'relationship_claimant' => 'nullable',
                'descendants_quantity'  => 'nullable'
            ]); 
        }

        if($request->is_requerente == '0' && $request->has_descendente == '1'){
            return $this->validate($request, [
                'is_requerente'  => 'required|numeric',
                'has_descendente'  => 'required|numeric',
                'relationship_claimant'  => 'required',
                'descendants_quantity'  => 'required'
            ]); 
        }elseif($request->is_requerente == '0' && $request->has_descendente == '0'){
            return $this->validate($request, [
                'is_requerente'  => 'required|numeric',
                'has_descendente'  => 'required|numeric',
                'relationship_claimant'  => 'required',
                'descendants_quantity'   => 'nullable'
            ]); 
        }elseif($request->is_requerente == '1' && $request->has_descendente == '0'){
            return $this->validate($request, [
                'is_requerente'  => 'required|numeric',
                'has_descendente'  => 'required|numeric',
                'relationship_claimant'  => 'nullable',
                'descendants_quantity'   => 'nullable'
            ]); 
        }elseif($request->is_requerente == '1' && $request->has_descendente == '1'){
            return $this->validate($request, [
                'is_requerente'  => 'required|numeric',
                'has_descendente'  => 'required|numeric',
                'relationship_claimant'  => 'nullable',
                'descendants_quantity'   => 'required'
            ]); 
        }
        
    }

    protected function _validate_descendente(Request $request,$id=null)
    {
        if(isset($request->phone) && !is_null($request->phone)){
            $request->merge([
                'phone' => preg_replace('/[^0-9]/', '', $request->phone),
            ]);
        }

        if(isset($request->is_adulthood) && $request->is_adulthood == '1'){
            $email_rule = is_null($id) ? 'required|max:191|email|unique:clients,email' : 'required|max:191|email|unique:clients,email,'.$id;
            $phone_rule = is_null($id) ? 'required|min:10|unique:clients,phone' : 'required|min:10|unique:clients,phone,'.$id;
            $validade_rg = 'required';
            $validade_cpf = 'required|unique:clients,cpf,'.$id;
        }else{
            $email_rule = 'nullable';
            $phone_rule = 'nullable';
            $validade_rg = 'nullable';
            $validade_cpf = 'nullable|unique:clients,cpf';
        }
        
        $mensagens = [
            'name.required' => 'O nome é obrigatório!',
            'email.required' => 'O nome é obrigatório!',
            'is_adulthood.required' => 'Responda se o descendente é maior de 18 anos!',
            'job.required' => 'A profissão é obrigatória!',
            'cpf.required' => 'O CPF é obrigatório!',
            'rg.required' => 'O RG é obrigatório!',
            'email.email' => 'Digite um email válido!',
            'email.unique' => 'Já existe um registro com este e-mail, por favor use um diferente!',
            'phone.min' => 'Este não é um número de telefone válido!',
            'phone.unique' => 'Já existe um registro com este telefone, por favor use um diferente!',
            'cpf.unique' => 'Já existe um outro registro com este CPF!'
        ];


        return $this->validate($request, [
            'name'  => 'required|max:191',
            'email'  => $email_rule,
            'phone' => $phone_rule,
            'job' => "required",
            'nacionality' => "required",
            'cpf' => $validade_cpf,
            'rg' => $validade_rg,
            'is_adulthood' => "required",
            'kinship' => "required"
        ],$mensagens);      
    }

    protected function _validate_conjuge(Request $request,$id=null)
    {

        if(isset($request->phone) && !is_null($request->phone)){
            $request->merge([
                'phone' => preg_replace('/[^0-9]/', '', $request->phone),
            ]);
        }

        $email_rule = is_null($id) ? 'required|max:191|email|unique:clients,email' : 'required|max:191|email|unique:clients,email,'.$id;
        $phone_rule = is_null($id) ? 'required|min:10|unique:clients,phone' : 'required|min:10|unique:clients,phone,'.$id;

        $mensagens = [
            'name.required' => 'O nome é obrigatório!',
            'email.required' => 'O nome é obrigatório!',
            'job.required' => 'A profissão é obrigatória!',
            'cpf.required' => 'O CPF é obrigatório!',
            'rg.required' => 'O RG é obrigatório!',
            'addresscep.required' => 'O CEP é obrigatório!',
            'addressstreet.required' => 'O Endereço é obrigatório!',
            'addressnumber.required' => 'O Número do Endereço é obrigatório!',
            'addressdistrict.required' => 'O Bairro é obrigatório!',
            'addresscity.required' => 'A Cidade é obrigatória!',
            'addressstate.required' => 'O Estado é obrigatório!',
            'email.email' => 'Digite um email válido!',
            'email.unique' => 'Já existe um registro com este e-mail, por favor use um diferente!',
            'phone.min' => 'Este não é um número de telefone válido!',
            'phone.unique' => 'Já existe um registro com este telefone, por favor use um diferente!',
            'cpf.unique' => 'Já existe um outro registro com este CPF!'
        ];

        return $this->validate($request, [
            'name'  => 'required|max:191',
            'email'  => $email_rule,
            'phone' => $phone_rule,
            'job' => "required",
            'nacionality' => "required",
            'cpf' => 'required|unique:clients,cpf',
            'rg' => "required",
            'addresscep' => "required|min:8|max:10",
            'addressstreet' => "required",
            'addressnumber' => "required",
            'addressdistrict' => "required",
            'addresscomplement' => "nullable",
            'addresscity' => "required",
            'addressstate' => "required|max:2"
        ], $mensagens);      
    }

    protected function _validate_dados(Request $request)
    {
        $marital_status = implode(',',array_keys(Client::MARITAL_STATUS));

        $date_birth = $request->date_birth_year.'-'.$request->date_birth_month.'-'.$request->date_birth_day;
        $idade = \App\Helpers\Functions::calcularIdade($date_birth);
        if($idade<18){
            return $this->validate($request, [
                'name'  => 'required|max:191',
                'email'  => 'nullable',
                'job' => "nullable",
                'nacionality' => "required",
                'phone' => "nullable|min:10",
                'cpf' => 'nullable|unique:clients,cpf',
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
        }else{
            return $this->validate($request, [
                'name'  => 'required|max:191',
                'email'  => 'nullable',
                'job' => "nullable",
                'nacionality' => "required",
                'phone' => "nullable|min:10",
                'cpf' => 'required|unique:clients,cpf',
                'rg' => "required",
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

                
    }

}
