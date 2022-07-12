<div class="modal fade" id="callevent-Modal" tabindex="-1" role="dialog">
    {{ Form::open(['route' => ['admin.events.store'] ]) }}
    {{ Form::hidden('call_id', $call->id) }}
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Adicionar Evento</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::label('name', 'Título do evento') }}<span class="text-danger">*</span>
                            {{ Form::text('name', null, ['class' => $errors->has('name') ?  'form-control is-invalid' : 'form-control']) }}
                            @include('admin.partials._help_block',['field' => 'name'])
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('date_start', 'Data Inicio') }}<span class="text-danger">*</span>
                            {{ Form::date('date_start', null,['class' => $errors->has('date_start') ?  'form-control is-invalid' : 'form-control'])}}
                            @include('admin.partials._help_block',['field' => 'date_start'])
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('time_start', 'Hora') }}<span class="text-danger">*</span>
                            {{ Form::time('time_start', null,['class' => $errors->has('time_start') ?  'form-control is-invalid' : 'form-control'])}}
                            @include('admin.partials._help_block',['field' => 'time_start'])
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('date_finish', 'Data Final') }}<span class="text-danger">*</span>
                            {{ Form::date('date_finish', null,['class' => $errors->has('date_finish') ?  'form-control is-invalid' : 'form-control'])}}
                            @include('admin.partials._help_block',['field' => 'date_finish'])
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('time_finish', 'Hora') }}<span class="text-danger">*</span>
                            {{ Form::time('time_finish', null,['class' => $errors->has('time_finish') ?  'form-control is-invalid' : 'form-control'])}}
                            @include('admin.partials._help_block',['field' => 'time_finish'])
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('users', 'Responsável') }}<span class="text-danger">*</span>
                            {{
                                Form::select('users', $usersadm,null,['class' => $errors->has('users') ?  'js-basic-multiple form-control is-invalid' : 'js-basic-multiple form-control', 'multiple' => 'multiple', 'name' => 'users[]'])
                            }}
                            @include('admin.partials._help_block',['field' => 'users'])
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('alert', 'Alertar') }}<span class="text-danger">*</span>
                            {{
                                Form::select('alert', 
                                    [
                                        '15' => '15 Minutos antes',
                                        '30' => '30 Minutos antes',
                                        '60' => '1 hora antes',
                                        '90' => '1/5 horas antes',
                                        '120' => '2 horas antes',
                                        '180' => '3 horas antes',
                                        '240' => '4 horas antes'
                                    ],
                                    null,['class' => $errors->has('alert') ?  'js-example-basic-multiple form-control is-invalid' : 'js-example-basic-multiple form-control'])
                            }}
                            @include('admin.partials._help_block',['field' => 'alert'])
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::label('description', 'Descrição do evento') }}<span class="text-danger">*</span>
                            {{ Form::textarea('description', null, ['class' => $errors->has('description') ?  'form-control is-invalid' : 'form-control']) }}
                            @include('admin.partials._help_block',['field' => 'description'])
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