@php
    $categoryOpen = [];
    session('categoryOpen',[]);
@endphp


@if (!is_null($call->breve_relato))


<div class="modal fade" id="breverelatoModal" tabindex="-1" role="dialog" aria-labelledby="breverelatoModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content" style="z-index: -1;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="msform">
            @if($all_breve == 'approved' && $call->stage_case != 'solicitacao_documentos')
            <ul id="progressbar">
                <li class="active w-100" id="payment"><strong>Breve Relato</strong></li>
            </ul>
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
            </div> <br>
            <fieldset>
                <div class="form-card">
                    <div class="row pb-2">
                        <div class="col-sm-4 text-right">
                            <strong>N° de Retificações</strong>
                        </div>
                        <div class="col-sm-8 text-left">
                            {{$qtd_retificacoes_permitidas}}
                        </div>
                    </div>                   
                    <div class="row pb-2">
                        <div class="col-sm-4 text-right">
                            <strong>Motivo</strong>
                        </div>
                        <div class="col-sm-8 text-left" style="color:{{ $call->reason->color ?? '' }};">
                            <button class="btn btn-mini text-white" type="button" style="background-color:{{ $call->reason->color ?? '' }} !important; border-color:{{ $call->reason->color ?? '' }} !important;">
                                {{$call->reason->name ?? ''}}
                            </button>
                        </div>
                    </div>
                    
                    @if(isset($proposal_fields_list['object_of_action']))
                        <div class="row pb-2">
                            <div class="col-sm-4 text-right">
                                <strong>Objeto da Ação</strong>
                            </div>
                            <div class="col-sm-8 text-left">
                                {{$proposal_fields_list['object_of_action']}}
                            </div>
                        </div> 
                    @endif

                    @if(!$call->is_claimant)
                        <div class="row pb-2">
                            <div class="col-sm-4 text-right">
                                <strong>Relação com Autor</strong>
                            </div>
                            <div class="col-sm-8 text-left">
                                {{$call->relationship_claimant}}
                            </div>
                        </div> 
                    @endif

                    <hr>
                    
                    <div class="col-12">
                        <div class="row gtr-uniform">
                            <div class="col-12">
                                <strong>Descreva com detalhes o(s) motivo(s):</strong>
                                @if($call->status_breve_relato == 'disapproved')
                                <p class="text-danger">
                                    <i class="fa fa-info-circle"></i> <strong>Reprovado:</strong> {{$call->reason_breve_relato}}
                                </p>
                                @endif
                            </div>
                            <div class="col-12">
                                {{ Form::textarea('breve_relato', $call->breve_relato, ['class' => $errors->has('breve_relato') ?  'is-invalid form-control' : 'form-control', 'cols' => '30', 'rows' => '10', 'readonly'=>'readonly']) }}
                            </div>    
                        </div> 
                        <div class="row">
                            <div class="col-12 text-center">
                                <h4 class="text-uppercase mt-3 mb-3 pb-2 border-bottom text-primary">Pedidos</h4>
                            </div>
                        </div>
                        @foreach ($call->rectifications as $rectification)
                        <div @if($rectification->status) class="bg-success-300" @endif>                        
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
                                    {{ Form::open(['route' => ['admin.cases.rectification',$rectification->id], 'id' => 'frm-rectification-'.$rectification->id ]) }}
                                    <span>                                        
                                        <input type="checkbox" name="status" onchange="$('#frm-rectification-{{$rectification->id}}').submit();" @if($rectification->status) checked="checked" @endif >                                        
                                    </span>
                                    <strong>NOME PRETENDIDO</strong>
                                    {{ Form::close() }}
                                </div>
                                <div class="col-sm-8 text-left">
                                    {{$rectification->desiredname}}

                                </div>
                            </div>
                        </div>
                        <hr>
                        @endforeach

                    </div>
                </div>
            </fieldset>
            @else
            <ul id="progressbar">
                <li class="active" id="account"><strong>Informações</strong></li>
                <li id="personal"><strong>Partes</strong></li>
                <li id="payment"><strong>Breve Relato</strong></li>
                <li id="confirm"><strong>Documentos</strong></li>
            </ul>
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
            </div> <br>
            <fieldset>
                <div class="form-card">
                    <div class="btn-border-bottom pt-5 mb-3 fs-13">
                        <div class="p-t-15">
                            <div class="row pb-2">
                                <div class="col-sm-4 text-right text-uppercase">
                                    <strong>O Contratante é o Requerente?</strong>
                                </div>
                                <div class="col-sm-8 text-left ">
                                    {{$call->is_claimant ? 'Sim' : 'Não'}}
                                </div>
                            </div>

                            @if(isset($proposal_fields_list['object_of_action']))
                                <div class="row pb-2">
                                    <div class="col-sm-4 text-right text-uppercase">
                                        <strong>Objeto da Ação</strong>
                                    </div>
                                    <div class="col-sm-8 text-left">
                                        {{$proposal_fields_list['object_of_action']}}
                                    </div>
                                </div> 
                            @endif

                            @if(!$call->is_claimant)
                                <div class="row pb-2">
                                    <div class="col-sm-4 text-right text-uppercase">
                                        <strong>Relação com Autor</strong>
                                    </div>
                                    <div class="col-sm-8 text-left">
                                        {{$call->relationship_claimant}}
                                    </div>
                                </div> 
                            @endif

                        </div>
                    </div>

                    @include('admin.partials._aba_casos',['nopd' => 'yes'])  

                </div>
                <input type="button" name="next" class="next action-button" value="Avançar" />
            </fieldset>
            <fieldset>
                <div class="form-card">
                    @foreach ($call->document as $document)
                    @if($document->document->document_category_id == 1)
                    <div>
                        <div class="card-header position-relative @if($document->status == 'pending') bg-success-300 @endif ">
                            <h5 id="cbox-category{{$document->id}}" class="mb-0 collapsed"
                                data-toggle="collapse" data-target="#collapseOneDoc{{$document->id}}"
                                aria-expanded="false" aria-controls="collapseOne">
                                <i class="fa arrow" aria-hidden="true"></i> {{ $document->name }} <strong class="text-primary"> {{ $document->client->name }}</strong>
                            </h5>
                            <div class="check-approve-relato">
                                {{ Form::open(['route' => ['admin.cases.document_pending',$document->id], 'id' => 'frm-pending-'.$document->id ]) }}
                                    <input type="checkbox" name="status" onchange="$('#frm-pending-{{$document->id}}').submit();" @if($document->status == 'pending') checked="checked" @endif >
                                {{ Form::close() }}
                            </div>
                        </div>
                        <div id="collapseOneDoc{{$document->id}}" class="collapse"
                             @php /* data-parent="#accordion-doc" */ @endphp style="">
                            <div>
                                {{ Form::model($document->client, ['route' => ['admin.clients.update',$document->client->id], 'method' => 'PUT' ]) }}
                                @include('admin.partials._form_client')
                                <div class="col-sm-12 text-right">
                                    <button type="submit" class="btn btn-primary ml-2">Atualizar</button>
                                </div>
                                {{ Form::close() }}
                            </div>
                            <hr>
                            @if (!is_null($document->document->affiliation))
                                @php
                                    $type_affiliation = $document->document->affiliation;
                                    $affiliation = $call->Affiliations()->where('type',$type_affiliation)->first();
                                @endphp
                                @if($affiliation)
                                    <div class="col-12 text-center">
                                        <h4 class="text-uppercase mt-3 mb-3 pb-2 border-bottom text-primary">{{$affiliation_types[$type_affiliation]}}</h4>
                                    </div> 
                                    <div>                                    
                                        {{ Form::model($affiliation->client, ['route' => ['admin.clients.update',$affiliation->client_id], 'method' => 'PUT' ]) }}
                                        @include('admin.partials._form_client')
                                        <div class="col-sm-12 text-right">
                                            <button type="submit" class="btn btn-primary ml-2">Atualizar</button>
                                        </div>
                                        {{ Form::close() }}
                                    </div>
                                    <hr>
                                @endif
                            @endif
                        </div>
                    </div>    
                    @endif
                    @endforeach
                </div>
                <input type="button" name="next" class="next action-button" value="Avançar" />
                <input type="button" name="previous" class="previous action-button-previous" value="Voltar" />
            </fieldset>
            <fieldset>
                <div class="form-card">
                    <div class="row pb-2">
                        <div class="col-sm-4 text-right">
                            <strong>N° de Retificações</strong>
                        </div>
                        <div class="col-sm-8 text-left">
                            {{$qtd_retificacoes_permitidas}}
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-sm-4 text-right">
                            <strong>MOTIVO</strong>
                        </div>
                        <div class="col-sm-8 text-left" style="color:{{ $call->reason->color ?? '' }};">
                            <button class="btn btn-mini text-white" type="button" style="background-color:{{ $call->reason->color ?? '' }} !important; border-color:{{ $call->reason->color ?? '' }} !important;">
                                {{$call->reason->name ?? ''}}
                            </button>
                        </div>
                    </div>
                    <hr>
                    
                    <div class="col-12">
                        <div class="row gtr-uniform">
                            <div class="col-12">
                                <strong>Descreva com detalhes o(s) motivo(s):</strong>
                                @if($call->status_breve_relato == 'disapproved')
                                <p class="text-danger">
                                    <i class="fa fa-info-circle"></i> <strong>Reprovado:</strong> {{$call->reason_breve_relato}}
                                </p>
                                @endif
                            </div>
                            <div class="col-12">
                                {{ Form::textarea('breve_relato', $call->breve_relato, ['class' => $errors->has('breve_relato') ?  'is-invalid form-control' : 'form-control', 'cols' => '30', 'rows' => '10', 'readonly'=>'readonly']) }}
                            </div>    
                        </div> 
                        <div class="row">
                            <div class="col-12 text-center">
                                <h4 class="text-uppercase mt-3 mb-3 pb-2 border-bottom text-primary">Pedidos</h4>
                            </div>
                        </div>
                        @foreach ($call->rectifications as $rectification)
                        <div @if($rectification->status) class="bg-success-300" @endif>                        
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
                                    {{ Form::open(['route' => ['admin.cases.rectification',$rectification->id], 'id' => 'frm-rectification-'.$rectification->id ]) }}
                                    <span>                                        
                                        <input type="checkbox" name="status" onchange="$('#frm-rectification-{{$rectification->id}}').submit();" @if($rectification->status) checked="checked" @endif >                                        
                                    </span>
                                    <strong>NOME PRETENDIDO</strong>
                                    {{ Form::close() }}
                                </div>
                                <div class="col-sm-8 text-left">
                                    {{$rectification->desiredname}}

                                </div>
                            </div>
                        </div>
                        <hr>
                        @endforeach

                    </div>
                </div>
                    
                    
                      
                <input type="button" name="next" class="next action-button" value="Avançar" />
                <input type="button" name="previous" class="previous action-button-previous" value="Voltar" />
            </fieldset>
            <fieldset>
                <div class="form-card">
                    @php
                        unset($affiliation);
                    @endphp
                    @foreach ($documentCategories->where('id','<>','1') as $docCategory)
                        @if ($docCategory->by_contact)
                            @include('admin.partials._docs_accordion_item',['nm_client' => $call->client->name,'check_returnbox' => 'ok'])
                            @foreach ($call->Affiliations as $affiliation)
                                @include('admin.partials._docs_accordion_item',['check_returnbox' => 'ok'])
                                @php
                                    unset($affiliation);
                                @endphp
                            @endforeach        
                        @else
                            @include('admin.partials._docs_accordion_item',['check_returnbox' => 'ok'])
                        @endif                        
                    @endforeach                  
                </div>
                <input type="button" name="next" class="btn btn-primary ml-2 mt-3" data-dismiss="modal" value="Solicitar Assinatura das Procurações" onclick="$('#frm-approved_breve_relato').submit()" />
            </fieldset>
            @endif
        </div>        
      </div>
    </div>
