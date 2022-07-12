@extends('client.layout.acesso')

@section('content')
{{ Form::model($call, ['route' => ['client.iniciais.breve.relato.store'], 'method' => 'PUT' ]) }}
<div class="row p-b-30">
    <ul class="breadcrumb">

        <li><a href="{{route('client.iniciais.start')}}">Informações Iniciais</a></li>
        <li><a href="{{route('client.iniciais.breve.relato')}}">Breve Relato</a></li>
        <li>Motivos</li>
    </ul>
    <div class="col-12 ico-info-3 p-b-30">        
        <h2>Motivos</h2>
        <p>
            Nesta etapa você deve nos contar com suas palavras qual o(s) motivo(s) para alterar o Registro Civil. 
            Funciona como uma "Carta ao Juiz", e será utilizada por nossa equipe de advogados para elaborar uma 
            petição bem fundamentada e personalizada de acordo com seu caso.
        </p>
    </div>  
    <div class="col-8 col-12-xsmall">
        <div class="row gtr-uniform">
            <div class="col-11">
                <strong>Descreva com detalhes o(s) motivo(s):</strong>
                @if($call->status_breve_relato == 'disapproved')
                <p class="text-danger">
                    <i class="fa fa-info-circle"></i> <strong>Reprovado:</strong> {{$call->reason_breve_relato}}
                </p>
                @endif
            </div>
            <div class="col-11">
                {{ Form::textarea('breve_relato', null, ['class' => $errors->has('breve_relato') ?  'is-invalid' : '', 'cols' => '30', 'rows' => '10']) }}
            </div>    
        </div>        

    </div>
    <div class="col-4 col-12-xsmall borda-esquerda">
        <h3 class="mb-30 tit2">Podemos te ajudar?</h3>
        @include('client.partials._helps')
    </div>  
</div>

<div class="row gtr-uniform">
    <div class="col-6">
        <a href="{{route('client.iniciais.primeiro.acesso')}}">VOLTAR</a>
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
