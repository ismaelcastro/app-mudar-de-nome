@php
    $affiliation_id = '';
    $affiliation_collapse = '';
    $client_id = $call->client->id;
    $name_category = $docCategory->name;
    $name_client = $call->client->first_name;

    if(isset($affiliation)){
        $affiliation_id = $affiliation->id;
        $affiliation_collapse = '_'.$affiliation_id;
        $client_id = $affiliation->client->id;
        $name_category = $docCategory->name.' - <strong class="text-primary">'.$affiliation->client->first_name.'</strong>';
        $name_client = $affiliation->client->first_name;
    }
@endphp

<div>
    <div class="card-header">
        <h5 id="cbox-category{{$docCategory->id}}{{$affiliation_collapse}}" class="mb-0 collapsed"
            data-toggle="collapse"
            data-target="#collapseOneExtra{{$docCategory->id}}{{$affiliation_collapse}}"
            aria-expanded="false" aria-controls="collapseOne">

            <i class="fa arrow" aria-hidden="true"></i> {!! $name_category !!}
            <a href="javascript:void(0)" data-toggle="modal"
               data-target="#addDocModalExtra{{$docCategory->id}}{{$affiliation_collapse}}"
               data-whatever="@getbootstrap"
               style="float:right">
                <i class="fa fa-plus pull-right"></i>
            </a>
        </h5>
    </div>
    <div id="collapseOneExtra{{$docCategory->id}}{{$affiliation_collapse}}" class="collapse">
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
                    $list_boxopen = 'close';
                    $listDocumentsCase = $callExtra->documentCase($call->id, $docCategory->id, $client_id);
                @endphp
                @foreach ($listDocumentsCase as $item)

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
                        <td width="25">
                            <i class="{{$inconStatus}}"></i>
                        </td>
                        <td>
                            {{$item->cdtitle}}
                            @if (!is_null($item->file))
                                <a href="{{route('extra_client', ['call_extra' => $item->cdid])}}" target="_blank">
                                    <i class="fa fa-link"></i>
                                </a>
                            @endif
                        </td>
                        <td width="180">{{$item->updated_at}} </td>
                        <td width="100">
                                    <span class="action-table">
                                        <ul class="mb-0">
                                            <li class="icons p-0 d-inline-block pr-2">
                                                {{ Form::open(['route' => ['admin.process.document_destroy',$item->cdid], 'method' => 'DELETE', 'id' => 'frm-delete-extra-'.$item->cdid ]) }}
                                                    <a href="javascript:void(0);"
                                                       onclick="$('#frm-delete-extra-{{$item->cdid}}').submit()"
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
                                                                        {{ Form::open(['route' => ['admin.process.document_approve',$item->cdid], 'id' => 'frm-approved-extra-'.$item->cdid ]) }}
                                                                            <i class="fa fa-thumbs-up text-success"></i>
                                                                            <a href="javascript:void(0);"
                                                                               onclick="$('#frm-approved-extra-{{$item->cdid}}').submit()">Aprovar</a>
                                                                        {{ Form::close() }}
                                                                    </div>
                                                                    <div class="pt-2">
                                                                        <i class="fa fa-thumbs-down text-danger"></i>
                                                                        <a href="javascript:void(0);" data-toggle="modal"
                                                                           data-target="#disapprovedDocExtraModal{{$item->cdid}}"
                                                                           data-whatever="@getbootstrap">Reprovar</a>
                                                                    </div>
                                                                @endif

                                                                <div class="pt-2 position-relative"
                                                                     style="cursor: pointer">
                                                                    {{ Form::open(['route' => ['admin.process.document_anexo',$item->cdid], 'enctype' => 'multipart/form-data', 'id' => "anexaDocExtraModal{$item->cdid}" ]) }}
                                                                        <i class="fa fa-link"></i>
                                                                        <span style="cursor: pointer">
                                                                            @if (!is_null($item->file))
                                                                                Substituir arquivo
                                                                            @else
                                                                                Anexar arquivo
                                                                            @endif
                                                                            <input type="file" name="file"
                                                                                   value="Procurar arquivo"
                                                                                   style="top:0px" class="ifileico"
                                                                                   onchange="document.getElementById('anexaDocExtraModal{{$item->cdid}}').submit();">
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

                            <div class="modal fade" id="anexaDocExtraModal{{$item->cdid}}" tabindex="-1"
                                 role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Anexar arquivo</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {{ Form::open(['route' => ['admin.process.document_anexo',$item->cdid], 'enctype' => 'multipart/form-data' ]) }}
                                            <div class="form-group">
                                                <label for="file">Arquivo</label>
                                                <input type="file" name="file" value="Procurar arquivo">
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 text-right">
                                                    <input type="submit" value="Enviar" class="btn btn-primary">
                                                </div>
                                            </div>
                                            {{ Form::close() }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="disapprovedDocExtraModal{{$item->cdid}}" tabindex="-1"
                                 role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Adicionar Procuração</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {{ Form::open(['route' => ['admin.process.document_reprove',$item->cdid] ]) }}
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
                                                    <input type="submit" value="Salvar" class="btn btn-primary">
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

<div class="modal fade" id="addDocModalExtra{{$docCategory->id}}{{$affiliation_collapse}}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="accordion-extras">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar {{$docCategory->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                {{ Form::open(['route' => ['admin.process.storedocument',$call->id] ]) }}
                <input name="client_id" type="hidden" value="{{ $client_id }}">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="titulo">
                                Tipo de Documento
                            </label>
                            <select multiple name="document_id[]" class="form-control" required="required">
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