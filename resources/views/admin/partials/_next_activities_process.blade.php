<div class="box-sidebar action-hover">
    <h6>
        <svg width="28px" height="28px" viewBox="0 0 32 32">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect fill="#D5AC29" x="2" y="7" width="28" height="22" rx="3"></rect>
                <rect fill="#D5AC29" x="6" y="4" width="2.5" height="6" rx="1.25"></rect>
                <rect fill="#D5AC29" x="11.8333333" y="4" width="2.5" height="6" rx="1.25"></rect>
                <rect fill="#D5AC29" x="17.6666667" y="4" width="2.5" height="6" rx="1.25"></rect>
                <rect fill="#D5AC29" x="23.5" y="4" width="2.5" height="6" rx="1.25"></rect>
                <polyline stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" points="10 17.502821 12.8357897 21.502821 21.7230883 15"></polyline>
            </g>
        </svg>
        <strong>Próximas atividades</strong> 

        <span class="action-box pull-right">

            <div class="dropdown-tmp-icon" tabindex="0">
                <div class="dropdown">
                    <a href="javascript:void(0)" class="nix-padding-left_5" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-plus" tooltip="Clique para adicionar" tooltip-placement="right" tooltip-append-to-body="true"></i>
                    </a>
                    <div class="animated fadeIn dropdown-menu dropdown-menu-right dropdown-notfication" style="position: absolute; width:180px; left: 0px; transform: translate3d(-143px, 17px, 0px); top: 0px; will-change: transform;" x-placement="bottom-end">
                        <div class="dropdown-content-body">                        
                            <div class="col-sm-12">
                                <ul class="navbar-nav">
                                    <li class="dropdown-tmp-item">
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#calltask-Modal">
                                            <span class="text-link ng-binding">Nova tarefa</span>
                                        </a>
                                    </li>
                                    <li class="dropdown-tmp-item">
                                        {{ Form::open(['route' => ['admin.tasks.store'], 'id' => 'form-task-cobrar-documentos' ]) }}
                                            {{ Form::hidden('call_id', $call->id) }}
                                            {{ Form::hidden('description', 'Cobrar documentos') }}
                                            {{ Form::hidden('date', date('Y-m-d H:i:s')) }}
                                            {{ Form::hidden('task_list_id', 2) }}
                                            {{ Form::hidden('users', Auth::user()->id,['name' => 'users[]']) }}
                                            {{ Form::hidden('priority', 'normal') }}
                                            <a href="javascript:void(0);" onclick="document.getElementById('form-task-cobrar-documentos').submit();">
                                                <span class="text-link ng-binding">Cobrar documentos</span>
                                            </a>
                                        {{ Form::close() }}
                                    </li>
                                    <li class="dropdown-tmp-item">
                                        {{ Form::open(['route' => ['admin.tasks.store'], 'id' => 'form-task-comunicar-parecer' ]) }}
                                            {{ Form::hidden('call_id', $call->id) }}
                                            {{ Form::hidden('description', 'Comunicar parecer') }}
                                            {{ Form::hidden('date', date('Y-m-d H:i:s')) }}
                                            {{ Form::hidden('task_list_id', 13) }}
                                            {{ Form::hidden('users', Auth::user()->id,['name' => 'users[]']) }}
                                            {{ Form::hidden('priority', 'normal') }}
                                            <a href="javascript:void(0);" onclick="document.getElementById('form-task-comunicar-parecer').submit();">
                                                <span class="text-link ng-binding">Comunicar parecer</span>
                                            </a>
                                        {{ Form::close() }}
                                    </li>
                                    <li class="dropdown-tmp-item">
                                        {{ Form::open(['route' => ['admin.tasks.store'], 'id' => 'form-task-encaminhar-mandado' ]) }}
                                            {{ Form::hidden('call_id', $call->id) }}
                                            {{ Form::hidden('description', 'Encaminhar mandado') }}
                                            {{ Form::hidden('date', date('Y-m-d H:i:s')) }}
                                            {{ Form::hidden('task_list_id', 14) }}
                                            {{ Form::hidden('users', Auth::user()->id,['name' => 'users[]']) }}
                                            {{ Form::hidden('priority', 'normal') }}
                                            <a href="javascript:void(0);" onclick="document.getElementById('form-task-encaminhar-mandado').submit();">
                                                <span class="text-link ng-binding">Encaminhar mandado</span>
                                            </a>
                                        {{ Form::close() }}
                                    </li>
                                    <li class="dropdown-tmp-item">
                                        {{ Form::open(['route' => ['admin.tasks.store'], 'id' => 'form-task-comunicar-sentenca' ]) }}
                                            {{ Form::hidden('call_id', $call->id) }}
                                            {{ Form::hidden('description', 'Comunicar sentença') }}
                                            {{ Form::hidden('date', date('Y-m-d H:i:s')) }}
                                            {{ Form::hidden('task_list_id', 15) }}
                                            {{ Form::hidden('users', Auth::user()->id,['name' => 'users[]']) }}
                                            {{ Form::hidden('priority', 'normal') }}
                                            <a href="javascript:void(0);" onclick="document.getElementById('form-task-comunicar-sentenca').submit();">                                                
                                                <span class="text-link ng-binding">Comunicar sentença</span>
                                            </a>
                                        {{ Form::close() }}
                                    </li>
                                    <li class="dropdown-tmp-item ng-scope">
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#callevent-Modal">
                                            <span class="text-link ng-binding">Novo evento</span>
                                        </a>
                                    </li>
                                    <li class="dropdown-tmp-item ng-scope">
                                        {{ Form::open(['route' => ['admin.events.store'], 'id' => 'form-event-reuniao' ]) }}
                                            {{ Form::hidden('call_id', $call->id) }}
                                            {{ Form::hidden('name', 'Reunião') }}
                                            {{ Form::hidden('description', 'Reunião') }}
                                            {{ Form::hidden('date_start', date('Y-m-d')) }}
                                            {{ Form::hidden('time_start', date('H:i:s')) }}
                                            {{ Form::hidden('date_finish', date('Y-m-d')) }}
                                            {{ Form::hidden('time_finish', date('H:i:s')) }}
                                            {{ Form::hidden('users', Auth::user()->id,['name' => 'users[]']) }}
                                            {{ Form::hidden('alert', '30') }}
                                            <a href="javascript:void(0);" onclick="document.getElementById('form-event-reuniao').submit();">
                                                <span class="text-link ng-binding">Reunião</span>
                                            </a>
                                        {{ Form::close() }}
                                    </li>
                                    <li class="dropdown-tmp-item ng-scope">
                                        {{ Form::open(['route' => ['admin.events.store'], 'id' => 'form-event-video-conferencia' ]) }}
                                            {{ Form::hidden('call_id', $call->id) }}
                                            {{ Form::hidden('name', 'Vídeo conferência') }}
                                            {{ Form::hidden('description', 'Vídeo conferência') }}
                                            {{ Form::hidden('date_start', date('Y-m-d')) }}
                                            {{ Form::hidden('time_start', date('H:i:s')) }}
                                            {{ Form::hidden('date_finish', date('Y-m-d')) }}
                                            {{ Form::hidden('time_finish', date('H:i:s')) }}
                                            {{ Form::hidden('users', Auth::user()->id,['name' => 'users[]']) }}
                                            {{ Form::hidden('alert', '30') }}
                                            <a href="javascript:void(0);" onclick="document.getElementById('form-event-video-conferencia').submit();">
                                                <span class="text-link ng-binding">Vídeo conferência</span>
                                            </a>
                                        {{ Form::close() }}
                                    </li>
                                    <li class="dropdown-tmp-item ng-scope">
                                        {{ Form::open(['route' => ['admin.events.store'], 'id' => 'form-event-call' ]) }}
                                            {{ Form::hidden('call_id', $call->id) }}
                                            {{ Form::hidden('name', 'Call') }}
                                            {{ Form::hidden('description', 'Call') }}
                                            {{ Form::hidden('date_start', date('Y-m-d')) }}
                                            {{ Form::hidden('time_start', date('H:i:s')) }}
                                            {{ Form::hidden('date_finish', date('Y-m-d')) }}
                                            {{ Form::hidden('time_finish', date('H:i:s')) }}
                                            {{ Form::hidden('users', Auth::user()->id,['name' => 'users[]']) }}
                                            {{ Form::hidden('alert', '30') }}
                                            <a href="javascript:void(0);" onclick="document.getElementById('form-event-call').submit();">
                                                <span class="text-link ng-binding">Call</span>
                                            </a>
                                        {{ Form::close() }}
                                    </li>
                                </ul>
                            </div>                        
                        </div>
                    </div>

                    <a href="javascript:void(0);" class="nix-padding-left_5">
                        <i class="fa fa-external-link-square css-8wh3uq-IconComponent e11c20nv0"></i>
                    </a>
                </div>
            </div>

        </span>
    </h6>
    <ul>
        @foreach ($call->task->where('status', '<>', 'close') as $task)
        <li class="list_task">
            <a href="#ModalTaskEdit{{$task->id}}" data-toggle="modal"> 
                <div class="row">
                    <div class="list_task_title col-sm-2">
                        TAREFA
                    </div>
                    <div class="list_task_content col-sm-10">
                        {{ $task->description }}
                        <div>{!! $task->date_br !!}</div>
                    </div>  
                </div>                                               
            </a>
            @include('admin.partials._modal_task')
        </li>
        @endforeach

        @foreach ($call->event as $event)
        <li class="list_event">
            <a href="#ModalEventEdit{{$event->id}}" data-toggle="modal"> 
                <div class="row">
                    <div class="list_event_title col-sm-2">
                        EVENTO
                    </div>
                    <div class="list_event_content col-sm-10">
                        {{ $event->name }}
                        <div>{!! $event->date_start_br !!}</div>
                    </div>  
                </div>                                               
            </a>
        </li>
        @endforeach
    </ul>
</div>