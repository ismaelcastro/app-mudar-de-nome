<div class="btn-border-bottom pt-2 mb-3 fs-13">

    
    <div class="p-t-15">
        @if ($call->rectifications()->count() > 0 )
            @foreach ($call->rectifications as $rectification)
                <div class="row pb-2">
                    <div class="col-sm-4 text-right">
                        <strong>NOME ATUAL</strong>
                    </div>
                    <div class="col-sm-8 text-left">
                        {{$rectification->currentname}}
                    </div>
                </div> 
                
                <div class="row pb-2">
                    <div class="col-sm-4 text-right">
                        <strong>NOME PRETENDIDO</strong>
                    </div>
                    <div class="col-sm-8 text-left">
                        {{$rectification->desiredname}}
                        
                    </div>
                </div>
            @endforeach            
        @else
            <div class="row pb-2">
                <div class="col-sm-4 text-right">
                    <strong>NOME ATUAL</strong>
                </div>
                <div class="col-sm-8 text-left">
                    {{$call->currentname}}
                </div>
            </div> 
            
            <div class="row pb-2">
                <div class="col-sm-4 text-right">
                    <strong>NOME PRETENDIDO</strong>
                </div>
                <div class="col-sm-8 text-left">
                    {{$call->desiredname}}
                    
                </div>
            </div>
        @endif
        
        @if (!is_null($call->caseaction))
        <div class="row pb-2">
            <div class="col-sm-4 text-right">
                <strong>MOTIVO</strong>
            </div>
            <div class="col-sm-8 text-left">
                <div class="row">

                    @if (!is_null($call->caseaction))
                    <div class="task-list-table f-left pr-2">                    
                        <div class="dropdown-secondary dropdown">
                            <button class="btn btn-default btn-mini dropdown-toggle waves-effect waves-light" type="button" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$call->caseaction}}</button>
                            <div class="dropdown-menu" aria-labelledby="dropdown1" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                @foreach ($case_action as $key => $value)
                                    <a class="dropdown-item waves-light waves-effect" href="javascript:void(0);" onclick="$('#caseaction').val('{{$key}}');$('#form-action').attr('action', '{{ route('admin.calls.edit_Changaction', ['call' => $call->id]) }}'); swalConfirm('#form-action', 'form')">
                                        <span class="point-marker bg-danger"></span>{{ $value }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(isset($call->changetype->name))
                    <div class="task-list-table f-left pr-2">
                        <div class="dropdown-secondary dropdown">
                            <button class="btn btn-default btn-mini dropdown-toggle waves-effect waves-light" type="button" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$call->changetype->name}}</button>
                            <div class="dropdown-menu" aria-labelledby="dropdown1" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                @foreach ($changes_type as $key => $value)
                                    <a class="dropdown-item waves-light waves-effect" href="javascript:void(0);" onclick="$('#changetype_id').val('{{$key}}');$('#form-changetype').attr('action', '{{ route('admin.calls.edit_Changetype', ['call' => $call->id]) }}'); swalConfirm('#form-changetype', 'form')" ><span class="point-marker bg-danger"></span>{{ $value }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(isset($call->reason->name))
                    <div class="task-list-table f-left pr-2">                  
                        <div class="dropdown-secondary dropdown">
                            <button class="btn btn-mini dropdown-toggle waves-effect waves-light text-white" type="button" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" @if($call->reason->color) style="background-color:{{ $call->reason->color }} !important; border-color:{{ $call->reason->color }} !important; " @endif >{{$call->reason->name}}</button>
                            <div class="dropdown-menu" aria-labelledby="dropdown1" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                @foreach ($reasons as $key => $value)
                                    <a class="dropdown-item waves-light waves-effect" href="javascript:void(0);" onclick="$('#reason_id').val('{{$key}}');$('#form-reason').attr('action', '{{ route('admin.calls.edit_ChangeReason', ['call' => $call->id]) }}'); swalConfirm('#form-reason', 'form')" ><span class="point-marker bg-danger"></span>{{ $value }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
        @endif

        @foreach ($call->tags as $tag)
            @if(!empty($tag->value))
            <div class="row pb-2">
                <div class="col-sm-4 text-right text-uppercase">
                    <strong>{{$tag_list[$tag->key]}}</strong>
                </div>
                <div class="col-sm-8 text-left">
                    {{$tag->value}}
                </div>
            </div>
            @endif
        @endforeach

        <div class="row pb-2">
            <div class="col-sm-4 text-right">
                <strong>CRIADO EM</strong>
            </div>
            <div class="col-sm-8 text-left">
                {{$call->created_date}} {{$call->created_hours}}
            </div>
        </div>  

        <div class="row pb-2">
            <div class="col-sm-4 text-right">
                <strong>ETAPA</strong>
            </div>
            <div class="col-sm-8 text-left">
                @include('admin.pages.calls._call_stages', ['stages' => $call->stage_call])
            </div>
        </div>
    </div>
        

</div>