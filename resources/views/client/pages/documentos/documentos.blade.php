@extends('client.layout.acesso')

@section('content')
<div class="row p-b-30">
    <ul class="breadcrumb">
        <li><a href="{{route('client.documentos.documentacao')}}">Documentação</a></li>
        <li><a href="{{ route('client.documentos.documentos_por_nome',['document_category'=>$document_category->id]) }}">{{$document_category->name}}</a></li>
        @if(!is_null($client_id_url))
            <li>{{ $clientName = \App\Models\Client::find($client_id_url)->name }}</li>
        @endif

    </ul>
    <div class="col-12 ico-contract p-b-30" style="background-image: url({{ url("storage/images/".$document_category->image) }})">
        <h2>{{$document_category->name}}</h2>
        <p>
            {{$document_category->description}}
        </p>
    </div>
    <div class="col-8 col-12-xsmall">
        <div class="row gtr-uniform">
            <div class="col-11">
            @if(is_null($client_id_url))
                @if ($document_category->by_contact)
                    @php
                        $listDocumentsCase = $call_document->documentCase($call->id, $document_category->id, $client->id);
                    @endphp
                    @foreach ($listDocumentsCase as $item)
                        @include('client.pages.documentos._document_item',['has_modal'=>''])
                    @endforeach

                    @foreach ($call->Affiliations as $affiliation)
                        @php
                            $listDocumentsCase = $call_document->documentCase($call->id, $document_category->id, $affiliation->client_id);
                        @endphp
                        @foreach ($listDocumentsCase as $item)
                            @include('client.pages.documentos._document_item',['has_modal'=>'_affiliation'])
                        @endforeach
                    @endforeach
                @else
                    @php
                    if($document_category->id == 1){
                        $listDocumentsCase = $call_document->documentCase($call->id, $document_category->id, null);
                    }else{
                        $listDocumentsCase = $call_document->documentCase($call->id, $document_category->id, $client->id);
                    }
                    @endphp
                    @foreach ($listDocumentsCase as $item)
                        @include('client.pages.documentos._document_item',['has_modal'=>''])
                    @endforeach
                @endif
            @else
                @php
                $listDocumentsCase = $call_document->documentCase($call->id, $document_category->id, $client_id_url);
                @endphp
                @foreach ($listDocumentsCase as $item)
                    @php
                      $has_modal = $client->id != $client_id_url ? '_affiliation' : '';
                    @endphp
                    @include('client.pages.documentos._document_item',['has_modal'=>$has_modal])
                @endforeach
            @endif
            </div>
        </div>

        @if ($document_category->client_add)
        <div class="row">
            <div class="col-12 text-center">
                <button type="button" class="btn btn-default mb-10 iverse mt-30" data-toggle="modal" data-target="#addDocModal" >
                    + Adicionar {{$document_category->name}}
                </button>
            </div>
        </div>


        <div class="modal fade" id="addDocModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="justify-content: center !important;">
                        <h5 class="modal-title" id="exampleModalLabel">Adicionar {{$document_category->name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ Form::open(['route' => ['client.documentos.storedocument'] ]) }}
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <select name="document_id" class="form-control" required="required">
                                            <option value="">Tipo de Documento</option>
                                            @foreach ($documents_list as $documents_item)
                                                <option value="{{$documents_item->id}}">{{$documents_item->name}}</option>
                                            @endforeach
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button type="submit" value="Adicionar" class="btn btn-default mt-20">Adicionar</button>
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        @endif


    </div>
    <div class="col-4 col-12-xsmall borda-esquerda">        
        <h3 class="mb-30 tit2">Podemos te ajudar?</h3>
        @include('client.partials._helps')
    </div>
</div>

<div class="row gtr-uniform">
    <div class="col-6">
        <a href="{{route('client.documentos.documentacao')}}">VOLTAR</a>
    </div>
    <div class="col-6 text-right">
        @if($document_category->id == 1 || $document_category->id == 4)
            <button type="button" class="btn btn-default mb-10" onclick="location.href='{{route('client.documentos.documentacao')}}';">Continuar</button>
        @else
            <button type="button" class="btn btn-default mb-10" onclick="location.href='{{route('client.documentos.documentos_por_nome',['document_category'=>$document_category->id])}}';">Continuar</button>
        @endif
    </div>
</div>

