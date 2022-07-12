<ul class="nav nav-tabs md-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#info-persoanl" role="tab">Informações pessoais</a>
        <div class="slide"></div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#info-complement" role="tab">Informações complementares</a>
        <div class="slide"></div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#info-document" role="tab">Documentação</a>
        <div class="slide"></div>
    </li>
</ul>
<!-- Tab panes -->
<div class="tab-content card-block">
    <div class="tab-pane active" id="info-persoanl" role="tabpanel">
        <div class="row"> 
            <div class="col-sm-8">
                <div class="form-group d-none" >
                    <div class="checkbox-fade fade-in-primary d-">
                        <label>
                            {{ Form::checkbox('send_mail', 1) }}
                            <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                            <span class="text-inverse">Enviar senha por e-mail</span>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('name', 'Nome') }}<span class="text-danger">*</span>
                            {{ Form::text('name', null, ['class' => $errors->has('name') ?  'form-control is-invalid' : 'form-control']) }}
                            @include('admin.partials._help_block',['field' => 'name'])
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('nickname', 'Apelido') }}
                            {{ Form::text('nickname', null, ['class' => $errors->has('nickname') ?  'form-control is-invalid' : 'form-control']) }}
                            @include('admin.partials._help_block',['field' => 'nickname'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        {{ Form::label('type_enum', 'Tipo de telefone') }}
                        {{
                            Form::select('type_enum', $type_enum,null,['class' => $errors->has('type_enum') ?  'form-control is-invalid' : 'form-control'])
                        }}
                        @include('admin.partials._help_block',['field' => 'type_enum'])
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            {{ Form::label('phone', 'Telefone') }} <span class="text-danger">*</span> <span class="small"><i>Gerencia Net</i> requer um celular</span>
                            {{ Form::text('phone', null, ['class' => $errors->has('phone') ?  'form-control is-invalid sp_celphones' : 'form-control sp_celphones']) }}
                            @include('admin.partials._help_block',['field' => 'phone'])
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            {{ Form::label('operator', 'Operadora') }}
                            {{ Form::text('operator', null, ['class' => $errors->has('operator') ?  'form-control is-invalid' : 'form-control']) }}
                            @include('admin.partials._help_block',['field' => 'operator'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        {{ Form::label('email_type', 'Tipo de e-mail') }}
                        {{
                            Form::select('email_type', $type_email,null,['class' => $errors->has('email_type') ?  'form-control is-invalid' : 'form-control'])
                        }}
                        @include('admin.partials._help_block',['field' => 'email_type'])
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            {{ Form::label('email', 'E-mail') }}<span class="text-danger">*</span>
                            {{ Form::email('email', null, ['class' => $errors->has('email') ?  'form-control is-invalid' : 'form-control']) }}
                            @include('admin.partials._help_block',['field' => 'email'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            {{ Form::label('addresstype', 'Tipo de endereço') }}
                            {{Form::select('addresstype', $type_address,null,['class' => $errors->has('addresstype') ?  'form-control is-invalid' : 'form-control'])}}
                            @include('admin.partials._help_block',['field' => 'addresstype'])
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            {{ Form::label('addresscep', 'CEP') }}
                            {{ Form::text('addresscep', null, ['class' => $errors->has('addresscep') ?  'form-control is-invalid cep' : 'form-control cep']) }}
                            @include('admin.partials._help_block',['field' => 'addresscep'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9">
                        <div class="form-group">
                            {{ Form::label('addressstreet', 'Rua') }}
                            {{ Form::text('addressstreet', null, ['class' => $errors->has('addressstreet') ?  'form-control is-invalid' : 'form-control']) }}
                            @include('admin.partials._help_block',['field' => 'addressstreet'])
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            {{ Form::label('addressnumber', 'Número') }}
                            {{ Form::text('addressnumber', null, ['class' => $errors->has('addressnumber') ?  'form-control is-invalid' : 'form-control']) }}
                            @include('admin.partials._help_block',['field' => 'addressnumber'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-7">
                        <div class="form-group">
                            {{ Form::label('addressdistrict', 'Bairro') }}
                            {{ Form::text('addressdistrict', null, ['class' => $errors->has('addressdistrict') ?  'form-control is-invalid' : 'form-control']) }}
                            @include('admin.partials._help_block',['field' => 'addressdistrict'])
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            {{ Form::label('addresscomplement', 'Complemento') }}
                            {{ Form::text('addresscomplement', null, ['class' => $errors->has('addresscomplement') ?  'form-control is-invalid' : 'form-control']) }}
                            @include('admin.partials._help_block',['field' => 'addresscomplement'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9">
                        <div class="form-group">
                            {{ Form::label('addresscity', 'Cidade') }}
                            {{ Form::text('addresscity', null, ['class' => $errors->has('addresscity') ?  'form-control is-invalid' : 'form-control']) }}
                            @include('admin.partials._help_block',['field' => 'addresscity'])
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            {{ Form::label('addressstate', 'UF') }}
                            {{ Form::text('addressstate', null, ['class' => $errors->has('addressstate') ?  'form-control is-invalid' : 'form-control']) }}
                            @include('admin.partials._help_block',['field' => 'addressstate'])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="info-complement" role="tabpanel">
        <div class="row"> 
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            {{ Form::label('date_birth', 'Data Nasc.') }}
                            {{ Form::date('date_birth', null,['class' => $errors->has('date_birth') ?  'form-control is-invalid' : 'form-control'])}}
                            @include('admin.partials._help_block',['field' => 'date_birth'])
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            {{ Form::label('nacionality', 'Nacionalidade') }}
                            {{ Form::text('nacionality', null, ['class' => $errors->has('nacionality') ?  'typeahead-nacionality form-control is-invalid' : 'typeahead-nacionality form-control', 'autocomplete' => 'off']) }}
                            @include('admin.partials._help_block',['field' => 'nacionality'])
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            {{ Form::label('marital_status', 'Estado civil') }}
                            {{Form::select('marital_status', $marital_status,null,['class' => $errors->has('marital_status') ?  'form-control is-invalid' : 'form-control'])}}
                            @include('admin.partials._help_block',['field' => 'marital_status'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('job', 'Profissão') }}
                            {{ Form::text('job', null, ['class' => $errors->has('job') ?  'typeahead-job form-control is-invalid' : 'typeahead-job form-control', 'autocomplete' => 'off']) }}
                            @include('admin.partials._help_block',['field' => 'job'])
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('treatment', 'Tratamento') }}
                            {{Form::select('treatment', $treatment,null,['class' => $errors->has('treatment') ?  'form-control is-invalid' : 'form-control'])}}
                            @include('admin.partials._help_block',['field' => 'treatment'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('fathersname', 'Nome do pai') }}
                            {{ Form::text('fathersname', null, ['class' => $errors->has('fathersname') ?  'form-control is-invalid' : 'form-control']) }}
                            @include('admin.partials._help_block',['field' => 'fathersname'])
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('mothersname', 'Nome da mãe') }}
                            {{ Form::text('mothersname', null, ['class' => $errors->has('mothersname') ?  'form-control is-invalid' : 'form-control']) }}
                            @include('admin.partials._help_block',['field' => 'mothersname'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        {{ Form::label('note', 'Comentários') }}
                        {{ Form::textarea('note', null, ['class' => $errors->has('note') ?  'form-control is-invalid' : 'form-control']) }}
                        @include('admin.partials._help_block',['field' => 'note'])
                    </div>
                </div>
    
            </div>
        </div>
    </div>
    <div class="tab-pane" id="info-document" role="tabpanel">
        <div class="row"> 
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            {{ Form::label('cpf', 'CPF') }}
                            {{ Form::text('cpf', null, ['class' => $errors->has('cpf') ?  'form-control is-invalid cpf' : 'form-control cpf', 'placeholder' => '999.999.999-99']) }}
                            @include('admin.partials._help_block',['field' => 'cpf'])
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            {{ Form::label('rg', 'RG') }}
                            {{ Form::text('rg', null, ['class' => $errors->has('rg') ?  'form-control is-invalid' : 'form-control']) }}
                            @include('admin.partials._help_block',['field' => 'rg'])
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            {{ Form::label('expeditiondate', 'Data de expedição do RG') }}
                            {{ Form::date('expeditiondate', null,['class' => $errors->has('expeditiondate') ?  'form-control is-invalid' : 'form-control', 'placeholder' => 'Número/emissão/emissor'])}}
                            @include('admin.partials._help_block',['field' => 'expeditiondate'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('voterdocument', 'Título de eleitor') }}
                            {{ Form::text('voterdocument', null, ['class' => $errors->has('voterdocument') ?  'form-control is-invalid' : 'form-control', 'placeholder' => 'Número/zona/sessão' ]) }}
                            @include('admin.partials._help_block',['field' => 'voterdocument'])
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('cnh', 'CNH') }}
                            {{ Form::text('cnh', null, ['class' => $errors->has('cnh') ?  'form-control is-invalid' : 'form-control' ]) }}
                            @include('admin.partials._help_block',['field' => 'cnh'])
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('ctps', 'CTPS') }}
                            {{ Form::text('ctps', null, ['class' => $errors->has('ctps') ?  'form-control is-invalid' : 'form-control' ]) }}
                            @include('admin.partials._help_block',['field' => 'ctps'])
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
    </div>
</div>