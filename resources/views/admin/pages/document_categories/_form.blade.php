<div class="row">
    <div class="col-sm-8">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('name', 'Título') }}
                    {{ Form::text('name', null, ['class' => $errors->has('name') ?  'form-control is-invalid' : 'form-control']) }}
                    @include('admin.partials._help_block',['field' => 'name'])
                </div>
            </div>
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

            
        </div>
        <div class="row">
            <div class="col-sm-2">
                <div class="form-group">
                    {{ Form::label('order', 'Ordem') }}
                    {{ Form::number('order', null, ['class' => $errors->has('order') ?  'form-control is-invalid' : 'form-control']) }}
                    @include('admin.partials._help_block',['field' => 'order'])
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    {{ Form::label('description', 'Descrição') }}
                    {{ Form::textarea('description', null, ['class' => $errors->has('description') ?  'form-control is-invalid' : 'form-control']) }}
                    @include('admin.partials._help_block',['field' => 'description'])
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <div class="checkbox-fade fade-in-primary d-">
                <label>
                    {{ Form::checkbox('forwardingagent', 1) }}
                    <span class="text-inverse">Habilitar serviço de despachante</span>
                </label>
            </div>
        </div>
        
        <div class="form-group">
            <div class="checkbox-fade fade-in-primary d-">
                <label>
                    {{ Form::checkbox('package', 1) }}
                    <span class="text-inverse">Habilitar documentos em pacote</span>
                </label>
            </div>
        </div>

        <div class="form-group">
            <div class="checkbox-fade fade-in-primary d-">
                <label>
                    {{ Form::checkbox('client_add', 1) }}
                    <span class="text-inverse">Permitir que o cliente adicione documentos</span>
                </label>
            </div>
        </div>
        <div class="form-group">
            <div class="checkbox-fade fade-in-primary d-">
                <label>
                    {{ Form::checkbox('by_contact', 1) }}
                    <span class="text-inverse">Apresentar esta categoria para cada contato relacionado ao atendimento</span>
                </label>
            </div>
        </div>

    </div>
</div>