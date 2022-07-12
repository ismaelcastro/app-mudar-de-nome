<div class="modal fade" id="add-cliente" tabindex="-1" role="dialog">
    {{ Form::open(['route' => 'admin.clients.store', 'onsubmit' => 'return saveClient(this); return false;' ]) }}
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Adicionar Cliente</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('name', 'Nome') }}
                            {{ Form::text('name', null, ['class' => $errors->has('name') ?  'form-control is-invalid' : 'form-control']) }}
                            @include('admin.partials._help_block',['field' => 'name'])
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('nickname', 'Apelido') }}
                            {{ Form::text('nickname', null, ['class' => $errors->has('nickname') ?  'form-control is-invalid' : 'form-control']) }}
                            @include('admin.partials._help_block',['field' => 'nickname'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        {{ Form::label('type_enum', 'Tipo de telefone') }}
                        {{
                            Form::select('type_enum', $type_enum,null,['class' => $errors->has('type_enum') ?  'form-control is-invalid' : 'form-control'])
                        }}
                        @include('admin.partials._help_block',['field' => 'type_enum'])
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            {{ Form::label('phone', 'Telefone') }}
                            {{ Form::text('phone', null, ['class' => $errors->has('phone') ?  'form-control is-invalid sp_celphones' : 'form-control sp_celphones']) }}
                            @include('admin.partials._help_block',['field' => 'phone'])
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            {{ Form::label('operator', 'Operadora') }}
                            {{ Form::text('operator', null, ['class' => $errors->has('operator') ?  'form-control is-invalid' : 'form-control']) }}
                            @include('admin.partials._help_block',['field' => 'operator'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        {{ Form::label('email_type', 'Tipo de e-mail') }}
                        {{
                            Form::select('email_type', $type_email,null,['class' => $errors->has('email_type') ?  'form-control is-invalid' : 'form-control'])
                        }}
                        @include('admin.partials._help_block',['field' => 'email_type'])
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            {{ Form::label('email', 'E-mail') }}
                            {{ Form::email('email', null, ['class' => $errors->has('email') ?  'form-control is-invalid' : 'form-control']) }}
                            @include('admin.partials._help_block',['field' => 'email'])
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light ">Criar</button>
            </div>
        </div>
    </div>
    {{ Form::close() }}
</div>