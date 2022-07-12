<div class="row">
    <div class="col-sm-8">
        <div class="form-group">
            {{ Form::label('name', 'Título') }}
            {{ Form::text('name', null, ['class' => $errors->has('name') ?  'form-control is-invalid' : 'form-control']) }}
            @include('admin.partials._help_block',['field' => 'name'])
        </div>
        <div class="form-group">
            {{ Form::label('color', 'Cor') }}
            {{ Form::color('color', null, ['class' => $errors->has('color') ?  'form-control is-invalid field-color' : 'form-control field-color', 'data-control' => 'hue']) }}
            @include('admin.partials._help_block',['field' => 'color'])
        </div>
    </div>
</div>