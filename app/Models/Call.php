<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Call
 * @package App\Models
 * @property string $procedural_step
 * @property string $procedural_status
 * @property string $stage_call
 * @property string $stage_case
 * @property integer $stars
 * @property string $process_number
 * @property string $date_procedural_status
 */
class Call extends Model
{

    protected $fillable = [
        'client_id',
        'changetype_id',
        'reason_id',
        'title',
        'caseaction',
        'currentname',
        'querent',
        'desiredname',
        'description',
        'status',
        'paymentform',
        'paymentreceipt',
        'stage_call',
        'stage_case',
        'procedural_step',
        'procedural_status',
        'date_procedural_status',
        'interest',
        'installments',
        'max_installments',
        'paydate',
        'casedate',
        'process',
        'signed',
        'stars',
        'source',
        'process_number',
        'judgment_number',
        'judgment_stick',
        'court_jurisdiction',
        'link_in_court',
        'protocol',
        'distributed_in',
        'forwardingagent',
        'certificate',
        'title_doc_extra',
        'gerencianet_id',
        'is_claimant',
        'relationship_claimant',
        'descendants_quantity',
        'breve_relato',
        'status_breve_relato',
        'update_breve_relato',
        'reason_breve_relato',
        'uuid_document',
        'guides_type',
        'occupation_area',
        'star_reason'
    ];

    protected $appends = ['progress','etapa'];

    const SOURCE = [
        'telefone' => 'Telefone',
        'whatsapp' => 'Whatsapp',
        'indicação' => 'Indicação',
    ];

    const FEEDBACK = [
        'Baixo Interesse' => 'Baixo Interesse',
        'Alto custo' => 'Alto custo',
        'Prazo' => 'Prazo',
        'Concorrente' => 'Concorrente',
        'Em breve' => 'Em breve',
        'Curioso' => 'Curioso'
    ];

    const CASE_ACTION = [
        'incluir' => 'incluir',
        'excluir' => 'Excluir',
        'alterar' => 'Alterar'
    ];

    const OCCUPATION_AREA = [
        'retificacao' => 'Retificação de Registro',
        'divorcio' => 'Divórcio'
    ];

    const STATUS_BREVE_RELATO = [
        'new' => 'Novo',
        'approved' => 'Aprovado',
        'disapproved' => 'Reprovado',
        'pending' => 'Pendente'
    ];

    const STATUS = [
        'novo' => 'Novo',
        'tentativa' => 'Tentativa',
        'sem contato' => 'Sem Contato',
        'pendente' => 'Pendente',
        'atrasado' => 'Atrasado',
        'em_andamento' => 'Em Andamento',
        'baixo_interesse' => 'Baixo Interesse',
        'custo_alto' => 'Custo Alto',
        'prazo_estimado' => 'Prazo Estimado',
        'concorrente' => 'Concorrente',
        'futuramente' => 'Futuramente',
        'curiosidade' => 'Curiosidade',
        'encerrado' => 'Encerrado',
        'assinado' => 'Assinado'
    ];

    const STATUS_MAUTIC = [
        'novo' => 'Novo',
        'tentativa' => 'Tentativa',
        'sem contato' => 'Sem Contato',
        'pendente' => 'Pendente',
        'atrasado' => 'Atrasado',
        'em_andamento' => 'Resolvido',
        'baixo_interesse' => 'Baixo Interesse',
        'custo_alto' => 'Custo Alto',
        'prazo_estimado' => 'Prazo Estimado',
        'concorrente' => 'Concorrente',
        'futuramente' => 'Futuramente',
        'curiosidade' => 'Curiosidade',
        'encerrado' => 'Arquivo Morto',
        'assinado' => 'Assinado'
    ];


    const RELATIONSHIP_CLAIMANT = [
        'filho' => 'Filho',
        'pai' => 'Pai',
        'mãe' => 'Mãe',
        'avô' => 'Avô',
        'amigo' => 'Amigo',
        'companheiro' => 'Companheiro'
    ];

    const STATUS_COLOR = [
        'novo' => '#8faadc',
        'tentativa' => '#d0cece',
        'sem contato' => '#000000',
        'pendente' => '#fff2cc',
        'atrasado' => '#FFFFFF',
        'em_andamento' => '#70ad47',
        'baixo_interesse' => '#ff9999',
        'custo_alto' => '#c00000',
        'prazo_estimado' => '#c00000',
        'concorrente' => '#c00000',
        'futuramente' => '#c00000',
        'curiosidade' => '#c00000',
        'encerrado' => '#c00000',
        'assinado' => '#385724'
    ];

    const STAGE_CALL = [
        'dados' => 'Dados',
        'emissao' => 'Emissao',
        'assinatura' => 'Assinatura',
        'assinado' => 'Assinado',
        'cancelado' => 'Cancelado'
    ];

