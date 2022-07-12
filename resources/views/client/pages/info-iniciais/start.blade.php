@extends('client.layout.acesso')

@section('content')
<div class="row p-b-20">
    <div class="col-12 ico-info">
        <h2>Vamos dar início a Retificação de Registro?</h2>
        <p>
            Olá <span class="text-uppercase">{{ auth()->user()->first_name }}</span>! Comece preenchendo os dados do(s) Requerente(s)e demais integrantes do processo.
            Depois de adicionar seu Breve Relato, clique no botão "Continuar" para que nossos advogados solicitem os documentos específicos para o seu caso.
        </p>
    </div>    
</div>
<div class="row borda-baixo m-b-30 p-b-20">
    <div class="col-10 col-12-xsmall @if($percents_claimant==100) ico-success @endif"">
        @if($percents_claimant<100)
        <span class="chartpie" data-percent="{{$percents_claimant}}">
            <span class="percent"></span>
        </span>
        @endif
        <h2>
            <img src="{{asset('assets-client/images/icones/family-cinza.png')}}" alt="" height="50"> &nbsp;
            <span class="tit-align">Requerentes e outros</span>
        </h2>
        <p>
            Para solicitarmos toda documentação necessária, precisamos das informações de todas as pessoas envolvidas no processo.
        </p>
    </div>
    <div class="col-2 col-12-xsmall text-right alignbuttom">
        @if ($percents_claimant>=100)
            <button type="button" class="btn btn-default iverse mb-10"
                    {{ $call->stage_case == 'solicitacao_documentos' ? 'disabled' : '' }}
                    onclick="location.href='{{route('client.iniciais.select.outros')}}';">
                Editar
            </button>
        @else
            <button type="button" class="btn btn-default mb-10"
                    {{ $call->stage_case == 'solicitacao_documentos' ? 'disabled' : '' }}
                    onclick="location.href='{{route('client.iniciais.requerente.outros')}}';">
                Iniciar
            </button>
        @endif
        
    </div>
</div>
<div class="row m-b-50">
    <div class="col-10 col-12-xsmall @if($percents_itens_breve>=100)) ico-success @endif">
        @if($percents_itens_breve<100)
        <span class="chartpie" data-percent="{{$percents_itens_breve}}">
            <span class="percent"></span>
        </span>
        @endif
        <h2>
            <img src="{{asset('assets-client/images/icones/info-3-cinza.png')}}" alt="" height="50"> &nbsp;
            <span class="tit-align">Breve Relato</span>
        </h2>
        <p>
            Para que o processo tenha maiores chances de êxito, nossos advogados precisam de
            detalhes fornecidos pelo Requerente que serão utilizados para deixar a petição inicial
            bem fundamentada e personalizada de acordo com o caso.
        </p>
    </div>
    <div class="col-2 col-12-xsmall text-right alignbuttom">
        @if($percents_claimant>=100)
            @if(!is_null($call->breve_relato))
                <button type="button" class="btn btn-default iverse mb-10"
                        {{ $call->stage_case == 'solicitacao_documentos' ? 'disabled' : '' }}
                        onclick="location.href='{{ route('client.iniciais.breve.relato') }}'">
                    Editar
                </button>
            @else
                <button type="button" class="btn btn-default mb-10"
                        {{ $call->stage_case == 'solicitacao_documentos' ? 'disabled' : '' }}
                        onclick="location.href='{{ route('client.iniciais.breve.relato') }}'">
                    Adicionar
                </button>
            @endif
        @else
            <button type="button" class="btn btn-default mb-10 disabled">Adicionar</button>
        @endif
    </div>  
</div>

<div class="row gtr-uniform">
    <div class="col-6">
        <a href="{{route('client.iniciais.primeiro.acesso')}}">VOLTAR</a>
    </div>
    <div class="col-6 text-right">
        {{ Form::open(['route' => ['admin.cases.change_start'] ]) }}
        <button type="submit" class="btn btn-default mb-10"
                {{ $percents_claimant>=100 && !is_null($call->breve_relato) && $call->stage_case != "solicitacao_documentos" ? '' : 'disabled' }}>
            Enviar para Análise
        </button>
        {{ Form::close() }}
    </div>                               
</div>


@endsection

@section('step')
<div class="wrapperStepTriagem">
    <ul class="StepProgress">
        <li class="StepProgress-item current">
            <a href="javascript:void(0);">
                <strong>Informações Iniciais</strong>    
            </a>            
        </li>
        <li class="StepProgress-item">
            <a href="javascript:void(0);">
                <strong>Documentos</strong>
            </a>
        </li>
        <li class="StepProgress-item">
            <a href="javascript:void(0);">
                <strong>Custas Processuais</strong>
            </a>
        </li>
        <li class="StepProgress-item">
            <a href="javascript:void(0);">
                <strong>Protocolado</strong>
            </a>
        </li>
    </ul>
</div>
@endsection

@section('class_body') body-dados-contratante @endsection

@section('scriptjs')
    <div class="modal fade" id="lockDocumentsModalTitle" tabindex="-1" role="dialog"
         aria-labelledby="lockDocumentsModalTitle" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="p-t-40 p-b-40 p-l-40 p-r-40 text-center"></div>
                    <div class="p-t-40 p-b-40 p-l-40 p-r-40 text-center mb-30">
                        <h4>
                            {{
                                $call->stage_case == 'solicitacao_documentos' ?
                                    "Seus documentos estão em Analise de Documentação, deseja encaminhar novamente?" :
                                    "Parabéns $client->first_name você completou as informações iniciais do caso, deseja enviar para análise de nossa equipe?"
                            }}
                        </h4>
                        <div class="col-12 text-right mt-30">
                                {{ Form::open(['route' => ['admin.cases.change_start'] ]) }}

                                <div class="center-block text-center">
                                    <button type="button" class="btn btn-default iverse" data-dismiss="modal">Editar</button>
                                    <button type="submit" class="btn btn-default">Enviar Para Analise</button>
                                </div>
                                {{ Form::close() }}
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (($percents_claimant >= 100) && ($percents_itens_breve >= 100) && $call->stage_case == 'primeiro_acesso')
        <script>
            setTimeout(function(){ $('#lockDocumentsModalTitle').modal({backdrop: 'static',keyboard: true,show: true}); }, 1000);
        </script>
    @endif

    @if ($call->stage_case == 'solicitacao_documentos')
        <script>
            setTimeout(function(){ $('#lockInitialModal').modal({backdrop: 'static',keyboard: true,show: true}); }, 1000);
        </script>
    @endif
@endsection
