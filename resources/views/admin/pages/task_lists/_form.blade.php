<div class="row">
    <div class="col-sm-8">        
        
        <div class="form-group">
            {{ Form::label('roles', 'Cargos') }}
            {{
                Form::select('roles', $roles_list,null,['class' => $errors->has('roles') ?  'js-basic-multiple form-control is-invalid' : 'js-basic-multiple form-control', 'multiple' => 'multiple', 'name' => 'roles[]'])
            }}
            @include('admin.partials._help_block',['field' => 'roles'])
        </div>
        
        <div class="form-group">
            {{ Form::label('name', 'Título') }}
            {{ Form::text('name', null, ['class' => $errors->has('name') ?  'form-control is-invalid' : 'form-control']) }}
            @include('admin.partials._help_block',['field' => 'name'])
        </div>


    </div>
</div>