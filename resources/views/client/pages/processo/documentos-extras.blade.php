@extends('client.layout.acesso')

@section('content')
    <div class="row p-b-30">
        <ul class="breadcrumb">
            <li><a href="{{route('client.processo.docsextra')}}">Documentação Extra</a></li>
            <li>{{$document_category->name}}</li>
            @if(!is_null($client_id_url))
                <li>{{ $clientName = \App\Models\Client::find($client_id_url)->name }}</li>
            @endif

        </ul>
        <div class="col-12 ico-contract p-b-30"
             style="background-image: url({{ url("storage/images/".$document_category->image) }})">
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
                                $listDocumentsCase = $call_extra->documentCase($call->id, $document_category->id, $client->id);
                            @endphp
                            @foreach ($listDocumentsCase as $item)
                                @include('client.pages.documentos._document_item',['has_modal'=>''])
                            @endforeach

                            @foreach ($call->Affiliations as $affiliation)
                                @php
                                    $listDocumentsCase = $call_extra->documentCase($call->id, $document_category->id, $affiliation->client_id);
                                @endphp
                                @foreach ($listDocumentsCase as $item)
                                    @include('client.pages.documentos._document_item',['has_modal'=>'_affiliation'])
                                @endforeach
                            @endforeach
                        @else
                            @php
                                $listDocumentsCase = $call_extra->documentCase($call->id, $document_category->id, $client->id);
                            @endphp
                            @foreach ($listDocumentsCase as $item)
                                @include('client.pages.documentos._document_item',['has_modal'=>''])
                            @endforeach
                        @endif
                    @else
                        @php
                            $listDocumentsCase = $call_extra->documentCase($call->id, $document_category->id, $client_id_url);
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
            {{-- Adicionar Provas --}}
            @if ($document_category->client_add)
                <div class="row">
                    <div class="col-12 text-center">
                        <button type="button" class="btn btn-default mb-10 iverse mt-30" data-toggle="modal"
                                data-target="#addDocModal">
                            + Adicionar {{$document_category->name}}
                        </button>
                    </div>
                </div>
                <div class="modal fade" id="addDocModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                     aria-hidden="true" style="display: none;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    Adicionar {{$document_category->name}}</h5>
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
                                        <button type="submit" value="Adicionar" class="btn btn-default mt-20">
                                            Adicionar
                                        </button>
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
            <div class="box-accordion">
                <h3 class="accordion">O que é Procuração</h3>
                <div class="accordion" data-id="1">
                    <p> Lorem Ipsum tem sido o padrão desde a Idade Média. Um pintor teria peças mistas de texto em um
                        livro exemplar e é este texto que nós usamos hoje. Outra versão diz que este é um trecho do
                        livro de Cícero: "" De Finibus Bonorum e malorum "" seções 1.10.32 / 1.10.33. Este livro, muito
                        popular durante a Renascença, é um tratado sobre a teoria da ética. </p>
                </div>
            </div>
            <div class="box-accordion">
                <h3 class="accordion">Para que serve a Procuração?</h3>
                <div class="accordion" data-id="2">
                    <p> Lorem Ipsum tem sido o padrão desde a Idade Média. Um pintor teria peças mistas de texto em um
                        livro exemplar e é este texto que nós usamos hoje. Outra versão diz que este é um trecho do
                        livro de Cícero: "" De Finibus Bonorum e malorum "" seções 1.10.32 / 1.10.33. Este livro, muito
                        popular durante a Renascença, é um tratado sobre a teoria da ética. </p>
                </div>
            </div>
            <div class="box-accordion">
                <h3 class="accordion">Como assinar?</h3>
                <div class="accordion" data-id="3">
                    <p> Lorem Ipsum tem sido o padrão desde a Idade Média. Um pintor teria peças mistas de texto em um
                        livro exemplar e é este texto que nós usamos hoje. Outra versão diz que este é um trecho do
                        livro de Cícero: "" De Finibus Bonorum e malorum "" seções 1.10.32 / 1.10.33. Este livro, muito
                        popular durante a Renascença, é um tratado sobre a teoria da ética. </p>
                </div>
            </div>
            <div class="box-accordion">
                <h3 class="accordion">O que fazer se os dados estiverem errados?</h3>
                <div class="accordion" data-id="4">
                    <p> Lorem Ipsum tem sido o padrão desde a Idade Média. Um pintor teria peças mistas de texto em um
                        livro exemplar e é este texto que nós usamos hoje. Outra versão diz que este é um trecho do
                        livro de Cícero: "" De Finibus Bonorum e malorum "" seções 1.10.32 / 1.10.33. Este livro, muito
                        popular durante a Renascença, é um tratado sobre a teoria da ética. </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row gtr-uniform">
        <div class="col-6">
            <a href="{{route('client.processo.docsextra')}}">VOLTAR</a>
        </div>
        <div class="col-6 text-right">
            @if($document_category->id == 1 || $document_category->id == 4)
                <button type="button" class="btn btn-default mb-10" onclick="location.href='{{route('client.processo.docsextra')}}';">Continuar</button>
            @else
                <button type="button" class="btn btn-default mb-10" onclick="location.href='{{ route('client.processo.documentacao.documento.extra.documentos_por_nome', ['document_category' => $document_category->id])}}';">
                    Continuar
                </button>
            @endif
        </div>
    </div>

    @if ($document_category->by_contact)
        @php
            $listDocumentsCase = $call_extra->documentCase($call->id, $document_category->id, $client->id);
        @endphp
        @foreach ($listDocumentsCase as $item)
            <div class="modal fade" id="uploadDoc{{$item->cdid}}Modal" tabindex="-1" role="dialog"
                 aria-labelledby="uploadProcuracaoModalTitle" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Instruções de envio {{$item->name}}</h4>
                        </div>
                        <div class="modal-body">
                            <div class="p-t-40 p-b-40 p-l-40 p-r-40 fs-24">
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
                                        {{ Form::open(['route' => ['admin.process.document_anexo',$item->cdid], 'enctype' => 'multipart/form-data', 'id' => "anexaDocModal{$item->cdid}" ]) }}
                                        <button type="button" class="btn btn-default mb-10">
                                            <input type="file" name="file"
                                                   onchange="submit_form('anexaDocModal{{$item->cdid}}');">
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
        @endforeach

        @foreach ($call->Affiliations as $affiliation)
            @php
                $listDocumentsCase = $call_extra->documentCase($call->id, $document_category->id, $affiliation->client_id);
            @endphp
            @foreach ($listDocumentsCase as $item)
                <div class="modal fade" id="uploadDoc{{$item->cdid}}_affiliationModal" tabindex="-1" role="dialog"
                     aria-labelledby="uploadProcuracaoModalTitle" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Instruções de envio {{$item->name}}</h4>
                            </div>
                            <div class="modal-body">
                                <div class="p-t-40 p-b-40 p-l-40 p-r-40 fs-24">
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
                                            {{ Form::open(['route' => ['admin.process.document_anexo',$item->cdid], 'enctype' => 'multipart/form-data', 'id' => "anexaDocModal{$item->cdid}" ]) }}
                                            <button type="button" class="btn btn-default mb-10">
                                                <input type="file" name="file"
                                                       onchange="submit_form('anexaDocModal{{$item->cdid}}');">
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
            @endforeach
        @endforeach
    @else
        @php
            $listDocumentsCase = $call_extra->documentCase($call->id, $document_category->id, $client->id);
        @endphp

        @foreach ($listDocumentsCase as $item)
            <div class="modal fade" id="uploadDoc{{$item->cdid}}Modal" tabindex="-1" role="dialog"
                 aria-labelledby="uploadProcuracaoModalTitle" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Instruções de envio {{$item->name}}</h4>
                        </div>
                        <div class="modal-body">
                            <div class="p-t-40 p-b-40 p-l-40 p-r-40 fs-24">
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
                                        {{ Form::open(['route' => ['admin.process.document_anexo',$item->cdid], 'enctype' => 'multipart/form-data', 'id' => "anexaDocModal{$item->cdid}" ]) }}
                                        <button type="button" class="btn btn-default mb-10">
                                            <input type="file" name="file"
                                                   onchange="submit_form('anexaDocModal{{$item->cdid}}');">
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

@section('class_body') body-screen-celular @endsection
