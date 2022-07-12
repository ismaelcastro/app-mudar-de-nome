<div class="row">
    <div class="col-sm-8">        
        
        <div class="form-group">
            {{ Form::label('role_id', 'Cargo') }}
            {{
                Form::select('role_id', $roles_list,null,['class' => $errors->has('role_id') ?  'js-basic-multiple form-control is-invalid' : 'js-basic-multiple form-control', 'multiple' => 'multiple', 'name' => 'role_id[]'])
            }}
            @include('admin.partials._help_block',['field' => 'role_id'])
        </div>

        <div class="form-group">
            {{ Form::label('occupation_area', 'Assuntos Permitidos') }}
            {{
                Form::select('occupation_area', [''=>'Todos']+$occupation_area_list,null,['class' => $errors->has('occupation_area') ?  'form-control is-invalid' : 'form-control'])
            }}
            @include('admin.partials._help_block',['field' => 'occupation_area'])
        </div>
        
        
        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, ['class' => $errors->has('name') ?  'form-control is-invalid' : 'form-control']) }}
            @include('admin.partials._help_block',['field' => 'name'])
        </div>
        
        <div class="form-group">
            {{ Form::label('email', 'E-mail') }}
            {{ Form::email('email', null, ['class' => $errors->has('email') ?  'form-control is-invalid' : 'form-control']) }}
            @include('admin.partials._help_block',['field' => 'email'])
        </div>
        
        <div class="form-group">
            {{ Form::label('password', 'Senha') }}
            {{ Form::password('password', ['class' => $errors->has('password') ?  'form-control is-invalid' : 'form-control']) }}
            @include('admin.partials._help_block',['field' => 'password'])
        </div>
        
        <div class="form-group">
            {{ Form::label('image', 'Foto') }}
            <div class="input-group">        
                {{ Form::text('image', null, ['class' => $errors->has('image') ?  'form-control is-invalid' : 'form-control']) }}
                <span class="input-group-btn">
                    <div class="btn btn-success btn-file">
                        <i class="fa fa-paperclip"></i>
                        Upload
                        {{ Form::file('attachment', ['onchange' => 'upload(this,"'.route('upload-image').'","image", "users");']) }}
                    </div>
                </span>
                @include('admin.partials._help_block',['field' => 'image'])
            </div>
        </div>


    </div>
</div>