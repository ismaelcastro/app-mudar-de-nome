@php
    $categoryGuideOpen = [];
@endphp

@extends('admin.layout.app')


@section('stylecss')
    <style>
        .wizard > .steps > ul > li.current:nth-child(1) .number:after {
            background-image: url(/assets-adm/images/svgs/documentacao.svg);
        }

        .wizard > .steps > ul > li.current:nth-child(2) .number:after {
            background-image: url(/assets-adm/images/svgs/guias-judiciais.svg);
        }

        .wizard > .steps > ul > li.current:nth-child(3) .number:after {
            background-image: url(/assets-adm/images/svgs/elaboracao.svg);
        }
    </style>
@endsection

@section('content')


<div class="row">
    <div class="col-sm-7 page-show">
        <div class="container-fluid" >
            <div class="row">
                <div class="col-sm-12">
                    <label size="70" class="css-1jlwb56 e1se5yzp1 mr-3 pull-left">
                        <div id="box-imaguser">
                        @if (is_null($call->client->image))
                            <div id="box-image-profile" userid="{{$call->client->id}}">
                                <i class="fa-camera e1se5yzp2 css-bq3ljn-IconComponent e11c20nv0"></i>
                            </div>
                        @else
                            <img src="{{ url("storage/clients/".$call->client->image) }}" alt="{{$call->client->name}}" width="70" height="70">
                        @endif
                        </div>
                        {{ Form::file('attachment', ['onchange' => 'upload_user(this,"'.route('upload-image').'","#box-imaguser", "clients", "'.$call->client->id.'");']) }}

                        <input type="file" class="fileupload" id="1568279510490" onchange="uploadProfile(this,/image.*/,'/panel-admin/upload/imagens');">
                    </label>                    


                    <div class="media-body pull-left">
                        @include('admin.pages.clients._fixed_modal', ['client'=>$call->client])
                        <h3 class="mb-0">
                            @if (!is_null($call->client->treatment)) <small>{{$call->client->treatment}}</small> @endif <a href="javascript:void(0);" data-toggle="modal" data-target="#fixed-cliente{{$call->client->id}}">{{$call->client->name}}</a>
                        </h3>
                        <a href="#" class="badge badge-light text-uppercase mt-2" style="color:{{ $profile_color[$call->client->profile] }} !important; border: 1px solid {{ $profile_color[$call->client->profile] }} !important;">
                            cliente com {{$call->client->profile}}
                        </a>
                        <p class="mb-0 mt-2">
                            <i class="fa fa-envelope"></i> E-mail: <a href="mailto:{{$call->client->email}}">{{$call->client->email}}</a>
                        </p>
                        <p class="mb-0  mt-2">
                            <i class="fa fa-phone"></i> Celular: <a href="javascript:void(0);">{{$call->client->phone}}</a>
                            <i class="fa fa fa-check text-success"></i>
                        </p>
                    </div>

                    
                    
                     
                    <div class="au-consulting-notes-header__options">
                        <div class="au-consulting-notes-header__tools">
                            <div class="pr-3">
                                <a href="{{ url()->previous() }}" class="text-primary" title="Voltar">Voltar</a>
                            </div>
                            <div class="dropdown">
                                <a id="navbarellipsisDropdown" class="pl-2 btn-avanced2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span data-toggle="tooltip" data-placement="bottom" title="Gerenciar">
                                        <i class="fa fa-ellipsis-v fs-16 mt-1"></i>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right fs-13" aria-labelledby="navbarellipsisDropdown">
                                    @if ($access && isset($access->url))
                                    <a class="dropdown-item" href="{{$access->url}}" target="_blank">
                                        <i class="fa fa-fw fa-unlock-alt"></i> Acessar como cliente
                                    </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('admin.cases.download_folder', ['call' => $call->id]) }}">
                                        <i class="fa fa-fw fa-download"></i> Baixar pastas
                                    </a>
                                    <a class="dropdown-item" href="{{ route('admin.cases.download_folder_pdf', ['call' => $call->id]) }}">
                                        <i class="fa fa-fw fa-download"></i> Baixar pastas novo
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#changePrecessModal1">
                                        <i class="fa fa-fw fa-legal"></i> Transformar em Processo
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
            
            @include('admin.partials._aba_casos')
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
                        Documentos
                        <div class="slide"></div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#info-guias" id="info-guias_aba">
                        Guias
                        <div class="slide"></div>
                    </a>
                </li>
            </ul>
            <div class="tab-content">

                <div class="tab-pane fade active show" id="info-case" role="tabpanel">
                    <div id="accordion-two" class="accordion">
                        @include('admin.partials._historic_feed', ['step_send' => 'case', 'route_filter' => 'admin.cases.show'])
                    </div>
                </div>

                <div class="tab-pane fade" id="info-documentos" role="tabpanel">
                    <div id="accordion-doc" class="accordion">
                        @include('admin.partials._docs_accordion')

                        @if($call->status_breve_relato == 'approved')
                        <div class="row">
                            <div class="col-md-6 pt-3">
                                {{ Form::open(['route' => ['admin.cases.aprove_all_checked',$call->id], 'onsubmit' => 'submit_marcados(this);' ]) }}
                                    {{ Form::hidden('call_document_id', '') }}
                                    <button type="submit" id="approve_checked" class="btn btn-primary disabled" disabled="disabled">Aprovar marcados</button>
                                {{ Form::close() }}
                            </div>
                            <div class="col-md-6 text-right pt-3">
                                <button type="button" data-toggle="modal" data-target="#disapprovedDocModal_all_checked" id="reprove_checked" class="btn btn-primary disabled" disabled="disabled">Reprovar marcados</button>
                            </div>
                            <div class="col-md-6 text-left pt-3">
                                {{ Form::open(['route' => ['admin.cases.delete_all_checked',$call->id], 'onsubmit' => 'submit_marcados(this);' ]) }}
                                    {{ Form::hidden('call_document_id', '') }}
                                    <button type="submit" id="delete_checked" class="btn btn-primary disabled" disabled="disabled">Excluir marcados</button>
                                {{ Form::close() }}
                            </div>
                            <div class="col-md-6 text-right pt-3">
                                @if($docsDisapproved >= 1 && $call->stage_case == 'analise_documentacao')
                                    {{ Form::open(['route' => ['admin.cases.send_disapproved',$call->id] ]) }}
                                        <button type="submit" class="btn btn-primary">Comunicar Reprovação</button>
                                    {{ Form::close() }}
                                @else
                                    {{ Form::open(['route' => ['admin.cases.wait_for_document',$call->id] ]) }}
                                    @if ($docsTotal > 0 && $docsTotal == $docsApproved)
                                        <button type="button" class="btn btn-primary disabled">
                                            Reenviar Solicitação
                                        </button>
                                    @else
                                        <button type="submit" class="btn btn-primary">
                                            @if ($call->stage_case=='aguardando_envio_cliente')
                                                Reenviar Solicitação
                                            @else
                                                Solicitar Documentos
                                            @endif
                                        </button>
                                    @endif

                                    {{ Form::close() }}
                                @endif

                            </div>
                        </div>
                        @endif

                        <div class="modal fade" id="disapprovedDocModal_all_checked" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Reprovar Itens selecionados</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {{ Form::open(['route' => ['admin.cases.reprove_all_checked',$call->id], 'onsubmit' => 'submit_marcados(this);' ]) }}
                                        {{ Form::hidden('call_document_id', '') }}
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="titulo">
                                                            Motivo
                                                        </label>
                                                        <input type="text" name="reason" class="form-control" value="" placeholder="Motivo da reprovação" required="required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 text-right">
                                                    <input type="submit" value="Comunicar Reprovação" class="btn btn-primary">
                                                </div>
                                            </div>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade accordion" id="info-guias" role="tabpanel">
                    <div class="" id="guias-judiciais" style="padding-left: 0px">
                        {{ Form::open(['route' => ['admin.cases.storeguide',$call->id], 'id' => 'frm_addguia_'.$guiaJudicial->id ]) }}
                        {{ Form::hidden('guide_category_id', $guiaJudicial->id) }}
                        {{ Form::close() }}

                        <div class="card-header"> Guias Judiciais
                            <a href="javascript:void(0)" onclick="document.getElementById('frm_addguia_{{$guiaJudicial->id}}').submit();" style="float:right">
                                <i class="fa fa-plus pull-right"></i>
                            </a>
                        </div>

                        <div class="table-responsive" style="overflow-x: initial;">
                            <table class="table table-bordered table-xs mb-3">
                                <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Documento/Descrição</th>
                                    <th>Última Edição</th>
                                    <th width="50"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $listGuidesCase = $callGuide->guideCase($call->id, $guiaJudicial->id);
                                @endphp
                                @foreach ($listGuidesCase as $item)

                                    @php
                                        if($item->cdstatus == 'approved'){
                                            $statusClass = 'bg-success-300';
                                            $inconStatus = 'fa fa-thumbs-up text-success';
                                        }elseif($item->cdstatus == 'disapproved'){
                                            $statusClass = 'bg-danger-300';
                                            $inconStatus = 'fa fa-thumbs-down text-danger';
                                        }else{
                                            $statusClass = '';
                                            $inconStatus = '';
                                            if(!is_null($item->file)){
                                                $statusClass = '';
                                                $inconStatus = 'fa fa-hourglass';
                                            }

                                            if (!in_array($guiaJudicial->id, $categoryGuideOpen))
                                                array_push($categoryGuideOpen, $guiaJudicial->id);
                                        }
                                    @endphp

                                    <tr class="{{$statusClass}}">
                                        <td width="25">
                                            <i class="{{$inconStatus}}"></i>
                                        </td>
                                        <td>
                                            {{$item->cdtitle}}
                                            @if (!is_null($item->file))
                                                <a href="{{route('guide_client', ['call_guide' => $item->cdid])}}"
                                                   target="_blank"> <i class="fa fa-link"></i> </a>
                                            @endif
                                            @if (!is_null($item->file_download))
                                                &nbsp;
                                                <a href="{{route('guide_download', ['call_guide' => $item->cdid])}}"
                                                   target="_blank"> <i class="fa fa-file-pdf-o"></i>
                                                </a>
                                            @endif
                                        </td>
                                        <td width="180">{{$item->updated_at}} </td>
                                        <td width="100">
                                        <span class="action-table">
                                            <ul class="mb-0">
                                                <li class="icons p-0 d-inline-block pr-2">
                                                    {{ Form::open(['route' => ['admin.cases.guide_destroy',$item->cdid], 'method' => 'DELETE', 'id' => 'frm-delete-'.$item->cdid ]) }}
                                                        <a href="javascript:void(0);"
                                                           onclick="$('#frm-delete-{{$item->cdid}}').submit()"
                                                           class="text-dark">
                                                            <i class="fa fa-trash fa-lg"></i>
                                                        </a>
                                                    {{ Form::close() }}
                                                </li>
                                                <li class="icons dropdown p-0 d-inline-block">
                                                    <a href="javascript:void(0)" data-toggle="dropdown">
                                                        <i class="fa fa-ellipsis-v fa-lg"></i>
                                                    </a>
                                                    <div class="animated fadeIn dropdown-menu dropdown-notfication leftautoimportant">
                                                        <div class="dropdown-content-body">
                                                            <div class="col-sm-12">
                                                                <div class="basic-form">
                                                                    @if(!is_null($item->file))
                                                                        <div class="pt-2">
                                                                            {{ Form::open(['route' => ['admin.cases.guide_approve',$item->cdid], 'id' => 'frm-approved-'.$item->cdid ]) }}
                                                                                <i class="fa fa-thumbs-up text-success"></i>
                                                                                <a href="javascript:void(0);" onclick="$('#frm-approved-{{$item->cdid}}').submit()">Aprovar</a>
                                                                            {{ Form::close() }}
                                                                        </div>
                                                                        <div class="pt-2">
                                                                            <i class="fa fa-thumbs-down text-danger"></i>
                                                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#disapprovedGuideModal{{$item->cdid}}" data-whatever="@getbootstrap">Reprovar</a>
                                                                        </div>
                                                                    @endif
                                                                    @if(!is_null($item->file))
                                                                        <div class="pt-2">
                                                                        {{ Form::open(['route' => ['admin.cases.guide_anexo',$item->cdid], 'enctype' => 'multipart/form-data', 'id' => "guideAnexo{$item->cdid}" ]) }}
                                                                                <i class="fa fa-link"></i>
                                                                                <span style="cursor: pointer">
                                                                                    @if (!is_null($item->file)) Substituir Comprovante @else Anexar Comprovante @endif
                                                                                    <input type="file" name="file" value="Procurar arquivo" class="upload-file" onchange="document.getElementById('guideAnexo{{$item->cdid}}').submit();">
                                                                                </span>
                                                                        {{ Form::close() }}
                                                                        </div>
                                                                    @endif
                                                                    <div class="pt-2">
                                                                        {{ Form::open(['route' => ['admin.cases.guide_download_anexo',$item->cdid], 'enctype' => 'multipart/form-data', 'id' => "guideDownloadAnexo{$item->cdid}" ]) }}
                                                                            <i class="fa fa-link"></i>
                                                                            @if (!is_null($item->file)) Substituir arquivo @else Anexar arquivo @endif
                                                                            <input type="file" name="file" value="Procurar arquivo" class="upload-file" onchange="document.getElementById('guideDownloadAnexo{{$item->cdid}}').submit();">
                                                                        {{ Form::close() }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </span>

                                            <div class="modal fade"
                                                 id="disapprovedGuideModal{{$item->cdid}}" tabindex="-1"
                                                 role="dialog" aria-labelledby="exampleModalLabel"
                                                 aria-hidden="true">
                                                <div class="modal-dialog" role="guide">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="exampleModalLabel">
                                                                Adicionar Procuração</h5>
                                                            <button type="button" class="close"
                                                                    data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{ Form::open(['route' => ['admin.cases.guide_reprove',$item->cdid] ]) }}
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="titulo">
                                                                            Motivo
                                                                        </label>
                                                                        <input type="text" name="reason"
                                                                               class="form-control"
                                                                               value=""
                                                                               placeholder="Digite da reprovação ">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 text-right">
                                                                    <input type="submit" value="Salvar"
                                                                           class="btn btn-primary">
                                                                </div>
                                                            </div>
                                                            {{ Form::close() }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="" id="justica-gratuita" style="padding-left: 0px">
                        <div id="justica-gratuita-div">
                            {{ Form::open(['route' => ['admin.cases.storeguide',$call->id], 'id' => 'frm_addguia_'.$justicaGratuita->id ]) }}
                            {{ Form::hidden('guide_category_id', $justicaGratuita->id) }}
                            {{ Form::close() }}

                            <div class="card-header">
                                Justiça Gratuita
                                <a href="javascript:void(0)" onclick="document.getElementById('frm_addguia_{{$justicaGratuita->id}}').submit();" style="float:right">
                                    <i class="fa fa-plus pull-right"></i>
                                </a>
                            </div>

                            <div class="table-responsive" style="overflow-x: initial;">
                                <table class="table table-bordered table-xs mb-3">
                                    <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>Documento/Descrição</th>
                                        <th>Última Edição</th>
                                        <th width="50"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $listGuidesCase = $callGuide->guideCase($call->id, $justicaGratuita->id);
                                    @endphp
                                    @foreach ($listGuidesCase as $item)
                                        @php
                                            if($item->cdstatus == 'approved'){
                                                $statusClass = 'bg-success-300';
                                                $inconStatus = 'fa fa-thumbs-up text-success';
                                            }elseif($item->cdstatus == 'disapproved'){
                                                $statusClass = 'bg-danger-300';
                                                $inconStatus = 'fa fa-thumbs-down text-danger';
                                            }else{
                                                $statusClass = '';
                                                $inconStatus = '';
                                                if(!is_null($item->file)){
                                                    $statusClass = '';
                                                    $inconStatus = 'fa fa-hourglass';
                                                }

                                                if (!in_array($justicaGratuita->id, $categoryGuideOpen))
                                                    array_push($categoryGuideOpen, $justicaGratuita->id);
                                            }
                                        @endphp

                                        <tr class="{{$statusClass}}">
                                            <td width="25">
                                                <i class="{{$inconStatus}}"></i>
                                            </td>
                                            <td>
                                                {{$item->cdtitle}}
                                                @if (!is_null($item->file))
                                                    <a href="{{route('guide_client', ['call_guide' => $item->cdid])}}"
                                                       target="_blank"> <i class="fa fa-link"></i> </a>
                                                @endif
                                                @if (!is_null($item->file_download))
                                                    &nbsp;
                                                    <a href="{{route('guide_client', ['call_guide' => $item->cdid])}}"
                                                       target="_blank"> <i class="fa fa-file-pdf-o"></i> </a>
                                                @endif
                                            </td>
                                            <td width="180">{{$item->updated_at}} </td>
                                            <td width="100">
                                    <span class="action-table">
                                        <ul class="mb-0">
                                            <li class="icons p-0 d-inline-block pr-2">
                                                {{ Form::open(['route' => ['admin.cases.guide_destroy',$item->cdid], 'method' => 'DELETE', 'id' => 'frm-delete-'.$item->cdid ]) }}
                                                    <a href="javascript:void(0);" onclick="$('#frm-delete-{{$item->cdid}}').submit()" class="text-dark">
                                                        <i class="fa fa-trash fa-lg"></i>
                                                    </a>
                                                {{ Form::close() }}
                                            </li>
                                            <li class="icons dropdown p-0 d-inline-block">
                                                <a href="javascript:void(0)" data-toggle="dropdown">
                                                    <i class="fa fa-ellipsis-v fa-lg"></i>
                                                </a>
                                                <div class="animated fadeIn dropdown-menu dropdown-notfication leftautoimportant">
                                                    <div class="dropdown-content-body">
                                                        <div class="col-sm-12">
                                                            <div class="basic-form">
                                                                <div class="pt-2">
                                                                    {{ Form::open(['route' => ['admin.cases.guide_approve',$item->cdid], 'id' => 'frm-approved-'.$item->cdid ]) }}
                                                                        <i class="fa fa-thumbs-up text-success"></i>
                                                                        <a href="javascript:void(0);"
                                                                           onclick="$('#frm-approved-{{$item->cdid}}').submit()">Aprovar</a>
                                                                    {{ Form::close() }}
                                                                </div>
                                                                <div class="pt-2">
                                                                    <i class="fa fa-thumbs-down text-danger"></i>
                                                                    <a href="javascript:void(0);" data-toggle="modal"
                                                                       data-target="#disapprovedGuideModal{{$item->cdid}}"
                                                                       data-whatever="@getbootstrap">Reprovar</a>
                                                                </div>
                                                                @if(!is_null($item->file))
                                                                    <div class="pt-2">
                                                                        {{ Form::open(['route' => ['admin.cases.guide_anexo',$item->cdid], 'enctype' => 'multipart/form-data', 'id' => "anexaDocModal{$item->cdid}" ]) }}
                                                                            <i class="fa fa-link"></i>
                                                                            <span style="cursor: pointer">
                                                                                @if (!is_null($item->file)) Substituir arquivo @else Anexar arquivo @endif
                                                                                <input type="file" name="file" style="top:0px" value="Procurar arquivo" class="ifileico" onchange="document.getElementById('anexaDocModal{{$item->cdid}}').submit();">
                                                                            </span>
                                                                        {{ Form::close() }}
                                                                    </div>
                                                                @endif
                                                                <div class="pt-2">
                                                                    {{ Form::open(['route' => ['admin.cases.guide_download_anexo',$item->cdid], 'enctype' => 'multipart/form-data', 'id' => "anexaDocModal{$item->cdid}" ]) }}
                                                                        <i class="fa fa-link"></i>
                                                                        <span style="cursor: pointer">
                                                                            @if (!is_null($item->file)) Substituir arquivo @else Anexar arquivo @endif
                                                                            <input type="file" name="file" style="top:0px" value="Procurar arquivo" class="ifileico" onchange="document.getElementById('anexaDocModal{{$item->cdid}}').submit();">
                                                                        </span>
                                                                    {{ Form::close() }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </span>

                                                <div class="modal fade"
                                                     id="disapprovedGuideModal{{$item->cdid}}" tabindex="-1"
                                                     role="dialog" aria-labelledby="exampleModalLabel"
                                                     aria-hidden="true">
                                                    <div class="modal-dialog" role="guide">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Adicionar Procuração</h5>
                                                                <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                {{ Form::open(['route' => ['admin.cases.guide_reprove',$item->cdid] ]) }}
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label for="titulo">
                                                                                Motivo
                                                                            </label>
                                                                            <input type="text" name="reason"
                                                                                   class="form-control" value=""
                                                                                   placeholder="Digite da reprovação ">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12 text-right">
                                                                        <input type="submit" value="Salvar"
                                                                               class="btn btn-primary">
                                                                    </div>
                                                                </div>
                                                                {{ Form::close() }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="custom-control custom-switch">
                        <input type="hidden" id="guias-case-value" value="{{ $call->guides_type }}">
                        <input type="checkbox" class="custom-control-input" id="guias-case">
                        <label class="custom-control-label" for="guias-case">Justiça Gratuita</label>
                    </div>

                    <div id="accordion-guias" class="accordion">
                        @if($guideQtdFiles > 0 && $guideQtdFiles == $guideQtds)                        
                            <div class="text-right pt-3">
                                {{ Form::open(['route' => ['admin.cases.wait_for_payment_guide',$call->id] ]) }}
                                        @if($call->stage_case == 'emissao_guias')
                                            <button type="submit" class="btn btn-primary">
                                                {{ $call->stage_case != "aguardando_pgto" ? "Enviar" : "Reenviar"  }}
                                                {{ $call->guides_type == "Guias Judiciais" ? "Guias" : "Declaração"  }}
                                            </button>
                                        @elseif($call->stage_case == 'aguardando_pgto' || $call->stage_case == 'conferir_guias')
                                            @if($guideDisapQtds == 0)
                                                <button type="submit" class="btn btn-primary">
                                                    Reenviar
                                                    {{ $call->guides_type == "Guias Judiciais" ? "Guias" : "Declaração"  }}
                                                </button>
                                            @elseif($call->stage_case == 'conferir_guias' && $guideDisapQtds > 0)
                                                <button type="submit" class="btn btn-primary">
                                                Comunicar Reprovação  
                                                </button>
                                            @elseif($call->stage_case == 'aguardando_pgto' && $guideDisapQtds > 0)
                                                <button type="submit" class="btn btn-primary">
                                                Comunicar Novamente   
                                                </button>                                           
                                            @endif                                        
                                        @endif
                                    
                                    
                                {{ Form::close() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-5">
        @include('admin.partials._next_activities')
        <div class="box-sidebar">
            <h6>
                <svg width="28px" height="28px" viewBox="0 0 32 32">
                    <defs>
                        <polygon points="0.0001 0.0864620515 28 0.0864620515 28 20.0866 0.0001 20.0866"></polygon>
                    </defs>
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(2.000000, 2.000000)">
                            <path d="M24.0449,-2.40626607e-06 L3.9529,-2.40626607e-06 C2.3249,-0.002 1.0029,1.243 0.9999,2.781 C0.9999,2.906 1.0079,3.031 1.0259,3.155 C1.0679,3.461 1.3639,3.677 1.6879,3.637 C1.7669,3.627 1.8429,3.603 1.9109,3.565 C2.1719,3.421 2.4689,3.347 2.7709,3.351 L6.9789,3.351 C7.7379,3.353 8.4119,3.809 8.6589,4.487 L8.7589,4.793 C9.1659,5.931 10.2939,6.697 11.5639,6.701 L25.2279,6.701 C25.5369,6.701 25.8419,6.778 26.1099,6.924 C26.2009,6.974 26.3039,6.99999759 26.4089,6.99999759 C26.7349,6.99999759 26.9999,6.75 26.9999,6.441 L26.9999,2.792 C26.9999,1.25 25.6769,-2.40626607e-06 24.0449,-2.40626607e-06" fill="#ab8a22"></path>
                            <path d="M22.875,20.0048 C22.723,19.8498 22.553,19.7128 22.37,19.5968 C21.885,19.2838 21.321,19.1187907 20.746,19.1187907 C19.946,19.1168 19.181,19.4368 18.616,20.0048 L15.88,22.7538 C15.317,23.3198 15.001,24.0878 14.9999994,24.8878 C14.999,26.5578 16.347,27.9118 18.01,27.9128211 C18.808,27.9158 19.573,27.5988 20.137,27.0318 L22.396,24.7648 C22.437,24.7238 22.46,24.6678 22.459,24.6098 C22.459,24.4898 22.361,24.3948 22.243,24.3958 L22.157,24.3958 C21.685,24.3968 21.217,24.3058 20.78,24.1278 C20.699,24.0938 20.607,24.1128 20.546,24.1748 L18.922,25.8078 C18.417,26.3148 17.6,26.3148 17.096,25.8078 C16.591,25.3018 16.591,24.4808 17.096,23.9738 L19.843,21.2178 C20.347,20.7128 21.162,20.7128 21.666,21.2178 C22.006,21.5388 22.536,21.5388 22.875,21.2178 C23.021,21.0708 23.11,20.8768 23.125,20.6698 C23.141,20.4218 23.05,20.1798 22.875,20.0048" fill="#D5AC29"></path>
                            <path d="M27.0322,15.8857 C25.8562,14.7047 23.9502,14.7047 22.7752,15.8857 L20.5192,18.1497 C20.4582,18.2117 20.4392,18.3057 20.4742,18.3867 C20.5092,18.4677 20.5892,18.5207 20.6772,18.5187 L20.7562,18.5187 C21.2272,18.5177 21.6942,18.6097 22.1302,18.7877 C22.2112,18.8217 22.3032,18.8027 22.3642,18.7407 L23.9832,17.1157 C24.4872,16.6107 25.3042,16.6107 25.8082,17.1157 C26.3122,17.6227 26.3122,18.4447 25.8082,18.9497 L23.7922,20.9737 L23.7742,20.9927 L23.0692,21.6977 C22.5652,22.2027 21.7502,22.2027 21.2462,21.6977 C20.9072,21.3767 20.3782,21.3767 20.0382,21.6977 C19.8902,21.8457 19.8032,22.0417 19.7892,22.2497 C19.7722,22.4977 19.8632,22.7397 20.0382,22.9157 C20.2872,23.1667 20.5782,23.3707 20.8982,23.5207 C20.9432,23.5417 20.9882,23.5597 21.0332,23.5777 C21.0792,23.5977 21.1262,23.6137 21.1712,23.6307 C21.2162,23.6477 21.2632,23.6627 21.3082,23.6757 L21.4352,23.7097 C21.5212,23.7317 21.6072,23.7487 21.6952,23.7647 C21.8022,23.7807 21.9092,23.7897 22.0152,23.7947 L22.1662,23.7947 L22.1792,23.7947 L22.3082,23.7797 C22.3552,23.7777 22.4052,23.7667 22.4612,23.7667 L22.5342,23.7667 L22.6822,23.7447 L22.7512,23.7327 L22.8762,23.7057 L22.8992,23.7057 C23.4282,23.5727 23.9102,23.2977 24.2952,22.9107 L27.0322,20.1617 C28.2072,18.9817 28.2072,17.0667 27.0322,15.8857" fill="#D5AC29"></path>
                            <g transform="translate(0.000000, 1.913500)">
                                <mask fill="white">
                                    <use xlink:href="#path-1"></use>
                                </mask>
                                <g></g>
                                <path d="M21.9961,11.8726 C22.5471,11.3196 23.2231,10.8896 23.9801,10.7026 C24.8361,10.4916 25.9531,10.4916 27.0001,11.3356 C27.4011,11.6596 27.7201,11.9576 28.0001214,12.2556 L28.0001214,6.5576 C28.0041,5.5076 27.4481,4.5366 26.5451,4.0136 C26.1011,3.7526 25.5971,3.6156 25.0831,3.6156 L11.5971,3.6156 C10.8471,3.6136 10.1811,3.1336 9.9371,2.4186 L9.8381,2.0966 C9.4371,0.8976 8.3241,0.0896 7.0701,0.0864620515 L2.9161,0.0864620515 C2.4151,0.0816 1.9221,0.2126 1.4891,0.4666 C0.5691,0.9856 0.0001,1.9656 0.0001,3.0276 L0.0001,17.1446 C0.0001,18.7696 1.3061,20.0866 2.9161,20.0866 L13.8211,20.0866 L21.9961,11.8726 Z" fill="#D5AC29" mask="url(#mask-2)"></path>
                            </g>
                        </g>
                    </g>
                </svg>
                <strong>Estatística de Documentos</strong>
            </h6>
            <table width="100%">
                <tbody>
                <tr>
                    <td>
                        <span class="badge bg-secondary text-white">
                            {{$docsTotal}}
                        </span>
                        <a href="javascript:void(0);" class="text-primary-inverse">Documentos Solicitados</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="badge bg-info text-white">
                            {{$docsSend}}
                        </span>
                        <a href="javascript:void(0);" class="text-primary-inverse">Documentos Enviados</a>
                    </td>
                </tr>
                <tr>
                    <td>
                         <span class="badge bg-secondary text-white">
                            {{ $docsHired }}
                        </span>
                        <a href="javascript:void(0);" class="text-primary-inverse">Documentos Contratados</a>
                    </td>
                </tr>
                <tr>
                    <td>
                         <span class="badge bg-primary text-white">
                            {{ $docsWaiting }}
                        </span>
                        <a href="javascript:void(0);" class="text-primary-inverse">Documentos em Emissão</a>
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

        <div class="box-sidebar">
            <h6>
                <svg width="28px" height="28px" viewBox="0 0 32 32">
                    <defs>
                        <polygon points="0.0001 0.0864620515 28 0.0864620515 28 20.0866 0.0001 20.0866"></polygon>
                    </defs>
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(2.000000, 2.000000)">
                            <path d="M24.0449,-2.40626607e-06 L3.9529,-2.40626607e-06 C2.3249,-0.002 1.0029,1.243 0.9999,2.781 C0.9999,2.906 1.0079,3.031 1.0259,3.155 C1.0679,3.461 1.3639,3.677 1.6879,3.637 C1.7669,3.627 1.8429,3.603 1.9109,3.565 C2.1719,3.421 2.4689,3.347 2.7709,3.351 L6.9789,3.351 C7.7379,3.353 8.4119,3.809 8.6589,4.487 L8.7589,4.793 C9.1659,5.931 10.2939,6.697 11.5639,6.701 L25.2279,6.701 C25.5369,6.701 25.8419,6.778 26.1099,6.924 C26.2009,6.974 26.3039,6.99999759 26.4089,6.99999759 C26.7349,6.99999759 26.9999,6.75 26.9999,6.441 L26.9999,2.792 C26.9999,1.25 25.6769,-2.40626607e-06 24.0449,-2.40626607e-06" fill="#ab8a22"></path>
                            <path d="M22.875,20.0048 C22.723,19.8498 22.553,19.7128 22.37,19.5968 C21.885,19.2838 21.321,19.1187907 20.746,19.1187907 C19.946,19.1168 19.181,19.4368 18.616,20.0048 L15.88,22.7538 C15.317,23.3198 15.001,24.0878 14.9999994,24.8878 C14.999,26.5578 16.347,27.9118 18.01,27.9128211 C18.808,27.9158 19.573,27.5988 20.137,27.0318 L22.396,24.7648 C22.437,24.7238 22.46,24.6678 22.459,24.6098 C22.459,24.4898 22.361,24.3948 22.243,24.3958 L22.157,24.3958 C21.685,24.3968 21.217,24.3058 20.78,24.1278 C20.699,24.0938 20.607,24.1128 20.546,24.1748 L18.922,25.8078 C18.417,26.3148 17.6,26.3148 17.096,25.8078 C16.591,25.3018 16.591,24.4808 17.096,23.9738 L19.843,21.2178 C20.347,20.7128 21.162,20.7128 21.666,21.2178 C22.006,21.5388 22.536,21.5388 22.875,21.2178 C23.021,21.0708 23.11,20.8768 23.125,20.6698 C23.141,20.4218 23.05,20.1798 22.875,20.0048" fill="#D5AC29"></path>
                            <path d="M27.0322,15.8857 C25.8562,14.7047 23.9502,14.7047 22.7752,15.8857 L20.5192,18.1497 C20.4582,18.2117 20.4392,18.3057 20.4742,18.3867 C20.5092,18.4677 20.5892,18.5207 20.6772,18.5187 L20.7562,18.5187 C21.2272,18.5177 21.6942,18.6097 22.1302,18.7877 C22.2112,18.8217 22.3032,18.8027 22.3642,18.7407 L23.9832,17.1157 C24.4872,16.6107 25.3042,16.6107 25.8082,17.1157 C26.3122,17.6227 26.3122,18.4447 25.8082,18.9497 L23.7922,20.9737 L23.7742,20.9927 L23.0692,21.6977 C22.5652,22.2027 21.7502,22.2027 21.2462,21.6977 C20.9072,21.3767 20.3782,21.3767 20.0382,21.6977 C19.8902,21.8457 19.8032,22.0417 19.7892,22.2497 C19.7722,22.4977 19.8632,22.7397 20.0382,22.9157 C20.2872,23.1667 20.5782,23.3707 20.8982,23.5207 C20.9432,23.5417 20.9882,23.5597 21.0332,23.5777 C21.0792,23.5977 21.1262,23.6137 21.1712,23.6307 C21.2162,23.6477 21.2632,23.6627 21.3082,23.6757 L21.4352,23.7097 C21.5212,23.7317 21.6072,23.7487 21.6952,23.7647 C21.8022,23.7807 21.9092,23.7897 22.0152,23.7947 L22.1662,23.7947 L22.1792,23.7947 L22.3082,23.7797 C22.3552,23.7777 22.4052,23.7667 22.4612,23.7667 L22.5342,23.7667 L22.6822,23.7447 L22.7512,23.7327 L22.8762,23.7057 L22.8992,23.7057 C23.4282,23.5727 23.9102,23.2977 24.2952,22.9107 L27.0322,20.1617 C28.2072,18.9817 28.2072,17.0667 27.0322,15.8857" fill="#D5AC29"></path>
                            <g transform="translate(0.000000, 1.913500)">
                                <mask fill="white">
                                    <use xlink:href="#path-1"></use>
                                </mask>
                                <g></g>
                                <path d="M21.9961,11.8726 C22.5471,11.3196 23.2231,10.8896 23.9801,10.7026 C24.8361,10.4916 25.9531,10.4916 27.0001,11.3356 C27.4011,11.6596 27.7201,11.9576 28.0001214,12.2556 L28.0001214,6.5576 C28.0041,5.5076 27.4481,4.5366 26.5451,4.0136 C26.1011,3.7526 25.5971,3.6156 25.0831,3.6156 L11.5971,3.6156 C10.8471,3.6136 10.1811,3.1336 9.9371,2.4186 L9.8381,2.0966 C9.4371,0.8976 8.3241,0.0896 7.0701,0.0864620515 L2.9161,0.0864620515 C2.4151,0.0816 1.9221,0.2126 1.4891,0.4666 C0.5691,0.9856 0.0001,1.9656 0.0001,3.0276 L0.0001,17.1446 C0.0001,18.7696 1.3061,20.0866 2.9161,20.0866 L13.8211,20.0866 L21.9961,11.8726 Z" fill="#D5AC29" mask="url(#mask-2)"></path>
                            </g>
                        </g>
                    </g>
                </svg>
                <strong>Etapa Documental: {{$call->stage_case}}</strong>
            </h6>
            @include('admin.pages.cases._case_stages', ['stages' => $call->stage_case])

            @php
                $stages_cases_list = \App\Models\Call::STAGE_CASE;
            @endphp
            <select name="stage_case" id="stage_case_temp" class="form-control" onchange="location.href='/manager-setup/cases/{{$call->id}}/update_stage_case?stage_case='+this.value;">
                <option class="form-group">Selecione uma Opção</option>
                @foreach($stages_cases_list as $key => $value)
                    <option class="form-group" value="{{ $key }}" @if($call->stage_case == $key) selected="selected" @endif >{{ $value }}</option>
                @endforeach
            </select>
        </div>

        
    </div>
</div>

@include('admin.pages.calls._task_modal')


<div id="changePrecessModal1" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
                <h5 class="modal-title">Transformar em Processo</h5>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">

                {{ Form::open(['route' => ['admin.cases.storeprocess', $call->id] ]) }}
                <div class="form-group">
                    {{ Form::label('process_number', 'Número') }}
                    {{ Form::text('process_number', null, ['class' => $errors->has('process_number') ?  'form-control process_number is-invalid' : 'process_number form-control']) }}
                    @include('admin.partials._help_block',['field' => 'process_number'])
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            {{ Form::label('subject', 'Assunto') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <select class="form-control" name="subject" disabled>
                                <option class="form-group">Selecione uma Opção</option>
                                @foreach($subjects as $key => $value)
                                    <option class="form-group" value="{{ $key }}" @if($call->occupation_area == $key) selected="selected" @endif >{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
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
                            <input type="submit" value="Salvar Informações" class="btn btn-primary" style="padding:10px 40px;">
                        </div>
                    </div>
                </div>
                {{ Form::close() }}

            </div>
        </div>
    </div>
</div>

<form method="POST" id="form-reason" >{!! csrf_field() !!} <input type="hidden" name="reason_id" id="reason_id"> </form>

@endsection


@push('scripts')
    @if(Session::has('openModal'))
    @php
        $step_number = Session::get('step_number');
    @endphp
    <script>
        function open_stepbreve(numberStep){
            setTimeout(function(){
                $(".next:eq("+numberStep+")").trigger('click');
            }, 1000);
        }
        document.addEventListener("DOMContentLoaded", function(event) {
            $("#{{ Session::get('openModal') }}").modal();
            setTimeout(function(){
                //$('.next').first().trigger('click');
                //$(".next:eq({{ Session::get('step_number') }})").trigger('click');
                console.log({{$step_number}});
                for(cont = 0; cont<={{$step_number}};cont++){
                    open_stepbreve(cont);
                }
                
               // $("#{{ Session::get('openModal') }}").find('h5').first().trigger('click');
            }, 1000);
            
        });
        
    </script>
    @endif
@endpush


@section('scriptjs')
    @if(Session::has('task_id'))
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            $("#ModalTaskEdit{{ Session::get('task_id') }}").modal();
        });
    </script>
    @endif

    

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                var target = $(e.target).attr("href");
                window.location.href = target+'_top';
            });

            var myUrl = window.location.href;
            var myUrlArray = myUrl.split('#');
            if(myUrlArray[1]){
                var myTarget = myUrlArray[1];
                myTarget = myTarget.replace('_top','_aba');
                document.getElementById(myTarget).click();
            }
        });
    </script>
@endsection

