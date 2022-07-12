<div class="row">
    <div class="col-sm-8">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('guide_category_id', 'Categoria') }}
                    {{
                        Form::select('guide_category_id', $category_list,null,['class' => $errors->has('guide_category_id') ?  'form-control is-invalid' : 'form-control'])
                    }}
                    @include('admin.partials._help_block',['field' => 'guide_category_id'])
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
        
        <div class="form-group">
            {{ Form::label('info', 'Info') }}
            {{ Form::text('info', null, ['class' => $errors->has('info') ?  'form-control is-invalid' : 'form-control']) }}
            @include('admin.partials._help_block',['field' => 'info'])
        </div>

        <div id="step_by_step_clone">
            @if (isset($guide->step_by_step) && is_array($guide->step_by_step))
                @foreach ($guide->step_by_step as $item)
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

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('type', 'Tipo') }} <code>.doc|.docx|.pdf</code>
                    {{
                        Form::select('type', $type_list,null,['class' => $errors->has('type') ?  'form-control is-invalid' : 'form-control', 'onchange' => "openblocks('.openthis', this.value, 'simple');"])
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
        </div>        
        <div class="form-group openthis">
            {{ Form::label('description', 'Gerar arquivo') }}
            {{ Form::textarea('description', null, ['class' => $errors->has('description') ?  'form-control is-invalid' : 'form-control']) }}
            @include('admin.partials._help_block',['field' => 'description'])
        </div>
    </div>
</div>

