@foreach ($extraCategories as $extraCategory) 
<div class="modal fade" id="addDocModalExtra2{{$extraCategory->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
</div>

<div>
    <div class="card-header">
        <h5 id="cbox-category{{$extraCategory->id}}" class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseOneExtra2{{$extraCategory->id}}" aria-expanded="false" aria-controls="collapseOne">
            <i class="fa arrow" aria-hidden="true"></i> {{$extraCategory->name}}
            @if (!isset($sstep))
            <a href="javascript:void(0)" data-toggle="modal" data-target="#addDocModalExtra{{$extraCategory->id}}" data-whatever="@getbootstrap" style="float:right">
                <i class="fa fa-plus pull-right"></i>
            </a>  
            @endif              
        </h5>            
    </div>
    <div id="collapseOneExtra2{{$extraCategory->id}}" class="collapse" data-parent="#accordion-doc" style="">
        <div>
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
                            $listDocumentsCase = $callExtra->documentCaseClose($call->id, $extraCategory->id);
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

                                if (!in_array($extraCategory->id, $categoryOpen))                                        
                                    array_push($categoryOpen, $extraCategory->id);
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
                                                <a href="javascript:void(0);" onclick="$('#frm-delete-extra-{{$item->cdid}}').submit()" class="text-dark">
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
                                                                {{ Form::open(['route' => ['admin.process.document_approve',$item->cdid], 'id' => 'frm-approved-extra-'.$item->cdid ]) }}
                                                                    <i class="fa fa-thumbs-up text-success"></i>
                                                                    <a href="javascript:void(0);" onclick="$('#frm-approved-extra-{{$item->cdid}}').submit()">Aprovar</a>
                                                                {{ Form::close() }}
                                                            </div>
                                                            <div class="pt-2">
                                                                <i class="fa fa-thumbs-down text-danger"></i>
                                                                <a href="javascript:void(0);" data-toggle="modal" data-target="#disapprovedDocExtraModal{{$item->cdid}}" data-whatever="@getbootstrap">Reprovar</a>
                                                            </div>
                                                            <div class="pt-2">                                                                                                
                                                                    <i class="fa fa-link"></i>
                                                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#anexaDocExtraModal{{$item->cdid}}" data-whatever="@getbootstrap">                                                                                                                                                                                                               
                                                                        @if (!is_null($item->file))
                                                                            Substituir arquivo
                                                                        @else
                                                                            Anexar arquivo
                                                                        @endif
                                                                    </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                                                            
                                        </li>
                                        
                                    </ul>
                                </span>

                                <div class="modal fade" id="anexaDocExtraModal{{$item->cdid}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Anexar arquivo</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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

                                <div class="modal fade" id="disapprovedDocExtraModal{{$item->cdid}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Adicionar Procuração</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                <input type="text" name="reason" class="form-control" value="" placeholder="Digite da reprovação ">                                                                 
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

</div>
@endforeach