@if ($document_category->by_contact)
    @php
        $listDocumentsCase = $call_document->documentCase($call->id, $document_category->id, $client->id);
    @endphp
    @foreach ($listDocumentsCase as $item)
    <div class="modal fade" id="uploadDoc{{$item->cdid}}Modal" tabindex="-1" role="dialog" aria-labelledby="uploadProcuracaoModalTitle" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="justify-content: center !important;">
                    <h4 class="modal-title">Instruções de envio {{$item->name}}</h4>
                </div>
                <div class="modal-body">
                    <div class="p-b-40 p-l-40 p-r-40 fs-24">

                    @includeWhen(($item->type === "despachante"), 'client/pages/documentos/_emissao-nascimento-casamento',['cdid' => $item->doc_id, 'type' => $item->type])

                    @if($item->type !== "despachante")
                        @if (isset($item->step_by_step) && !is_null($item->step_by_step) )
                        @php $step_by_step = explode(';;',$item->step_by_step); @endphp
                                <ol id="stepByStep{{$item->doc_id}}">
                                @foreach ($step_by_step as $item_step)
                                    @php
                                    $tag_button = '{download}';
                                    $pos = strpos( $item_step, $tag_button );
                                    if($pos === false){
                                        //nada
                                    }else{
                                        //monta botão
                                        $link = "location.href='".route('client.documentos.generatedocument',['document'=>$item->doc_id])."';";
                                        $button = '<button onclick="'.$link.'" class="btn btn-default">Download</button>';
                                        $item_step = str_replace($tag_button,$button,$item_step);
                                    }
                                    @endphp
                                    <li>
                                        {!!$item_step!!}
                                    </li>
                                @endforeach
                            </ol>
                        @endif
                    @endif
                    <div id="anexarArquivo{{$item->doc_id}}" class="row">
                        <div class="col-12 text-center">
                            {{ Form::open(['route' => ['client.documentos.cases.document_anexo',$item->cdid], 'enctype' => 'multipart/form-data', 'id' => "anexaDocModal{$item->cdid}" ]) }}
                            <button type="button" class="btn btn-default mb-10 anexarArquivoBtn{{$item->doc_id}}"
                                @if($item->type == "despachante") disabled @endif>
                                <input type="file" name="file" onchange="submit_form('anexaDocModal{{$item->cdid}}');">
                                Anexar
                            </button>
                            {{ Form::close() }}
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="d4signDoc{{$item->cdid}}Modal" tabindex="-1" role="dialog" aria-labelledby="d4signDocModalTitle" style="display: none;" aria-hidden="true">
        @include('client.pages.documentos._content_modal_d4sign',['client'=>$client])
    </div>

    @endforeach
    @foreach ($call->Affiliations as $affiliation)
        @php
            $listDocumentsCase = $call_document->documentCase($call->id, $document_category->id, $affiliation->client_id);
        @endphp
        @foreach ($listDocumentsCase as $item)
        <div class="modal fade" id="uploadDoc{{$item->cdid}}_affiliationModal" tabindex="-1" role="dialog" aria-labelledby="uploadProcuracaoModalTitle" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="justify-content: center !important;">
                        <h4 class="modal-title">Instruções de envio {{$item->name}}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="p-b-40 p-l-40 p-r-40 fs-24">
                        @if (isset($item->step_by_step) && !is_null($item->step_by_step) )
                        @php
                            $step_by_step = explode(';;',$item->step_by_step);
                        @endphp
                        <ol>
                            @foreach ($step_by_step as $item_step)
                                @php
                                $tag_button = '{download}';
                                $pos = strpos( $item_step, $tag_button );
                                if($pos === false){
                                    //nada
                                }else{
                                    //monta botão
                                    $link = "location.href='".route('client.documentos.generatedocument',['document'=>$item->doc_id])."';";
                                    $button = '<button onclick="'.$link.'" class="btn btn-default">Download</button>';
                                    $item_step = str_replace($tag_button,$button,$item_step);
                                }
                                @endphp
                                <li>
                                    {!!$item_step!!}
                                </li>
                            @endforeach
                        </ol>
                        @endif
                        <div class="row">
                            <div class="col-12 text-center">
                                {{ Form::open(['route' => ['client.documentos.cases.document_anexo',$item->cdid], 'enctype' => 'multipart/form-data', 'id' => "anexaDocModal{$item->cdid}" ]) }}
                                <button type="button" class="btn btn-default mb-10">
                                    <input type="file" name="file" onchange="submit_form('anexaDocModal{{$item->cdid}}');">
                                    Anexar
                                </button>
                                {{ Form::close() }}
                            </div>
                        </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="d4signDoc{{$item->cdid}}_affiliationModal" tabindex="-1" role="dialog" aria-labelledby="d4signDocModalTitle" style="display: none;" aria-hidden="true">
            @include('client.pages.documentos._content_modal_d4sign',['client'=>$affiliation->client])
        </div>
        @endforeach
    @endforeach
