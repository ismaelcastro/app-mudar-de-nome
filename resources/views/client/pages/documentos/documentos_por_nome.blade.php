@extends('client.layout.acesso')

@section('content')
<div class="row p-b-30">
    <ul class="breadcrumb">
        <li><a href="{{ route('client.documentos.documentacao') }}">Documentação</a></li>
        <li>{{$document_category->name}}</li>
    </ul>
    <div class="col-12 ico-docs2 p-b-30" style="background-image: url({{ url("storage/images/".$document_category->image) }})">        
        <h2>{{$document_category->name}}</h2>
        <p>
            {{$document_category->description}}
        </p>
    </div>  
    <div class="col-8 col-12-xsmall">

        <div class="row" id="box_upload_comprovante_despachante" @if($radiosDesp_despachante == '') style="display:none" @endif>
            <div class="col-sm-12">
                <div class="p-t-40 p-b-40 p-l-40 p-r-40 fs-24">
                    <strong>Dados para pagamento</strong>
                    <p>Use os dados abaixo para fazer a transferência bancária ou PIX</p>
                    <div class="row">
                        <div class="col-4 col-12-xsmall text-center">                            
                             <img src="/assets-client/images/banco-inter-pj.jpg" alt="Banco Inter" class="img-responsive w-100">
                        </div>
                        <div class="col-8 col-12-xsmall"> 
                            <p class="fs-14"><strong>Banco Inter - 077</strong></p>
                            <p class="fs-14"><strong>Agência:</strong> 0001 | <strong>Conta:</strong> 711337-3 </p>
                            <p class="fs-14"><strong>CNPJ:</strong> 37.837.462/0001-78</p>
                            <p class="fs-14"><strong>Razão Social:</strong> Ratsbone & Magri Advogados Associados</p>
                            <p class="fs-14">
                                <strong>PIX:</strong> 
                                <input type="text" id="mail_pix" value="financeiro@ratsbonemagri.com.br">
                                <a class="btn btn-default btn_cpoy" href="javascript:void(0);" onclick="copy_field('mail_pix');"> <i class="fa fa-copy"></i></a>
                            </p>
                            <p class="fs-14"><strong>Valor por pacote:</strong> R$ 380,00</p>
                        </div>
                    </div>
                    @if($comprovante == 'no')
                    <div class="row">
                        <div class="col-12">
                            <p class="fs-14">
                                <div class="col-12 col-form-label option">
                                    {{ Form::open(['route' => ['client.documentos.change_dispatcher',$document_category->id],'style'=>'margin-bottom:0px;', 'id' => 'form_qtd_dispatcher' ]) }}
                                    <strong class="fs-15" style="margin-left: -15px;">Quantidade:</strong>
                                    <div class="radio-inline">
                                        @if ($call->is_claimant)
                                        <label class="radio radio-outline radio-success">
                                            <input type="checkbox" class="qtd_dispatcher" name="client_id[]" value="{{$client->id}}" onchange="$(this).closest('form').submit();" @if(in_array($client->id, $dispatcher)) checked="checked" @endif />
                                            <span></span>
                                            <div class="option-label">{{$client->name}}</div>
                                        </label>
                                        @endif
                                        @foreach ($affiliations as $affiliation)
                                        <label class="radio radio-outline radio-success">
                                            <input type="checkbox" class="qtd_dispatcher" name="client_id[]" value="{{$affiliation->client_id}}" onchange="$(this).closest('form').submit();" @if(in_array($affiliation->client_id, $dispatcher)) checked="checked" @endif />
                                            <span></span>
                                            <div class="option-label">{{$affiliation->client->name}}</div>
                                        </label>
                                        @endforeach
                                    </div>
                                    {{ Form::close() }}                                    
                                </div>
                            </p>
                        </div>                        
                        <div class="col-12">
                            <p class="fs-14"><strong>Total a ser depositado:</strong> <strong class="fs-16" style="color:#dabe67">R$ {{$total_real}}</strong></p>
                        </div>
                        <div class="col-12">
                            {{ Form::open(['route' => ['client.documentos.upload_receipt',$document_category->id], 'files' => true,'style'=>'margin-bottom:0px;', 'id' => 'form_receipt' ]) }}                            
                            @foreach ($dispatcher as $item)
                                <input type="hidden" name="dispatcher[]" value="{{$item}}">
                            @endforeach
                            <div class="box_field_upload">
                                <input type="file" name="file" onchange="$(this).closest('form').submit();">
                                <p>
                                    <i class="fa fa-upload"></i><br />
                                    Clique ou arraste o arquivo aqui para fazer o upload do comprovante
                                </p>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <div class="col-12">
                            <div class="alert_success">
                                Comprovante enviado com sucesso
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($dispatcher_first && !is_null($dispatcher_first->status) && $dispatcher_first->status == 'disapproved')
                    <div class="row">
                        <div class="col-12">
                            <div class="alert_danger">
                                Comprovante reprovado
                            </div>
                        </div>
                    </div>
                    @endif
                 </div>
            </div>
        </div>

        <div class="row gtr-uniform">
            <div class="col-11">
                <strong id="tit_requerent_e_outros">Requerentes e outros</strong>
                @php
                    $show_tit = 0;
                @endphp
                
                @if($document_category->forwardingagent && in_array($client->id, $dispatcher))

                @else
                @php
                    $show_tit = 1;
                    $dates_docs = \App\Helpers\Functions::_percent_document_per_name($client->id, $document_category->id);
                @endphp
                <div class="box-upload m-b-25 @if($dates_docs['pending_docs'] > 0) border-right-danger @endif" id="box_desp_{{$client->id}}">
                    <div class="row">
                        <div class="col-8 col-12-xsmall">
                            @if($dates_docs['pending_docs'] > 0)
                                <span class="chartpie" data-percent="{{$dates_docs['percent']}}">
                                    <span class="percent"></span>
                                </span>
                                <p class="text-danger m-b-0">{{$dates_docs['pending_docs']}} Documentos pendentes</p>
                            @else
                                <div class="box-upload-success m-b-20">
                    
                                </div>
                                <p class="text-success m-b-0">Documentos completos</p>
                            @endif
                            <h3> {{$client->name}} </h3>
                            <p class="m-b-0">Requerente</p>
                        </div>
                        <div class="col-4 col-12-xsmall text-right alignbuttom">
                            <a href="{{ route('client.documentos.documentos',['document_category'=>$document_category->id,'client_id'=>$client->id]) }}" class="text-uppercase dis-block w-full">
                                <img src="{{asset('assets-client/images/icones/edit.png')}}" alt="Editar" height="18">
                                EDITAR
                            </a>
                        </div>
                    </div>
                </div>
                @endif
            

                @foreach ($affiliations as $affiliation)
                    @if($document_category->forwardingagent && in_array($affiliation->client_id, $dispatcher))

                    @else
                        @php
                            $show_tit = 1;
                            $dates_docs = \App\Helpers\Functions::_percent_document_per_name($affiliation->client_id, $document_category->id);                        
                        @endphp                    
                        <div class="box-upload m-b-25 @if($dates_docs['pending_docs'] > 0) border-right-danger @endif " id="box_desp_{{$affiliation->client->id}}">
                            <div class="row">
                                <div class="col-8 col-12-xsmall">                                
                                    @if($dates_docs['pending_docs'] > 0)
                                        <span class="chartpie" data-percent="{{$dates_docs['percent']}}">
                                            <span class="percent"></span>
                                        </span>
                                        <p class="text-danger m-b-0">{{$dates_docs['pending_docs']}} Documentos pendentes</p>
                                    @else
                                        <div class="box-upload-success m-b-20">
                            
                                        </div>
                                        <p class="text-success m-b-0">Documentos completos</p>
                                    @endif
                                    <h3> {{$affiliation->client->name}} </h3>
                                    <p class="m-b-0">{{$type_list[$affiliation->type]}}</p>
                                </div>
                                <div class="col-4 col-12-xsmall text-right alignbuttom">
                                    <a href="{{ route('client.documentos.documentos',['document_category'=>$document_category->id,'client_id'=>$affiliation->client_id]) }}" class="text-uppercase dis-block w-full">
                                        <img src="{{asset('assets-client/images/icones/edit.png')}}" alt="Editar" height="18">
                                        EDITAR
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        

    </div>
    <div class="col-4 col-12-xsmall borda-esquerda">
        @if($document_category->forwardingagent)
        <div class="form-group row" style="padding: 0px 0px 0px 20px; margin-top: 15px;margin-bottom: 15px;">
            <div class="col-12 col-form-label option">
                <div class="radio-inline">
                    <label class="radio radio-outline radio-success">
                        <input type="radio" name="radiosDesp" value="anexar" {{$radiosDesp_anexar}}/>
                        <span></span>
                        <div class="option-label">Anexar Certidões</div>
                    </label>
                    <label class="radio radio-outline radio-success">
                        <input type="radio" name="radiosDesp" value="despachante" {{$radiosDesp_despachante}} />
                        <span></span>
                        <div class="option-label">Contratar Despachante</div>                        
                    </label>
                </div>
                <div class="option-body">Prazo estimado 3-5 dias úteis (após aprovação dos demais documentos)</div>
            </div>
        </div>
        @endif

        <h3 class="mb-30 tit2">Podemos te ajudar?</h3>
        @include('client.partials._helps')
    </div>
