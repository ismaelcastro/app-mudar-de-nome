<input type="hidden" name="page_return" value="case_breve_relato">

<div class="row">
    <div class="col-12">
        <div class="form-group">
            {{ Form::text('name', null, ['class' => $errors->has('name') ?  'is-invalid form-control' : 'form-control', 'placeholder' => 'Nome completo']) }}
        </div>        
    </div>


    <div class="col-6 col-12-xsmall">
        <div class="form-group">
            {{ Form::text('phone', null, ['class' => $errors->has('phone') ?  'is-invalid form-control sp_celphones' : 'sp_celphones form-control', 'placeholder' => 'Seu celular']) }}
        </div> 
    </div>
    <div class="col-6 col-12-xsmall">
        <div class="form-group">
            {{ Form::email('email', null, ['class' => $errors->has('email') ?  'is-invalid form-control' : 'form-control', 'placeholder' => 'E-mail']) }}
        </div> 
    </div>


    <div class="col-6 col-12-xsmall">
        <div class="form-group">
            {{ Form::text('nacionality', null, ['class' => $errors->has('nacionality') ?  'typeahead-nacionality is-invalid form-control' : 'typeahead-nacionality form-control', 'autocomplete' => 'off', 'placeholder' => 'Nacionalidade']) }}
        </div> 
    </div>
    <div class="col-6 col-12-xsmall">
        <div class="form-group">
            {{ Form::text('job', null, ['class' => $errors->has('job') ?  'typeahead-job is-invalid form-control' : 'typeahead-job form-control', 'autocomplete' => 'off', 'placeholder' => 'Profissão']) }}
        </div> 
    </div>
    <div class="col-6 col-12-xsmall">
        <div class="form-group">
            {{ Form::text('cpf', null, ['class' => $errors->has('cpf') ?  'is-invalid cpf form-control' : 'cpf form-control', 'placeholder' => 'CPF']) }}
        </div> 
    </div>
    <div class="col-6 col-12-xsmall">
        <div class="form-group">
            {{ Form::text('rg', null, ['class' => $errors->has('rg') ?  'is-invalid form-control' : 'form-control', 'placeholder' => 'RG']) }}
        </div> 
    </div> 
</div>

<div class="col-12 text-center">
    <h4 class="text-uppercase mt-3 mb-3 pb-2 border-bottom text-primary">Endereço Residencial</h4>
</div>                            


<div class="row">
    <div class="col-3 col-12-xsmall">
        <div class="form-group">
            {{ Form::text('addresscep', null, ['class' => $errors->has('addresscep') ?  'is-invalid cep form-control' : 'cep form-control', 'placeholder' => 'CEP', 'id' => 'addresscep']) }}
        </div>
    </div>
    <div class="col-6 col-12-xsmall">
        <div class="form-group">
            {{ Form::text('addressstreet', null, ['class' => $errors->has('addressstreet') ?  'is-invalid form-control' : 'form-control', 'placeholder' => 'Endereço', 'id' => 'addressstreet']) }}
        </div>
    </div>
    <div class="col-3 col-12-xsmall">
        <div class="form-group">
            {{ Form::text('addressnumber', null, ['class' => $errors->has('addressnumber') ?  'is-invalid form-control' : 'form-control', 'placeholder' => 'Número', 'id'=>'addressnumber']) }}
        </div>
    </div> 
    <div class="col-6 col-12-xsmall">
        <div class="form-group">
            {{ Form::text('addresscomplement', null, ['class' => $errors->has('addresscomplement') ?  'is-invalid form-control' : 'form-control', 'placeholder' => 'Complemento', 'id'=>'addresscomplement']) }}
        </div>
    </div>
    <div class="col-6 col-12-xsmall">
        <div class="form-group">
            {{ Form::text('addressdistrict', null, ['class' => $errors->has('addressdistrict') ?  'is-invalid form-control' : 'form-control', 'placeholder' => 'Bairro', 'id' => 'addressdistrict']) }}
        </div>
    </div>  
    <div class="col-9 col-12-xsmall">
        <div class="form-group">
            {{ Form::text('addresscity', null, ['class' => $errors->has('addresscity') ?  ' is-invalid form-control' : 'form-control', 'placeholder' => 'Cidade', 'id' => 'addresscity']) }}
        </div>
    </div> 
    <div class="col-3 col-12-xsmall">
        <div class="form-group">
            {{ Form::text('addressstate', null, ['class' => $errors->has('addressstate') ?  'text-uppercase is-invalid form-control' : 'text-uppercase form-control', 'placeholder' => 'UF', 'id' => 'addressstate']) }}
        </div>
    </div>                                          
</div>