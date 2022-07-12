<div class="modal fade" id="ModalTaskEdit{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabelTaskEdit{{$task->id}}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">                  
                
                <h5 class="modal-title pt-3" id="ModalLabelTaskEdit{{$task->id}}">
                    <div class="checkbox-fade pt-3 fade-in-primary d- pull-left">
                        {{ Form::model($task, ['route' => ['admin.tasks.update',$task->id], 'id' => 'formTask'.$task->id, 'method' => 'PUT' ]) }}
                        <label @if($task->status == 'close') class="disabled" @endif>
                            <input type="checkbox" name="status" id="status" @if($task->status == 'close') checked="checked" disabled="disabled" @endif onclick="document.getElementById('formTask{{$task->id}}').submit();" >
                        </label>  
                        {{ Form::close() }}
                    </div> 
                    <div class="pl-2 pt-3 pull-left">Tarefa</div>
                    
                </h5>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" style="white-space: normal;">
                <dl class="dl-horizontal row">
                    <dt class="col-sm-3">Descrição</dt>
                    <dd class="col-sm-9">{{$task->description}}</dd>
                </dl>
                <dl class="dl-horizontal row">
                    <dt class="col-sm-3">Data</dt>
                    <dd class="col-sm-9">{{$task->date}}</dd>
                </dl>
                <dl class="dl-horizontal row">
                    <dt class="col-sm-3">Lista</dt>
                    <dd class="col-sm-9">{{$task->task_list->name}}</dd>
                </dl>
                <dl class="dl-horizontal row">
                    <dt class="col-sm-3">Responsável</dt>
                    <dd class="col-sm-9">
                       
                        @foreach ($task->users_list() as $user)
                            <label class="label bg-secondary mr-2">{{$user->name}}</label>                                                             
                        @endforeach
                    </dd>
                </dl>
                <dl class="dl-horizontal row">
                    <dt class="col-sm-3">Prioridade</dt>
                    <dd class="col-sm-9">{{$task->priority}}</dd>
                </dl>
                @if($task->task_list->id == 10)
                @php
                    $dispatcher_s = $task->call->dispatchers()->first();
                @endphp
                    @if($dispatcher_s)
                    <dl class="dl-horizontal row">
                        <dt class="col-sm-3">Comprovante</dt>
                        <dd class="col-sm-9">
                            <a href="{{route('document_dispatche', ['dispatche' => $dispatcher_s->id])}}" style="background: transparent;border-left:0px solid transparent;">
                                <i class="fa fa-cloud-download mr-1" style="color:#d5ac29 !important; font-size: 22px;"></i>
                            </a>
                        </dd>
                    </dl>
                    @endif
                @else
                <dl class="dl-horizontal row">
                    <dt class="col-sm-3">Endereço</dt>
                    <dd class="col-sm-9">{{$task->address}}</dd>
                </dl>
                <dl class="dl-horizontal row">
                    <dt class="col-sm-3">Anexo</dt>
                    <dd class="col-sm-9">{{$task->attachment}}</dd>
                </dl>
                @endif
                <br />
                <h4 class="sub-title">Comentários</h4>





                @foreach ($task->task_register as $task_register)
                <div spacing="sm" class="em8fo940 css-13eurcz-CardComponent-style enzilrv0">
                    <div class="css-70qvj9 e1se5yzp0">
                        <label size="40" readonly="" class="css-ylsy7c e1se5yzp1">
                            <i class="fa-user-circle-o e1se5yzp2 css-12n7qx7-IconComponent e11c20nv0" ></i>
                        </label>
                    </div>
                    <div class="nix-margin-left_10">
                        <div class="nix-display_flex nix-margin-bottom_5">
                            <span transform="none" margin="sm" class="css-1ocm7rw-TextElement-textStyle efb112z0">
                                {{$task_register->user->name}}
                            </span>
                            <div data-testid="vertical-divider" class="css-ut5fli e1ovr2wm1"></div>
                            <span color="gray" transform="none" margin="sm" class="css-jfi7lr-TextElement-textStyle efb112z0">
                                {{$task_register->created_date}} às {{$task_register->created_hours}}
                            </span>
                        </div>
                        <p transform="none" margin="sm" class="css-130gn4p-TextElement-textStyle efb112z0" style="word-break: break-word;">
                            {{$task_register->description}}
                            <br>
                        </p>
                    </div>
                </div>
                @endforeach


                {{ Form::model($task, ['route' => ['admin.task_register.store',$task->id] ]) }}
                    <input type="hidden" name="call_id" value="{{$call->id}}">
                    <div class="input-group">                        
                        <input type="text" name="description" class="form-control" placeholder="Insira aqui as suas anotações referentes ao atendimento">
                        <button type="submit" class="nix-margin-top_10--xs css-5u68eg-ButtonComponent-style-style-style enilzg60">Comentar</button>                        
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>