    const CALL_STATE = [
        'todos' => 'Todos',
        'novos' => 'Novos',
        'em_andamento' => 'Em andamento',
        'fechados' => 'Fechados',
    ];

    const STAGE_CALL_MAUTIC = [
        'dados' => 'Dados',
        'emissao' => 'Emissao',
        'assinatura' => 'Assinatura',
        'assinado' => 'Assinado',
        'cancelado' => 'Arquivo Morto'
    ];

    const STAGE_CASE = [
        'solicitacao_documentos' => 'Solicitação de Documentos',
        'aguardando_procuracao' => 'Aguardando Procuração',
        'aguardando_envio_cliente' => 'Aguardando Envio do Cliente',
        'analise_documentacao' => 'Análise Documentação',
        'emissao_guias' => 'Emissão de Guias',
        'aguardando_pgto' => 'Aguardando Pgto',
        'conferir_guias' => 'Conferir Guias',
        'elaboracao_inicial' => 'Elaboração Inicial',
        'processo_distribuido' => 'Processo Distribuído',
        'solicitacao_rescisao' => 'Solicitação de Rescisão',
        'rescisao_contratual' => 'Rescisão Contratual',
        'primeiro_acesso' => 'Primeiro Acesso'
    ];

    const STAGE_CASE_MAUTIC = [
        'solicitacao_documentos' => 'Solicitação de Documentos',
        'aguardando_envio_cliente' => 'Aguardando Cliente',
        'analise_documentacao' => 'Solicitação Doc',
        'emissao_guias' => 'Emissão Guias',
        'aguardando_pgto' => 'Aguardando Pgto',
        'conferir_guias' => 'Conferir Guias',
        'elaboracao_inicial' => 'Elaboração Inicial',
        'processo_distribuido' => 'Processo Distribuído',
        'solicitacao_rescisao' => 'solicitacao_rescisao',
        'rescisao_contratual' => 'Rescisão Contratual',
        'primeiro_acesso' => 'Primeiro Acesso'
    ];
    /*
    const PROCEDURAL_STEP = [
        'processo_distribuido' => 'Processo Distribuído',
        'com_ministerio_publico' => 'Aguardando Ministério Público',
        'com_requerente' => 'Pendência de Documentos Extras',
        'com_advogado' => 'Documentos em Análise',
        'audiencia_designada' => 'Audiência Designada',
        'conclusos_para_sentenca' => 'Conclusos para Sentença',
        'sentenca_proferida' => 'Sentença Proferida',
        'aguardando_transito_em_julgado' => 'Aguardando Trânsito em Julgado',
        'expedicao_de_mandado_de_averbacao' => 'Expedição de Mandado de Averbação',
        'averbacao_da_certidao' => 'Averbação da Certidão',
        'arquivado' => 'Arquivado',
        'aguardando_cliente' => 'Aguardando Cliente',
        'conclusos' => 'Conclusos',
        'sentenca_improcedente' => 'Sentença Improcedente',
        'sentenca_parcialmente_procedente' => 'Sentença Parcialmente Procedente',
        'sentenca_procedente' => 'Sentença Procedente',
        'aguardando_transito_julgado' => 'Aguardando Trânsito em Julgado',
        'averbacao_cartorio' => 'Averbação em Cartório',
        'fase_recursal' => 'Fase Recursal',
        'recurso_improvido' => 'Recurso Improvido',
        'recurso_parcialmente_provido' => 'Recurso Parcialmente Provido',
    ];
    */
    const PROCEDURAL_STEP = [
        'Processo Distribuído' => 'Processo Distribuído',
        'Aguardando Ministério Público' => 'Aguardando Ministério Público',
        'Documentos em Análise' => 'Documentos em Análise',
        'Aguardando Cliente' => 'Aguardando Cliente',
        'Audiência Designada' => 'Audiência Designada',
        'Conclusos' => 'Conclusos',
        'Sentença Improcedente' => 'Sentença Improcedente',
        'Sentença Parcialmente Procedente' => 'Sentença Parcialmente Procedente',
        'Sentença Procedente' => 'Sentença Procedente',
        'Aguardando Trânsito em Julgado' => 'Aguardando Trânsito em Julgado',
        'Aguardando Mandado de Averbação' => 'Aguardando Mandado de Averbação',
        'Averbação em Cartório' => 'Averbação em Cartório',
        'Arquivado' => 'Arquivado'
    ];

    const PROCEDURAL_STATUS = [
        'em_andamento' => 'Em Andamento',
        'com_requerente' => 'Com Requerente',
        'com_advogado' => 'Com Advogado',
        'arquivado' => 'Arquivado'
    ];