</div>

<div class="row gtr-uniform">
    <div class="col-6">
        <a href="{{ route('client.documentos.documentacao') }}">VOLTAR</a>
    </div>
    <div class="col-6 text-right">
        <button type="button" class="btn btn-default mb-10" onclick="location.href='{{ route('client.documentos.documentacao') }}';">Continuar</button>
    </div>                               
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


<div class="modal fade" id="uploadProcuracaoModal" tabindex="-1" role="dialog" aria-labelledby="uploadProcuracaoModalTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Instruções de envio da Procuração</h4>
            </div>
            <div class="modal-body">
                <div class="p-t-40 p-b-40 p-l-40 p-r-40 fs-24">
                   <ol>
                       <li>Faça o download da Procuração.  <button type="button" class="btn btn-default mb-10 iverse">Download</button> </li>
                       <li>Imprima e assine de forma simples a Procuração.</li>
                       <li>Escaneie ou tire uma foto legível com seu smartphone.</li>
                       <li>Lembrando que não é aceito assinatura digital.</li>
                   </ol>
                   <div class="row">
                       <div class="col-12 text-center">                            
                            <button type="button" class="btn btn-default mb-10">
                                <input type="file" name="procuracao">
                                Enviar
                            </button>
                       </div>
                   </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

    @push('scriptjs2')
        <script>
            function copy_field(t){
                window.document.getElementById(t).select(),document.execCommand("copy"),toastr.success("Sucesso!","Copiado para à área de transferência com sucesso")}

            $(document).ready(function(){
                $('input[name="radiosDesp"]').click(function(){
                    var valor = $(this).val();
                    console.log(valor);
                    if(valor == 'despachante'){
                        $('#box_upload_comprovante_despachante').show();
                    }else{
                        //$('#box_upload_comprovante_despachante').hide();
                        $('.qtd_dispatcher').each(function(){
                            $(this).removeAttr('checked');
                        });
                        $('#form_qtd_dispatcher').submit();
                    }
                });
                @if($show_tit == 0)
                    $('#tit_requerent_e_outros').hide();
                @endif
            });
        </script>
    @endpush
@endsection


@section('class_body') body-screen-cracha @endsection
