@extends('client.layout.acesso')

@section('content')
<div class="row p-b-30">
    <ul class="breadcrumb">
        <li><a href="javascript:void(0);">Informações Iniciais</a></li>
        <li><a href="javascript:void(0);">Requerente e outros</a></li>
        <li>Dados do Requerente</li>
    </ul>
    <div class="col-12 ico-user-i p-b-30">        
        <h2>Dados do Requerente</h2>
        <p>
            Agora que sabemos que seu Registro Civil não será retificado, precisamos que nos informe os dados completos do Requerente para solicitarmos a documentação dele.
        </p>
    </div>  
    {{ Form::model($client, ['route' => ['client.iniciais.requerente.dados.update',$client->id], 'method' => 'PUT' ]) }}
        @include('client.pages.info-iniciais._form_requerente')

        <div class="row pt-30">
            <div class="col-6">
                <a href="{{route('client.iniciais.primeiro.acesso')}}">VOLTAR</a>
            </div>
            <div class="col-6 text-right">
                <button type="submit" class="btn btn-default mb-10">Atualizar</button>
            </div> 
        </div>
    {{ Form::close() }} 
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
