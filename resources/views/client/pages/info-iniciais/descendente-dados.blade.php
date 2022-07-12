@extends('client.layout.acesso')

@section('content')
<div class="row p-b-30">
    <ul class="breadcrumb">
        <li><a href="javascript:void(0);">Informações Iniciais</a></li>
        <li><a href="javascript:void(0);">Requerente e outros</a></li>
        <li>Dados do(a) {{$number_position}} Descendente</li>
    </ul>
    <div class="col-12 ico-group p-b-30">        
        <h2>Dados do(a) {{$number_position}} @if($call->occupation_area == 'divorcio') Filho @else Descendente @endif</h2>
        <p>
            Informe os dados completos do Descendente do Requerente para elaborarmos procuração que deverá ser assinada por ele ou pelo seu representante legal caso seja menor de 18 anos.
        </p>
    </div>  
    {{ Form::open(['route' => 'client.iniciais.descendente.dados.store' ]) }}
        <div class="row gtr-uniform">
            @include('client.pages.info-iniciais._form_descendente')
        </div>     

        <div class="row gtr-uniform p-t-70">
            <div class="col-6">
                <a href="{{route('client.iniciais.start')}}">VOLTAR</a>
            </div>
            <div class="col-6 text-right">
                <button type="submit" class="btn btn-default mb-10">Continuar</button>
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
