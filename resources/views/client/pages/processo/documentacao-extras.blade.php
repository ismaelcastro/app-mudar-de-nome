@extends('client.layout.acesso')

@section('content')
    <div class="row p-b-30">
        <ul class="breadcrumb">
            <li><a href="{{ route('client.processo.acompanhamento') }}">Acompanhamento Processual</a></li>
            <li>Documentos Extras</li>
        </ul>
        <div class="col-12 ico-docs p-b-30">
            <h2>Envio de Documentos Extras</h2>
            <p class="text-justify">
                Segue abaixo os documentos solicitados pelo Ministério Público. Fique atento para que os documentos
                enviados sejam anexados nos campos corretos.
            </p>
        </div>
    </div>
    @php
        $hab = 'yes';
    @endphp
    @foreach ($document_category as $doc_category)
        @php
            $listDocumentsCase = $call_extra->documentCase($call->id, $doc_category->id);
            $listDocumentsCase_count = count($listDocumentsCase);

            $listDocumentsCaseUpload = $call_extra->documentCaseDifferentDisapproved($call->id, $doc_category->id);
            $listDocumentsCaseUpload_count = count($listDocumentsCaseUpload);
        @endphp

        @if($listDocumentsCase_count > 0 )
            @php
                $percent = $listDocumentsCaseUpload_count / ($listDocumentsCase_count / 100);
                $percent = (int)$percent;
                if($percent<100)
                    $hab = 'no';
            @endphp
            <div class="row borda-baixo m-b-30 p-b-20">
                <div class="col-10 col-12-xsmall @if ($percent == 100)ico-success @endif">
                    @if ($percent < 100)
                        <span class="chartpie" data-percent="{{$percent}}" style="height: 100%">
                            <span class="percent"></span>
                        </span>
                    @endif
                    <h2>
                        <img src="{{ url("storage/images/".$doc_category->image) }}" height="40" alt=""> &nbsp;
                        <a class=""
                           href="{{ route('client.processo.documentacao.documento.extra',['document_category'=>$doc_category->id]) }}">
                            {{$doc_category->name}}
                        </a>
                    </h2>
                    <p class="text-justify" style="display: flex">
                        Para solicitarmos toda documentação necessária, precisamos das informações de todas as
                        pessoas
                        envolvidas no processo.
                    </p>
                </div>
                <div class="col-2 col-12-xsmall text-right">
                    <button type="button" class="btn btn-default mb-10 {{ $percent == 0 ? "" : "iverse" }}"
                        {{ $call->stage_case == 'analise_documentacao' ? 'disabled' : '' }}
                        onclick="location.href='{{ route('client.processo.documentacao.documento.extra',['document_category'=>$doc_category->id]) }}'">
                        {{ $percent == 0 ? "Iniciar" : "Editar" }}
                    </button>
                </div>
            </div>
        @endif
    @endforeach
    <div class="row gtr-uniform">
        <div class="col-6">
            <a href="{{ route('client.processo.acompanhamento') }}">VOLTAR</a>
        </div>
        <div class="col-6 text-right">
            <button type="button" class="btn btn-default mb-10"
                    onclick="location.href='{{route('client.processo.acompanhamento')}}';">Continuar
            </button>
        </div>
    </div>
@endsection

@section('step')
    @include('client.layout._left_side')
@endsection

@section('class_body') body-screen-advogado @endsection

{{-- Modal Analise Documentos Extras --}}
@section('scriptjs')
    <div class="modal fade" id="lockDocumentsModalSend" tabindex="-1" role="dialog"
         aria-labelledby="lockDocumentsModalSend" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="p-t-40 p-b-40 p-l-40 p-r-40 text-center">
                        <h4>Você anexou todos os documentos extras solicitados, deseja encaminhar para análise
                            agora? </h4>
                    </div>
                    <div class="p-t-40 p-b-40 p-l-40 p-r-40 text-center">
                        <div class="col-12 text-right">
                            {{ Form::open(['route' => ['client.processo.send.document_extras', $call->id] ]) }}
                            <div class="center-block text-center">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Editar
                                </button>
                                <button type="submit" class="btn btn-default">Enviar Para Analise</button>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade." id="lockDocumentsModalSuccess" tabindex="-1" role="dialog"
         aria-labelledby="lockDocumentsModalTitle" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="p-t-40 p-b-40 p-l-40 p-r-40 text-center">
                        <h2>Documentos Extras enviados com sucesso</h2>
                        <img src="{{asset('assets-client/icones/success.svg')}}" width="200" alt="">
                        <p>Sua documetação extra está sendo avalidada, logo mais retornaremos contando para os próximos
                            passos</p>
                    </div>
                    <div class="p-t-40 p-b-40 p-l-40 p-r-40 text-center"></div>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Send DocExtras --}}
    @if (isset($percent) && $percent >= 100 && $call->procedural_status == "com_requerente")
        <script>
            setTimeout(function () {
                $('#lockDocumentsModalSend').modal({backdrop: 'static', keyboard: true, show: true});
            }, 100);
        </script>
    @endif
    {{-- Modal Send DocExtras Success --}}
    @if ($call->procedural_status == "com_advogado" )
        <script>
            setTimeout(function () {
                $('#lockDocumentsModalSuccess').modal({backdrop: 'static', keyboard: true, show: true});
            }, 100);
        </script>
    @endif
@endsection