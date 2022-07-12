@extends('admin.layout.app')

@section('content')
    <div class="card-border-primary">
        <div class="card-block mt-4">
            <div class="row">
                <div class="col-sm-8">
                    <div class="container-fluid">
                        <div class="mb-4">
                            <h1 class="h3 mb-0 text-gray-800 mb-4">{{$call->id}} - {{$call->title}} </h1>

                            <div class="row">
                                <div class="col-sm-12">
                                    <label size="70" class="css-1jlwb56 e1se5yzp1 mr-3 pull-left">
                                        <div id="box-imaguser">
                                            @if (is_null($call->client->image))
                                                <div id="box-image-profile" userid="{{$call->client->id}}">
                                                    <i class="fa-camera e1se5yzp2 css-bq3ljn-IconComponent e11c20nv0"></i>
                                                </div>
                                            @else
                                                <img src="{{ url("storage/clients/".$call->client->image) }}"
                                                     alt="{{$call->client->name}}" width="70" height="70">
                                            @endif
                                        </div>
                                        {{ Form::file('attachment', ['onchange' => 'upload_user(this,"'.route('upload-image').'","#box-imaguser", "clients", "'.$call->client->id.'");']) }}

                                        <input type="file" class="fileupload" id="1568279510490" s
                                               onchange="uploadProfile(this,/image.*/,'/panel-admin/upload/imagens');">
                                    </label>
                                    <div class="media-body pull-left call-detail">
                                        @include('admin.pages.clients._fixed_modal', ['client'=>$call->client])
                                        <h3 class="mb-0">
                                            @if (!is_null($call->client->treatment))
                                                <small>{{$call->client->treatment}}</small> @endif <a
                                                    href="javascript:void(0);" data-toggle="modal"
                                                    data-target="#fixed-cliente{{$call->client->id}}">{{ucwords(strtolower($call->client->name))}}</a>
                                            <span class="btn btn-status"
                                                  style="color: {{ $call_model::STATUS_COLOR[$call->status]}}; border:1px solid {{ $call_model::STATUS_COLOR[$call->status]}}">
                                            {{ $call_model::STATUS[$call->status]}}
                                        </span>
                                        </h3>
                                        <p class="mb-0 mt-2">
                                            <i class="fa fa-envelope"></i> E-mail: <a
                                                    href="mailto:{{$call->client->email}}">{{$call->client->email}}</a>
                                        </p>
                                        <p class="mb-0  mt-2">
                                            <i class="fa fa-phone"></i> Celular: <a
                                                    href="javascript:void(0);">{{$call->client->phone}}</a>
                                            <i class="fa fa fa-check text-success"></i>
                                        </p>
                                    </div>

                                    <div class="au-consulting-notes-header__options">
                                        <div class="au-consulting-notes-header__tools">
                                            <div class="pr-3">
                                                <a href="{{ url()->previous() }}" class="text-primary" title="Voltar">Voltar</a>
                                            </div>
                                            <div class="au-consulting-notes-header__important"
                                                 onclick="showTypeRegister('important');">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="-1 -1 22 30"
                                                     data-original-title="Filtrar registros importantes" title=""
                                                     data-placement="bottom" data-toggle="tooltip">
                                                    <path d="M20,26.83l-10-6.4L0,26.69V3C0,.65,1-.05,2.68,0H17.43C19.15,0,20,.93,20,3.13Z"></path>
                                                </svg>
                                            </div>

                                            <div class="dropdown">
                                                <a id="navbarellipsisDropdown" class="pl-2 btn-avanced2" href="#"
                                                   role="button" data-toggle="dropdown" aria-haspopup="true"
                                                   aria-expanded="false" v-pre>
                                                <span data-toggle="tooltip" data-placement="bottom" title="Adicionar">
                                                    <i class="fa fa-ellipsis-v fs-16 mt-1"></i>
                                                </span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right fs-13"
                                                     aria-labelledby="navbarellipsisDropdown">

                                                    @if ($access && isset($access->url))
                                                        <a class="dropdown-item"
                                                           href="{{$access->url}}"
                                                           target="_blank">
                                                            <i class="fa fa-fw fa-unlock-alt"></i> Acessar como cliente
                                                        </a>
                                                    @endif

                                                    @if ($call->stars >= 3 && !is_null($call->paymentform) && count($call->call_honorary) > 0 )
                                                        <a class="dropdown-item" href="javascript:void(0);">
                                                            <i class="fa fa-fw fa-file-o"></i> Enviar proposta
                                                        </a>
                                                    @endif
                                                    @can('edit_calls')
                                                    <a class="dropdown-item"
                                                       href="{{ route('admin.calls.edit', ['call' => $call->id]) }}">
                                                        <i class="fa fa-fw fa-pencil"></i> Editar atendimento
                                                    </a>
                                                    @endcan
                                                    <a class="dropdown-item" href="javascript:void(0);"
                                                       onclick="swalConfirm('{{ route('admin.calls.finish_call', ['call' => $call->id]) }}', 'link')" style="display: none">
                                                        <i class="fa fa-fw fa-check"></i> Encerrar atendimento
                                                    </a>
                                                    <a class="dropdown-item"
                                                       href="{{ route('admin.calls.change_case', ['call' => $call->id]) }}">
                                                        <i class="fa fa-fw fa-exchange"></i> Transformar em caso
                                                    </a>
                                                    <a class="dropdown-item" href="javascript:void(0);">
                                                        <i class="fa fa-fw fa-print"></i> Imprimir ficha
                                                    </a>
                                                    @can('delete_calls')
                                                    <a class="dropdown-item"
                                                       href="{{ route('admin.calls.destroy', ['call' => $call->id]) }}"
                                                       onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete_call').submit();}">
                                                        <i class="fa fa-fw fa-trash"></i> Excluir atendimento
                                                    </a>
                                                    {{ Form::open(['route' => ['admin.calls.destroy',$call->id], 'method' => 'DELETE', 'id' => 'form-delete_call' ]) }}
                                                    {{ Form::close() }}
                                                    @endcan
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @include('admin.partials._aba_call')
                        </div>
                    </div>

                    <div class="custom-tab-1 pt-5 page-show">
                        <ul class="nav nav-tabs mb-3" style="border-bottom: 1px solid #dee2e6;">
                            <li class="nav-item">
                                <a class="nav-link active show" data-toggle="tab" href="#info-info" id="info-case_aba">
                                    Informação
                                    <div class="slide"></div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#info-commnet" id="info-documentos_aba">
                                    Comentários
                                    <div class="slide"></div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#info-historic" id="info-guias_aba">
                                    Últimos Históricos
                                    <div class="slide"></div>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            {{-- Info --}}
                            <div class="position-relative tab-pane fade active show" id="info-info" role="tabpanel">
                                <div class="box-sidebar action-hover">
                                    <div class="card-header">
                                        <h5 class="mb-0" data-target="#collapseOne1" aria-expanded="true"
                                            aria-controls="collapseOne1">
                                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 viewBox="0 0 33.1 33.1" style="enable-background:new 0 0 33.1 33.1;"
                                                 xml:space="preserve" width="28px">
                                        <g>
                                            <path style="fill:#D5AC29;" d="M5.6,18.722c0,0.358,0.035,0.707,0.084,1.051C2.487,19.42,0,16.712,0,13.421v-2.212
                                            c0-3.531,2.862-6.393,6.393-6.393h11.824c2.797,0,5.168,1.799,6.036,4.301H12.994c-4.076,0-7.393,3.316-7.393,7.393L5.6,18.722z
                                            M33.1,27.082l-0.528,0.478c-0.523,0.474-1.341,0.724-2.365,0.724c-1.621,0-3.964-0.694-5.636-2.238H13.41
                                            c-3.802,0-6.894-3.092-6.894-6.893v-2.212c0-3.802,3.093-6.894,6.894-6.894h11.824c3.802,0,6.894,3.093,6.894,6.894v2.212
                                            c0,1.822-0.733,3.578-2.023,4.868c0.41,1.193,1.205,2.109,2.367,2.727L33.1,27.082z M12.722,16.636h9.942v-1.724h-9.942
                                            C12.722,14.912,12.722,16.636,12.722,16.636z M26.533,18.912H12.722v1.723h13.811V18.912z"/>
                                        </g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                    </svg>
                                            Informação
                                            <span class="action-box pull-right"></span>
                                        </h5>
                                    </div>

                                    <section class="au-consulting-notes__content">
                                        <div class="au-consulting-notes__history">
                                            @foreach ($call_registers2 as $call_register)
                                                <consulting-notes-message message="message" summary="false" id="0"
                                                                          class="ng-scope ng-isolate-scope">
                                                    <div class="au-consulting-notes-message mt-1 mb-4"
                                                         @if (!is_null($call_register->client_id)) style="opacity: 0.4;" @endif>
                                                        <div class="au-consulting-notes-message__content">
                                                            <div class="nix-display_flex middle-xs between-xs ng-scope">
                                                                <div class="nix-display_flex middle-xs ng-scope"
                                                                     title="" data-placement="bottom"
                                                                     data-toggle="tooltip"
                                                                     data-original-title=" Desmarcar anotação como importante ">
                                                                    {{ Form::open(['route' => ['admin.call_register.type',$call_register->id], 'id' => 'form-type'.$call_register->id ]) }}
                                                                    <div class="au-consulting-notes-message__important @if($call_register->type == 'important') au-consulting-notes-message__important--active @endif   ">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                             viewBox="-1 -1 22 30"
                                                                             tooltip="Marcar importante"
                                                                             tooltip-placement="bottom"
                                                                             tooltip-append-to-body="true">
                                                                            <path d="M20,26.83l-10-6.4L0,26.69V3C0,.65,1-.05,2.68,0H17.43C19.15,0,20,.93,20,3.13Z"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <input class="check-important" type="checkbox"
                                                                           name="type" id="type"
                                                                           @if($call_register->type == 'important') checked="checked"
                                                                           @endif onclick="document.getElementById('form-type{{$call_register->id}}').submit();">
                                                                    {{ Form::close() }}
                                                                </div>

                                                                @if (is_null($call_register->client_id))
                                                                    <div class="dropdown-edit-regist dropdown"
                                                                         ng-dropdown="" tabindex="0">
                                                                        <a href="javascript:void(0)"
                                                                           class="nix-padding-left_5"
                                                                           data-toggle="dropdown" aria-expanded="false">
                                                                            <i class="fa fa-ellipsis-v fa-lg font-tiny"
                                                                               tooltip="Ediar e Excluir"
                                                                               tooltip-placement="right"
                                                                               tooltip-append-to-body="true"></i>
                                                                        </a>
                                                                        <div class="animated fadeIn dropdown-menu dropdown-menu-right dropdown-notfication"
                                                                             style="left:-70px !important;">
                                                                            <div class="dropdown-content-body">
                                                                                <div class="col-sm-12">
                                                                                    <ul class="navbar-nav ml-auto">
                                                                                        <li class="dropdown-tmp-item">
                                                                                            <a href="javascript:void(0)"
                                                                                               onclick="habcampoRegister(this);"
                                                                                               class="text-primary fs-13">
                                                                                                <span class="text-link ng-binding">Editar</span>
                                                                                            </a>
                                                                                        </li>
                                                                                        <li class="dropdown-tmp-item ng-scope">
                                                                                            <a class="text-primary fs-13"
                                                                                               title="Excluir"
                                                                                               href="{{ route('admin.call_register.destroy', ['call_register' => $call_register->id]) }}"
                                                                                               onclick="event.preventDefault();if(confirm('Deseja excluir este registro?')){document.getElementById('form-delete_register{{$call_register->id}}').submit();}">
                                                                                                <span class="text-link ng-binding">Excluir</span>
                                                                                            </a>
                                                                                            {{ Form::open(['route' => ['admin.call_register.destroy',$call_register->id], 'method' => 'DELETE', 'id' => 'form-delete_register'.$call_register->id ]) }}
                                                                                            {{ Form::close() }}
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif


                                                            </div>
                                                            <div class="au-consulting-notes-message__note ng-binding ng-scope">{!! $call_register->description !!}</div>
                                                            <div class="au-consulting-notes-message__edit ng-hide">
                                                                {{ Form::model($call, ['route' => ['admin.call_register.update', $call_register->id, $call->id ] ]) }}
                                                                <div class="row" style="height:100%;">
                                                                    <div class="col-sm-12 pt-60">
                                                                        <textarea name="fildRegister" class="ng-binding"
                                                                                  style="height:100%; overflow-y: hidden;">{{$call_register->description}}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="au-consulting-notes-message__edit_btos">
                                                                    <div class="col-sm-12">
                                                                        <a href="javascript:void(0);"
                                                                           onclick="cancelcampoRegister(this);">Cancelar</a>
                                                                        &nbsp;
                                                                        <button type="submit"
                                                                                class="ga-button ga--is-primary">Salvar
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                {{ Form::close() }}
                                                            </div>
                                                            <au-loading-bar
                                                                    class="au-consulting-notes-message__loading ng-isolate-scope ng-hide">
                                                                <div class="au-loading-bar au-consulting-notes-message__loading"></div>
                                                            </au-loading-bar>
                                                        </div>
                                                        <div class="au-consulting-notes-message__info">
                                                            <div class="au-consulting-notes-message__owner">
                                                                <div class="au-consulting-notes-message__thumb ng-binding ng-scope">
                                                                    @if (isset($call_register->user->initialsname) && !is_null($call_register->user->initialsname) )
                                                                        {{$call_register->user->initialsname}}
                                                                    @elseif(isset($call_register->client->initialsname) && !is_null($call_register->client->initialsname))
                                                                        {{$call_register->client->initialsname}}
                                                                    @endif
                                                                </div>
                                                                <time class="au-consulting-notes-message__time ng-binding"
                                                                      datetime="">
                                                                    {{$call_register->created_date}}<br>
                                                                    {{$call_register->created_hours}}
                                                                </time>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </consulting-notes-message>
                                            @endforeach
                                        </div>
                                    </section>
                                </div>
                            </div>

                            {{-- Comments --}}
                            <div class="position-relative tab-pane fade" id="info-commnet" role="tabpanel">
                                <div class="box-sidebar action-hover">
                                    <div class="card-header">
                                        <h5 class="mb-0" data-target="#collapseOne1" aria-expanded="true"
                                            aria-controls="collapseOne1">
                                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 viewBox="0 0 33.1 33.1" style="enable-background:new 0 0 33.1 33.1;"
                                                 xml:space="preserve" width="28px">
                                        <g>
                                            <path style="fill:#D5AC29;" d="M5.6,18.722c0,0.358,0.035,0.707,0.084,1.051C2.487,19.42,0,16.712,0,13.421v-2.212
                                            c0-3.531,2.862-6.393,6.393-6.393h11.824c2.797,0,5.168,1.799,6.036,4.301H12.994c-4.076,0-7.393,3.316-7.393,7.393L5.6,18.722z
                                            M33.1,27.082l-0.528,0.478c-0.523,0.474-1.341,0.724-2.365,0.724c-1.621,0-3.964-0.694-5.636-2.238H13.41
                                            c-3.802,0-6.894-3.092-6.894-6.893v-2.212c0-3.802,3.093-6.894,6.894-6.894h11.824c3.802,0,6.894,3.093,6.894,6.894v2.212
                                            c0,1.822-0.733,3.578-2.023,4.868c0.41,1.193,1.205,2.109,2.367,2.727L33.1,27.082z M12.722,16.636h9.942v-1.724h-9.942
                                            C12.722,14.912,12.722,16.636,12.722,16.636z M26.533,18.912H12.722v1.723h13.811V18.912z"/>
                                        </g>
                                        <g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                                    </svg>
                                            Comentários
                                            <span class="action-box pull-right"></span>
                                        </h5>
                                    </div>
                                    <section class="au-consulting-notes__content">
                                        <div class="au-consulting-notes__history">
                                            @foreach ($call_registers as $call_register)
                                                <consulting-notes-message message="message" summary="false" id="0"
                                                                          class="ng-scope ng-isolate-scope">
                                                    <div class="au-consulting-notes-message mt-1 mb-4"
                                                         @if (!is_null($call_register->client_id)) style="opacity: 0.4;" @endif>
                                                        <div class="au-consulting-notes-message__content">
                                                            <div class="nix-display_flex middle-xs between-xs ng-scope">
                                                                <div class="nix-display_flex middle-xs ng-scope"
                                                                     title="" data-placement="bottom"
                                                                     data-toggle="tooltip"
                                                                     data-original-title=" Desmarcar anotação como importante ">
                                                                    {{ Form::open(['route' => ['admin.call_register.type',$call_register->id], 'id' => 'form-type'.$call_register->id ]) }}
                                                                    <div class="au-consulting-notes-message__important @if($call_register->type == 'important') au-consulting-notes-message__important--active @endif   ">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                             viewBox="-1 -1 22 30"
                                                                             tooltip="Marcar importante"
                                                                             tooltip-placement="bottom"
                                                                             tooltip-append-to-body="true">
                                                                            <path d="M20,26.83l-10-6.4L0,26.69V3C0,.65,1-.05,2.68,0H17.43C19.15,0,20,.93,20,3.13Z"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <input class="check-important" type="checkbox"
                                                                           name="type" id="type"
                                                                           @if($call_register->type == 'important') checked="checked"
                                                                           @endif onclick="document.getElementById('form-type{{$call_register->id}}').submit();">
                                                                    {{ Form::close() }}
                                                                </div>

                                                                @if (is_null($call_register->client_id))
                                                                    <div class="dropdown-edit-regist dropdown"
                                                                         ng-dropdown="" tabindex="0">
                                                                        <a href="javascript:void(0)"
                                                                           class="nix-padding-left_5"
                                                                           data-toggle="dropdown" aria-expanded="false">
                                                                            <i class="fa fa-ellipsis-v fa-lg font-tiny"
                                                                               tooltip="Ediar e Excluir"
                                                                               tooltip-placement="right"
                                                                               tooltip-append-to-body="true"></i>
                                                                        </a>
                                                                        <div class="animated fadeIn dropdown-menu dropdown-menu-right dropdown-notfication"
                                                                             style="left:-70px !important;">
                                                                            <div class="dropdown-content-body">
                                                                                <div class="col-sm-12">
                                                                                    <ul class="navbar-nav ml-auto">
                                                                                        <li class="dropdown-tmp-item">
                                                                                            <a href="javascript:void(0)"
                                                                                               onclick="habcampoRegister(this);"
                                                                                               class="text-primary fs-13">
                                                                                                <span class="text-link ng-binding">Editar</span>
                                                                                            </a>
                                                                                        </li>
                                                                                        <li class="dropdown-tmp-item ng-scope">
                                                                                            <a class="text-primary fs-13"
                                                                                               title="Excluir"
                                                                                               href="{{ route('admin.call_register.destroy', ['call_register' => $call_register->id]) }}"
                                                                                               onclick="event.preventDefault();if(confirm('Deseja excluir este registro?')){document.getElementById('form-delete_register{{$call_register->id}}').submit();}">
                                                                                                <span class="text-link ng-binding">Excluir</span>
                                                                                            </a>
                                                                                            {{ Form::open(['route' => ['admin.call_register.destroy',$call_register->id], 'method' => 'DELETE', 'id' => 'form-delete_register'.$call_register->id ]) }}
                                                                                            {{ Form::close() }}
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif


                                                            </div>
                                                            <div class="au-consulting-notes-message__note ng-binding ng-scope">{!! $call_register->description !!}</div>
                                                            <div class="au-consulting-notes-message__edit ng-hide">
                                                                {{ Form::model($call, ['route' => ['admin.call_register.update', $call_register->id, $call->id ] ]) }}
                                                                <div class="row" style="height:100%;">
                                                                    <div class="col-sm-12 pt-60">
                                                                        <textarea name="fildRegister" class="ng-binding"
                                                                                  style="height:100%; overflow-y: hidden;">{{$call_register->description}}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="au-consulting-notes-message__edit_btos">
                                                                    <div class="col-sm-12">
                                                                        <a href="javascript:void(0);"
                                                                           onclick="cancelcampoRegister(this);">Cancelar</a>
                                                                        &nbsp;
                                                                        <button type="submit"
                                                                                class="ga-button ga--is-primary">Salvar
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                {{ Form::close() }}
                                                            </div>
                                                            <au-loading-bar
                                                                    class="au-consulting-notes-message__loading ng-isolate-scope ng-hide">
                                                                <div class="au-loading-bar au-consulting-notes-message__loading"></div>
                                                            </au-loading-bar>
                                                        </div>
                                                        <div class="au-consulting-notes-message__info">
                                                            <div class="au-consulting-notes-message__owner">
                                                                <div class="au-consulting-notes-message__thumb ng-binding ng-scope">
                                                                    @if (isset($call_register->user->initialsname) && !is_null($call_register->user->initialsname) )
                                                                        {{$call_register->user->initialsname}}
                                                                    @elseif(isset($call_register->client->initialsname) && !is_null($call_register->client->initialsname))
                                                                        {{$call_register->client->initialsname}}
                                                                    @endif
                                                                </div>
                                                                <time class="au-consulting-notes-message__time ng-binding"
                                                                      datetime="">
                                                                    {{$call_register->created_date}}<br>
                                                                    {{$call_register->created_hours}}
                                                                </time>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </consulting-notes-message>
                                            @endforeach
                                        </div>
                                        <consulting-notes-write class="ng-isolate-scope">
                                            {{ Form::model($call, ['route' => ['admin.call_register.store',$call->id] ]) }}
                                            <input type="hidden" name="ml" value="#ml-mainContent">
                                            <div class="au-consulting-notes-write">
                                                <div class="au-consulting-notes-write__field">
                                                    <textarea name="description"
                                                              placeholder="Insira aqui as suas anotações referentes ao atendimento"
                                                              class="ng-pristine ng-untouched ng-valid ng-empty"></textarea>
                                                </div>
                                                <button type="submit"
                                                        class="ga-button ga--is-primary ga--is-large btn-comment-register d-none">
                                                    <span class="au-consulting-notes-write__send">Comentar</span>
                                                </button>
                                            </div>
                                            {{ Form::close() }}
                                        </consulting-notes-write>
                                    </section>
                                </div>
                            </div>

                            {{--  Historic --}}
                            <div class="position-relative tab-pane fade" id="info-historic" role="tabpanel">
                                <div id="accordion-two" class="accordion">
                                    @include('admin.partials._historic_feed', ['step_send' => 'case', 'route_filter' => 'admin.call.show'])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    @include('admin.partials._call-sidebar')
                </div>
            </div>
        </div>
    </div>


    @include('admin.pages.calls._task_modal')

    @include('admin.pages.calls._event_modal')

    <div class="modal fade" id="proposal-Modal" tabindex="-1" role="dialog">
        {{ Form::model($call, ['route' => ['admin.calls.proposal_store',$call->id], 'method' => 'POST' ]) }}
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Honorários Advocatícios</h4>
                </div>
                <div class="modal-body">

                    <ul class="nav nav-tabs md-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#info-honorario-adicionar" role="tab">Adicionar</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#info-honorario-gerenciar"
                               role="tab">Gerenciar</a>
                            <div class="slide"></div>
                        </li>
                    </ul>

                    <div class="tab-content card-block">
                        <div class="tab-pane active" id="info-honorario-adicionar" role="tabpanel">
                            <!-- start cloned right side buttons element -->
                            <div class="clone-box-01">
                                <div class="row toclone-widget-right toclone">
                                    <div class="col-sm-5 unit">
                                        <div class="form-group">
                                            <input type="text" name="amount_honorary[]" class="form-control money"
                                                   placeholder="Valor">
                                        </div>
                                    </div>
                                    <div class="col-sm-5 unit">
                                        <div class="form-group">
                                            <select name="description_honorary[]" class="form-control"
                                                    placeholder="Selecione" required>
                                                <option value="">Selecione</option>
                                                <option value="honorary">Honorários Advocatícios</option>
                                                <option value="coautor">Co-Autor</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-sm clone-btn-right clone mr-2"
                                            style="height: 36px">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm clone-btn-right delete m-l-10"
                                            style="height: 36px">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- end cloned right side buttons element -->
                        </div>
                        <div class="tab-pane" id="info-honorario-gerenciar" role="tabpanel">
                            <table class="table table-bordered">
                                <tbody>
                                @foreach ($honraries as $honrary)
                                    <tr>
                                        <td>{{$honrary->amount}}</td>
                                        <td>{{$honrary->description}}</td>
                                        <td width="50">
                                            <a class="dropdown-item waves-light waves-effect"
                                               href="{{ route('admin.honrary.destroy', ['honrary' => $honrary->id]) }}"
                                               id="clickdel{{$honrary->id}}"
                                               onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){ delform('form-delete-modal', 'clickdel{{$honrary->id}}');}">
                                                <i class="icofont icofont-ui-delete"></i> Remover
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-header">
                    <h4 class="modal-title">Dados de pagamento</h4>
                </div>
                <div class="modal-body">
                    <!-- start cloned right side buttons element -->
                    <div class="clone-box-01">
                        <div class="row toclone-widget-right toclone">
                            <div class="col-sm-4 unit paydatebox">
                                <div class="form-group">
                                    {{ Form::label('paydate', 'Vencimento') }} <span class="text-danger small">{Não obrigatório}</span>
                                    {{ Form::date('paydate', null, ['class' => $errors->has('desiredname') ?  'form-control is-invalid' : 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-sm-4 unit">
                                <div class="form-group">
                                    {{ Form::label('paymentform', 'Modelo de contratação') }} <span class="text-danger">*</span>
                                    {{Form::select('paymentform', $payment_form,null,['class' => $errors->has('paymentform') ?  'form-control is-invalid' : 'form-control', 'onchange' => 'changeInstallments(this.value);' ])}}
                                </div>
                            </div>
                            <div class="col-sm-4 unit">
                                <div class="form-group"
                                     @if( !isset($call->paymentform) || ($call->paymentform != 'gerencianet' && old('paymentform') != 'gerencianet' ) ) style="display:none"
                                     @endif id="nInstallments">
                                    {{ Form::label('max_installments', 'Número de parcelas permitidas') }} <span
                                            class="text-danger">*</span>
                                    {{Form::select('max_installments', [
                                        '' => 'Selecione',
                                        1 => 1,
                                        2 => 2,
                                        3 => 3,
                                        4 => 4,
                                        5 => 5,
                                        6 => 6,
                                        7 => 7,
                                        8 => 8,
                                        9 => 9,
                                        10 => 10,
                                        11 => 11,
                                        12 => 12
                                        ],null,['class' => $errors->has('max_installments') ?  'form-control is-invalid' : 'form-control'])}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end cloned right side buttons element -->
                </div>
                <div class="modal-header">
                    <h4 class="modal-title">Custas Judiciais</h4>
                </div>
                <div class="modal-body">

                    <ul class="nav nav-tabs md-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#info-custas-adicionar" role="tab">Adicionar</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#info-custas-gerenciar" role="tab">Gerenciar</a>
                            <div class="slide"></div>
                        </li>
                    </ul>
                    <div class="tab-content card-block">
                        <div class="tab-pane active" id="info-custas-adicionar" role="tabpanel">
                            <div class="clone-box-01">
                                <div class="row toclone-widget-right toclone">
                                    <div class="col-sm-5 unit">
                                        <div class="form-group">
                                            <input type="text" class="form-control money" name="amount_expense[]"
                                                   placeholder="Valor">
                                        </div>
                                    </div>
                                    <div class="col-sm-5 unit">
                                        <div class="form-group">
                                            {{Form::select('description_expense', $court_costs, null,['class' => 'form-control', 'name' => 'description_expense[]'])}}
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-sm clone-btn-right clone mr-2"
                                            style="height: 36px">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm clone-btn-right delete m-l-10"
                                            style="height: 36px">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="info-custas-gerenciar" role="tabpanel">
                            <table class="table table-bordered">
                                <tbody>
                                @foreach ($expenses as $expense)
                                    <tr>
                                        <td>{{$expense->amount}}</td>
                                        <td>{{$expense->description}}</td>
                                        <td width="50">
                                            <a class="dropdown-item waves-light waves-effect"
                                               href="{{ route('admin.expense.destroy', ['expense' => $expense->id]) }}"
                                               id="clickdel-expense{{$expense->id}}"
                                               onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){ delform('form-delete-modal', 'clickdel-expense{{$expense->id}}');}">
                                                <i class="icofont icofont-ui-delete"></i> Remover
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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


    <div class="modal fade" id="contract-Modal" tabindex="-1" role="dialog">
        {{ Form::model($call, ['route' => ['admin.calls.update.payment',$call->id], 'method' => 'PUT' ]) }}
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Dados de pagamento</h4>
                </div>
                <div class="modal-body">

                    <!-- start cloned right side buttons element -->
                    <div class="clone-box-01">
                        <div class="row toclone-widget-right toclone">
                            <div class="col-sm-4 unit paydatebox">
                                <div class="form-group">
                                    {{ Form::label('paydate', 'Vencimento') }} <span class="text-danger small">{Não obrigatório}</span>
                                    {{ Form::date('paydate', null, ['class' => $errors->has('desiredname') ?  'form-control is-invalid' : 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-sm-4 unit">
                                <div class="form-group">
                                    {{ Form::label('paymentform', 'Modelo de contratação') }} <span class="text-danger">*</span>
                                    {{Form::select('paymentform', $payment_form,null,['class' => $errors->has('paymentform') ?  'form-control is-invalid' : 'form-control', 'onchange' => 'changeInstallments(this.value);' ])}}
                                </div>
                            </div>
                            <div class="col-sm-4 unit">
                                <div class="form-group"
                                     @if( !isset($call->paymentform) || $call->paymentform!='gerencianet' ) style="display:none"
                                     @endif id="nInstallments">
                                    {{ Form::label('max_installments', 'Número de parcelas permitidas') }} <span
                                            class="text-danger">*</span>
                                    {{Form::select('max_installments', [
                                        '' => 'Selecione',
                                        1 => 1,
                                        2 => 2,
                                        3 => 3,
                                        4 => 4,
                                        4 => 5,
                                        6 => 6,
                                        7 => 7,
                                        8 => 8,
                                        9 => 9,
                                        10 => 10,
                                        11 => 11,
                                        12 => 12
                                        ],null,['class' => $errors->has('max_installments') ?  'form-control is-invalid' : 'form-control'])}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end cloned right side buttons element -->
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light ">Criar</button>
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </div>

    <form action="" method="post" id="form-delete-modal">
        {!! csrf_field() !!}
        <input type="hidden" name="_method" value="delete"/>
    </form>

    <form action="{{route('admin.calls.change_status',$call->id)}}" method="post" id="form-status-change">
        {!! csrf_field() !!}
        <input type="hidden" name="status" id="status_dinamic" value=""/>
    </form>


    <form method="POST" id="form-star">{!! csrf_field() !!} <input type="hidden" name="stars" id="starsChange"> <input
                type="hidden" name="motivo" id="motivoFieldSend"></form>
    <form method="POST" id="form-action">{!! csrf_field() !!} <input type="hidden" name="caseaction" id="caseaction">
    </form>
    <form method="POST" id="form-changetype">{!! csrf_field() !!} <input type="hidden" name="changetype_id"
                                                                         id="changetype_id"></form>
    <form method="POST" id="form-reason">{!! csrf_field() !!} <input type="hidden" name="reason_id" id="reason_id">
    </form>

@endsection

@push('scripts')
    @if(isset($call->stars) && !is_null($call->stars))
        <script>            
            setTimeout(function(){ 
                box_rason_star({{$call->stars}}); 
                @if(!is_null($call->star_reason))
                    $('#star_reason').val('{{$call->star_reason}}');
                @endif
            }, 1000);
        </script>
    @endif
@endpush
