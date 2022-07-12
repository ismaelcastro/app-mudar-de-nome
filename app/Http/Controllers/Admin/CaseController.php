<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Functions;
use App\Helpers\MauticHelper;
use App\Helpers\Setting;
use App\Mail\SendMailEmissaoCertidao;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use D4sign\Client as D4client;
use App\Http\Controllers\Controller;
use App\Mail\SendMailNotification;
use App\Models\Access;
use App\Models\Affiliation;
use App\Models\Call;
use App\Models\Client;
use App\Models\Reason;
use App\Models\DocumentCategory;
use App\Models\GuideCategory;
use App\Models\CallDocument;
use App\Models\CallExtra;
use App\Models\CallGuide;
use App\Models\CallHonorary;
use App\Models\TaskList;
use App\Models\Task;
use App\Models\User;
use App\Models\CallRegister;
use App\Models\Dispatcher;
use App\Models\Document;
use App\Models\ExtraCategory;
use App\Models\ProposalField;
use App\Models\Rectification;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class CaseController extends Controller
{
    protected $mauticHelper;

    public function __construct(MauticHelper $mauticHelper)
    {
        $this->mauticHelper = $mauticHelper;
    }

    public function index(Request $request, Call $call_model, TaskList $task_list, Reason $reason)
    {
        $arrayVoid = ['' => 'Selecione'];
        $task_list = $arrayVoid + $task_list->combo()->all();
        $usersadm = User::get()->pluck('name', 'id')->all();
        $priority_list = $arrayVoid + Task::PRIORITY;
        $dataForm = $request->except('_token');
        $reasons = $reason->combo()->all();

        $stage_case_list = Call::STAGE_CASE;

        //widgets
        $qtd_primeiros_acessos = Call::whereNotNull('stage_case')->whereNull('process')->where('stage_case','primeiro_acesso')->count();
        $qtd_breve_relato = Call::whereNotNull('stage_case')->whereNull('process')->where('stage_case','solicitacao_documentos')->count();
        $qtd_procuracao = Call::whereNotNull('stage_case')->whereNull('process')->where('stage_case','aguardando_procuracao')->count();
        $qtd_documentacao = Call::whereNotNull('stage_case')->whereNull('process')->where('stage_case','aguardando_envio_cliente')->count();
        $qtd_analise = Call::whereNotNull('stage_case')->whereNull('process')->where('stage_case','analise_documentacao')->count();
        $qtd_guias_custas = Call::whereNotNull('stage_case')->whereNull('process')->where('stage_case','emissao_guias')->count();
        $qtd_pagamento_guias = Call::whereNotNull('stage_case')->whereNull('process')->where('stage_case','aguardando_pgto')->count();
        $qtd_comprovante_guias = Call::whereNotNull('stage_case')->whereNull('process')->where('stage_case','conferir_guias')->count();
        $qtd_elaboracao_inicial = Call::whereNotNull('stage_case')->whereNull('process')->where('stage_case','elaboracao_inicial')->count();
        $qtd_servico_certidao = Task::where('status','open')->where('task_list_id',10)->count();

        $areas_all = Call::OCCUPATION_AREA;
        $user_occupation_area = auth()->user()->occupation_area;
        $areas_list = $areas_all;
        if(!is_null($user_occupation_area)){
            $areas_list = [$user_occupation_area => $areas_all[$user_occupation_area]];
        }

        $calls = $call_model
            ->join('clients', 'calls.client_id', '=', 'clients.id')
            ->leftJoin('reasons', 'reasons.id', '=', 'calls.reason_id')
            ->where(function ($query) use ($dataForm) {
                $query->whereNotNull('stage_case');
                $query->whereNull('process');
                if (isset($dataForm['occupation_area']))
                    $query->where('occupation_area', $dataForm['occupation_area']);
                    
                if(isset($dataForm['servico_certidao'])){
                    $query->whereHas('task', function($q) {
                        $q->where('task_list_id', 10)->where('status','open');
                    });
                }
                if (isset($dataForm['stage_case']))
                    $query->whereIn('stage_case', $dataForm['stage_case']);
                if (isset($dataForm['reason']))
                    $query->whereIn('reason_id', $dataForm['reason']);
                if (isset($dataForm['paymentform']))
                    $query->where('paymentform', $dataForm['paymentform']);

                if (isset($dataForm['title'])){
                    $var_title = $dataForm['title'];
                    $query->where(function($q) use($var_title){
                        $q->whereHas('client', function($q) use($var_title) {
                            $q->where('name', 'LIKE', '%' . $var_title . '%')
                            ->orWhere('email', 'LIKE', '%'.$var_title.'%')
                            ->orWhere(function($q) use($var_title){
                                $searh_interno = $var_title;
                                $searh_interno = preg_replace('/[^0-9]/', '', $searh_interno);
                                if(!empty($searh_interno) && is_numeric($searh_interno)){
                                    $q->where('cpf',$searh_interno);
                                }
                            });
                        })->orWhere('title', 'LIKE', '%' . $var_title . '%');
                    });
                    
                }

                if (isset($dataForm['date_start']) && isset($dataForm['date_finish'])) {
                    $field_date_search = $dataForm['field_date_search'];
                    $query->whereBetween('calls.' . $field_date_search, [$dataForm['date_start'] . ' 00:00:00', $dataForm['date_finish'] . ' 23:59:59']);
                }

            })
            ->select('calls.*');

        if (isset($dataForm['ord'])) {
            $ord = $dataForm['ord'];
            $ordArray = explode(';', $ord);
            $field = $ordArray[0];
            $direction = isset($ordArray[1]) && $ordArray[1] == 'desc' ? 'desc' : 'asc';
            //isto pode deixar o sistema bem pesado mas foi o que foi pedido
            if($field == 'progress' || $field == 'etapa'){
                //$calls = $calls->orderBy($field, $direction);
                if($direction == 'asc'){
                    $calls = $calls->get()->sortBy($field);
                }else{
                    $calls = $calls->get()->sortByDesc($field);
                }
                
                $function = new Functions;
                $calls = $function->paginate($calls, 15);
            }else{
                $calls = $calls->orderBy($field, $direction);
                $calls = $calls->paginate(15);
            }           
            
        }else{
            $calls = $calls->paginate(15);
        }

        

        return view('admin.pages.cases.index',
            compact(
                'calls',
                'dataForm',
                'task_list',
                'usersadm',
                'priority_list',
                'stage_case_list',
                'reasons',
                'qtd_primeiros_acessos',
                'qtd_breve_relato',
                'qtd_procuracao',
                'qtd_documentacao',
                'qtd_analise',
                'qtd_guias_custas',
                'qtd_pagamento_guias',
                'qtd_comprovante_guias',
                'qtd_elaboracao_inicial',
                'qtd_servico_certidao',
                'areas_list'
            )
        );

    }

    public function aprove_all_checked(Request $request, Call $call)
    {
        $call_document_id_list = $request->call_document_id;
        $call_document_id_array = explode(',', $call_document_id_list);
        
        $call_docuemnt_id = $call_document_id_array[0] != 0 ? $call_document_id_array[0] : $call_document_id_array[1];

        $call_doc = CallDocument::find($call_docuemnt_id );
        //dd($call_document_id_array);
        if (count($call_document_id_array) > 0) {
            foreach ($call_document_id_array as $call_document_id) {
                $call_document = CallDocument::find($call_document_id);
                if($call_document){
                    $call_document->status = 'approved';
                    $call_document->save();
                }
            }
        }

        //dd($call_docuemnt_id );

        $qtd_docs = CallDocument::where('call_id', $call_doc->call->id)->whereHas('document',function($q){
            $q->whereNotIn('document_category_id', [1]);
        })->count();
        $qtd_docs_aprovadas = CallDocument::where('call_id', $call_doc->call->id)->where('status', 'approved')->count();
        if ($qtd_docs > 0 && $qtd_docs == $qtd_docs_aprovadas) {
            $call = Call::find($call_doc->call->id);
            $call->stage_case = "emissao_guias";
            $call->save();
        }

        return redirect()->back()->with('success', 'Itens aprovados');
    }


    public function update_stage_case(Call $call, Request $request)
    {
        
        if(isset($request->stage_case)){
            $call->stage_case = $request->stage_case;
            $call->save();            
        }
        return redirect()->back()->with('success','Atualizado com sucesso');
    }

    public function reprove_all_checked(Request $request, Call $call)
    {
        $call_document_id_list = $request->call_document_id;
        $reason = $request->reason;
        $call_document_id_array = explode(',', $call_document_id_list);
        if (count($call_document_id_array) > 0) {
            foreach ($call_document_id_array as $call_document_id) {
                $call_document = CallDocument::find($call_document_id);
                $call_document->status = 'disapproved';
                $call_document->reason = $reason;
                $call_document->save();
            }
        }
        return redirect()->back()->with('success', 'Itens reprovados');
    }

    public function delete_all_checked(Request $request, Call $call)
    {
        $call_document_id_list = $request->call_document_id;
        $reason = $request->reason;
        $call_document_id_array = explode(',', $call_document_id_list);
        if (count($call_document_id_array) > 0) {
            foreach ($call_document_id_array as $call_document_id) {
                $call_document = CallDocument::find($call_document_id);
                $call_document->delete();
            }
        }
        return redirect()->back()->with('success', 'Itens excluídos');
    }

    public function wait_for_document(Call $call)
    {
        if($call->stage_case == 'solicitacao_documentos' || $call->stage_case == 'aguardando_procuracao'){
            $call->stage_case = 'aguardando_procuracao';
        }else{
            $call->stage_case = 'aguardando_envio_cliente';
        }        
        $call->save();
        //mautic aqui

        return redirect()->back()->with('success', 'O Cliente foi notificado');
    }

    public function wait_for_payment_guide(Call $call)
    {

        //mautic aqui
        $email_id = 110;
        if($call->stage_case == 'conferir_guias'){
            $email_id = 114;
        }else{
            $email_id = 110;
        }
        
        $mautic = new MauticHelper();
        $mautic->send_mail($email_id, $call->client->mautic_id);


        $call->stage_case = 'aguardando_pgto';
        $call->save();
        

        return redirect()->back()->with('success', 'O Cliente foi notificado');
    }

    public function show(Request $request, DocumentCategory $documentCategory, GuideCategory $guideCategory, CallDocument $callDocument, CallGuide $callGuide, Call $call, Reason $reason, TaskList $task_list)
    {
        $arrayVoid = ['' => 'Selecione'];
        $profile_color = Client::PROFILE_COLOR;
        $reasons = $reason->combo()->all();
        $reasons_list = $reason->all();
        $documentCategories = $documentCategory->where('id','<>',1)->get();
        $guideCategories = $guideCategory->all();
        $guiaJudicial = $guideCategory->find(1);
        $justicaGratuita = $guideCategory->find(2);
        $subjects = Call::OCCUPATION_AREA;

        
        $not_categories_list = $call->dispatchers->where('document_category_id', 5)->pluck('document_category_id')->all();
        $not_categories_list_send = $call->dispatchers()->whereNotNull('proof_of_payment')->where('status','<>','disapproved')->pluck('document_category_id')->all();
        $not_categories_list_approved = $call->dispatchers()->where('status','approved')->pluck('document_category_id')->all();
        $not_categories_list_disapproved = $call->dispatchers()->where('status','disapproved')->pluck('document_category_id')->all();
        $not_categories_list_pending = $not_categories_list_send;//$call->dispatchers()->whereNull('status')->pluck('document_category_id')->all();
             
        

        $call_documents_list = [];
        $dispatchers = $call->dispatchers->where('document_category_id', 5);
        foreach ($dispatchers as $dispatcher) {
            $dispatcher_category_id = $dispatcher->document_category_id;
            $call_documents = CallDocument::where('call_id', $dispatcher->call_id)->where('client_id', $dispatcher->client_id)->whereHas('document', function ($q) use ($dispatcher_category_id) {
                $q->where('document_category_id', $dispatcher_category_id);
            })->get();
            foreach ($call_documents as $call_document) {
                $call_documents_list[] = $call_document->id;
            }
        }
        
        
        $docsTotal = CallDocument::where('call_id', $call->id)->where(function($q) use($call_documents_list){
            if(count($call_documents_list) > 0){
                $q->whereNotIn('id',$call_documents_list);
            }
        })->whereHas('document', function($q) {
            $q->where('document_category_id','<>',1);
        })->count();
        
        
        $docsSend = CallDocument::where('call_id', $call->id)->whereNotNull('file')->where(function($q) use($call_documents_list){
            if(count($call_documents_list) > 0){
                $q->whereNotIn('id',$call_documents_list);
            }
        })->whereHas('document', function($q){
            $q->where('document_category_id','<>',1);
        })->count();

        
        
        $docsPending = CallDocument::where('call_id', $call->id)->where('status', 'pending')->where(function($q) use($call_documents_list){
            if(count($call_documents_list) > 0){
                $q->whereNotIn('id',$call_documents_list);
            }
        })->whereHas('document', function($q){
            $q->where('document_category_id','<>',1);
        })->count();
        

        $docsDisapproved = CallDocument::where('call_id', $call->id)->where('status', 'disapproved')->where(function($q) use($call_documents_list){
            if(count($call_documents_list) > 0){
                $q->whereNotIn('id',$call_documents_list);
            }
        })->whereHas('document', function($q){
            $q->where('document_category_id','<>',1);
        })->count();
        

        $docsApproved = CallDocument::where('call_id', $call->id)->where('status', 'approved')->where(function($q) use($call_documents_list){
            if(count($call_documents_list) > 0){
                $q->whereNotIn('id',$call_documents_list);
            }
        })->whereHas('document', function($q){
            $q->where('document_category_id','<>',1);
        })->count();
        
        $docsHired = CallDocument::where('call_id', $call->id)->where('status', 'hired')->where(function($q) use($call_documents_list){
            if(count($call_documents_list) > 0){
                $q->whereNotIn('id',$call_documents_list);
            }
        })->whereHas('document', function($q){
            $q->where('document_category_id','<>',1);
        })->count();
        
        $docsWaiting = CallDocument::where('call_id', $call->id)->where('status', 'waiting')->where(function($q) use($call_documents_list){
            if(count($call_documents_list) > 0){
                $q->whereNotIn('id',$call_documents_list);
            }
        })->whereHas('document', function($q){
            $q->where('document_category_id','<>',1);
        })->count();

        
        $docsTotal = $docsTotal + count($not_categories_list);
        $docsSend = $docsSend + count($not_categories_list_send);
        $docsApproved = $docsApproved + count($not_categories_list_approved);
        $docsDisapproved = $docsDisapproved + count($not_categories_list_disapproved);
        $docsPending = $docsPending + count($not_categories_list_pending);        
       

        $tot_procuracoes = CallDocument::where('call_id', $call->id)->whereHas('document', function($q){
            $q->where('document_category_id',1);
        })->count();
        $tot_procuracoes_aprovadas = CallDocument::where('call_id', $call->id)->where('status','<>','new')->whereHas('document', function($q){
            $q->where('document_category_id',1);
        })->count();
        

        $tot_retifications = Rectification::where('call_id',$call->id)->count();
        $tot_retifications_aprovados = Rectification::where('call_id',$call->id)->where('status',true)->count();

        $all_breve = 'disapproved';        
        if($tot_procuracoes == $tot_procuracoes_aprovadas && $tot_retifications == $tot_retifications_aprovados){
            $all_breve = 'approved';
        }
       

        $guideQtdFiles = CallGuide::where('call_id', $call->id)->whereNotNull('file_download')->count();
        $guideQtds = CallGuide::where('call_id', $call->id)->count();
        $guideDisapQtds = CallGuide::where('call_id', $call->id)->where('status','disapproved')->count();

        
        $task_list = $arrayVoid + $task_list->combo()->all();
        $usersadm = User::get()->pluck('name', 'id')->all();
        $priority_list = $arrayVoid + Task::PRIORITY;
       
        
        if (isset($request->allregistercase))
            $call_registers = $call->call_register_desc->where('step', 'case')->all();
        elseif (isset($request->allregister))
            $call_registers = $call->call_register_desc->all();
        else
            $call_registers = $call->call_register_last(5)->where('step', 'case')->get();

                    
        $access = Access::where('call_id', $call->id)
            ->where('finish', '>=', date('Y-m-d H:i:s'))
            ->where('client_id', $call->client_id)
            ->orderBy('id', 'desc')->first();
        
        $requerente = $call->Affiliations()->where('type','claimant')->first()->client ?? false;
        if(!$requerente){
            $requerente = $call->client;
        }
       

        $voidOption = ['' => 'Estado civil' ];
        $marital_status = $voidOption+Client::MARITAL_STATUS;
        $days_list = \App\Helpers\Functions::arrayDay();
        $month_list = \App\Helpers\Functions::arrayMonth();
        $year_list = \App\Helpers\Functions::arrayYear();
        $affiliation_types = Affiliation::TYPE;

        $qtd_coautor = CallHonorary::where('call_id',$call->id)->where('description','coautor')->count();
        $qtd_retificacoes_permitidas = $qtd_coautor + 1;
        
        $proposal_fields_list = $call->proposal_fields->pluck('value','key')->all();        
        
        return view('admin.pages.cases.show',
            compact('call',
                'documentCategories',
                'guideCategories',
                'callDocument',
                'docsTotal',
                'docsSend',
                'docsPending',
                'docsDisapproved',
                'docsApproved',
                'docsHired',
                'docsWaiting',
                'callGuide',
                'reasons',
                'call_registers',
                'profile_color',
                'task_list',
                'usersadm',
                'priority_list',
                'access',
                'guiaJudicial',
                'justicaGratuita',
                'subjects',
                'guideQtdFiles',
                'guideQtds',
                'guideDisapQtds',
                'requerente',
                'marital_status',
                'days_list',
                'month_list',
                'year_list',
                'affiliation_types',
                'reasons_list',
                'qtd_retificacoes_permitidas',
                'all_breve',
                'proposal_fields_list'
            )
        );
    }

    protected function _validate($request)
    {
        return $this->validate($request, [
            'name' => 'required|max:191',
            'document_id' => 'required|numeric'
        ]);
    }

    protected function _validate_process($request)
    {
        return $this->validate($request, [
            'process_number' => 'required|max:191',
            'judgment_number' => 'nullable',
            'judgment_stick' => 'nullable',
            'court_jurisdiction' => 'nullable',
            'link_in_court' => 'nullable',
            'protocol' => 'required',
            'distributed_in' => 'required|date',
            'process' => 'nullable',
            'procedural_step' => 'nullable'
        ]);
    }

    /**
     * Transforma o Caso em Processo.
     *
     * @param Request $request
     * @param Call $call
     * @return RedirectResponse
     */
    public function storeprocess(Request $request, Call $call)
    {
        if(is_null($call->process_number)){
            $request->request->add(['process' => date('Y-m-d H:i:s')]);
        }
        $request->request->add(['stage_case' => 'processo_distribuido']);
        $request->request->add(['procedural_step' => 'Processo Distribuído']);

        $data = $this->_validate_process($request);

        $msg = 'Caso transformou em Processo';

        if(is_null($call->process_number)){
            $data['procedural_status'] = 'em_andamento';
            $data['date_procedural_status'] = Carbon::now();

            $dataRegister = [
                'user_id' => auth()->user()->id,
                'call_id' => $call->id,
                'description' => "Processo distribuído por <strong>{$call->client->firstname}</strong>",
                'step' => 'precess'
            ];
            CallRegister::create($dataRegister);

            if(isset($request->process_number) && !empty($request->process_number) ){
                $email_id = 117;
                $mautic = new MauticHelper();
                $mautic->send_mail($email_id, $call->client->mautic_id);
            }
            
        } else{
            $msg = 'Processo atualizado';
        }       

        $call->fill($data);
        $call->save();

       

        return redirect()->back()->with('success', $msg);
    }

    public function updateprocess(Request $request, Call $call)
    {
        $data = $this->_validate_process($request);
        $call->fill($data);
        $call->save();
        return redirect()->back()->with('success', 'Processo atualizado');
    }

    public function storedocument(Request $request, Call $call)
    {
        foreach ($request->document_id as $item) {
            $document_name = Document::find((int)$item)->name;

            $data = [
                'user_id' => $call->user_id,
                'call_id' => $call->id,
                'document_id' => $item,
                'status' => 'new',
                'client_id' => $request->client_id,
                'name' => $document_name
            ];

            Validator::make($data, [
                'client_id' => 'required|numeric',
                'document_id' => 'required|numeric',
                'name' => 'required|min:3'
            ])->validate();

            CallDocument::create($data);
        }

        if(isset($request->check_returnbox) && $request->check_returnbox == 'ok'){
            return redirect()->to(url()->previous() . '#info-documentos_top')->with(['success'=>'Adicionado com sucesso!','openModal'=>'breverelatoModal','step_number'=>'2']);
        }

        return redirect()->to(url()->previous() . '#info-documentos_top')->with('success', 'Adicionado com sucesso!');
    }

    public function breve_relato_approve(Call $call)
    {
        $date_now = date('Y-m-d H:i:s');
        $call->status_breve_relato = 'approved';
        $call->stage_case = 'solicitacao_documentos';
        $call->update_breve_relato = $date_now;
        $call->save();

        $this->envia_procuracoes($call);

        $mautic = new MauticHelper();
        $email_id = 105;
        $mautic->send_mail($email_id, $call->client->mautic_id);

        return redirect()->to(url()->previous() . '#info-documentos_top')->with('success', 'Status do breve relato atualizado!');
    }

    protected function envia_procuracoes(Call $call)
    {
        $setting = Setting::getList();
        $requerente = $call->Affiliations()->where('type','claimant')->first()->client ?? false;
        if(!$requerente){
            $requerente = $call->client;
        }else{
            $requerente_data_nascimento = $requerente->date_birth;
            $requerente_idade = Functions::calcularIdade($requerente_data_nascimento);
            if($requerente_idade<18){
                $requerente = $call->client;
            }
        }
        
        $adv_outorgado = '';
        $oab_outorgado = '';
        $cpf_outorgado = '';
        if($call->occupation_area == 'retificacao'){
            $adv_outorgado = $setting['setting_procuracoes_retificacao_adv_outorgado'];
            $oab_outorgado = $setting['setting_procuracoes_retificacao_oab_outorgado'];
            $cpf_outorgado = $setting['setting_procuracoes_retificacao_cpf_outorgado'];
        }elseif($call->occupation_area == 'divorcio'){
            $adv_outorgado = $setting['setting_procuracoes_divorcio_adv_outorgado'];
            $oab_outorgado = $setting['setting_procuracoes_divorcio_oab_outorgado'];
            $cpf_outorgado = $setting['setting_procuracoes_divorcio_cpf_outorgado'];
        }

        
        
        
        foreach($call->document as $call_document){
            if($call_document->document->document_category_id == 1){
                
                $document = $call_document->document;

                $document_name = $document->name;
                $name_document =  $call_document->name;
                $client_id_doc = $call_document->client_id;

                try{
                    $token = $document->token_d4sign;
                    $d4client = new D4client();                
                    $d4client->setAccessToken($token);
                    //$d4client->setCryptKey(config('d4sign.crypt_key_divorcio'));
    
                    $client = $requerente;
    
                    $client_name = $client->name;
                    $client_nationality = $client->nacionality;
                    $marital_status = $client->marital_status;
                    $occupation = $client->job;
                    $rg = $client->rg;
                    $cpf = $client->cpf_formated;                
                    $address = $client->addressstreet.', '.$client->addressnumber;
                    $complement = !is_null($client->addresscomplement) ? $client->addresscomplement : '';
                    $neighborhood = $client->addressdistrict;
                    $city = $client->addresscity;
                    $state = $client->addressstate;
                    $zip_code = $client->addresscep;
                    $cpf = $client->cpf_formated;
                    $email = $client->email;
    
                    $client_name2 = '';
                    $client_nationality2 = '';
                    $marital_status2 = '';
                    $occupation2 = '';
                    $rg2 = '';
                    $cpf2 = '';                
                    $address2 = '';
                    $complement2 = '';
                    $neighborhood2 = '';
                    $city2 = '';
                    $state2 = '';
                    $zip_code2 = '';
                    $cpf2 = '';
                    $email2 = '';

                    $nome_menor = '';
                    $cpf_menor = '';
                    $nacionalidade_menor = '';
                    $nome_outorgante = '';
                    $rg_outorgante = '';
                    $cpf_outorgante = '';
                    $client_doc = Client::find($client_id_doc);
                    if($client_doc){
                        $nome_menor = $client_doc->name;
                        $cpf_menor = $client_doc->cpf_formated;
                        $nacionalidade_menor = $client_doc->nacionality;

                        $nome_outorgante = $client_doc->name;
                        $nacionalidade_outorgante = $client_doc->nacionality;
                        $marital_outorgante = $client_doc->marital_status;
                        $occupation_outorgante = $client_doc->job;
                        $rg_outorgante = $client_doc->rg;
                        $cpf_outorgante = $client_doc->cpf_formated;
                        $address_outorgante = $client_doc->addressstreet.', '.$client_doc->addressnumber;
                        $complement_outorgante = !is_null($client_doc->addresscomplement) ? $client_doc->addresscomplement : '';
                        $neighborhood_outorgante = $client_doc->addressdistrict ?? '';
                        $uf_outorgante = $client_doc->addressstate ?? '';
                        $cidade_outorgante = $client_doc->addresscity ?? '';
                        $cep_outorgante = $client_doc->addresscep ?? '';

                        $is_adulthood = true;
                        if(!is_null($client_doc->is_adulthood)){
                            if($client_doc->is_adulthood){
                                $is_adulthood = true;
                            }else{
                                $is_adulthood = false;
                            }
                        }else{
                            $client_doc_data_nascimento = $client_doc->date_birth;
                            $idade = Functions::calcularIdade($client_doc_data_nascimento);
                            if($idade>17){
                                $is_adulthood = true;
                            }else{
                                $is_adulthood = false;
                            }
                        }

                        if(!$is_adulthood){                            
                            $nome_outorgante = $client->name;
                            $nacionalidade_outorgante = $client->nacionality;
                            $marital_outorgante = $client->marital_status;
                            $occupation_outorgante = $client->job;
                            $rg_outorgante = $client->rg;
                            $cpf_outorgante = $client->cpf_formated;
                            $address_outorgante = $client->addressstreet.', '.$client->addressnumber;
                            $complement_outorgante = !is_null($client->addresscomplement) ? $client->addresscomplement : '';
                            $neighborhood_outorgante = $client->addressdistrict ?? '';
                            $uf_outorgante = $client->addressstate ?? '';
                            $cidade_outorgante = $client->addresscity ?? '';
                            $cep_outorgante = $client->addresscep ?? '';
                        }

                    }
    
                    if(!is_null($document->affiliation)){
                        $document_affiliation = $document->affiliation;
                        $affiliation_spouse = $call->Affiliations()->where('type',$document_affiliation)->first();
                        if($affiliation_spouse){
                            $spouse = $affiliation_spouse->client;
                            if($spouse){
                                $client_name2 = $spouse->name;
                                $client_nationality2 = $spouse->nacionality;
                                $marital_status2 = $spouse->marital_status;
                                $occupation2 = $spouse->job;
                                $rg2 = $spouse->rg;
                                $cpf2 = $spouse->cpf_formated;                
                                $address2 = $spouse->addressstreet.', '.$spouse->addressnumber;
                                $complement2 = !is_null($spouse->addresscomplement) ? $spouse->addresscomplement : '';
                                $neighborhood2 = $spouse->addressdistrict;
                                $city2 = $spouse->addresscity;
                                $state2 = $spouse->addressstate;
                                $zip_code2 = $spouse->addresscep;
                                $cpf2 = $spouse->cpf_formated;
                                $email2 = $spouse->email;
                            }
                        }
                    }


                    $object_of_action = '';
                    $fild_action = ProposalField::where('key','object_of_action')->where('call_id',$call->id)->first();
                    if($fild_action){
                        $object_of_action = $fild_action->value;
                    }
                    
                    $id_template = $document->template_d4sign;
                    $templates = [
                        $id_template => [
                            'ACAO'                          => $object_of_action,
                            'nome'                          => $client_name,                            
                            'nacionalidade'                 => $client_nationality,
                            'estado_civil'                  => $marital_status,
                            'profissao'                     => $occupation,
                            'RG'                            => $rg,                            
                            'CPF'                           => $cpf,
                            'NOME_OUTORGANTE'               => $nome_outorgante,
                            'nacionalidade_outorgante'      => $nacionalidade_outorgante,
                            'estado_civil_outorgante'       => $marital_outorgante,
                            'profissao_outorgante'          => $occupation_outorgante,
                            'RG_OUTORGANTE'                 => $rg_outorgante,
                            'CPF_OUTORGANTE'                => $cpf_outorgante,
                            'ENDERECO_OUTORGANTE'           => $address_outorgante,
                            'COMPLEMENTO_OUTOURGANTE'       => $complement_outorgante,
                            'BAIRRO_OUTORGANTE'             => $neighborhood_outorgante,
                            'UF_OUTORGANTE'                 => $uf_outorgante,
                            'CIDADE_OUTORGANTE'             => $cidade_outorgante,
                            'CEP_OUTORGANTE'                => $cep_outorgante,
                            'ENDERECO'                      => $address,
                            'COMPLEMENTO'                   => $complement,
                            'BAIRRO'                        => $neighborhood,
                            'CIDADE'                        => $city,
                            'UF'                            => $state,
                            'cid_est'                       => $city.'/'.$state,
                            'CEP'                           => $zip_code,
                            'e_mail'                        => $email,
                            'nome2'                         => $client_name2,
                            'NOME_MENOR'                    => $nome_menor,
                            'NOME_CONJ'                     => $client_name2,
                            'NOME_REPRESENTANTE'            => $client_name2,
                            'nacionalidade2'                => $client_nationality2,
                            'nacionalidade_menor'           => $nacionalidade_menor,
                            'nacionalidade_conj'            => $client_nationality2,
                            'nacionalidade_representante'   => $client_nationality2,
                            'estadocivil2'                  => $marital_status2,
                            'estado_civil_conj'             => $marital_status2,
                            'estado_civil_representante'    => $marital_status2,
                            'profissao_representante'       => $occupation2,
                            'profissao_conj'                => $occupation2,
                            'RG2'                           => $rg2,
                            'RG_CONJ'                       => $rg2,
                            'RG_REPRESENTANTE'              => $rg2,
                            'CPF2'                          => $cpf2,
                            'CPF_CONJ'                      => $cpf2,
                            'CPF_REPRESENTANTE'             => $cpf2,
                            'CPF_MENOR'                     => $cpf_menor,
                            'end2'                          => $address2,
                            'ENDERECO_CONJ'                 => $address2,
                            'comp2'                         => $complement2,
                            'COMPLEMENTO_CONJ'              => $complement2,
                            'BAIRRO_CONJ'                   => $neighborhood2,
                            'CIDADE2'                       => $city2,
                            'CIDADE_CONJ'                   => $city2,
                            'ESTADO2'                       => $state2,
                            'UF_CONJ'                       => $state2,
                            'cid_est2'                      => $city2.'/'.$state2,
                            'Cidade_Estado2'                => $city2.'/'.$state2,
                            'CEP2'                          => $zip_code2,
                            'CEP_CONJ'                      => $zip_code2,
                            'e_mail2'                       => $email2,
                            'ADV_OUTORGADO'                 => $adv_outorgado,
                            'OAB'                           => $oab_outorgado,
                            'CPF_ADV'                       => $cpf_outorgado,
                        ]
                    ]; 
                    //$name_document = 'Procuração Divórcio - Cônjuges - '.$client->name;
                    $uuid_cofre = $document->uuid_cofre;
                    $uuid_pasta = !is_null($document->uuid_pasta) ? $document->uuid_pasta : '';
                    $return = $d4client->documents->makedocumentbytemplate($uuid_cofre, $name_document, $templates, $uuid_pasta);
    
                    //putSignatarios
                    $jsonObj = $return;
                    $codRetornoDocumento = $jsonObj->uuid;
    
                    $email_emissor = config('d4sign.emissor');
    
                    $signers = array(
                        array("email" => $email, "act" => '4', "foreign" => '0', "certificadoicpbr" => '0', "assinatura_presencial" => '0'),
                        array("email" => $email2, "act" => '4', "foreign" => '0', "certificadoicpbr" => '0', "assinatura_presencial" => '0')                        
                    );

                    $return_signatarios = $d4client->documents->createList($codRetornoDocumento, $signers);
    
                    $message = 'Prezados, segue a procuração eletrônico para assinatura.';
                    $workflow = 0;  //o segundo signatário só receberá a mensagem de que há um documento aguardando sua assinatura DEPOIS que o primeiro signatário efetuar a assinatura
                    $skip_email = 0; //Os signatários serão avisados por e-mail que precisam assinar um documento
                    
                    $doc = $d4client->documents->sendToSigner($codRetornoDocumento, $message, $workflow, $skip_email);
    
                    //Webhook
                    $webhook_url = config('app.url').'api/webhook/procuracao_d4sign/call_id/'.$call->id;
                    $webhook = $d4client->documents->webhookadd($codRetornoDocumento,$webhook_url);
                    
                    $call_document->uuid_document = $codRetornoDocumento;
                    $call_document->save();
    
                    //dd($return_signatarios, $doc, $codRetornoDocumento);

                    $call->stage_case = 'aguardando_procuracao';
                    $call->save();
                    
    
                } catch (\Exception $e) {
                    dd($e);
                    echo $e->getMessage();
                }
            }
        }
    }

    /**
     * Reprovaçào do Breve Relato
     *
     * @param Request $request
     * @param Call $call
     * @return RedirectResponse
     */
    public function breve_relato_reprove(Request $request, Call $call)
    {
        $date_now = date('Y-m-d H:i:s');
        $data = [
            'status_breve_relato' => 'disapproved',
            'reason_breve_relato' => $request->reason,
            'update_breve_relato' => $date_now,
            'stage_case' => 'primeiro_acesso',
        ];
        Validator::make($data, [
            'reason_breve_relato' => 'required|max:191'
        ])->validate();

        $call->fill($data);
        $call->save();

        $dataRegister = [
            'user_id' => auth()->user()->id,
            'call_id' => $call->id,
            'description' => "Breve Relato foi reprovado por <strong>" . auth()->user()->first_name . "</strong>",
            'step' => 'case'
        ];
        CallRegister::create($dataRegister);

        $mautic = new MauticHelper();
        $email_id = 104;
        $mautic->send_mail($email_id, $call->client->mautic_id);


        return redirect()->to(url()->previous() . '#info-documentos_top')->with('success', 'Status do breve relato atualizado!');

    }

    public function rectification(Rectification $rectification)
    {
        $data = [
            'status' => true
        ];
        $rectification->fill($data);
        $rectification->save();
        return redirect()->to(url()->previous() . '#info-documentos_top')->with(['success'=>'Status do documento atualizado!','openModal'=>'breverelatoModal','step_number'=>'1']);
    }

    public function document_pending(CallDocument $call_document)
    {
        $data = [
            'status' => 'pending'
        ];
        $call_document->fill($data);
        $call_document->save();
        return redirect()->to(url()->previous() . '#info-documentos_top')->with(['success'=>'Status do documento atualizado!','openModal'=>'breverelatoModal','step_number'=>'0']);
    }

    public function dispatcher_approve(Dispatcher $dispatcher)
    {
        $call_id = $dispatcher->call_id;
        $document_category_id = $dispatcher->document_category_id;
        Dispatcher::where('call_id',$call_id)->where('document_category_id',$document_category_id)
        ->update(['status' => 'approved']);

        $data_task = [
            'task_list_id' => 10,
            'description' => 'Emitir Cartidões Negativas',
            'date' => now(),
            'users' => ['4'],
            'status' => 'open',
            'priority' => 'high',
            'call_id' => $call_id
        ];
        Task::create($data_task);

        $to = 'doc@ratsbonemagri.com.br';
        $data2 = [
            'aviso' => '<h2>Tarefa criada</h2><p>Tarefa Emitir Certidão Negativas foi criada , Confira: https://app.ratsbonemagri.com.br/manager-setup/cases/'.$call_id.'#info-documentos_top</p>'
        ];
        Mail::to($to)->send(new SendMailNotification($data2));


        return redirect()->to(url()->previous() . '#info-documentos_top')->with('success', 'Status do comprovante atualizado!');
    }

    public function dispatcher_reprove(Dispatcher $dispatcher)
    {
        $call_id = $dispatcher->call_id;
        $document_category_id = $dispatcher->document_category_id;
        Dispatcher::where('call_id',$call_id)->where('document_category_id',$document_category_id)->update(['status' => 'disapproved']);
        return redirect()->to(url()->previous() . '#info-documentos_top')->with('success', 'Status do comprovante atualizado!');
    }

    public function document_approve(CallDocument $call_document)
    {         
        // dd(Dispatcher::where('call_id', $call_document->call_id)->where('client_id', $call_document->client_id)->where('document_category_id', $call_document->document->document_category_id)->whereNull('status')->first());
        $status = ($call_document->status == 'hired') ? 'waiting' : 'approved';
        
        if($status == 'waiting'){
            $documentName = rtrim(preg_replace('/\d+/', '', $call_document->document->name));
            $taskList = TaskList::where('name', 'like', "%{$documentName}%")->first();

            Task::create([
                'call_id' => $call_document->call->id,
                'task_list_id' => $taskList['id'],
                'users' => [auth()->user()->id ],
                'description' => $taskList['name'],
                'date' => now(),
                'priority' => 'high'
            ]);

            Mail::to("documentos@ratsbonemagri.com.br")->send(new SendMailEmissaoCertidao($call_document->client, $documentName));
        }

        $call_document->fill(['status' => $status]);
        $call_document->save();

        $dispatcher = Dispatcher::where('call_id', $call_document->call_id)->where('client_id', $call_document->client_id)->where('document_category_id', $call_document->document->document_category_id)->whereNull('status')->first();
        if (!is_null($dispatcher) && $status == 'waiting') {
            $dispatcher->fill(['status' => 'approved']);
            $dispatcher->save();
        }

        $dataRegister = [
            'user_id' => auth()->user()->id,
            'call_id' => $call_document->call->id,
            'description' => $call_document->document->name . " foi aprovada por <strong>" . auth()->user()->first_name . "</strong>",
            'step' => 'case'
        ];

        $qtd_docs = CallDocument::where('call_id', $call_document->call->id)->count();
        $qtd_docs_aprovadas = CallDocument::where('call_id', $call_document->call->id)->where('status', 'approved')->count();
        if ($qtd_docs > 0 && $qtd_docs == $qtd_docs_aprovadas) {
            $call = Call::find($call_document->call->id);
            $call->stage_case = 'emissao_guias';
            $call->save();

            CallRegister::create($dataRegister);
            return redirect()->to(url()->previous() . '#info-guias_top')->with('success', 'Status do documento atualizado!');
        }

        CallRegister::create($dataRegister);

        return redirect()->to(url()->previous() . '#info-documentos_top')->with('success', 'Status do documento atualizado!');
    }

    public function document_reprove(Request $request, CallDocument $call_document)
    {
        $data = [
            'status' => 'disapproved',
            'reason' => $request->reason
        ];
        Validator::make($data, [
            'reason' => 'required|max:191'
        ])->validate();
        $call_document->fill($data);
        $call_document->save();

        $dataRegister = [
            'user_id' => auth()->user()->id,
            'call_id' => $call_document->call->id,
            'description' => $call_document->document->name . " foi reprovada por <strong>" . auth()->user()->first_name . "</strong>",
            'step' => 'case'
        ];
        CallRegister::create($dataRegister);

        return redirect()->to(url()->previous() . '#info-documentos_top')->with('success', 'Status do documento atualizado!');
    }

    public function document_destroy(CallDocument $call_document)
    {
        $call_document->delete();
        return redirect()->to(url()->previous() . '#info-documentos_top')->with('success', 'Documento excluído!');
    }

    public function document_anexo(Request $request, CallDocument $call_document)
    {
        if ($request->hasFile('file') && $request->file('file')->isValid()) {            
            $extension = $request->file->extension();
            $fileName = str_replace($extension, '', $request->file->getClientOriginalName());
            $folder = Str::slug($call_document->call->client->id . '-' . $call_document->call->client->name);
            $fileNameFormated = Str::slug($fileName) . '_' . rand(10, 99) . '.' . $extension;
            $upload = $request->file->storeAs($folder, $fileNameFormated, 'private');
            $status = ($call_document->status == 'waiting') ? 'approved' : 'pending';

            if ($status == 'approved') {
                $taskListId = TaskList::where('name', 'like', "%".rtrim(preg_replace('/\d+/', '', $call_document->document->name)) ."%")->first();
                $task = $call_document->call->task->where('status', '<>', 'close')->where('call_id', $call_document->call->id)->where('task_list_id', $taskListId->id)->first();
                
                $task->fill(['status' => 'close']);
                $task->save();
            }

            if ($upload) {
                $data = [
                    'file' => $fileNameFormated,
                    'status' => $status
                ];
                $call_document->fill($data);
                $call_document->save();
                $msg = $status == 'approved' ? "foi aprovada por <strong>" . auth()->user()->first_name . "</strong>"
                    : "anexou <strong>{$call_document->document->name}</strong>";

                $dataRegister = [
                    'user_id' => auth()->user()->id,
                    'call_id' => $call_document->call->id,
                    'description' => auth()->user()->first_name . "$msg",
                    'step' => 'case'
                ];
                CallRegister::create($dataRegister);

                return redirect()->to(url()->previous() . '#info-documentos_top')->with('success', 'Arquivo anexado com sucesso!');
            } else {
                return redirect()->to(url()->previous() . '#info-documentos_top')->with('error', 'Não foi possível fazer upload!');
            }
        }
    }

    /* Guias */

    public function storeguide(Request $request, Call $call)
    {
        if (isset($request->guide_category_id) && is_numeric($request->guide_category_id)) {
            $guide_categories = GuideCategory::find($request->guide_category_id);
            foreach ($guide_categories->guides as $guide_list) {
                $data = [
                    'user_id' => $call->user_id,
                    'call_id' => $call->id,
                    'guide_id' => $guide_list->id,
                    'status' => 'new',
                    'name' => $guide_list->name
                ];
                CallGuide::create($data);
            }
            $call->guides_type = $guide_categories->name;
            $call->save();
        }
        return redirect()->to(url()->previous() . '#info-guias_top')->with('success', 'Adicionado com sucesso!');
    }


    public function guide_approve(CallGuide $call_guide)
    {
        $call_id = $call_guide->call_id;
        $data = [
            'status' => 'approved'
        ];
        $call_guide->fill($data);
        $call_guide->save();

        $qtd_guias = CallGuide::where('call_id', $call_id)->count();
        $qtd_guias_aprovadas = CallGuide::where('call_id', $call_id)->where('status', 'approved')->count();
        if ($qtd_guias > 0 && $qtd_guias == $qtd_guias_aprovadas) {
            $call = Call::find($call_id);
            $call->stage_case = 'elaboracao_inicial';
            $call->save();
            //add mautic

            $email_id = 116;
            $mautic = new MauticHelper();
            $mautic->send_mail($email_id, $call->client->mautic_id);
        }

        return redirect()->to(url()->previous() . '#info-guias_top')->with('success', 'Status da guia atualizado!');
    }

    public function guide_reprove(Request $request, CallGuide $call_guide)
    {
        $data = [
            'status' => 'disapproved',
            'reason' => $request->reason
        ];
        Validator::make($data, [
            'reason' => 'required|max:191'
        ])->validate();
        $call_guide->fill($data);
        $call_guide->save();
        return redirect()->to(url()->previous() . '#info-guias_top')->with('success', 'Status da guia atualizado!');
    }

    public function guide_destroy(CallGuide $call_guide)
    {
        $call_guide->delete();
        return redirect()->to(url()->previous() . '#info-guias_top')->with('success', 'Guia excluído!');
    }

    public function guide_anexo(Request $request, CallGuide $call_guide)
    {
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $extension = $request->file->extension();
            $fileName = str_replace($extension, '', $request->file->getClientOriginalName());
            $folder = Str::slug($call_guide->call->client->id . '-' . $call_guide->call->client->name);
            $fileNameFormated = Str::slug($fileName) . '_' . rand(10, 99) . '.' . $extension;
            $upload = $request->file->storeAs($folder, $fileNameFormated, 'private');
            if ($upload) {
                $data = [
                    'file' => $fileNameFormated,
                    'status' => 'pending'
                ];
                $call_guide->fill($data);
                $call_guide->save();
                return redirect()->to(url()->previous() . '#info-guias_top')->with('success', 'Arquivo anexado com sucesso!');
            } else {
                return redirect()->to(url()->previous() . '#info-guias_top')->with('error', 'Não foi possível fazer upload!');
            }
        }
    }

    public function guide_download_anexo(Request $request, CallGuide $call_guide)
    {
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $extension = $request->file->extension();
            $fileName = str_replace($extension, '', $request->file->getClientOriginalName());
            $folder = Str::slug($call_guide->call->client->id . '-' . $call_guide->call->client->name);
            $fileNameFormated = Str::slug($fileName) . '_' . rand(10, 99) . '.' . $extension;
            $upload = $request->file->storeAs($folder, $fileNameFormated, 'private');
            if ($upload) {
                $data = [
                    'file_download' => $fileNameFormated,
                    'status' => 'pending'
                ];
                $call_guide->fill($data);
                $call_guide->save();
                return redirect()->to(url()->previous() . '#info-guias_top')->with('success', 'Arquivo anexado com sucesso!');
            } else {
                return redirect()->to(url()->previous() . '#info-guias_top')->with('error', 'Não foi possível fazer upload!');
            }
        }
    }

    public function download_folder_pdf(Call $call)
    {        
        $folder = Str::slug($call->client_id.'-'.$call->client->name);

        $documentCategories = DocumentCategory::all();
        foreach ($documentCategories as $docCategory){

            $mpdf = new \Mpdf\Mpdf();
            $mpdf->showImageErrors = false;

            $category_id = $docCategory->id;
            $listDocumentsCase = $call->document()->whereNotNull('file')->where('client_id',$call->client_id)
            ->whereHas('document', function($q) use($category_id){
                $q->where('document_category_id', $category_id);
            })->get();
            $cont = 1;
            foreach ($listDocumentsCase as $item){
                $extensao = get_extensao($item->file);
                $pathToFile = storage_path("app/private/{$folder}/" . $item->file);

                if(strtolower($extensao) == 'jpeg' || strtolower($extensao) == 'png' || strtolower($extensao) == 'gif' || strtolower($extensao) == 'jpg'){
                   try {
                        $mpdf->imageVars['myvariable'] = file_get_contents($pathToFile);
                        $html = '<img src="var:myvariable" />';
                        $mpdf->WriteHTML($html);                    
                        $mpdf->AddPage();
                        $cont++;
                    } catch (\Throwable $th) {
                        //throw $th;
                    }
                }
                
                if(strtolower($extensao) == 'pdf'){
                    try {
                        $mpdf->SetDocTemplate($pathToFile,true);
                        $mpdf->AddPage();
                        $cont++;
                    } catch (\Throwable $th) {
                        //throw $th;
                    }                    
                }
                
            }
            if($cont > 1){
                $path = storage_path("app/private/{$folder}/temp/".$call->client->first_name);
                $mode = 0777;
                File::makeDirectory($path, $mode, true, true);
                $mpdf->Output($path.'/'.$docCategory->name.'.pdf','F');
                $mpdf->RestartDocTemplate();
            }
            unset($mpdf);

            
            foreach($call->Affiliations as $affiliation)
            {
                $mpdf = new \Mpdf\Mpdf();
                $mpdf->showImageErrors = false;

                $listDocumentsCaseAffiliation = $call->document()->whereNotNull('file')->where('client_id',$affiliation->client_id)
                ->whereHas('document', function($q) use($category_id){
                    $q->where('document_category_id', $category_id);
                })->get();
                $cont = 1;
                foreach ($listDocumentsCaseAffiliation as $item){
                    $extensao = get_extensao($item->file);
                    $pathToFile = storage_path("app/private/{$folder}/" . $item->file);    
                    if(strtolower($extensao) == 'jpeg' || strtolower($extensao) == 'png' || strtolower($extensao) == 'gif' || strtolower($extensao) == 'jpg'){
                        try {
                            $mpdf->imageVars['myvariable'] = file_get_contents($pathToFile);
                            $html = '<img src="var:myvariable" />';
                            $mpdf->WriteHTML($html);                    
                            $mpdf->AddPage();
                            $cont++;
                        } catch (\Throwable $th) {
                            //throw $th;
                        }
                    }
                    
                    if(strtolower($extensao) == 'pdf'){
                        try {
                            $mpdf->SetDocTemplate($pathToFile,true);
                            $mpdf->AddPage();
                            $cont++;
                        } catch (\Throwable $th) {
                            //throw $th;
                        }                        
                    }                    
                }
                if($cont > 1){
                    $path = storage_path("app/private/{$folder}/temp/".$affiliation->client->first_name);
                    $mode = 0777;
                    File::makeDirectory($path, $mode, true, true);
                    $mpdf->Output($path.'/'.$docCategory->name.'.pdf','F');
                    $mpdf->RestartDocTemplate();
                }
                unset($mpdf);
            }
            
        }

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->showImageErrors = false;

        //guias
        $cont = 1;
        $callGuide = new CallGuide;
        $guiaJudicial = $call->guides_type == "Guias Judiciais" ?  GuideCategory::find(1) : GuideCategory::find(2);
        $listGuidesCase = $callGuide->guideCase($call->id, $guiaJudicial->id);        
        
        foreach ($listGuidesCase as $item){
            if(!is_null($item->file)){
                $pathToFile = storage_path("app/private/{$folder}/" . $item->file);

                if(strtolower($extensao) == 'jpeg' || strtolower($extensao) == 'png' || strtolower($extensao) == 'gif' || strtolower($extensao) == 'jpg'){
                    try {
                        $mpdf->imageVars['myvariable'] = file_get_contents($pathToFile);
                        $html = '<img src="var:myvariable" />';
                        $mpdf->WriteHTML($html);                    
                        $mpdf->AddPage();
                        $cont++;
                    } catch (\Throwable $th) {
                        //throw $th;
                    }
                }                
                if(strtolower($extensao) == 'pdf'){
                    try {
                        $mpdf->SetDocTemplate($pathToFile,true);
                        $mpdf->AddPage();
                        $cont++;
                    } catch (\Throwable $th) {
                        //throw $th;
                    }                        
                }
            }
        }
        if($cont > 1){
            $path = storage_path("app/private/{$folder}/temp");
            $mode = 0777;
            File::makeDirectory($path, $mode, true, true);
            $mpdf->Output($path.'/guias.pdf','F');
            $mpdf->RestartDocTemplate();
        }
        unset($mpdf);


        $mpdf = new \Mpdf\Mpdf();
        $mpdf->showImageErrors = false;
        //documentos extras
        $cont = 1;
        $callExtra = new CallExtra;
        $extraCategories = ExtraCategory::where('call_id', $call->id)->get();
        foreach ($extraCategories as $extraCategory){
            $listDocumentsCase = $callExtra->documentCaseClose($call->id, $extraCategory->id);
            foreach ($listDocumentsCase as $item){
                if(!is_null($item->file)){
                    $pathToFile = storage_path("app/private/{$folder}/" . $item->file);
                    if(strtolower($extensao) == 'jpeg' || strtolower($extensao) == 'png' || strtolower($extensao) == 'gif' || strtolower($extensao) == 'jpg'){
                        try {
                            $mpdf->imageVars['myvariable'] = file_get_contents($pathToFile);
                            $html = '<img src="var:myvariable" />';
                            $mpdf->WriteHTML($html);                    
                            $mpdf->AddPage();
                            $cont++;
                        } catch (\Throwable $th) {
                            //throw $th;
                        }
                    }                
                    if(strtolower($extensao) == 'pdf'){
                        try {
                            $mpdf->SetDocTemplate($pathToFile,true);
                            $mpdf->AddPage();
                            $cont++;
                        } catch (\Throwable $th) {
                            //throw $th;
                        }                        
                    }
                }
            }
        }
        if($cont > 1){
            $name_file_extra = Str::slug($extraCategory->name, '-');
            $path = storage_path("app/private/{$folder}/temp");
            $mode = 0777;
            File::makeDirectory($path, $mode, true, true);
            $mpdf->Output($path.'/'.$name_file_extra.'.pdf','F');
            $mpdf->RestartDocTemplate();
        }

        unset($mpdf);

        //zip
        $zip = new \ZipArchive();
        $pathToSave = storage_path("app/private/download_folder/call_".$call->id.".zip");
        $pathdir = storage_path("app/private/{$folder}/temp");
        if(file_exists($pathToSave)){
            unlink($pathToSave);
        }
        if( $zip->open( $pathToSave , \ZipArchive::CREATE )  === true){           
            $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($pathdir));            
            foreach ($files as $name => $file)
            {                
                // We're skipping all subfolders               
                if (!$file->isDir()) {
                    $filePath = $file->getRealPath();

                    // extracting filename with substr/strlen
                    $relativePath = substr($filePath, strlen($path) + 1);
                    //echo $relativePath;
                    //echo '<br />';
                    $zip->addFile($filePath, $relativePath);
                }else{
                    //echo 'sim';
                    //echo '<br />';
                }                
            }            
            $zip ->close();
        }        
        File::deleteDirectory($pathdir);
        return response()->download($pathToSave);        
    }

    public function download_folder(Call $call, CallDocument $callDocument, CallGuide $callGuide, CallExtra $callExtra)
    {
        $zip = new \ZipArchive();
        $pathToSave = storage_path("app/private/download_folder/call_".$call->id.".zip");          
        $folder = Str::slug($call->client_id.'-'.$call->client->name);

        if(file_exists($pathToSave)){
            unlink($pathToSave);
        }

        if( $zip->open( $pathToSave , \ZipArchive::CREATE )  === true){
            //$folder = Str::slug($call->user_id.'-'.$call->user->name);
            //echo '<h2>'.$call->client->first_name.'</h2>';
            $documentCategories = DocumentCategory::all();
            foreach ($documentCategories as $docCategory){
                //echo '<h3>'.$docCategory->name.'</h3>';
                $list_boxopen = 'close';
                $listDocumentsCase = $callDocument->documentCase($call->id, $docCategory->id, $call->client_id);                
                foreach ($listDocumentsCase as $item){
                    //echo '<p>&nbsp;&nbsp;'.$item->cdtitle.' <strong style="color:red">=></strong> '.$item->file.'</p>';
                    if(!is_null($item->file)){
                        $pathToFile = storage_path("app/private/{$folder}/" . $item->file);
                        $zip->addFile($pathToFile , $call->client->first_name.'/'.$docCategory->name.'/'.$item->file);
                    }
                }
            }
            //echo '<hr>';            
            
            foreach($call->Affiliations as $affiliation)
            {
                //echo '<h2>'.$affiliation->client->first_name.'</h2>';
                foreach ($documentCategories as $docCategory){
                    if ($docCategory->by_contact){
                        //echo '<h3>'.$docCategory->name.'</h3>';
                        $listDocumentsCase = $callDocument->documentCase($call->id, $docCategory->id, $affiliation->client_id);
                        foreach ($listDocumentsCase as $item){
                            //echo '<p>&nbsp;&nbsp;'.$item->cdtitle.' <strong style="color:red">=></strong> '.$item->file.'</p>';
                            if(!is_null($item->file)){
                                $pathToFile = storage_path("app/private/{$folder}/" . $item->file);
                                $zip->addFile($pathToFile , $affiliation->client->first_name.'/'.$docCategory->name.'/'.$item->file);
                            }
                        }
                    }
                }
                //echo '<hr>';
            }
            

            //guias
            
            $guiaJudicial = $call->guides_type == "Guias Judiciais" ?  GuideCategory::find(1) : GuideCategory::find(2);
            $listGuidesCase = $callGuide->guideCase($call->id, $guiaJudicial->id);
            foreach ($listGuidesCase as $item){
                if(!is_null($item->file)){
                    $pathToFile = storage_path("app/private/{$folder}/" . $item->file);
                    $zip->addFile($pathToFile , 'guias/'.$item->file);
                }
            }
            
            //documentos extras
            
            $extraCategories = ExtraCategory::where('call_id', $call->id)->get();
            foreach ($extraCategories as $extraCategory){
                $listDocumentsCase = $callExtra->documentCaseClose($call->id, $extraCategory->id);
                foreach ($listDocumentsCase as $item){
                    if(!is_null($item->file)){
                        $pathToFile = storage_path("app/private/{$folder}/" . $item->file);
                        $zip->addFile($pathToFile , $extraCategory->name.'/'.$item->file);
                    }
                }
            }
           
            $zip->close();
            
        }  
        
        return response()->download($pathToSave);

    }

    public function change_start()
    {
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id', 'desc')->first();
        $call->stage_case = 'solicitacao_documentos';
        $call->save();

        return redirect()->back();
    }

    public function send_disapproved(Call $call)
    {
        $call->stage_case = 'aguardando_envio_cliente';
        $call->save();

        $email_id = 109;
        $mautic = new MauticHelper();
        $mautic->send_mail($email_id, $call->client->mautic_id);

        return redirect()->to(url()->previous() . '#info-documentos_top')->with('success', 'O Cliente foi notificado');
    }
}
