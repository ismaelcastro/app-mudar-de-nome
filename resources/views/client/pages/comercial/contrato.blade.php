@extends('client.layout.app')

@section('content')
<div class="row">
    <div class="col-12 ico-contract">
        <h2>Visualização do Contrato</h2>
        <p>
            Leia atentamente o contrato de honorários advocatícios, e somente após conferir se os dados do Contratante foram preenchidos corretamente solicite sua emissão.
        </p>
    </div>
</div>

{{ Form::open(['route' => 'client.contratacao.contrato.store' ]) }}
<div class="row pt-40">
    <div class="col-8 col-12-xsmall">
        <div class="row gtr-uniform">
            <div id='signature-div'>
                <iframe src="{{route($iframe_contrato_name)}}" frameborder="0" width="100%" height="500" scrolling="no" ></iframe>
                <div class="col-12 fs-16" id="agree-box">
                    <input type="checkbox" id="agree" name="agree">
					<label for="agree">Li e Declaro que os Dados do Contratantes estão corretos para emissão do contrato</label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4 col-12-xsmall">
        <h3 class="mb-30 tit2">Podemos te ajudar?</h3>        
        @include('client.partials._helps')
    </div>
    <div class="col-6 pt-40">
        <a href="javascript:void(0);" onclick="document.getElementById('id_change_stagecall').submit();" class="text-uppercase">Voltar</a>
    </div>
    <div class="col-6 text-right pt-40 tooltip" >
        <button type="submit" class="btn btn-default mb-10 disabled" id="emitir-contrato" >
            Emitir Contrato            
        </button>
        <span>Antes de emitir o contrato, precisamos que confirme que leu a minuta e que os dados do contratante estão corretos</span>
    </div> 
</div>
{{ Form::close() }}
{{ Form::open(['route' => 'client.client.change_stagecall', 'id' => 'id_change_stagecall' ]) }}
    {{ Form::hidden('stage', 'emissao') }}
    {{ Form::hidden('installments', null) }}
{{ Form::close() }}
@endsection

@section('step')
<div class="wrapperStepComercial">
    <ul class="StepProgress">
        <li class="StepProgress-item is-done">
            <a href="javascript:void(0);">
                <strong>Dados do Contratante</strong>    
            </a>            
        </li>
        <li class="StepProgress-item is-done">
            <a href="javascript:void(0);">
                <strong>Forma de Contratação</strong>
            </a>
        </li>
        <li class="StepProgress-item current">
            <a href="javascript:void(0);">
                <strong>Assinatura</strong>
            </a>
        </li>
    </ul>
</div>
@endsection

@section('class_body') body-dados-assinatura @endsection
