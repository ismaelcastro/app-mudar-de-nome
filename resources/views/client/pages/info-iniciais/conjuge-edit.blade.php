@extends('client.layout.acesso')

@section('content')

<div class="row p-b-30">
    <ul class="breadcrumb">
        <li><a href="javascript:void(0);">Informações Iniciais</a></li>
        <li><a href="javascript:void(0);">Requerente e outros</a></li>
        <li>Dados do Cônjuge</li>
    </ul>
    <div class="col-12 ico-aliancas p-b-30">        
        <h2>Dados do(a) Cônjuge</h2>
        <p>
            Informe os dados completos do(a) Cônjuge do Requerente para que conste na procuração que deverá ser assinada por ambos.
        </p>
    </div>  
    {{ Form::model($client, ['route' => ['client.iniciais.conjuge.dados.update',$client->id], 'method' => 'PUT' ]) }}
        <div class="row gtr-uniform">
            @include('client.pages.info-iniciais._form_conjuge')
        </div>     

        <div class="row gtr-uniform p-t-70">
            <div class="col-6">
                <a href="{{route('client.iniciais.start')}}">VOLTAR</a>
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
