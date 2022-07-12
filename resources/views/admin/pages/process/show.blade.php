@php
    $iconProcedural = $call_procedural_icons[$call->procedural_status][0] ?? '';
    $styleProcedural = $call_procedural_icons[$call->procedural_status][1] ?? '';
@endphp
@extends('admin.layout.app')

@section('content')
    <div class="row">
        <div class="col-sm-7 page-show">
            <div class="container-fluid">
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

                            <input type="file" class="fileupload" id="1568279510490"
                                   onchange="uploadProfile(this,/image.*/,'/panel-admin/upload/imagens');">
                        </label>
                        <div class="media-body pull-left">
                            @include('admin.pages.clients._fixed_modal', ['client'=>$call->client])
                            <h3 class="mb-0">
                                @if (!is_null($call->client->treatment))
                                    <small>{{$call->client->treatment}}</small> @endif <a href="javascript:void(0);"
                                                                                          data-toggle="modal"
                                                                                          data-target="#fixed-cliente{{$call->client->id}}">{{$call->client->name}}</a>
                            </h3>
                            <a href="#" class="label text-uppercase mt-1 d-block text-center"
                               style="color:{{ $profile_color[$call->client->profile] }} !important; border: 1px solid {{ $profile_color[$call->client->profile] ?? '' }} !important;">
                                cliente com {{$call->client->profile}}
                            </a>
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

                                <div class="dropdown">
                                    <a id="navbarellipsisDropdown" class="pl-2 btn-avanced2" href="#" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span data-toggle="tooltip" data-placement="bottom" title="Gerenciar">
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
                                        @if (is_null($call->title_doc_extra))
                                            <a class="dropdown-item" href="javascript:void(0);"
                                               onclick="$('#frm-request_extra_documents').submit()">
                                                Solicitar Documentos Extras
                                            </a>
                                        @endif
                                        <a class="dropdown-item" href="{{ route('admin.cases.download_folder', ['call' => $call->id]) }}">
                                            <i class="fa fa-fw fa-download"></i> Baixar pastas
                                        </a>
                                        <a class="dropdown-item" href="{{ route('admin.cases.download_folder_pdf', ['call' => $call->id]) }}">
                                            <i class="fa fa-fw fa-download"></i> Baixar pastas novo
                                        </a>
                                        <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal"
                                           data-target="#changePrecessModal1">
                                           <i class="fa fa-fw fa-print"></i> Imprimir Relatório
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#changePrecessModal1">
                                            Editar
                                        </a>
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            <i class="fa fa-fw fa-times"></i> Rescindir
                                        </a>
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            Encerrar
                                        </a>

                                        {{ Form::open(['route' => ['admin.process.request_extra_documents',$call->id], 'id' => 'frm-request_extra_documents', 'class' => 'd-none']) }}
                                        {{ Form::close() }}
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                @include('admin.partials._aba_process')
            </div>


            <div class="custom-tab-1 pt-5">
                <ul class="nav nav-tabs mb-3" style="border-bottom: 1px solid #dee2e6;">
                    <li class="nav-item">
                        <a class="nav-link active show" data-toggle="tab" href="#info-case" id="info-case_aba">
                            Últimos Históricos
                            <div class="slide"></div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#info-documentos" id="info-documentos_aba">
                            Documentos do Processo
                            <div class="slide"></div>
                        </a>
                    </li>
                    @if (!is_null($call->title_doc_extra))
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#info-docsextras" id="info-docsextras_aba">
                                Documentação Extras
                                <div class="slide"></div>
                            </a>
                        </li>
                    @endif
                </ul>
                <div class="tab-content">
                    {{-- Boxes de Historico --}}
                    <div class="tab-pane fade active show" id="info-case" role="tabpanel">
                        <div id="accordion-two" class="accordion">
                            @include('admin.partials._historic_feed', ['step_send' => 'precess', 'route_filter' => 'admin.process.show'])
                        </div>
                    </div>
                    {{-- Boxes Documentos --}}
                    <div class="tab-pane fade" id="info-documentos" role="tabpanel">
                        <div id="accordion-doc" class="accordion">
                            @include('admin.partials._docs_accordion', ['sstep' => 'process'])

                            @include('admin.partials._extra_close_accordion', ['sstep' => 'process'])

                        </div>
                    </div>
                    {{-- Boxes Documentos Extras --}}
                    @if (!is_null($call->title_doc_extra))
                        <div class="tab-pane fade accordion" id="info-docsextras" role="tabpanel">
                            <div id="accordion-extras" class="accordion">
                                @include('admin.partials._extras_accordion')
                                @if($docExtraQtdNew >= 1 || $docExtraQtdDisp >= 1)
                                    <div class="text-right pt-3">
                                        {{ Form::open(['route' => ['admin.process.send_document_extras',$call->id] ]) }}
                                            <button type="submit" class="btn btn-primary">
                                                {{ $call->procedural_status == "com_requerente" ? "Reenviar Solicitação" : "Informar Cliente" }}
                                            </button>
                                        {{ Form::close() }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-sm-5">
            @include('admin.partials._next_activities_process')
            <div class="box-sidebar">
                <h6>
                    <svg width="28px" height="28px" viewBox="0 0 32 32">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(2.000000, 2.000000)" fill-rule="nonzero">
                                <path d="M17.7916667,0 L3.20833333,0 C1.435,0 0,1.45363636 0,3.25 L0,22.75 C0,24.5463636 1.435,26 3.20833333,26 L17.745,26 C17.5816667,25.4327273 17.5,24.8418182 17.5,24.2272727 L17.5,18.0227273 C17.5,15.7772727 18.9816667,13.8627273 21,13.2245455 L21,3.25 C21,1.45363636 19.565,0 17.7916667,0 Z"
                                      fill="#D5AC29"></path>
                                <g transform="translate(3.000000, 6.000000)" fill="#FFFFFF">
                                    <path d="M11.9166667,10 L1.08333333,10 C0.48425,10 0,9.552 0,9 C0,8.448 0.48425,8 1.08333333,8 L11.9166667,8 C12.51575,8 13,8.448 13,9 C13,9.552 12.51575,10 11.9166667,10 Z"></path>
                                    <path d="M11.9166667,14 L1.08333333,14 C0.48425,14 0,13.552 0,13 C0,12.448 0.48425,12 1.08333333,12 L11.9166667,12 C12.51575,12 13,12.448 13,13 C13,13.552 12.51575,14 11.9166667,14 Z"></path>
                                    <path d="M11.9166667,6 L1.08333333,6 C0.48425,6 0,5.552 0,5 C0,4.448 0.48425,4 1.08333333,4 L11.9166667,4 C12.51575,4 13,4.448 13,5 C13,5.552 12.51575,6 11.9166667,6 Z"></path>
                                    <path d="M6.85714286,2 L1.14285714,2 C0.510857143,2 0,1.552 0,1 C0,0.448 0.510857143,0 1.14285714,0 L6.85714286,0 C7.48914286,0 8,0.448 8,1 C8,1.552 7.48914286,2 6.85714286,2 Z"></path>
                                </g>
                                <path d="M24,28 C21.7942857,28 20,26.1445455 20,23.8636364 L20,17.6590909 C20,16.1924545 21.1542857,15 22.5714286,15 C23.9885714,15 25.1428571,16.1924545 25.1428571,17.6590909 L25.1428571,23.5681818 C25.1428571,24.0574545 24.7588571,24.4545455 24.2857143,24.4545455 C23.8125714,24.4545455 23.4285714,24.0574545 23.4285714,23.5681818 L23.4285714,17.6590909 C23.4285714,17.1698182 23.0434286,16.7727273 22.5714286,16.7727273 C22.0994286,16.7727273 21.7142857,17.1698182 21.7142857,17.6590909 L21.7142857,23.8636364 C21.7142857,25.1671818 22.7394286,26.2272727 24,26.2272727 C25.2605714,26.2272727 26.2857143,25.1671818 26.2857143,23.8636364 L26.2857143,15.8863636 C26.2857143,15.3970909 26.6697143,15 27.1428571,15 C27.616,15 28,15.3970909 28,15.8863636 L28,23.8636364 C28,26.1445455 26.2057143,28 24,28 Z"
                                      fill="#D5AC29"></path>
                            </g>
                        </g>
                    </svg>
                    <strong>Documentos Processuais</strong>
                    <span class="action-box pull-right">

                    <div class="dropdown-tmp-icon" tabindex="0">
                        <div class="dropdown">
                            <a href="javascript:void(0)" class="nix-padding-left_5" data-toggle="dropdown"
                               aria-expanded="false">
                                <i class="fa fa-plus" tooltip="Clique para adicionar" tooltip-placement="right"
                                   tooltip-append-to-body="true"></i>
                            </a>
                            <div class="animated fadeIn dropdown-menu dropdown-menu-right dropdown-notfication"
                                 style="position: absolute; left: 0px; transform: translate3d(-143px, 17px, 0px); top: 0px; will-change: transform;"
                                 x-placement="bottom-end">
                                <div class="dropdown-content-body">
                                    <div class="col-sm-12">
                                        <ul class="navbar-nav">
                                            <li class="dropdown-tmp-item">
                                                <a href="javascript:void(0);">
                                                    <span class="text-link ng-binding">Documento</span>
                                                </a>
                                            </li>
                                            <li class="dropdown-tmp-item ng-scope">
                                                <a href="javascript:void(0);">
                                                    <span class="text-link ng-binding">Documento do Google Drive</span>
                                                </a>
                                            </li>
                                            <li class="dropdown-tmp-item ng-scope">
                                                <a href="javascript:void(0);">
                                                    <span class="text-link ng-binding">Documento padrão</span>
                                                </a>
                                            </li>
                                            <li class="dropdown-tmp-item ng-scope">
                                                <a href="javascript:void(0);">
                                                    <span class="text-link ng-binding">Documento padrão do Google Drive</span>
                                                </a>
                                            </li>
                                            <li class="dropdown-tmp-item ng-scope">
                                                <a href="javascript:void(0);">
                                                    <span class="text-link ng-binding">Link</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>                        
                                </div>
                            </div>
                        </div>
                    </div>
                </h6>
                <table width="100%">
                    <tbody>
                    @if (!is_null($call->protocol))
                        <tr>
                            <td>
                                <span class="badge bg-secondary text-white"> 1 </span>
                                <a href="{{route('recibo_protocol', $call->id)}}" class="text-primary-inverse">Recibo de
                                    Protocolo</a>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                <div class="card-block groups-contact">
                    <ul class="list-group">
                        <li class="list-group-item justify-content-between" style="border:0px;display:none">
                            <a href="javascript:void(0);" class="text-primary-inverse">Parecer Ministério Público</a>
                            <span class="badge badge-primary badge-pill">1</span>
                        </li>
                        <li class="list-group-item justify-content-between" style="border:0px;display:none">
                            <a href="javascript:void(0);" class="text-primary-inverse">Designação de Audiência</a>
                            <span class="badge badge-primary badge-pill">1</span>
                        </li>
                        <li class="list-group-item justify-content-between" style="border:0px;display:none">
                            <a href="javascript:void(0);" class="text-primary-inverse">Sentença</a>
                            <span class="badge badge-primary badge-pill">1</span>
                        </li>
                        <li class="list-group-item justify-content-between" style="border:0px;display:none">
                            <a href="javascript:void(0);" class="text-primary-inverse">Certidão de Trânsito em
                                Julgado</a>
                            <span class="badge badge-primary badge-pill">1</span>
                        </li>
                        <li class="list-group-item justify-content-between" style="border:0px;display:none">
                            <a href="javascript:void(0);" class="text-primary-inverse">Mandato de Averbação</a>
                            <span class="badge badge-primary badge-pill">1</span>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="box-sidebar">
                <h6>
                    <svg width="28px" height="28px" viewBox="0 0 32 32">
                        <defs>
                            <polygon points="0 0.0002 20.9999 0.0002 20.9999 26.0002 0 26.0002"></polygon>
                            <polygon
                                    points="0.0764 -1.77635684e-15 11.396 -1.77635684e-15 11.396 13 0.0764 13"></polygon>
                        </defs>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(2.000000, 2.000000)">
                                <g>
                                    <mask fill="white">
                                        <use xlink:href="#path-1"></use>
                                    </mask>
                                    <g></g>
                                    <path d="M20.5059,13.7412 L20.9999,13.7412 L20.9999,3.2502 C20.9999,1.4532 19.5659,0.0002 17.7919,0.0002 L3.2089,0.0002 C1.4349,0.0002 -0.0001,1.4532 -0.0001,3.2502 L-0.0001,22.7502 C-0.0001,24.5472 1.4349,26.0002 3.2089,26.0002 L14.9519,26.0002 C14.3889,24.9002 14.0649,23.6582 14.0649,22.3402 C14.0649,19.2732 15.7849,16.6032 18.3119,15.2422 C18.3769,15.1942 18.4469,15.1542 18.5149,15.1092 C18.7129,14.1912 19.5299,13.7412 20.5059,13.7412"
                                          fill="#D5AC29" mask="url(#mask-2)"></path>
                                </g>
                                <path d="M15.9675,7.8711 L8.0325,7.8711 C7.46125,7.8711 7,7.4231 7,6.8711 C7,6.3191 7.46125,5.8711 8.0325,5.8711 L15.9675,5.8711 C16.53875,5.8711 17,6.3191 17,6.8711 C17,7.4231 16.53875,7.8711 15.9675,7.8711"
                                      fill="#FFFFFF"></path>
                                <path d="M5,7.8711 L5,7.8711 C4.447,7.8711 4,7.4231 4,6.8711 C4,6.3191 4.447,5.8711 5,5.8711 C5.553,5.8711 6,6.3191 6,6.8711 C6,7.4231 5.553,7.8711 5,7.8711"
                                      fill="#FFFFFF"></path>
                                <path d="M15.9675,11.8711 L8.0325,11.8711 C7.46125,11.8711 7,11.4231 7,10.8711 C7,10.3191 7.46125,9.8711 8.0325,9.8711 L15.9675,9.8711 C16.53875,9.8711 17,10.3191 17,10.8711 C17,11.4231 16.53875,11.8711 15.9675,11.8711"
                                      fill="#FFFFFF"></path>
                                <path d="M5,11.8711 L5,11.8711 C4.447,11.8711 4,11.4231 4,10.8711 C4,10.3191 4.447,9.8711 5,9.8711 C5.553,9.8711 6,10.3191 6,10.8711 C6,11.4231 5.553,11.8711 5,11.8711"
                                      fill="#FFFFFF"></path>
                                <path d="M15.9675,15.8711 L8.0325,15.8711 C7.46125,15.8711 7,15.4231 7,14.8711 C7,14.3191 7.46125,13.8711 8.0325,13.8711 L15.9675,13.8711 C16.53875,13.8711 17,14.3191 17,14.8711 C17,15.4231 16.53875,15.8711 15.9675,15.8711"
                                      fill="#FFFFFF"></path>
                                <path d="M5,15.8711 L5,15.8711 C4.447,15.8711 4,15.4231 4,14.8711 C4,14.3191 4.447,13.8711 5,13.8711 C5.553,13.8711 6,14.3191 6,14.8711 C6,15.4231 5.553,15.8711 5,15.8711"
                                      fill="#FFFFFF"></path>
                                <g transform="translate(16.000000, 15.000000)">
                                    <mask fill="white">
                                        <use xlink:href="#path-3"></use>
                                    </mask>
                                    <g></g>
                                    <path d="M6.2754,1.707 L6.2754,1.078 L7.3534,1.078 C7.6514,1.078 7.8924,0.837 7.8924,0.539 C7.8924,0.241 7.6514,-1.77635684e-15 7.3534,-1.77635684e-15 L4.1194,-1.77635684e-15 C3.8204,-1.77635684e-15 3.5804,0.241 3.5804,0.539 C3.5804,0.837 3.8204,1.078 4.1194,1.078 L5.1974,1.078 L5.1974,1.707 C2.3284,1.979 0.0764,4.4 0.0764,7.34 C0.0764,10.461 2.6154,13 5.7364,13 C8.8574,13 11.3964,10.461 11.3964,7.34 C11.3964,4.4 9.1444,1.979 6.2754,1.707"
                                          fill="#D5AC29" mask="url(#mask-4)"></path>
                                </g>
                                <path d="M23.6768,24.8652 C23.5798,24.9382 23.4658,24.9722 23.3538,24.9722 C23.1908,24.9722 23.0288,24.8982 22.9218,24.7582 L21.3048,22.6012 C21.2348,22.5082 21.1978,22.3942 21.1978,22.2772 L21.1978,19.3122 C21.1978,19.0142 21.4388,18.7732 21.7368,18.7732 C22.0328,18.7732 22.2758,19.0142 22.2758,19.3122 L22.2758,22.0972 L23.7838,24.1102 C23.9628,24.3482 23.9148,24.6862 23.6768,24.8652"
                                      fill="#FFFFFF"></path>
                            </g>
                        </g>
                    </svg>
                    <strong>Etapa Processual</strong>
                </h6>
                <div class="card-block">
                    <div class="pb-3">
                    <span>
                        <i class="fa {{ $iconProcedural}} {{ $styleProcedural }}" style="font-size:18px"></i>
                        <i> {{ $call_procedural_status[$call->procedural_status] ?? $call->procedural_status }}</i>
                        {!! $call->dateStatus !!}
                    </span>
                    </div>
                    <div>
                        @php
                            $tom_color = isset($process_categories_colors[$call->procedural_step]) ? get_tomcolor($process_categories_colors[$call->procedural_step]) : 0 ;
                        @endphp
                        <div class="dropdown-secondary dropdown">
                            <button class="btn btn-mini dropdown-toggle waves-effect waves-light" type="button"
                                    id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    style="background-color:{{ $process_categories_colors[$call->procedural_step] ?? '' }} !important; @if ($tom_color > 190) color:#333; @else color:#fff; @endif ">
                                <strong class="text-uppercase">{{ !is_null($call->procedural_step) ? $call->procedural_step : '' }}</strong>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdown1" data-dropdown-in="fadeIn"
                                 data-dropdown-out="fadeOut">
                                 @foreach ($procedural_steps as $step)
                                    <a class="dropdown-item waves-light waves-effect text-dark" href="{{route('admin.process.change_procedural_step',['call' => $call->id, 'step' => $step->name])}}">
                                        <span class="point-marker bg-danger" style="background-color: {{$step->color ?? ''}} !important"></span>{{$step->name}}
                                    </a>
                                 @endforeach
                                
                            </div>
                            <i> Atualizado em {{ date('d/m/Y', strtotime($call->updated_at))}}</i>
                        </div>

                    </div>
                </div>
            </div>


            @if (!is_null($call->title_doc_extra))
                <div class="box-sidebar">
                    <h6>
                        <svg width="28px" height="28px" viewBox="0 0 32 32">
                            <defs>
                                <polygon
                                        points="0.0001 0.0864620515 28 0.0864620515 28 20.0866 0.0001 20.0866"></polygon>
                            </defs>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(2.000000, 2.000000)">
                                    <path d="M24.0449,-2.40626607e-06 L3.9529,-2.40626607e-06 C2.3249,-0.002 1.0029,1.243 0.9999,2.781 C0.9999,2.906 1.0079,3.031 1.0259,3.155 C1.0679,3.461 1.3639,3.677 1.6879,3.637 C1.7669,3.627 1.8429,3.603 1.9109,3.565 C2.1719,3.421 2.4689,3.347 2.7709,3.351 L6.9789,3.351 C7.7379,3.353 8.4119,3.809 8.6589,4.487 L8.7589,4.793 C9.1659,5.931 10.2939,6.697 11.5639,6.701 L25.2279,6.701 C25.5369,6.701 25.8419,6.778 26.1099,6.924 C26.2009,6.974 26.3039,6.99999759 26.4089,6.99999759 C26.7349,6.99999759 26.9999,6.75 26.9999,6.441 L26.9999,2.792 C26.9999,1.25 25.6769,-2.40626607e-06 24.0449,-2.40626607e-06"
                                          fill="#ab8a22"></path>
                                    <path d="M22.875,20.0048 C22.723,19.8498 22.553,19.7128 22.37,19.5968 C21.885,19.2838 21.321,19.1187907 20.746,19.1187907 C19.946,19.1168 19.181,19.4368 18.616,20.0048 L15.88,22.7538 C15.317,23.3198 15.001,24.0878 14.9999994,24.8878 C14.999,26.5578 16.347,27.9118 18.01,27.9128211 C18.808,27.9158 19.573,27.5988 20.137,27.0318 L22.396,24.7648 C22.437,24.7238 22.46,24.6678 22.459,24.6098 C22.459,24.4898 22.361,24.3948 22.243,24.3958 L22.157,24.3958 C21.685,24.3968 21.217,24.3058 20.78,24.1278 C20.699,24.0938 20.607,24.1128 20.546,24.1748 L18.922,25.8078 C18.417,26.3148 17.6,26.3148 17.096,25.8078 C16.591,25.3018 16.591,24.4808 17.096,23.9738 L19.843,21.2178 C20.347,20.7128 21.162,20.7128 21.666,21.2178 C22.006,21.5388 22.536,21.5388 22.875,21.2178 C23.021,21.0708 23.11,20.8768 23.125,20.6698 C23.141,20.4218 23.05,20.1798 22.875,20.0048"
                                          fill="#D5AC29"></path>
                                    <path d="M27.0322,15.8857 C25.8562,14.7047 23.9502,14.7047 22.7752,15.8857 L20.5192,18.1497 C20.4582,18.2117 20.4392,18.3057 20.4742,18.3867 C20.5092,18.4677 20.5892,18.5207 20.6772,18.5187 L20.7562,18.5187 C21.2272,18.5177 21.6942,18.6097 22.1302,18.7877 C22.2112,18.8217 22.3032,18.8027 22.3642,18.7407 L23.9832,17.1157 C24.4872,16.6107 25.3042,16.6107 25.8082,17.1157 C26.3122,17.6227 26.3122,18.4447 25.8082,18.9497 L23.7922,20.9737 L23.7742,20.9927 L23.0692,21.6977 C22.5652,22.2027 21.7502,22.2027 21.2462,21.6977 C20.9072,21.3767 20.3782,21.3767 20.0382,21.6977 C19.8902,21.8457 19.8032,22.0417 19.7892,22.2497 C19.7722,22.4977 19.8632,22.7397 20.0382,22.9157 C20.2872,23.1667 20.5782,23.3707 20.8982,23.5207 C20.9432,23.5417 20.9882,23.5597 21.0332,23.5777 C21.0792,23.5977 21.1262,23.6137 21.1712,23.6307 C21.2162,23.6477 21.2632,23.6627 21.3082,23.6757 L21.4352,23.7097 C21.5212,23.7317 21.6072,23.7487 21.6952,23.7647 C21.8022,23.7807 21.9092,23.7897 22.0152,23.7947 L22.1662,23.7947 L22.1792,23.7947 L22.3082,23.7797 C22.3552,23.7777 22.4052,23.7667 22.4612,23.7667 L22.5342,23.7667 L22.6822,23.7447 L22.7512,23.7327 L22.8762,23.7057 L22.8992,23.7057 C23.4282,23.5727 23.9102,23.2977 24.2952,22.9107 L27.0322,20.1617 C28.2072,18.9817 28.2072,17.0667 27.0322,15.8857"
                                          fill="#D5AC29"></path>
                                    <g transform="translate(0.000000, 1.913500)">
                                        <mask fill="white">
                                            <use xlink:href="#path-1"></use>
                                        </mask>
                                        <g></g>
                                        <path d="M21.9961,11.8726 C22.5471,11.3196 23.2231,10.8896 23.9801,10.7026 C24.8361,10.4916 25.9531,10.4916 27.0001,11.3356 C27.4011,11.6596 27.7201,11.9576 28.0001214,12.2556 L28.0001214,6.5576 C28.0041,5.5076 27.4481,4.5366 26.5451,4.0136 C26.1011,3.7526 25.5971,3.6156 25.0831,3.6156 L11.5971,3.6156 C10.8471,3.6136 10.1811,3.1336 9.9371,2.4186 L9.8381,2.0966 C9.4371,0.8976 8.3241,0.0896 7.0701,0.0864620515 L2.9161,0.0864620515 C2.4151,0.0816 1.9221,0.2126 1.4891,0.4666 C0.5691,0.9856 0.0001,1.9656 0.0001,3.0276 L0.0001,17.1446 C0.0001,18.7696 1.3061,20.0866 2.9161,20.0866 L13.8211,20.0866 L21.9961,11.8726 Z"
                                              fill="#D5AC29" mask="url(#mask-2)"></path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <strong>Estatísticas de Documento</strong>
                    </h6>
                    <table width="100%">
                        <tbody>
                        <tr>
                            <td>
                        <span class="badge bg-secondary text-white">
                            {{$docsAll}}
                        </span>
                                <a href="javascript:void(0);" class="text-primary-inverse">Documentos Solicitados</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                        <span class="badge bg-info text-white">
                            {{$docsSends}}
                        </span>
                                <a href="javascript:void(0);" class="text-primary-inverse">Documentos Enviados</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                         <span class="badge bg-success text-white">
                            {{ $docsApproved }}
                        </span>
                                <a href="javascript:void(0);" class="text-primary-inverse">Documentos Aprovados</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                        <span class="badge bg-danger text-white">
                            {{$docsDisapproved}}
                        </span>
                                <a href="javascript:void(0);" class="text-primary-inverse">Documentos Reprovados</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                        <span class="badge bg-warning" style="color: #000!important;">
                            {{$docsPending}}
                        </span>
                                <a href="javascript:void(0);" class="text-primary-inverse">Documentos em Análise</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            @endif

        </div>
    </div>

    @include('admin.pages.calls._task_modal')
    @include('admin.pages.calls._event_modal')

    <form method="POST" id="form-reason">{!! csrf_field() !!} <input type="hidden" name="reason_id" id="reason_id">
    </form>


    <div id="changePrecessModal1" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Processo</h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
    
                    {{ Form::model($call, ['route' => ['admin.cases.storeprocess',$call->id], 'method' => 'POST' ]) }}
                    <div class="form-group">
                        {{ Form::label('process_number', 'Número') }}
                        {{ Form::text('process_number', null, ['class' => $errors->has('process_number') ?  'form-control process_number is-invalid' : 'process_number form-control']) }}
                        @include('admin.partials._help_block',['field' => 'process_number'])
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Juízo</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                {{ Form::text('judgment_number', null, ['class' => $errors->has('link_in_court') ?  'form-control is-invalid' : 'form-control', 'placeholder' => 'Nº']) }}
                            </div>
                            <div class="col-sm-5">
                                {{ Form::text('judgment_stick', null, ['class' => $errors->has('judgment_stick') ?  'typeahead-vara form-control is-invalid' : 'typeahead-vara form-control', 'placeholder' => 'Vara', 'autocomplete' => 'off']) }}
                            </div>
                            <div class="col-sm-5">
                                {{ Form::text('court_jurisdiction', null, ['class' => $errors->has('court_jurisdiction') ?  'typeahead-foro form-control is-invalid' : 'typeahead-foro form-control', 'placeholder' => 'Foro', 'autocomplete' => 'off']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('link_in_court', 'Link no tribunal') }}
                        {{ Form::text('link_in_court', null, ['class' => $errors->has('link_in_court') ?  'form-control is-invalid' : 'form-control']) }}
                        @include('admin.partials._help_block',['field' => 'link_in_court'])
                    </div>
                    <div class="form-group">
                        {{ Form::label('protocol', 'Protocolo') }}
                        <div class="input-group input-group-sm">
                            {{ Form::text('protocol', null, ['class' => $errors->has('protocol') ?  'form-control is-invalid' : 'form-control']) }}
                            <span class="input-group-btn">
                                <div class="btn btn-success btn-file">
                                    <i class="icofont icofont-cloud-upload"></i>
                                    Upload
                                    {{ Form::file('attachment', ['onchange' => 'upload(this,"'.route('upload-file-private', $call->id).'","protocol");']) }}
                                </div>
                            </span>
                            @include('admin.partials._help_block',['field' => 'protocol'])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                {{ Form::label('distributed_in', 'Distribuído em') }}
                                {{ Form::date('distributed_in', null,['class' => $errors->has('distributed_in') ?  'form-control is-invalid' : 'form-control'])}}
                                @include('admin.partials._help_block',['field' => 'distributed_in'])
                            </div>
                        </div>
                        <div class="col-sm-6 p-t-30 text-right">
                            <span class="label bg-c-lite-green">Andamento</span>
                        </div>
                    </div>
                    <div class="form-group pt-20">
                        <div class="row">
                            <div class="col-sm-6 text-left">
                                <input type="submit" value="Salvar" class="btn btn-primary" style="padding:10px 40px;">
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
    
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scriptjs')
    @if(Session::has('task_id'))
        <script>
            document.addEventListener("DOMContentLoaded", function (event) {
                $("#ModalTaskEdit{{ Session::get('task_id') }}").modal();
            });
        </script>
    @endif
    <script>
        document.addEventListener("DOMContentLoaded", function (event) {
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                var target = $(e.target).attr("href");
                window.location.href = target + '_top';
            });

            var myUrl = window.location.href;
            var myUrlArray = myUrl.split('#');
            if (myUrlArray[1]) {
                var myTarget = myUrlArray[1];
                myTarget = myTarget.replace('_top', '_aba');
                document.getElementById(myTarget).click();
            }
        });
    </script>
@endsection