<div class="col-12">
    {{ Form::text('name', null, ['class' => $errors->has('name') ?  'is-invalid' : '', 'placeholder' => 'Nome completo']) }}
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

<div class="col-6 col-12-xsmall">
    <strong>Este Descendente é Maior de 18 anos?</strong>
</div>
<div class="col-5 col-11-xsmall">                   
    <input type="radio" name="is_adulthood" id="is_adulthood_sim" value="1" @if(isset($client->is_adulthood) && $client->is_adulthood == 1 ) checked="checked" @endif >
    <label for="is_adulthood_sim">  SIM </label>

    <input type="radio" name="is_adulthood" id="is_adulthood_nao" value="0" @if(isset($client->is_adulthood) && $client->is_adulthood == 0 ) checked="checked" @endif>
    <label for="is_adulthood_nao">  NÃO </label>
</div>  

<div class="col-6 col-12-xsmall box_contato_descendente">
    {{ Form::text('phone', null, ['class' => $errors->has('phone') ?  'is-invalid sp_celphones' : 'sp_celphones', 'placeholder' => 'Seu celular']) }}
</div>
<div class="col-6 col-12-xsmall box_contato_descendente">
    {{ Form::email('email', null, ['class' => $errors->has('email') ?  'is-invalid' : '', 'placeholder' => 'E-mail']) }}
</div>

@if($call->occupation_area == 'divorcio')
    <input type="hidden" name="kinship" value="filho">
@else
    <div class="col-6 col-12-xsmall">
        <strong>Qual grau de parentesco?</strong>
    </div>
    <div class="col-5 col-11-xsmall">
        {{Form::select('kinship', $kinship_list,null,['class' => $errors->has('kinship') ?  'is-invalid' : ''])}}
    </div>
@endif