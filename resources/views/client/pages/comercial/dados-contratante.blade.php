@extends('client.layout.app')

@section('content')
<div class="row">
    <div class="col-12 ico-user-i">
        <h2>Dados do Contratante</h2>
        <p>
            Informe os dados do responsável pela contratação e pagamento dos honorários advocatícios para elaboração do contrato que deverá ser assinado digitalmente.
        </p>
    </div>
</div>

{{ Form::model($client, ['route' => ['client.contratacao.dados.store',$client->id], 'method' => 'PUT' ]) }}
    <div class="row gtr-uniform">
        <div class="col-12">
            {{ Form::text('name', null, ['class' => $errors->has('name') ?  'is-invalid' : '', 'placeholder' => 'Nome completo do Contratante']) }}
        </div>
        <div class="col-6 col-12-xsmall">
            {{ Form::text('phone', null, ['class' => $errors->has('phone') ?  'is-invalid sp_celphones' : 'sp_celphones', 'placeholder' => 'Seu celular']) }}
        </div>
        <div class="col-6 col-12-xsmall">
            {{ Form::email('email', null, ['class' => $errors->has('email') ?  'is-invalid' : '', 'placeholder' => 'E-mail']) }}
        </div>
        <div class="col-4 col-12-xsmall">
            {{ Form::text('nacionality', null, ['class' => $errors->has('nacionality') ?  'typeahead-nacionality is-invalid' : 'typeahead-nacionality', 'autocomplete' => 'off', 'placeholder' => 'Nacionalidade']) }}
        </div>
        <div class="col-4 col-12-xsmall">
            {{ Form::text('job', null, ['class' => $errors->has('job') ?  'typeahead-job is-invalid' : 'typeahead-job', 'autocomplete' => 'off', 'placeholder' => 'Profissão']) }}
        </div>
        <div class="col-4 col-12-xsmall">
            {{Form::select('marital_status', $marital_status,null,['class' => $errors->has('marital_status') ?  'is-invalid' : '', 'required' => 'required'])}}
        </div>

        <div class="col-4 col-12-xsmall">
            <label for="cpf" class="mb-10">&nbsp;</label>
            {{ Form::text('cpf', null, ['class' => $errors->has('cpf') ?  'is-invalid cpf' : 'cpf', 'placeholder' => 'CPF']) }}
        </div>
        <div class="col-4 col-12-xsmall">
            <label for="rg" class="mb-10">&nbsp;</label>
            {{ Form::text('rg', null, ['class' => $errors->has('rg') ?  'is-invalid' : '', 'placeholder' => 'RG']) }}
        </div>
        <div class="col-4 col-12-xsmall">
            <label for="date_birth_day" class="mb-10">Data de Nascimento</label>
            <div class="row gtr-uniform">
                <div class="col-4 col-12-xsmall">
                    {{Form::select('date_birth_day', $days_list,null,['class' => $errors->has('date_birth_day') ?  'is-invalid' : '', 'required' => 'required' ])}}
                </div>
                <div class="col-4 col-12-xsmall">
                    {{Form::select('date_birth_month', $month_list,null,['class' => $errors->has('date_birth_month') ?  'is-invalid' : '', 'required' => 'required' ])}}
                </div>
                <div class="col-4 col-12-xsmall">
                    {{Form::select('date_birth_year', $year_list,null,['class' => $errors->has('date_birth_year') ?  'is-invalid' : '', 'required' => 'required' ])}}
                </div>
            </div>
        </div>                                    
    </div>

    <div class="row">
        <div class="col-12 text-center">
            <h3 class="text-uppercase mt-25 mb-35 border-bottom">Endereço Residencial</h3>
        </div>                                    
    </div>

    <div class="row gtr-uniform">
        <div class="col-3 col-12-xsmall">
            {{ Form::text('addresscep', null, ['class' => $errors->has('addresscep') ?  'is-invalid cep' : 'cep', 'placeholder' => 'CEP', 'id' => 'addresscep']) }}
        </div>
        <div class="col-6 col-12-xsmall">
            {{ Form::text('addressstreet', null, ['class' => $errors->has('addressstreet') ?  'is-invalid' : '', 'placeholder' => 'Endereço', 'id' => 'addressstreet']) }}
        </div>
        <div class="col-3 col-12-xsmall">
            {{ Form::text('addressnumber', null, ['class' => $errors->has('addressnumber') ?  'is-invalid' : '', 'placeholder' => 'Número']) }}
        </div> 
        <div class="col-6 col-12-xsmall">
            {{ Form::text('addresscomplement', null, ['class' => $errors->has('addresscomplement') ?  'is-invalid' : '', 'placeholder' => 'Complemento']) }}
        </div>
        <div class="col-6 col-12-xsmall">
            {{ Form::text('addressdistrict', null, ['class' => $errors->has('addressdistrict') ?  'is-invalid' : '', 'placeholder' => 'Bairro', 'id' => 'addressdistrict']) }}
        </div>  
        <div class="col-9 col-12-xsmall">
            {{ Form::text('addresscity', null, ['class' => $errors->has('addresscity') ?  ' is-invalid' : '', 'placeholder' => 'Cidade', 'id' => 'addresscity']) }}
        </div> 
        <div class="col-3 col-12-xsmall">
            {{ Form::text('addressstate', null, ['class' => $errors->has('addressstate') ?  'text-uppercase is-invalid' : 'text-uppercase', 'placeholder' => 'UF', 'id' => 'addressstate']) }}
        </div>
        <div class="col-12 text-right">
            <button type="submit" class="btn btn-default mb-10">Continuar</button>
        </div>                               
    </div>
{{ Form::close() }}
@endsection

@section('step')
<div class="wrapperStepComercial">
    <ul class="StepProgress">
        <li class="StepProgress-item current">
            <a href="javascript:void(0);">
                <strong>Dados do Contratante</strong>    
            </a>            
        </li>
        <li class="StepProgress-item">
            <a href="javascript:void(0);">
                <strong>Forma de Contratação</strong>
            </a>
        </li>
        <li class="StepProgress-item">
            <a href="javascript:void(0);">
                <strong>Assinatura</strong>
            </a>
        </li>
    </ul>
</div>
@endsection

@section('class_body') body-dados-contratante @endsection
