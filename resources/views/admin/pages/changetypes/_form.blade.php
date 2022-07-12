<div class="row">
    <div class="col-sm-8">
        <div class="form-group">
            {{ Form::label('name', 'Título') }}
            {{ Form::text('name', null, ['class' => $errors->has('name') ?  'form-control is-invalid' : 'form-control']) }}
            @include('admin.partials._help_block',['field' => 'name'])
        </div>
    </div>
</div>