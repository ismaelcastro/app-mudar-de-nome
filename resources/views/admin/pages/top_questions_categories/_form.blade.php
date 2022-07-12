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
                    {{ Form::label('description', 'Descrição') }}
                    {{ Form::text('description', null, ['class' => $errors->has('description') ?  'form-control is-invalid' : 'form-control']) }}
                    @include('admin.partials._help_block',['field' => 'description'])
                </div>
            </div>
        </div>
    </div>
</div>