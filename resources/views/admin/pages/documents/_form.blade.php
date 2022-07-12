<div class="row">
    <div class="col-sm-8">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('document_category_id', 'Categoria') }}
                    {{
                        Form::select('document_category_id', $category_list,null,['class' => $errors->has('document_category_id') ?  'form-control is-invalid' : 'form-control'])
                    }}
                    @include('admin.partials._help_block',['field' => 'document_category_id'])
                    <a href="javascript:void(0)" class="text-info" data-toggle="modal" data-target="#category-Modal">Adicionar categoria</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('name', 'Título') }}
                    {{ Form::text('name', null, ['class' => $errors->has('name') ?  'form-control is-invalid' : 'form-control']) }}
                    @include('admin.partials._help_block',['field' => 'name'])
                </div>
            </div>  
        </div>


        <div id="step_by_step_clone">
            @if (isset($document->step_by_step) && is_array($document->step_by_step))
                @foreach ($document->step_by_step as $item)
                <div class="toclone w-100 row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            {{ Form::label('step_by_step', 'Passo a Passo') }}
                            {{ Form::text('step_by_step', $item, ['class' => $errors->has('step_by_step') ?  'form-control is-invalid' : 'form-control', 'name' => 'step_by_step[]']) }}
                            @include('admin.partials._help_block',['field' => 'step_by_step'])
                        </div>
                    </div>
                
                    <a href="#" class="clone pt-4">
                        <i class="fa fa-clone"></i>
                    </a>
                    <a href="#" class="delete pl-4 pt-4">
                        <i class="fa fa-trash"></i>
                    </a>                
                </div>
                @endforeach
            @else
            <div class="toclone w-100 row">
                <div class="col-sm-10">
                    <div class="form-group">
                        {{ Form::label('step_by_step', 'Passo a Passo') }}
                        {{ Form::text('step_by_step', null, ['class' => $errors->has('step_by_step') ?  'form-control is-invalid' : 'form-control', 'name' => 'step_by_step[]']) }}
                        @include('admin.partials._help_block',['field' => 'step_by_step'])
                    </div>
                </div>
               
                <a href="#" class="clone pt-4">
                    <i class="fa fa-clone"></i>
                </a>
                <a href="#" class="delete pl-4 pt-4">
                    <i class="fa fa-trash"></i>
                </a>                
            </div>
            @endif
        </div>

        
        <div class="form-group">
            {{ Form::label('info', 'Info') }}
            {{ Form::text('info', null, ['class' => $errors->has('info') ?  'form-control is-invalid' : 'form-control']) }}
            @include('admin.partials._help_block',['field' => 'info'])
        </div>
        
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('type', 'Tipo') }} <code>.doc|.docx|.pdf</code>
                    {{
                        Form::select('type', $type_list,null,['class' => $errors->has('type') ?  'form-control is-invalid' : 'form-control', 'onchange' => "openblocks_docs(this.value);"])
                    }}
                    @include('admin.partials._help_block',['field' => 'type'])
                </div>
            </div> 
            <div class="col-sm-6 openthis">
                <div class="form-group">
                    {{ Form::label('file', 'Anexar Arquivo') }}
                    <div class="input-group">        
                        {{ Form::text('file', null, ['class' => $errors->has('file') ?  'form-control is-invalid' : 'form-control']) }}
                        <span class="input-group-btn">
                            <div class="btn btn-success btn-file">
                                <i class="fa fa-paperclip"></i>
                                Upload
                                {{ Form::file('attachment', ['onchange' => 'upload(this,"'.route('upload-file').'","file");']) }}
                            </div>
                        </span>
                        @include('admin.partials._help_block',['field' => 'file'])
                    </div>
                </div>
            </div>
            <div class="col-sm-6 openthisprice">
                <div class="form-group">
                    {{ Form::label('price', 'Valor') }}
                    {{ Form::text('price', null, ['class' => $errors->has('price') ?  'form-control is-invalid' : 'form-control', 'id' => 'price', 'step'=>'any']) }}
                    @include('admin.partials._help_block',['field' => 'price'])
                </div>
            </div>
        </div>        
        <div class="form-group openthis">
            {{ Form::label('description', 'Gerar arquivo') }}
            {{ Form::textarea('description', null, ['class' => $errors->has('description') ?  'form-control is-invalid' : 'form-control']) }}
            @include('admin.partials._help_block',['field' => 'description'])
        </div>
        <div class="open_d4sign">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        {{ Form::label('token_d4sign', 'Token') }}
                        {{ Form::text('token_d4sign', null, ['class' => $errors->has('token_d4sign') ?  'form-control is-invalid' : 'form-control']) }}
                        @include('admin.partials._help_block',['field' => 'token_d4sign'])
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {{ Form::label('template_d4sign', 'Template') }}
                        {{ Form::text('template_d4sign', null, ['class' => $errors->has('template_d4sign') ?  'form-control is-invalid' : 'form-control']) }}
                        @include('admin.partials._help_block',['field' => 'template_d4sign'])
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        {{ Form::label('uuid_cofre', 'UUID Cofre') }}
                        {{ Form::text('uuid_cofre', null, ['class' => $errors->has('uuid_cofre') ?  'form-control is-invalid' : 'form-control']) }}
                        @include('admin.partials._help_block',['field' => 'uuid_cofre'])
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        {{ Form::label('uuid_pasta', 'UUID Pasta') }}
                        {{ Form::text('uuid_pasta', null, ['class' => $errors->has('uuid_pasta') ?  'form-control is-invalid' : 'form-control']) }}
                        @include('admin.partials._help_block',['field' => 'uuid_pasta'])
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        {{ Form::label('affiliation', 'Adicionar também na procuração') }}
                        {{Form::select('affiliation', $affiliation_list,null,['class' => $errors->has('affiliation') ?  'form-control is-invalid' : 'form-control'])}}
                        @include('admin.partials._help_block',['field' => 'affiliation'])
                    </div>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('subscription_info', 'Informações sobre como assinar') }}
                {{ Form::textarea('subscription_info', null, ['class' => $errors->has('subscription_info') ?  'form-control is-invalid' : 'form-control', 'style' => 'height:80px']) }}
                @include('admin.partials._help_block',['field' => 'subscription_info'])
            </div>
            <div class="form-group">
                {{ Form::label('subscription_info2', 'Informações sobre como assinar texto vermelho') }}
                {{ Form::textarea('subscription_info2', null, ['class' => $errors->has('subscription_info2') ?  'form-control is-invalid' : 'form-control', 'style' => 'height:80px']) }}
                @include('admin.partials._help_block',['field' => 'subscription_info2'])
            </div>
        </div>
    </div>
</div>

