@php
    $affiliation_id = '';
    $affiliation_collapse = '';
    $client_id = $call->client->id;
    $name_category = $docCategory->name;

    if(isset($nm_client)){
        $name_category = $docCategory->name.' - <strong class="text-primary">'.$nm_client.'</strong>';
    }

    if(isset($affiliation)){
        $affiliation_id = $affiliation->id;
        $affiliation_collapse = '_'.$affiliation_id;
        $client_id = $affiliation->client->id;
        $name_category = $docCategory->name.' - <strong class="text-primary">'.$affiliation->client->first_name.'</strong>';
    }
    $dispatcher = dispatcher_clients($call->id, $docCategory->id);
@endphp

@if($docCategory->forwardingagent && in_array($client_id, $dispatcher))
    <div>
        <div class="card-header">
            <h5 id="cbox-category{{$docCategory->id}}{{$affiliation_collapse}}" class="mb-0 collapsed"
                data-toggle="collapse" data-target="#collapseOneDoc{{$docCategory->id}}{{$affiliation_collapse}}"
                aria-expanded="false" aria-controls="collapseOne">
                <i class="fa arrow" aria-hidden="true"></i> {!! $name_category !!}
                @if (!isset($sstep))
                    <a href="javascript:void(0)" data-toggle="modal"
                    data-target="#addDocModal{{$docCategory->id}}{{$affiliation_collapse}}" data-whatever="@getbootstrap"
                    style="float:right">
                        <i class="fa fa-plus pull-right"></i>
                    </a>
                @endif
            </h5>
        </div>
        @php
            $dispatcher_select = dispatcher_select($call->id, $docCategory->id, $client_id);
        @endphp
        <div id="collapseOneDoc{{$docCategory->id}}{{$affiliation_collapse}}" class="collapse" style="">
            <div class="table-responsive" style="overflow-x: initial;">
                <table class="table table-bordered table-xs mb-3">
                    <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>Status</th>
                            <th>Documento/Descrição</th>
                            <th>Última Edição</th>
                            <th width="50"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($dispatcher_select)
                        @php
                            if(is_null($dispatcher_select->status)){
                                $statusClass = '';
                                $inconStatus = '';
                            }elseif($dispatcher_select->status == 'approved'){
                                $statusClass = 'bg-success-300';
                                $inconStatus = 'fa fa-thumbs-up text-success';
                            }elseif($dispatcher_select->status == 'disapproved'){
                                $statusClass = 'bg-danger-300';
                                $inconStatus = 'fa fa-thumbs-down text-danger';
                            }elseif ($dispatcher_select->status == 'waiting'){
                                $statusClass = '';
                                $inconStatus = 'fa fa-warning text-warning';
                            }else{
                                $statusClass = '';
                                $inconStatus = '';                                
                            }
                        @endphp
                        <tr class="{{$statusClass}}">
                            <td>&nbsp;</td>
                            <td>
                                <i class="{{$inconStatus}}"></i>
                            </td>
                            <td>
                                @if (is_null($dispatcher_select->proof_of_payment))
                                    <span class="text-danger">Ainda não foi feito o upload do comprovante</span>
                                @else
                                    <a href="{{route('document_dispatche', ['dispatche' => $dispatcher_select->id])}}">Comprovante de Pagamento</a>
                                @endif
                            </td>
                            <td>{{date('d/m/Y H:i', strtotime($dispatcher_select->updated_at))}}</td>
                            <td>
                                <div class="icons">
                                    <a href="javascript:void(0)" data-toggle="dropdown">
                                        <i class="fa fa-ellipsis-v fa-lg"></i>
                                    </a>
                                    <div class="animated fadeIn dropdown-menu dropdown-notfication leftautoimportant">
                                        <div class="dropdown-content-body">            
                                            <div class="col-sm-12">
                                                <div class="basic-form">

                                                    @if (is_null($dispatcher_select->proof_of_payment))
                                                        <div class="pt-2">
                                                            <span>Ainda não foi feito o upload do comprovante</span>
                                                        </div>
                                                    @else
                                                        <div class="pt-2">
                                                            {{ Form::open(['route' => ['admin.cases.dispatcher_approve',$dispatcher_select->id] ]) }}
                                                            <i class="fa fa-thumbs-up text-success"></i>
                                                            <a href="javascript:void(0);" onclick="$(this).closest('form').submit()">Aprovar</a>
                                                            {{ Form::close() }}
                                                        </div>

                                                        <div class="pt-2">
                                                            {{ Form::open(['route' => ['admin.cases.dispatcher_reprove',$dispatcher_select->id] ]) }}
                                                            <i class="fa fa-thumbs-down text-danger"></i>
                                                            <a href="javascript:void(0);" onclick="$(this).closest('form').submit()">Reprovar</a>
                                                            {{ Form::close() }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@else
    <div>
        <div class="card-header">
            <h5 id="cbox-category{{$docCategory->id}}{{$affiliation_collapse}}" class="mb-0 collapsed"
                data-toggle="collapse" data-target="#collapseOneDoc{{$docCategory->id}}{{$affiliation_collapse}}"
                aria-expanded="false" aria-controls="collapseOne">
                <i class="fa arrow" aria-hidden="true"></i> {!! $name_category !!}
                @if (!isset($sstep))
                    <a href="javascript:void(0)" data-toggle="modal"
                    data-target="#addDocModal{{$docCategory->id}}{{$affiliation_collapse}}" data-whatever="@getbootstrap"
                    style="float:right">
                        <i class="fa fa-plus pull-right"></i>
                    </a>
                @endif
            </h5>
        </div>
        <div id="collapseOneDoc{{$docCategory->id}}{{$affiliation_collapse}}" class="collapse" @php /* data-parent="#accordion-doc" */ @endphp style="">
            <div>
                <div class="table-responsive" style="overflow-x: initial;">
                    <table class="table table-bordered table-xs mb-3">
                        <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>Status</th>
                            <th>Documento/Descrição</th>
                            <th>Última Edição</th>
                            <th width="50"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $list_boxopen = 'close';
                            $listDocumentsCase = $callDocument->documentCase($call->id, $docCategory->id, $client_id);
                        @endphp
                        @foreach ($listDocumentsCase as $item)

                            @php
                                if($item->cdstatus == 'approved'){
                                    $statusClass = 'bg-success-300';
                                    $inconStatus = 'fa fa-thumbs-up text-success';
                                }elseif($item->cdstatus == 'disapproved'){
                                    $statusClass = 'bg-danger-300';
                                    $inconStatus = 'fa fa-thumbs-down text-danger';
                                }elseif ($item->cdstatus == 'waiting'){
                                    $statusClass = '';
                                    $inconStatus = 'fa fa-warning text-warning';
                                }elseif ($item->cdstatus == 'hired'){
                                    $statusClass = '';
                                    $inconStatus = 'fa fa-dollar text-warning';
                                }else{
                                    $statusClass = '';
                                    $inconStatus = '';
                                    if (!is_null($item->file)){
                                        $statusClass = '';
                                        $inconStatus = 'fa fa-hourglass';
                                    }   
                                }
                                if($item->cdstatus!='approved' && $list_boxopen == 'close'){ 
                                    $categoryOpen = !is_null(session('categoryOpen')) ? session('categoryOpen') : [];                                
                                    array_push($categoryOpen, $docCategory->id.$affiliation_collapse);
                                    session(['categoryOpen' => $categoryOpen]);
                                    $list_boxopen = 'open';
                                }
                            @endphp

                            <tr class="{{$statusClass}}">
                                <td>
                                    <input type="checkbox" name="check_item" class="check_item" value="{{$item->cdid}}">
                                </td>
                                <td width="25">
                                    <i class="{{$inconStatus}}"></i>
                                </td>
                                <td>
                                    {{$item->cdtitle}}
                                    @if (!is_null($item->file))
                                        <a href="{{route('document_client', ['call_document' => $item->cdid])}}"
                                        target="_blank">
                                            <i class="fa fa-link"></i>
                                        </a>
                                    @endif
                                </td>
                                <td width="140">{{$item->updated_at}} </td>
                                <td width="100">
                                    <span class="action-table">
                                        <ul class="mb-0">
                                            <li class="icons p-0 d-inline-block pr-2">
                                                {{ Form::open(['route' => ['admin.cases.document_destroy',$item->cdid], 'method' => 'DELETE', 'id' => 'frm-delete-'.$item->cdid ]) }}
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
                                                                @php
                                                                    $sinalizaup = isset($check_returnbox) ? '_sup' : '';
                                                                @endphp
                                                                @if(!is_null($item->file) && $item->cdstatus != "waiting")
                                                                    <div class="pt-2">
                                                                        {{ Form::open(['route' => ['admin.cases.document_approve',$item->cdid], 'id' => "frm-approved-{$item->cdid}_{$affiliation_id}{$sinalizaup}" ]) }}
                                                                            <i class="fa fa-thumbs-up text-success"></i>
                                                                            <a href="javascript:void(0);"
                                                                            onclick="$('#frm-approved-{{$item->cdid}}_{{$affiliation_id}}{{$sinalizaup}}').submit()">Aprovar</a>
                                                                        {{ Form::close() }}
                                                                    </div>
                                                                @endif
                                                                @if(!is_null($item->file) && $item->cdstatus != "waiting")
                                                                    <div class="pt-2">
                                                                        <i class="fa fa-thumbs-down text-danger"></i>
                                                                        <a href="javascript:void(0);" data-toggle="modal"
                                                                        data-target="#disapprovedDocModal{{$item->cdid}}_{{$affiliation_id}}{{$sinalizaup}}"
                                                                        data-whatever="@getbootstrap">Reprovar</a>
                                                                    </div>
                                                                @endif
                                                                @if($item->cdstatus != "hired")
                                                                    <div class="pt-2 position-relative" style="cursor: pointer">
                                                                            {{ Form::open(['route' => ['admin.cases.document_anexo',$item->cdid], 'enctype' => 'multipart/form-data', 'id' => "anexaDocModal{$item->cdid}_{$affiliation_id}{$sinalizaup}" ]) }}                                                                                         
                                                                        {{ Form::open(['route' => ['admin.cases.document_anexo',$item->cdid], 'enctype' => 'multipart/form-data', 'id' => "anexaDocModal{$item->cdid}_{$affiliation_id}{$sinalizaup}" ]) }}                                                                                         
                                                                            {{ Form::open(['route' => ['admin.cases.document_anexo',$item->cdid], 'enctype' => 'multipart/form-data', 'id' => "anexaDocModal{$item->cdid}_{$affiliation_id}{$sinalizaup}" ]) }}                                                                                         
                                                                        {{ Form::open(['route' => ['admin.cases.document_anexo',$item->cdid], 'enctype' => 'multipart/form-data', 'id' => "anexaDocModal{$item->cdid}_{$affiliation_id}{$sinalizaup}" ]) }}                                                                                         
                                                                            {{ Form::open(['route' => ['admin.cases.document_anexo',$item->cdid], 'enctype' => 'multipart/form-data', 'id' => "anexaDocModal{$item->cdid}_{$affiliation_id}{$sinalizaup}" ]) }}                                                                                         
                                                                            <i class="fa fa-link"></i>
                                                                            <span style="cursor: pointer">
                                                                                @if (!is_null($item->file))
                                                                                    {{$item->cdstatus == "waiting" ? "Anexar Documento Contratado": "Substituir arquivo"}}
                                                                                @else
                                                                                    Anexar arquivo
                                                                                @endif
                                                                                <input type="file" name="file"
                                                                                    value="Procurar arquivo" style="top:0px"
                                                                                    class="ifileico"
                                                                                    onchange="document.getElementById('anexaDocModal{{$item->cdid}}_{{$affiliation_id}}{{$sinalizaup}}').submit();">
                                                                            </span>
                                                                        {{ Form::close() }}
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                                                            
                                            </li>
                                        </ul>
                                    </span>
                                    <div class="modal fade" id="disapprovedDocModal{{$item->cdid}}_{{$affiliation_id}}{{$sinalizaup}}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Reprovação</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {{ Form::open(['route' => ['admin.cases.document_reprove',$item->cdid] ]) }}
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label for="titulo">
                                                                    Motivo
                                                                </label>
                                                                <input type="text" name="reason" class="form-control"
                                                                    value="" placeholder="Digite da reprovação ">
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
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addDocModal{{$docCategory->id}}{{$affiliation_collapse}}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adicionar {{$docCategory->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ Form::open(['route' => ['admin.cases.storedocument',$call->id] ]) }}
                    {{ Form::hidden('client_id', $client_id) }}

                    @if (isset($check_returnbox) && $check_returnbox == 'ok')
                        {{ Form::hidden('check_returnbox', 'ok') }}
                    @endif

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="titulo">
                                    Tipo de Documento
                                </label>
                                <select multiple name="document_id[]" class="form-control" required="required"
                                        style="padding-bottom:50px;">
                                    <option value="">Selecione</option>
                                    @foreach ($docCategory->documents as $guide_list)
                                        <option value="{{$guide_list->id}}">{{$guide_list->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <input type="submit" value="Adicionar" class="btn btn-primary">
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endif