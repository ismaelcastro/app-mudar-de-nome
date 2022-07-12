@extends('client.layout.acesso')

@section('content')
    <div class="row p-b-20">
        <div class="col-12 ico-docs">
            <h2>Documentação</h2>
            <p>
                Olá {{$client->first_name}}! Para darmos inicio ao processo, leia atentamente os próximos passos. Para
                facilitar, tenha em mãos os dados e documentos do Requerente e dos demais integrantes do processo.
            </p>
        </div>
    </div>
    @php
        $hab = 'yes';

     

    @endphp
    @foreach ($document_category as $doc_category)

        @php
            $listDocumentsCase = $call_document->documentCase($call->id, $doc_category->id);
            //$listDocumentsCase_count = $doc_category->forwardingagent ? 1 : count($listDocumentsCase);

            if($doc_category->forwardingagent && count($dispatchers) > 0){
                $listDocumentsCase_count = count($dispatchers);
                $listDocumentsCaseUpload = $dispatchers_sends;
            }else{
                $listDocumentsCase_count = count($listDocumentsCase);
                $listDocumentsCaseUpload = $call_document->documentCaseDifferentDisapproved($call->id, $doc_category->id);
            }
                        
            $listDocumentsCaseUpload_count = count($listDocumentsCaseUpload);            
            
        @endphp

        @if($listDocumentsCase_count > 0 )
            @php
                
                $percent = $listDocumentsCaseUpload_count / ($listDocumentsCase_count / 100);
                /*
                $pegar_ip = $_SERVER["REMOTE_ADDR"];
                $ip_permitido = "187.45.60.250";

                if ($pegar_ip == $ip_permitido) 
                {
                    if($doc_category->id == 5)
                        dd($listDocumentsCase_count,$dispatchers_sends);
                }
                */
                //$percent = $percent;
                //dd($listDocumentsCase->where('cdstatus','approved')->count(),$listDocumentsCase_count);

                if($doc_category->id == 1 ){
                    if($call->stage_case != 'aguardando_procuracao'){
                        $percent = 100;
                    }else{
                        $aprovados = $listDocumentsCase->where('cdstatus','approved')->count();
                        $percent = $aprovados / ($listDocumentsCase_count / 100);
                    }                   
                }
                $percent = (int)round($percent,0);

                if($percent<100)
                    $hab = 'no';

                /*
                $pegar_ip = $_SERVER["REMOTE_ADDR"];
                $ip_permitido = "187.45.60.250";

                if ($pegar_ip == $ip_permitido) 
                {
                    if($doc_category->id == 5){
                        dd($listDocumentsCaseUpload_count,$listDocumentsCase_count,$doc_category);
                    }
                    
                } 
                */
            @endphp
            <div class="row borda-baixo m-b-30 p-b-20">
                <div class="col-10 col-12-xsmall @if($percent == 100)ico-success @endif">
                    @if ($percent < 100)
                        <span class="chartpie" data-percent="{{$percent}}">
                            <span class="percent"></span>
                        </span>
                    @endif
                    <h2>
                        @if (!is_null($doc_category->image))
                            <img src="{{ url("public/storage/images/".$doc_category->image) }}" height="40"> &nbsp;
                        @endif
                        {{$doc_category->name}}
                    </h2>
                    <p>
                        {{$doc_category->description}}
                    </p>
                </div>
                <div class="col-2 col-12-xsmall text-right alignbuttom">
                    @if ( $call->stage_case == 'aguardando_procuracao' && $doc_category->id != 1)
                    <button type="submit" class="btn btn-default mb-10" disabled>
                        Iniciar
                    </button>
                    @else
                    <button type="button" class="btn btn-default mb-10 {{ $percent == 0 ? "" : "iverse" }}"
                            {{ $call->stage_case == 'analise_documentacao' || $call->stage_case == 'emissao_guias' ? 'disabled' : '' }}
                            onclick="location.href='{{ route('client.documentos.documentos',['document_category'=>$doc_category->id]) }}'">
                        {{ $percent == 0 ? "Iniciar" : "Editar" }}
                    </button>
                    @endif
                    
                </div>
            </div>
        @endif
    @endforeach
    <div class="row gtr-uniform">
        @if($hab == 'yes')
            <div class="col-12 text-right">
                {{ Form::open(['route' => ['client.documentos.change_analise'] ]) }}
                <button type="submit" class="btn btn-default mb-10" {{ $call->stage_case == 'analise_documentacao' || $call->stage_case == 'emissao_guias' ? 'disabled' : '' }}>
                    Enviar para Análise
                </button>
                {{ Form::close() }}
            </div>
        @else
            <div class="col-12 text-right">
                <button type="button" class="btn btn-default mb-10 disabled">Continuar</button>
            </div>
        @endif
    </div>
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

@section('scriptjs')
    <div class="modal fade" id="lockDocumentsModalSend" tabindex="-1" role="dialog"
         aria-labelledby="lockDocumentsModalSend" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="p-t-40 p-b-40 p-l-40 p-r-40 text-center"></div>
                    <div class="p-t-40 p-b-40 p-l-40 p-r-40 text-center">
                        <h4>
                            {{
                                $call->stage_case == 'analise_documentacao' ?
                                    "Seus documentos estão em Analise de Documentação, deseja encaminhar novamente?" :
                                    "Você anexou todos os documentos solicitados, deseja encaminhar para análise agora?"
                            }}
                        </h4>
                        @if($hab == 'yes')
                            <div class="col-12 text-right">
                                {{ Form::open(['route' => ['client.documentos.change_analise'] ]) }}

                                <div class="center-block text-center">
                                    <button type="button" class="btn btn-default iverse" data-dismiss="modal">Voltar
                                    </button>
                                    <button type="submit" class="btn btn-default">Enviar Para Analise</button>
                                </div>
                                {{ Form::close() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="lockDocumentsModalSuccess" tabindex="-1" role="dialog"
         aria-labelledby="lockDocumentsModalTitle" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="p-t-40 p-b-40 p-l-40 p-r-40 text-center">
                        <h2>Documentos enviados com sucesso</h2>
                        <img src="{{asset('assets-client/icones/success.svg')}}" width="200" alt="">
                        <p>
                            Após análise da socumentação enviada, entraremos em contato disponibilizando as Guias de
                            Custas Judiciais para o pagamento.
                        </p>
                    </div>

                    <div class="p-t-40 p-b-40 p-l-40 p-r-40 text-center">

                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($hab == 'yes' && isset($percent) && $percent >= 100 && $call->stage_case == 'aguardando_envio_cliente' )
        <script>
            setTimeout(function () {
                $('#lockDocumentsModalSend').modal({backdrop: 'static', keyboard: true, show: true});
            }, 100);
        </script>
    @endif

    @if ($hab == 'yes' && $call->stage_case == 'analise_documentacao' )
        <script>
            setTimeout(function () {
                $('#lockDocumentsModalSuccess').modal({backdrop: 'static', keyboard: true, show: true});
            }, 100);
        </script>
    @endif

    @if ($call->stage_case == 'emissao_guias' )
        <script>
            setTimeout(function () {
                $('#lockDocumentsModalSuccess').modal({backdrop: 'static', keyboard: true, show: true});
            }, 100);
        </script>
    @endif
@endsection
