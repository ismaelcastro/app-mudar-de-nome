<div class="btn-border-bottom pt-5 mb-3 fs-13">
    <div class="row">
        <div class="col-sm-12">
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

                <div class="row pb-2">
                    <div class="col-sm-4 text-right">
                        <strong>MOTIVO</strong>
                    </div>
                    <div class="col-sm-8 text-left">
                        <div class="dropdown-secondary dropdown">
                            <button class="btn btn-mini dropdown-toggle waves-effect waves-light text-white"
                                    type="button" id="dropdown1" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"
                                    @if(isset($call->reason->color)) style="background-color:{{ $call->reason->color }} !important; border-color:{{ $call->reason->color }} !important; " @endif >{{$call->reason->name ?? ''}}</button>
                            <div class="dropdown-menu" aria-labelledby="dropdown1" data-dropdown-in="fadeIn"
                                 data-dropdown-out="fadeOut">
                                @foreach ($reasons as $key => $value)
                                    <a class="dropdown-item waves-light waves-effect" href="javascript:void(0);"
                                       onclick="$('#reason_id').val('{{$key}}');$('#form-reason').attr('action', '{{ route('admin.calls.edit_ChangeReason', ['call' => $call->id]) }}'); swalConfirm('#form-reason', 'form')"><span
                                                class="point-marker bg-danger"></span>{{ $value }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row pb-2">
                    <div class="col-sm-4 text-right">
                        <strong>DISTRIBUÍDO EM</strong>
                    </div>
                    <div class="col-sm-8 text-left">
                        {{$call->distributed_date}}
                    </div>
                </div>

                <div class="row pb-2">
                    <div class="col-sm-4 text-right">
                        <strong>AÇÃO</strong>
                    </div>
                    <div class="col-sm-8 text-left">
                        Retificação de Registro Civil
                    </div>
                </div>

                <div class="row pb-2">
                    <div class="col-sm-4 text-right">
                        <strong>PROCESSO N</strong>
                    </div>
                    <div class="col-sm-8 text-left">
                        {{$call->process_number}}
                    </div>
                </div>

                <div class="row pb-2">
                    <div class="col-sm-4 text-right">
                        <strong>JUIZO</strong>
                    </div>
                    <div class="col-sm-8 text-left">
                        {{$call->judgment_number}} {{$call->judgment_stick}} {{$call->court_jurisdiction}}
                    </div>
                </div>

                <div class="row pb-2">
                    <div class="col-sm-4 text-right">
                        <strong>LINK DO TRIBUNAL</strong>
                    </div>
                    <div class="col-sm-8 text-left">
                        {{$call->link_in_court}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>