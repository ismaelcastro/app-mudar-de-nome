@php
    $categoryGuideOpen = [];
@endphp
@foreach ($guideCategories as $guideCategory)
    <div>
        {{ Form::open(['route' => ['admin.cases.storeguide',$call->id], 'id' => 'frm_addguia_'.$guideCategory->id ]) }}
            {{ Form::hidden('guide_category_id', $guideCategory->id) }}
        {{ Form::close() }}
        <div class="card-header">
            <h5 id="gbox-category{{$guideCategory->id}}" class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseGuide{{$guideCategory->id}}" aria-expanded="false" aria-controls="collapseOne">
                <i class="fa arrow" aria-hidden="true"></i> {{$guideCategory->name}}
                <a href="javascript:void(0)" onclick="document.getElementById('frm_addguia_{{$guideCategory->id}}').submit();" style="float:right">
                    <i class="fa fa-plus pull-right"></i>
                </a>
            </h5>

        </div>

        <div id="collapseGuide{{$guideCategory->id}}" class="collapse" data-parent="#accordion-guias" style="">
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
                                $listGuidesCase = $callGuide->guideCase($call->id, $guideCategory->id);
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

                                    if (!in_array($guideCategory->id, $categoryGuideOpen))                                        
                                        array_push($categoryGuideOpen, $guideCategory->id);
                                }
                            @endphp

                            <tr class="{{$statusClass}}">
                                <td width="25">
                                    <i class="{{$inconStatus}}"></i>
                                </td>
                                <td>
                                    {{$item->cdtitle}}
                                    @if (!is_null($item->file))
                                        <a href="{{route('guide_client', ['call_guide' => $item->cdid])}}" target="_blank"> <i class="fa fa-link"></i> </a>
                                    @endif
                                    @if (!is_null($item->file_download))
                                        &nbsp;
                                        <a href="{{route('guide_client', ['call_guide' => $item->cdid])}}" target="_blank"> <i class="fa fa-file-pdf-o"></i> </a>
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
                                                                        <a href="javascript:void(0);" onclick="$('#frm-approved-{{$item->cdid}}').submit()">Aprovar</a>
                                                                    {{ Form::close() }}
                                                                </div>
                                                                <div class="pt-2">
                                                                    <i class="fa fa-thumbs-down text-danger"></i>
                                                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#disapprovedGuideModal{{$item->cdid}}" data-whatever="@getbootstrap">Reprovar</a>
                                                                </div>
                                                                <div class="pt-2">
                                                                    <i class="icofont icofont-clip"></i>
                                                                    <input id="upload_comprovante" type="file" style="text-decoration:none;display:none"/>
                                                                    <a href="" id="upload_link_comprovante">@if(!is_null($item->file))Substituir Comprovante @else Anexar Comprovante @endif</a>
                                                                </div>
                                                                <div class="pt-2">                                                                                                
                                                                    <i class="icofont icofont-clip"></i>
                                                                     <input id="upload_guia" type="file" style="text-decoration:none;display:none"/>
                                                                    <a href="" id="upload_link_guia">@if(!is_null($item->file_download))Substituir Guia @else Anexar Guia @endif</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </span>

                                    <div class="modal fade" id="disapprovedGuideModal{{$item->cdid}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="guide">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Adicionar Procuração</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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