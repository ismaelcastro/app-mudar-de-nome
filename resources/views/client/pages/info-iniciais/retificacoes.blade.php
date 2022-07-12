@extends('client.layout.acesso')

@section('content')
{{ Form::open(['route' => 'client.iniciais.retificacoes.store' ]) }}
<div class="row p-b-30">
    <ul class="breadcrumb">
        <li><a href="{{route('client.iniciais.start')}}">Informações Iniciais</a></li>
        <li><a href="{{route('client.iniciais.breve.relato')}}">Breve Relato</a></li>
        <li>Retificações Desejadas</li>
    </ul>
    <div class="col-12 ico-info-3 p-b-30">        
        <h2>Retificações Desejadas</h2>
        <p>
            Agora você deve informar como o(s) Registro(s) devem ficar após o final do processo.
        </p>
    </div>  
    <div class="col-8 col-12-xsmall">
        @if ($rectification <= $qtd_retificacoes_permitidas)
        <div class="row form-default">
            <div class="clone-this">
                <div class="col-11 mb-20">
                    {{ Form::text('atual_name', null, ['class' => $errors->has('atual_name') ?  'is-invalid' : '', 'placeholder' => 'Nome completo atual como consta no Registro Civil', 'name' => 'atual_name[]', 'required' => 'required' ]) }}
                </div>
                <div class="col-11 borda-baixo p-b-20 m-b-20">
                    {{ Form::text('new_name', null, ['class' => $errors->has('new_name') ?  'is-invalid' : '', 'placeholder' => 'Como deverá constar o nome completo após a retificação desejada', 'name' => 'new_name[]', 'required' => 'required']) }}
                </div>
            </div>
        </div>        
        <div class="add-form-default">

        </div>
        @if ($qtd_retificacoes_permitidas > 1)
            <div class="row">
                <div class="col-11 text-center p-t-20">
                    <button type="button" class="btn btn-default mb-10 iverse fs-16" id="btn-clone-retifica" onclick="clone_reticacao('{{$qtd_retificacoes_permitidas}}');">
                        <span class="fs-20 p-t-5 d-inline-block">+</span> Adicionar Retificação
                    </button>
                </div>  
            </div>
        @endif
        
        @endif
    </div>
    <div class="col-4 col-12-xsmall borda-esquerda">
        <h3 class="mb-30 tit2">Podemos te ajudar?</h3>
        @include('client.partials._helps')
    </div>  
</div>

<div class="row gtr-uniform">
    <div class="col-6">
        <a href="javascript:void(0);">VOLTAR</a>
    </div>
    <div class="col-6 text-right">
        <button type="submit" class="btn btn-default mb-10">Continuar</button>
    </div>                               
</div>
{{ Form::close() }}
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