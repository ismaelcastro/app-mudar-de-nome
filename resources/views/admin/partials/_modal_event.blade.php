<div class="modal fade" id="ModalEventEdit{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabelTaskEdit{{$event->id}}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="border-color: #02883c;">
            <div class="modal-header">                  
                
                <h5 class="modal-title pt-3" id="ModalLabelTaskEdit{{$event->id}}">
                    <div class="checkbox-fade pt-3 fade-in-primary d- pull-left">
                        {{ Form::model($event, ['route' => ['admin.tasks.update',$event->id], 'id' => 'formTask'.$event->id, 'method' => 'PUT' ]) }}
                        <label @if($event->status == 'close') class="disabled" @endif>
                            <input type="checkbox" name="status" id="status" @if($event->status == 'close') checked="checked" disabled="disabled" @endif onclick="document.getElementById('formTask{{$event->id}}').submit();" >
                            <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                        </label>  
                        {{ Form::close() }}
                    </div> 
                    <div class="pl-2 pt-3 pull-left">Evento</div>
                    
                </h5>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" style="white-space: normal;">
                <dl class="dl-horizontal row">
                    <dt class="col-sm-3">Título</dt>
                    <dd class="col-sm-9">{{$event->name}}</dd>
                </dl>
                <dl class="dl-horizontal row">
                    <dt class="col-sm-3">Descrição</dt>
                    <dd class="col-sm-9">{{$event->description}}</dd>
                </dl>
                <dl class="dl-horizontal row">
                    <dt class="col-sm-3">Data</dt>
                    <dd class="col-sm-9">{!! $event->date_start_br !!}</dd>
                </dl>

                <dl class="dl-horizontal row">
                    <dt class="col-sm-3">Responsável</dt>
                    <dd class="col-sm-9">
                        @foreach ($task->users_list() as $user)
                            <label class="label label-inverse-info-border">
                                {{$user->name}}
                            </label>                                                             
                        @endforeach
                    </dd>
                </dl>
            
            </div>
        </div>
    </div>
</div>