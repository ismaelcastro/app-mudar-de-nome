<div class="col-12">
    {{ Form::text('name', null, ['class' => $errors->has('name') ?  'is-invalid' : '', 'placeholder' => 'Nome completo do(a) Cônjuge']) }}
</div>


<div class="col-6 col-12-xsmall">
    {{ Form::text('phone', null, ['class' => $errors->has('phone') ?  'is-invalid sp_celphones' : 'sp_celphones', 'placeholder' => 'Celular do(a) Cônjuge ']) }}
</div>
<div class="col-6 col-12-xsmall">
    {{ Form::email('email', null, ['class' => $errors->has('email') ?  'is-invalid' : '', 'placeholder' => 'E-mail do(a) Cônjuge']) }}
</div>


<div class="col-6 col-12-xsmall">
    {{ Form::text('nacionality', null, ['class' => $errors->has('nacionality') ?  'typeahead-nacionality is-invalid' : 'typeahead-nacionality', 'autocomplete' => 'off', 'placeholder' => 'Nacionalidade']) }}
</div>
<div class="col-6 col-12-xsmall">
    {{ Form::text('job', null, ['class' => $errors->has('job') ?  'typeahead-job is-invalid' : 'typeahead-job', 'autocomplete' => 'off', 'placeholder' => 'Profissão']) }}
</div>
<div class="col-6 col-12-xsmall">
    {{ Form::text('cpf', null, ['class' => $errors->has('cpf') ?  'is-invalid cpf' : 'cpf', 'placeholder' => 'CPF']) }}
</div>
<div class="col-6 col-12-xsmall">
    {{ Form::text('rg', null, ['class' => $errors->has('rg') ?  'is-invalid' : '', 'placeholder' => 'RG']) }}
</div> 

    
<div class="row w-100">
    <div class="col-12 text-center">
        <h3 class="text-uppercase mt-25 mb-35 border-bottom">Endereço Residencial</h3>
    </div> 
    <div class="col-12 text-center p-b-20">
        <a href="javascript:void(0);" onclick="carrega_endereco_contratante();" class="text-yellow">Copiar o endereço do Cônjuge</a>
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
        {{ Form::text('addressnumber', null, ['class' => $errors->has('addressnumber') ?  'is-invalid' : '', 'placeholder' => 'Número', 'id'=>'addressnumber']) }}
    </div> 
    <div class="col-6 col-12-xsmall">
        {{ Form::text('addresscomplement', null, ['class' => $errors->has('addresscomplement') ?  'is-invalid' : '', 'placeholder' => 'Complemento', 'id'=>'addresscomplement']) }}
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
</div>