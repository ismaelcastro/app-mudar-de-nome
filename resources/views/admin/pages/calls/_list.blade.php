<div class="call-list">
    <div class="col-sm-5">
        <div class="call-line">
            <span class="fs-16">{{$call->id}}</span> - <a href="{{ route('admin.calls.show', ['call' => $call->id]) }}" class="text-primary">{{$call->title}}</a>
            <span class="btn btn-status" style="color: {{ $call_model::STATUS_COLOR[$call->status]}}; border:1px solid {{ $call_model::STATUS_COLOR[$call->status]}}">
                {{ $call_model::STATUS[$call->status]}}
            </span>
            <div class="stars stars-example-css">
                <select class="rating-star" name="rating" autocomplete="off" readonly="readonly" >
                    <option value=""></option>
                    <option value="1" @if ($call->stars == 1) selected="selected" @endif>1</option>
                    <option value="2" @if ($call->stars == 2) selected="selected" @endif>2</option>
                    <option value="3" @if ($call->stars == 3) selected="selected" @endif>3</option>
                    <option value="4" @if ($call->stars == 4) selected="selected" @endif>4</option>
                    <option value="5" @if ($call->stars == 5) selected="selected" @endif>5</option>
                </select>                                    
            </div>
        </div>
        <div class="call-line">
            <i class="fa fa-user" ></i> 
            <a href="javascript:void(0);" data-toggle="modal" data-target="#fixed-cliente{{$call->client->id}}">{{$call->client->name}}</a>            
        </div>
        <div class="call-line">

            @if(!is_null($call->caseaction))
            <div class="task-list-table d-inline-block">                    
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
            <div class="task-list-table d-inline-block">                    
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
            <div class="task-list-table d-inline-block">                    
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
        <a href="{{ route('admin.calls.show', ['call' => $call->id]) }}" class="text-primary">
            {{$call->created_date}}
        </a> às 
        <a href="{{ route('admin.calls.show', ['call' => $call->id]) }}" class="text-primary">
            {{$call->created_hours}}
        </a> | 
        @if ($call->source == 'google')
            <img src="/assets-adm/images/google-ads.png" alt="Google Ads" height="22" >
        @elseif($call->source == 'bing')
            <img src="/assets-adm/images/bing-ads.png" alt="Bing Ads" height="25" >
        @else
            {{$call->source}}
        @endif


    </div>
    <div class="col-sm-7">
        <div class="au-consulting-card__message pt-3">
            
            <consulting-notes-message summary="true" class="ng-isolate-scope">
                <div class="au-consulting-notes-message au-consulting-notes-message--summary">
                    <div class="au-consulting-notes-message__content">
                        <div class="au-consulting-notes-message__note ng-binding ng-scope">
                            {{$call->client->note}}
                        </div>
                    </div>

                    <div class="au-consulting-notes-message__info">
                        <div class="au-consulting-notes-message__owner">
                            <div class="au-consulting-notes-message__thumb ng-binding ng-scope">
                                {{$call->client->initialsname}}
                            </div>                            
                        </div>
                    </div>

                    <div class="au-consulting-notes-message__info" style="width: 200px;">

                        @include('admin.pages.calls._call_stages', ['stages' => $call->stage_call])

                    </div>
                </div>
            </consulting-notes-message>                                                    
        </div>
    </div>
</div>

@include('admin.pages.clients._fixed_modal', ['client'=>$call->client])