@extends('client.layout.acesso')

@section('content')
<div class="row p-b-30">
    
    <div class="col-12 ico-docs p-b-30">        
        <h2>Custas Processuais</h2>
        <p>
            Olá {{$client->name}}! Agora que suas documentação foi aprovada, Para darmos inicio ao processo, leia atentamente os próximos passos. Para facilitar, tenha em mãos os dados e documentos do Requerente e dos demais integrantes do processo.
        </p>
    </div>  
    <div class="col-8 col-12-xsmall">
        <div class="row gtr-uniform">
            <div class="col-11">
                @php
                    $hab = 'yes';
                @endphp
                @foreach ($call_guides as $item)

                @php
                    if(is_null($item->file) || $item->status == 'disapproved')
                        $hab = 'not';
                @endphp
                
                <div class="box-upload m-b-25">
                    <div class="row">
                        <div class="col-9 col-12-xsmall">
                            @if (is_null($item->file))
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#uploadCustasInicialModal{{$item->id}}" class="box-input-file">
                                    
                                </a>  
                            @else
                                <div @if($item->status == 'approved') title="guia aprovada" class="box-upload-success" @elseif($item->status == 'disapproved') title="guia reprovado" class="box-upload-error" @else title="guia revisão"  class="box-upload-wait" @endif>
                                    
                                </div>
                            @endif                  
                            <h3>{{$item->name}}</h3>
                            @if($item->status == 'disapproved')
                                <p class="text-danger">{{$item->reason}}</p>
                            @endif
                            @if (!is_null($item->file))
                                <button type="button" class="btn btn-default mb-10 iverse" onclick="location.href='{{route('guide_client', ['call_guide' => $item->id])}}';">Visualizar</button>
                            @endif
                        </div>
                        @if (!is_null($item->file))
                        <div class="col-3 col-12-xsmall text-right alignbuttom">
                            @if($item->status != 'approved')
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#uploadCustasInicialModal{{$item->id}}" class="text-uppercase dis-block w-full">SUBSTITUIR</a>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach             


            </div>
        </div>        

    </div>
    <div class="col-4 col-12-xsmall borda-esquerda">
        <h3 class="mb-30 tit2">Podemos te ajudar?</h3>
        @include('client.partials._helps')
    </div>  
</div>

<div class="row gtr-uniform">
    <div class="col-12 text-right">
        @if($hab == 'yes')
        {{ Form::open(['route' => ['client.guides.change_analise'] ]) }}
            <button type="submit" class="btn btn-default mb-10">Continuar</button>
        {{ Form::close() }}
        @else
            <button type="button" class="btn btn-default mb-10 disabled">Continuar</button>
        @endif
    </div>                               
</div>

@foreach ($call_guides as $item) 
<div class="modal fade" id="uploadCustasInicialModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="uploadCustasInicialModal{{$item->id}}Title" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Instruções de envio de comprovante {{$item->name}}</h4>
            </div>
            <div class="modal-body">
                <div class="p-t-40 p-b-40 p-l-40 p-r-40 fs-24">
                   <ol>
                       <li>Faça o download da Guia DARE em PDF. @if(!is_null($item->file_download)) <button type="button" class="btn btn-default mb-10 iverse" onclick="location.href='{{route('guide_file_client',['call_guide' => $item->id ])}}';" >Download</button> @endif </li>
                       <li>Efetue o pagamento através de internet banking ou em qualquer agência pessoalmente.</li>
                       <li>Envie o comprovante de pagamento.</li>
                   </ol>
                   <div class="row">
                       <div class="col-12 text-center">
                        {{ Form::open(['route' => ['client.guide.cases.guide_anexo',$item->id], 'enctype' => 'multipart/form-data', 'id' => "anexaDocModal".$item->id ]) }}
                            <button type="button" class="btn btn-default mb-10">
                                <input type="file" name="file" onchange="window.document.getElementById('anexaDocModal{{$item->id}}').submit();">
                                Enviar
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


@endsection

@section('step')
<div class="wrapperStepTriagem">
    <ul class="StepProgress">
        <li class="StepProgress-item is-done">
            <a href="javascript:void(0);">
                <strong>Informações Iniciais</strong>    
            </a>            
        </li>
        <li class="StepProgress-item is-done">
            <a href="javascript:void(0);">
                <strong>Documentos</strong>
            </a>
        </li>
        <li class="StepProgress-item current">
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
@if (/* $hab == 'yes' && */$call->stage_case == 'conferir_guias' )
<script>    
    setTimeout(function(){ $('#lockCustasInicialModal').modal({backdrop: 'static',keyboard: true,show: true}); }, 500);   
</script>
@endif
@endsection
