<div class="btn-border-bottom @if(!isset($nopd)) pt-5 @endif mb-3 fs-13">
    <div @if(!isset($nopd)) class="p-t-15" @endif>
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
        @if(!is_null($call->reason))
        <div class="row pb-2">
            <div class="col-sm-4 text-right">
                <strong>MOTIVO</strong>
            </div>
            @if(isset($nopd) && $nopd == 'yes')
                <div class="col-sm-8 text-left" >
                    <button class="btn btn-mini text-white" type="button" style="background-color:{{ $call->reason->color }} !important; border-color:{{ $call->reason->color }} !important;">
                        {{$call->reason->name}}
                    </button>
                </div>
            @else
                <div class="col-sm-8 text-left">
                    <div class="dropdown-secondary dropdown">
                        <button class="btn btn-mini dropdown-toggle waves-effect waves-light text-white" type="button"
                                id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                @if($call->reason->color) style="background-color:{{ $call->reason->color }} !important; border-color:{{ $call->reason->color }} !important; " @endif >{{$call->reason->name}}</button>
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
            @endif
        </div>
        @endif
        

        <div class="row pb-2">
            <div class="col-sm-4 text-right text-uppercase">
                <strong>Documentos Anexados</strong>
            </div>
            <div class="col-sm-8 text-left">
                <div class="progress rounded-round" style="max-width:150px;">
                    <div class="progress-bar2 bg-warning"
                         style="width: {{$call->progress}}% ;background-color:{{$call->progresscolor}} !important">
                        <span>{{$call->progress}}%</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pb-2">
            <div class="col-sm-4 text-right">
                <strong>ASSINADO EM</strong>
            </div>
            <div class="col-sm-8 text-left">
                {{$call->created_date}} {{$call->created_hours}}
            </div>
        </div>

        <div class="row pb-2">
            <div class="col-sm-4 text-right">
                <strong>ESTADO CIVIL</strong>
            </div>
            <div class="col-sm-8 text-left">
                {{$requerente->marital_status}}

                @if($requerente->marital_status == "casado")
                    @foreach($call->Affiliations as $affiliation)
                        @if($affiliation->type == "spouse")
                            com
                            <a class="text-primary" href="javascript:void(0);" data-toggle="modal"
                               data-target="#fixed-cliente{{$affiliation->client_id}}">
                                {{ \App\Helpers\Functions::firstName($affiliation->client->name) }}
                            </a>
                            @include('admin.pages.clients._fixed_modal', ['client'=> $affiliation->client])
                        @endif
                    @endforeach
                @endif
            </div>
        </div>

        <div class="row pb-2">
            <div class="col-sm-4 text-right">
                <strong>MAIOR DE IDADE</strong>
            </div>
            <div class="col-sm-8 text-left">
                @php
                    $idade = \App\Helpers\Functions::calcularIdade($requerente->date_birth);
                @endphp
                <strong>@if($idade > 17  ) Sim @else Não @endif</strong>
                - {{date('d/m/Y',strtotime($requerente->date_birth))}} - {{$idade}}  anos
            </div>
        </div>

        <div class="row pb-2">
            <div class="col-sm-4 text-right">
                <strong>DESCENDENTES</strong>
            </div>
            <div class="col-sm-8 text-left">
                @foreach($call->Affiliations as $affiliation)
                    @if($affiliation->type == "descendant")
                        <a class="text-primary" href="javascript:void(0);" data-toggle="modal"
                           data-target="#fixed-cliente{{$affiliation->client_id}}">
                            {{ \App\Helpers\Functions::firstName($affiliation->client->name) }},
                        </a>
                        @include('admin.pages.clients._fixed_modal', ['client'=>$affiliation->client])
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>