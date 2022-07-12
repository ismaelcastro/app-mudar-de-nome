<div class="modal fade" id="calltask-Modal" tabindex="-1" role="dialog">
    {{ Form::open(['route' => ['admin.tasks.store'] ]) }}
    {{ Form::hidden('call_id', $call->id) }}
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Adicionar Tarefa</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::label('description', 'Descrição da tarefa') }} <span class="text-danger">*</span>
                            {{ Form::textarea('description', null, ['class' => $errors->has('description') ?  'form-control is-invalid' : 'form-control']) }}
                            @include('admin.partials._help_block',['field' => 'description'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('date', 'Data') }}
                            
                            {{ Form::input('dateTime-local', 'date', null, array('class' => $errors->has('date') ?  'form-control is-invalid' : 'form-control', 'type' => 'datetime-local')) }}
                            @include('admin.partials._help_block',['field' => 'date'])
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div id="box-list">
                                {{ Form::label('task_list_id', 'Lista de tarefas') }} <code>*</code>
                                {{
                                    Form::select('task_list_id', $task_list,null,['class' => $errors->has('task_list_id') ?  'form-control is-invalid' : 'form-control'])
                                }}
                            </div>                            
                            <a href="javascript:void(0);" href="javascript:void(0);" data-toggle="modal" data-target="#add-list">adicionar nova lista</a>
                            @include('admin.partials._help_block',['field' => 'task_list_id'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('users', 'Responsável') }} <code>*</code>
                            {{
                                Form::select('users', $usersadm,null,['class' => $errors->has('users') ?  'width100 js-basic-multiple form-control is-invalid' : 'width100 js-basic-multiple form-control', 'multiple' => 'multiple', 'name' => 'users[]'])
                            }}
                            @include('admin.partials._help_block',['field' => 'users'])
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('priority', 'Prioridade') }} <code>*</code>
                            {{
                                Form::select('priority', $priority_list,null,['class' => $errors->has('priority') ?  'width100 form-control is-invalid' : 'width100 form-control'])
                            }}
                            @include('admin.partials._help_block',['field' => 'priority'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('address', 'Endereço') }}
                            {{ Form::text('address', null, ['class' => $errors->has('address') ?  'form-control is-invalid' : 'form-control']) }}
                            @include('admin.partials._help_block',['field' => 'address'])
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('attachment', 'Anexar Arquivo') }}
                            <div class="input-group">        
                                {{ Form::text('attachment', null, ['class' => $errors->has('attachment') ?  'form-control is-invalid' : 'form-control']) }}
                                <span class="input-group-btn">
                                    <div class="btn btn-success btn-file">
                                        <i class="fa fa-paperclip"></i>
                                        Upload
                                        {{ Form::file('attachment', ['onchange' => 'upload(this,"'.route('upload-file').'","attachment");']) }}
                                    </div>
                                </span>
                                @include('admin.partials._help_block',['field' => 'attachment'])
                            </div>
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