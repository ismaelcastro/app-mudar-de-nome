<div class="row">
    <div class="col-sm-8">

        <div class="form-group">
            {{ Form::label('name', 'Name') }}<span class="text-danger">*</span>
            {{ Form::text('name', null, ['class' => $errors->has('name') ?  'form-control is-invalid' : 'form-control']) }}
            @include('admin.partials._help_block',['field' => 'name'])
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    {{ Form::label('tags', 'Tags') }}
                    {{
                        Form::select('tags', $tags_list,null,['class' => $errors->has('tags') ?  'js-basic-multiple form-control is-invalid' : 'js-basic-multiple form-control', 'multiple' => 'multiple', 'name' => 'tags[]'])
                    }}
                    @include('admin.partials._help_block',['field' => 'tags'])
                </div>
            </div>  
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('image', 'Imagem') }}
                    <div class="input-group">        
                        {{ Form::text('image', null, ['class' => $errors->has('image') ?  'form-control is-invalid' : 'form-control']) }}
                        <span class="input-group-btn">
                            <div class="btn btn-success btn-file">
                                <i class="fa fa-paperclip"></i>
                                Upload
                                {{ Form::file('attachment', ['onchange' => 'upload(this,"'.route('upload-image').'","image");']) }}
                            </div>
                        </span>
                        @include('admin.partials._help_block',['field' => 'image'])
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('imagehover', 'Imagem hover') }}
                    <div class="input-group">        
                        {{ Form::text('imagehover', null, ['class' => $errors->has('imagehover') ?  'form-control is-invalid' : 'form-control']) }}
                        <span class="input-group-btn">
                            <div class="btn btn-success btn-file">
                                <i class="fa fa-paperclip"></i>
                                Upload
                                {{ Form::file('attachment', ['onchange' => 'upload(this,"'.route('upload-image').'","imagehover");']) }}
                            </div>
                        </span>
                        @include('admin.partials._help_block',['field' => 'imagehover'])
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    {{ Form::label('websites', 'Sites') }}
                    {{
                        Form::select('websites', $websites_list,null,['class' => $errors->has('websites') ?  'js-basic-multiple form-control is-invalid' : 'js-basic-multiple form-control', 'multiple' => 'multiple', 'name' => 'websites[]'])
                    }}
                    @include('admin.partials._help_block',['field' => 'websites'])
                </div>
            </div>    
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    {{ Form::label('summary', 'Resumo') }}
                    {{ Form::textarea('summary', null, ['class' => $errors->has('summary') ?  'form-control is-invalid' : 'form-control']) }}
                    @include('admin.partials._help_block',['field' => 'summary'])
                </div>
            </div>    
        </div>
        <div class="form-group">
            {{ Form::label('description', 'Descrição') }}
            {{ Form::textarea('description', null, ['class' => $errors->has('description') ?  'form-control is-invalid' : 'form-control']) }}
            @include('admin.partials._help_block',['field' => 'description'])
        </div>

        <h4 class="sub-title">Vir selecionado no formulário</h4>

        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    {{ Form::label('caseaction', 'Deseja') }}
                    {{
                        Form::select('caseaction', $case_action,null,['class' => $errors->has('caseaction') ?  'form-control is-invalid' : 'form-control'])
                    }}
                    @include('admin.partials._help_block',['field' => 'caseaction'])
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {{ Form::label('changetype_id', 'Onde') }}
                    {{
                        Form::select('changetype_id', $changes_type,null,['class' => $errors->has('changetype_id') ?  'form-control is-invalid' : 'form-control'])
                    }}
                    @include('admin.partials._help_block',['field' => 'changetype_id'])
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {{ Form::label('reason_id', 'Motivo') }}
                    {{
                        Form::select('reason_id', $reasons,null,['class' => $errors->has('reason_id') ?  'form-control is-invalid' : 'form-control'])
                    }}
                    @include('admin.partials._help_block',['field' => 'reason_id'])
                </div>
            </div>   
        </div>

        <h4 class="sub-title">META TAG</h4>
        
        <div class="form-group">
            {{ Form::label('metatitle', 'Title') }}
            {{ Form::text('metatitle', null, ['class' => $errors->has('metatitle') ?  'form-control is-invalid maxlength' : 'form-control maxlength', 'maxlength' => '90']) }}
            @include('admin.partials._help_block',['field' => 'metatitle'])
        </div>
        
        <div class="form-group">
            {{ Form::label('metadescription', 'Description') }}
            {{ Form::textarea('metadescription', null, ['class' => $errors->has('metadescription') ?  'form-control is-invalid maxlength' : 'form-control maxlength', 'maxlength' => '250']) }}
            @include('admin.partials._help_block',['field' => 'metadescription'])
        </div>


    </div>
</div>