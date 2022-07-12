<div class="row">
    <div class="col-sm-8">         
        
        <div class="form-group">
            {{ Form::label('label', 'Título') }}
            {{ Form::text('label', null, ['class' => $errors->has('label') ?  'form-control is-invalid' : 'form-control']) }}
            @include('admin.partials._help_block',['field' => 'label'])
        </div>

        <div class="form-group">
            {{ Form::label('name', 'Tag') }}
            {{ Form::text('name', null, ['class' => $errors->has('name') ?  'form-control is-invalid' : 'form-control']) }}
            @include('admin.partials._help_block',['field' => 'name'])
        </div>
        
        <div class="form-group">
            {{ Form::label('permission_id', 'Permissões') }}
            {{
                Form::select('permission_id', $permissions_list,null,['class' => $errors->has('permission_id') ?  'js-basic-multiple form-control is-invalid' : 'js-basic-multiple form-control', 'multiple' => 'multiple', 'name' => 'permission_id[]'])
            }}
            @include('admin.partials._help_block',['field' => 'permission_id'])
        </div>

    </div>
</div>