    const PROCEDURAL_STATUS_ICONS = [
        'em_andamento' => [
            'fa-play-circle',
            'text-success'
        ],
        'com_requerente' => [
            'fa-pause-circle',
            'text-danger'
        ],
        'com_advogado' => [
            'fa-pause-circle',
            'text-warning'
        ],
        'arquivado' => [
            'fa-stop-circle',
            'text-black',
        ]
    ];

    const INTEREST = [
        'curiosidade' => 'Curiosidade',
        'interesse' => 'Interesse',
        'necessidade' => 'Necessidade'
    ];

    const PAYMENTFORM = [
        'gerencianet' => 'Gerencianet',
        'adexitum' => 'AD Exitum',
        'deposito' => 'Depósito'
    ];

    const COURT_COSTS = [
        'custas_iniciais' => 'Custas Iniciais',
        'custas_procuracao' => 'Custas Procuração'
    ];

    const GUIDES_TYPE = [
        'guias_judiciais' => 'Guias Judiciais',
        'justica_gratuita' => 'Justiça Gratuita'
    ];

    const SUBJECT = [
        'retificacao_de_registro' => 'Retificação de Registro',
        'destituicao_paternal' => 'Destituição Paternal'
    ];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('profile_occupation_area', function (Builder $builder) {
            if ( auth()->check() ){
                $user_occupation_area = auth()->user()->occupation_area;
                if(!is_null($user_occupation_area)){
                    $builder->where('occupation_area', $user_occupation_area);
                }
            }
        });
    }

    public function client()
    {   // 1 X 1 o id esta aqui
        return $this->belongsTo(Client::class);
    }

    public function changetype()
    {
        return $this->belongsTo(Changetype::class);
    }

    public function reason()
    {
        return $this->belongsTo(Reason::class);
    }

    public function call_register()
    {   // 1 X n
        return $this->hasMany(CallRegister::class);
    }

    public function rectifications()
    {
        return $this->hasMany(Rectification::class);
    }

    public function call_honorary()
    {   // 1 X n
        return $this->hasMany(CallHonorary::class);
    }

    public function dispatchers()
    {
        return $this->hasMany(Dispatcher::class);
    }

    public function call_expense()
    {   // 1 X n
        return $this->hasMany(CallExpense::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function proposal_fields()
    {
        return $this->hasMany(ProposalField::class);
    }

    public function call_register_desc()
    {   // 1 X n e o ID esta lá
        return $this->hasMany(CallRegister::class)->orderBy('id', 'desc');
    }

    public function call_register_important()
    {   // 1 X n
        return $this->hasMany(CallRegister::class)->where('type', 'important');
    }

    public function call_register_last($limit = 1)
    {   // 1 X n
        return $this->hasMany(CallRegister::class)->orderBy('id', 'desc')->limit($limit)->offset(0);
    }

    public function document()
    {
        return $this->hasMany(CallDocument::class, 'call_id');
    }

    public function document_extras()
    {
        return $this->hasMany(CallExtra::class, 'call_id');
    }

    public function task()
    {
        return $this->hasMany(Task::class);
    }

    public function event()
    {
        return $this->hasMany(Event::class);
    }

    public function Affiliations()
    {
        return $this->hasMany(Affiliation::class, 'call_id');
    }

    public function getDddAttribute()
    {
        $phone = $this->client->phone;
        if (!is_null($phone))
            return substr($phone, 0, 2);
        else
            return null;
    }

    public function getUfAttribute()
    {
        $state = $this->client->addressstate;
        if (!is_null($state))
            return $state;
        else
            return null;
    }

    public function getCreatedDateAttribute()
    {
        return date('d/m/Y', strtotime($this->created_at));
    }

    public function getDistributedDateAttribute()
    {
        return date('d/m/Y', strtotime($this->distributed_in));
    }


    public function getCreatedHoursAttribute()
    {
        return date('H:i', strtotime($this->created_at));
    }

    public function getScreeningAttribute()
    {

        $dateinicio = date('Y-m-d', strtotime($this->casedate));
        $dateagora = date('Y-m-d');

        $data_inicio = new \DateTime((string)$dateinicio);
        $data_fim = new \DateTime((string)$dateagora);
        $dateInterval = $data_inicio->diff($data_fim);
        $diff_in_days = $dateInterval->days;

        if ($diff_in_days == 0)
            return "<span class='text-success'>hoje<span>";
        elseif ($diff_in_days == 1)
            return "<span class='text-warning'>ontem<span>";
        else
            return "<span class='text-danger'>há {$diff_in_days} dias<span> ";

        return $diff_in_days;
    }

    public function getDateStatusAttribute()
    {
        $dateinicio = date('Y-m-d', strtotime($this->date_procedural_status));
        $dateagora = date('Y-m-d');

        $data_inicio = new \DateTime((string)$dateinicio);
        $data_fim = new \DateTime((string)$dateagora);
        $dateInterval = $data_inicio->diff($data_fim);
        $diff_in_days = $dateInterval->days;

        if ($diff_in_days == 0)
            return "<span class='text-success'>desde hoje<span>";
        elseif ($diff_in_days == 1)
            return "<span class='text-warning'>desde ontem<span>";
        else
            return "<span class='text-danger'>há {$diff_in_days} dias<span> ";

        return $diff_in_days;
    }

    public function getDurationAttribute()
    {
        $dateinicio = date('Y-m-d', strtotime($this->process));
        $dateagora = date('Y-m-d');

        $data_inicio = new \DateTime((string)$dateinicio);
        $data_fim = new \DateTime((string)$dateagora);
        $dateInterval = $data_inicio->diff($data_fim);
        $diff_in_days = $dateInterval->days;

        if ($diff_in_days == 0)
            return "<span class='text-success'>hoje<span>";
        elseif ($diff_in_days == 1)
            return "<span class='text-warning'>ontem<span>";
        else
            return "<span class='text-danger'>{$diff_in_days} dias<span>";


        return $diff_in_days;
    }

    public function getEtapaAttribute()
    {
        $stage_case = $this->stage_case;
        $retotno = 0;
        switch ($stage_case) {
            case "solicitacao_documentos":
                $retotno = 1;
                break;
            case "aguardando_envio_cliente":
                $retotno = 2;
                break;
            case "analise_documentacao":
                $retotno = 3;
                break;
            case "emissao_guias":
                $retotno = 4;
                break;            
            case "conferir_guias":
                $retotno = 5;
                break;
            case "aguardando_pgto":
                $retotno = 6;
                break;
            case "elaboracao_inicial":
                $retotno = 7;
                break;
            case "processo_distribuido":
                $retotno = 8;
                break;
            case "solicitacao_rescisao":
                $retotno = 9;
                break;
            case "rescisao_contratual":
                $retotno = 10;
                break;
        }
        return $retotno;
    }

    public function getProgressAttribute()
    {
        $idCase = $this->id;
        $call = $this;
        $not_categories_list = $call->dispatchers->where('document_category_id', 5)->pluck('document_category_id')->all();
        $not_categories_list_send = $call->dispatchers()->whereNotNull('proof_of_payment')->where('status','<>','disapproved')->pluck('document_category_id')->all();

        $call_documents_list = [];
        $dispatchers = $call->dispatchers->where('document_category_id', 5);
        foreach($dispatchers as $dispatcher){
            $dispatcher_category_id = $dispatcher->document_category_id;
            $call_documents = CallDocument::where('call_id',$dispatcher->call_id)
            ->where('client_id',$dispatcher->client_id)
            ->whereHas('document', function($q) use($dispatcher_category_id ){
                $q->where('document_category_id',$dispatcher_category_id);
            })->get();
            foreach($call_documents as $call_document){
                $call_documents_list[] = $call_document->id;
            }
        }

        $docs = \App\Models\CallDocument::where('call_id', $idCase)->where(function($q) use($call_documents_list){
            if(count($call_documents_list) > 0){
                $q->whereNotIn('id',$call_documents_list);
            }
        })->whereHas('document',function($q){
            $q->whereNotIn('document_category_id', [1]);
        })->count();

        $docsApproved = \App\Models\CallDocument::where('call_id', $idCase)->where(function($q) use($call_documents_list){
            if(count($call_documents_list) > 0){
                $q->whereNotIn('id',$call_documents_list);
            }
        })->where('status', '<>', 'disapproved')
        ->whereNotNull('file')->count();

        $docs = $docs + count($not_categories_list);
        $docsApproved = $docsApproved + count($not_categories_list_send);
       
        if ($docs == 0) {
            return 0;
        } else {
            $percent = $docsApproved / ($docs / 100);
            return (int)round($percent);
        }
        
    }

    public function getProgressProccessAttribute()
    {
        $idCase = $this->id;
        $docs = \App\Models\CallExtra::where('call_id', $idCase)->count();
        $docsApproved = \App\Models\CallExtra::where('call_id', $idCase)->where('status', 'approved')->count();
        if ($docs == 0) {
            return 0;
        } else {
            $percent = $docsApproved / ($docs / 100);
            return (int)$percent;
        }
    }

    public function getProgresscolorAttribute()
    {
        $percent = $this->getProgressAttribute();
        if ($percent <= 25) {
            $str_bgColor = '#D9E1F2';
        } elseif ($percent > 25 && $percent <= 50) {
            $str_bgColor = '#B4C6E7';
        } elseif ($percent > 50 && $percent <= 75) {
            $str_bgColor = '#8EA9DB';
        } elseif ($percent > 75) {
            $str_bgColor = '#4472C4';
        }
        return $str_bgColor;
    }
}
