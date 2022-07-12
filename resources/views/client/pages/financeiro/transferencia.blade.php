@extends('client.layout.acesso')

@section('content')
<div class="row p-b-30">
    
    <div class="col-12 ico-money p-b-30">        
        <h2>Financeiro - Transferência Bancária</h2>
        <p>
            Sua contratação foi realizada na modalidade à Vista, ou seja, o pagamento de honorários advocatícios será imediatamente após a assinatura do contrato, devendo ser comprovada através de comprovante anexado abaixo.
        </p>
    </div>  
    <div class="col-8 col-12-xsmall">
        <div class="row gtr-uniform">
            <div class="col-11">

                <div class="box-upload m-b-25 m-t-30">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#uploadComprovanteModal" class="box-input-file">
                        
                    </a>                    
                    <h3>Comprovante dos Honorários</h3>
                </div>

            </div>
        </div>        

    </div>
    <div class="col-4 col-12-xsmall borda-esquerda">
        <h3 class="mb-30 tit2">Podemos te ajudar?</h3>
        @include('client.partials._helps')
    </div>  
</div>

<div class="row gtr-uniform">
    <div class="col-12">
        <a href="javascript:void(0);">VOLTAR</a>
    </div>                       
</div>

<div class="modal fade" id="uploadComprovanteModal" tabindex="-1" role="dialog" aria-labelledby="uploadComprovanteModalTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Instruções de envio do comprovante de Pagamento</h4>
            </div>
            <div class="modal-body">
                <div class="p-t-40 p-b-40 p-l-40 p-r-40 fs-24">
                   <ol>
                       <li>Efetue o pagamento através de internet banking ou em qualquer agência pessoalmente.</li>
                       <li>Envie o comprovante de pagamento.</li>
                   </ol>
                   <div class="row">
                       <div class="col-12 text-center">                            
                            {{ Form::open(['route' => ['client.financeiro.anexa_comprovante',$call->id], 'enctype' => 'multipart/form-data', 'id' => "anexaComprovanteModal" ]) }}                          
                            <button type="button" class="btn btn-default mb-10">
                                <input type="file" name="file" onchange="submit_form('anexaComprovanteModal');">
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


@endsection

@section('class_body') body-caixa-eletronica @endsection

