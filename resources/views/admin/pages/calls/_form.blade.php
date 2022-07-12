<div class="row">
    <div class="col-sm-8">        
        
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('source', 'Origem') }} <span class="text-danger">*</span>
                    {{
                        Form::select('source', $source_list,null,['class' => $errors->has('source') ?  'form-control is-invalid' : 'form-control'])
                    }}
                    @include('admin.partials._help_block',['field' => 'source'])
                </div>
            </div>
            <div class="col-sm-6" id="box-clients">        
                <div class="form-group">
                    {{ Form::label('client_id', 'Clientes') }} <span class="text-danger">*</span>
                    {{
                        Form::select('client_id', $client_list,null,['class' => $errors->has('client_id') ?  'js-basic-single form-control is-invalid' : 'js-basic-single form-control', 'onchange' => 'loadQuerent(this.options[this.selectedIndex].text)' ])
                    }}
                    @include('admin.partials._help_block',['field' => 'client_id'])
        
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#add-cliente" class="text-primary">Adicionar cliente</a>
        
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    {{ Form::label('querent', 'Consulente') }} <span class="text-danger">*</span>
                    {{ Form::text('querent', null, ['class' => $errors->has('querent') ?  'form-control is-invalid' : 'form-control']) }}
                    @include('admin.partials._help_block',['field' => 'querent'])
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">        
                <div class="form-group">
                    {{ Form::label('occupation_area', 'Área de Atuação') }} <span class="text-danger">*</span>
                    {{Form::select('occupation_area', $area_list,null,['class' => $errors->has('occupation_area') ?  'form-control is-invalid' : 'form-control', 'onchange' => 'openblocks($("#box_action"),this.value,"divorcio")' ])}}
                    @include('admin.partials._help_block',['field' => 'occupation_area'])        
                </div>
            </div>
        </div>
        
        <div class="box_action" id="box_action">
            <div class="row" >
                <div class="col-sm-4">
                    <div class="form-group">
                        {{ Form::label('caseaction', 'Deseja') }} <span class="text-danger">*</span>
                        {{
                            Form::select('caseaction', $case_action,null,['class' => $errors->has('caseaction') ?  'form-control is-invalid' : 'form-control'])
                        }}
                        @include('admin.partials._help_block',['field' => 'caseaction'])
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        {{ Form::label('changetype_id', 'Onde') }} <span class="text-danger">*</span>
                        {{
                            Form::select('changetype_id', $changes_type,null,['class' => $errors->has('changetype_id') ?  'form-control is-invalid' : 'form-control'])
                        }}
                        @include('admin.partials._help_block',['field' => 'changetype_id'])
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        {{ Form::label('reason_id', 'Motivo') }} <span class="text-danger">*</span>
                        {{
                            Form::select('reason_id', $reasons,null,['class' => $errors->has('reason_id') ?  'form-control is-invalid' : 'form-control'])
                        }}
                        @include('admin.partials._help_block',['field' => 'reason_id'])
                    </div>
                </div>   
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('currentname', 'Nome atual') }} <span class="text-danger">*</span>
                    {{ Form::text('currentname', null, ['class' => $errors->has('currentname') ?  'form-control is-invalid' : 'form-control']) }}
                    @include('admin.partials._help_block',['field' => 'currentname'])
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('desiredname', 'Nome pretendido') }} <span class="text-danger">*</span>
                    {{ Form::text('desiredname', null, ['class' => $errors->has('desiredname') ?  'form-control is-invalid' : 'form-control']) }}
                    @include('admin.partials._help_block',['field' => 'desiredname'])
                </div>
            </div> 
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    {{ Form::label('description', '1º Registro do atendimento') }} <span class="text-danger">*</span>
                    {{ Form::textarea('description', null, ['class' => $errors->has('description') ?  'form-control is-invalid' : 'form-control']) }}
                    @include('admin.partials._help_block',['field' => 'description'])
                </div>
            </div>
        </div>


    </div>
</div>