@else
    @php
        $listDocumentsCase = $call_document->documentCase($call->id, $document_category->id, $client->id);
    @endphp
    @foreach ($listDocumentsCase as $item)
    <div class="modal fade" id="uploadDoc{{$item->cdid}}Modal" tabindex="-1" role="dialog" aria-labelledby="uploadProcuracaoModalTitle" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="justify-content: center !important;">
                    <h4 class="modal-title">Instruções de envio {{$item->name}}</h4>
                </div>
                <div class="modal-body">
                    <div class="p-b-40 p-l-40 p-r-40 fs-24">
                        @php $infoDoc = ($item->doc_id === 25 || $item->doc_id === 54 || $item->doc_id === 55) @endphp

                        @includeWhen($infoDoc, 'client/pages/documentos/_declaracao-de-testemunha', ['doc_id' => $item->doc_id, 'cdid' => $item->cdid])

                        @if (isset($item->step_by_step) && !is_null($item->step_by_step) && !$infoDoc )
                            @php $count = 1; $step_by_step = explode(';;',$item->step_by_step); @endphp
                            <ol id="step_by_step_provas_{{$item->cdid}}" style="list-style-type: none;">
                                @foreach ($step_by_step as $item_step)
                                    <span class="badge badge-secondary"
                                          style="background-color: #DABE67; border-radius: 0; font-size: 18px !important; float: left; margin-right: 20px;">{{ $count++ }}</span>
                                    @php
                                        $tag_button = '{download}';
                                        $pos = strpos( $item_step, $tag_button );
                                        if($pos){
                                            $link = "location.href='".route('client.documentos.generatedocument',['document'=>$item->doc_id])."';";
                                            $button = '<button onclick="'.$link.'" class="btn btn-default">Download</button>';
                                            $item_step = str_replace($tag_button,$button,$item_step);
                                        }
                                    @endphp
                                    <li> {!!$item_step!!} </li>
                                @endforeach
                            </ol>
                        @endif
                        <div class="row">
                            <div class="col-12 text-center">
                                {{ Form::open(['route' => ['client.documentos.cases.document_anexo',$item->cdid], 'enctype' => 'multipart/form-data', 'id' => "anexaDocModal{$item->cdid}" ]) }}
                                <button id="anexarBtnDeclaracao{{$item->cdid}}" type="button" class="btn btn-default mb-10" @if($infoDoc) disabled @endif>
                                    <input type="file" name="file" onchange="submit_form('anexaDocModal{{$item->cdid}}');">Anexar</button>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>    
    @endforeach

    @php
    if($document_category->id == 1){
        $listDocumentsCase = $call_document->documentCase($call->id, $document_category->id, null);
    }else{
        $listDocumentsCase = $call_document->documentCase($call->id, $document_category->id, $client->id);
    }        
    @endphp
    @foreach ($listDocumentsCase as $item)
    <div class="modal fade" id="d4signDoc{{$item->cdid}}Modal" tabindex="-1" role="dialog" aria-labelledby="d4signDocModalTitle" style="display: none;" aria-hidden="true">
        @include('client.pages.documentos._content_modal_d4sign',['client'=>$client])
    </div>
    @endforeach


@endif

@endsection

@section('step')
<div class="wrapperStepTriagem">
    <ul class="StepProgress">
        <li class="StepProgress-item is-done">
            <a href="javascript:void(0);">
                <strong>Informações Iniciais</strong>
            </a>
        </li>
        <li class="StepProgress-item current">
            <a href="javascript:void(0);">
                <strong>Documentos</strong>
            </a>
        </li>
        <li class="StepProgress-item">
            <a href="javascript:void(0);">
                <strong>Custas Processuais</strong>
            </a>
        </li>
        <li class="StepProgress-item">
            <a href="javascript:void(0);">
                <strong>Protocolado</strong>
            </a>
        </li>
    </ul>
</div>

@endsection

@push('scriptjs2')
<script>
    
    $(document).ready(function(){
        var url_atual = location.href;
        if (window.location.href.indexOf("#") > -1) {
            var tagLoad = url_atual.split('#');
            $('#'+tagLoad[1]).modal('show');
        }
    });
    
</script>
@endpush

@section('class_body') body-screen-celular @endsection