</div>


    <div>
        <div class="card-header">
            <h5 id="cbox-category_breve_relato" class="mb-0 " data-toggle="collapse" data-target="#collapseOneDoc_breve_relato" aria-expanded="@if($call->status_breve_relato != 'approved') true @else false @endif " aria-controls="collapseOne">
                <i class="fa arrow" aria-hidden="true"></i> Breve Relato
            </h5>        
        </div>
        <div id="collapseOneDoc_breve_relato" class="collapse @if($call->status_breve_relato != 'approved') show @endif" style="">
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
                                if($call->status_breve_relato == 'approved'){
                                    $statusClass = 'bg-success-300';
                                    $inconStatus = 'fa fa-thumbs-up text-success';
                                }elseif($call->status_breve_relato == 'disapproved'){
                                    $statusClass = 'bg-danger-300';
                                    $inconStatus = 'fa fa-thumbs-down text-danger';
                                }else{
                                    $statusClass = '';
                                    $inconStatus = 'fa fa-hourglass';
                                }
                            @endphp
                            <tr class="{{$statusClass}}">
                                <td>
                                    <input type="checkbox" name="check_item" class="check_item" value="0">
                                </td>
                                <td width="25">
                                    <i class="{{$inconStatus}}"></i>
                                </td>
                                <td>
                                    {{ Form::open(['route' => ['admin.calls.generate_breve_relato',$call->id], 'id' => 'frm-generate-b-relato', 'style' => 'display: none' ]) }}
                                    
                                    <a href="javascript:void(0);" onclick="document.getElementById('frm-generate-b-relato').submit();" target="_blank" style="display: none"> 
                                        <i class="fa fa-link"></i>
                                    </a>   
                                    {{ Form::close() }}   
                                    Breve Relato
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#breverelatoModal"> 
                                        <i class="fa fa-link"></i>
                                    </a>
                                </td>
                                <td width="140">
                                    @if (!is_null($call->update_breve_relato))
                                        {{ date('d/m/Y H:i', strtotime($call->update_breve_relato)) }}
                                    @endif
                                </td>
                                <td width="100">
                                    <span class="action-table">
                                        <ul class="mb-0">
                                        
                                            <li class="icons dropdown p-0 d-inline-block">
                                                <a href="javascript:void(0)" data-toggle="dropdown">
                                                    <i class="fa fa-ellipsis-v fa-lg"></i>
                                                </a>
                                                <div class="animated fadeIn dropdown-menu dropdown-notfication leftautoimportant">
                                                    <div class="dropdown-content-body">            
                                                        <div class="col-sm-12">
                                                            <div class="basic-form">
                                                                <div class="pt-2">  
                                                                    {{ Form::open(['route' => ['admin.cases.breve_relato_approve',$call->id], 'id' => 'frm-approved_breve_relato' ]) }}
                                                                        <i class="fa fa-thumbs-up text-success"></i>
                                                                        <a href="javascript:void(0);" onclick="$('#frm-approved_breve_relato').submit()">Aprovar</a>
                                                                    {{ Form::close() }}
                                                                </div>
                                                                <div class="pt-2">
                                                                    <i class="fa fa-thumbs-down text-danger"></i>
                                                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#disapprovedDocModal_breve_relato" data-whatever="@getbootstrap">Reprovar</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                                                            
                                            </li>
                                            
                                        </ul>
                                    </span>

                                    

                                    <div class="modal fade" id="disapprovedDocModal_breve_relato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Motivo por reprovar o Breve Realato</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {{ Form::open(['route' => ['admin.cases.breve_relato_reprove',$call->id] ]) }}
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="titulo">
                                                                        Motivo
                                                                    </label>
                                                                    <input type="text" name="reason" class="form-control" value="" placeholder="Motivo da reprovação">                                                                 
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

                        </tbody>
                    </table>                
                </div>
            </div>
        </div>


    </div>
@endif


@if($call->status_breve_relato == 'approved')
    @foreach ($documentCategories as $docCategory)

        @if ($docCategory->by_contact)
            @include('admin.partials._docs_accordion_item',['nm_client' => $call->client->name])
            @foreach ($call->Affiliations as $affiliation)
                @include('admin.partials._docs_accordion_item')
                @php
                    unset($affiliation);
                @endphp
            @endforeach        
        @else
            @include('admin.partials._docs_accordion_item')
        @endif    
        
    @endforeach
@endif

@if (session()->has('categoryOpen'))
<script>    
    window.onload = function() {
        @foreach (session('categoryOpen') as $item)            
            setTimeout(function(){ document.getElementById('cbox-category{{$item}}').click(); }, 3000);
        @endforeach 
    };   
</script>
@endif
