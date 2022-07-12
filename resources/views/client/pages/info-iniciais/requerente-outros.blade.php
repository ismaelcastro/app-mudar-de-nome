@extends('client.layout.acesso')

@section('content')
{{ Form::model($call, ['route' => ['client.iniciais.requerente.outros.store'], 'method' => 'PUT' ]) }}
<div class="row p-b-30">
    <ul class="breadcrumb">
        <li><a href="javascript:void(0);">Informações Iniciais</a></li>
        <li>Requerente e outros</li>
    </ul>
    <div class="col-12 ico-family p-b-30">        
        <h2>Requerente e outros</h2>
        <p>
            Precisamos que você complete alguns informações sobre o Requerente e os demais integrantes do processo.
        </p>
    </div>  
    <div class="col-8 col-12-xsmall">
        <div class="row gtr-uniform">
            <div class="col-6 col-12-xsmall">
                <strong>Você é o Requerente no processo?</strong>
            </div>
            <div class="col-5 col-11-xsmall">                   
                <input type="radio" name="is_requerente" id="is_requerente_sim" value="1">
                <label for="is_requerente_sim">  SIM </label>
            
                <input type="radio" name="is_requerente" id="is_requerente_nao" value="0">
                <label for="is_requerente_nao">  NÃO </label>
            </div>            
            <div class="col-6 col-12-xsmall relationship_claimant">
                <strong>Qual sua relação com o Requerente?</strong>
            </div>
            <div class="col-5 col-11-xsmall relationship_claimant">
                {{Form::select('relationship_claimant', $relationship_claimant_list,null,['class' => $errors->has('relationship_claimant') ?  'is-invalid' : ''])}}
            </div>
        </div>
        

        <div class="row gtr-uniform mt-20">
            <div class="col-6 col-12-xsmall">
                <strong id="show_has_descendente">Você possui Descendentes?</strong>
            </div>
            <div class="col-5 col-11-xsmall">
                <input type="radio" name="has_descendente" id="has_descendente_sim" value="1">
                <label for="has_descendente_sim">  SIM </label>
            
                <input type="radio" name="has_descendente" id="has_descendente_nao" value="0">
                <label for="has_descendente_nao">  NÃO </label>
            </div>
            <div class="col-6 col-12-xsmall descendants_quantity">
                <strong>Quantos?</strong>
            </div>
            <div class="col-5 col-11-xsmall descendants_quantity">
                <div class="form-group">
                    {{Form::select('descendants_quantity', $descendants_quantity_list,null,['class' => $errors->has('relationship_claimant') ?  'is-invalid' : ''])}}
                </div>
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
        <a href="{{route('client.iniciais.start')}}">VOLTAR</a>
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
