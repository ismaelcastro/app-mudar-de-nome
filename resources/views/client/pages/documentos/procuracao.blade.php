@extends('client.layout.acesso')

@section('content')
<div class="row p-b-30">
    <ul class="breadcrumb">
        <li><a href="javascript:void(0);">Documentação</a></li>
        <li>Procuração</li>
    </ul>
    <div class="col-12 ico-contract p-b-30">        
        <h2>Procuração</h2>
        <p>
            Necessária para que possamos representar o Requerente e os demais integrantes no processo.
        </p>
    </div>  
    <div class="col-8 col-12-xsmall">
        <div class="row gtr-uniform">
            <div class="col-11">

                <div class="box-upload m-b-25">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#uploadProcuracaoModal" class="box-input-file">
                        
                    </a>                    
                    <h3>Thiago Ratsbone</h3>
                </div>

                <div class="box-upload">
                    <div class="row">
                        <div class="col-8 col-12-xsmall">
                            <div class="box-upload-success">
                        
                            </div>                    
                            <h3>Leonardo Ratsbone</h3>
                            <button type="button" class="btn btn-default mb-10 iverse">Visualizar</button>
                        </div>
                        <div class="col-4 col-12-xsmall text-right alignbuttom">
                            <a href="javascript:void(0);" class="text-uppercase dis-block w-full">Remover</a>
                        </div>
                    </div>
                    
                </div>


            </div>
        </div>        

    </div>
    <div class="col-4 col-12-xsmall borda-esquerda">
        <h3 class="mb-30 tit2">Podemos te ajudar?</h3>
        <div class="box-accordion">
            <h3 class="accordion">O que é Procuração</h3>
            <div class="accordion" data-id="1">
                <p> Lorem Ipsum tem sido o padrão desde a Idade Média. Um pintor teria peças mistas de texto em um livro exemplar e é este texto que nós usamos hoje. Outra versão diz que este é um trecho do livro de Cícero: "" De Finibus Bonorum e malorum "" seções 1.10.32 / 1.10.33. Este livro, muito popular durante a Renascença, é um tratado sobre a teoria da ética. </p>
            </div>
        </div>
        <div class="box-accordion">
            <h3 class="accordion">Para que serve a Procuração?</h3>
            <div class="accordion" data-id="2">
                <p> Lorem Ipsum tem sido o padrão desde a Idade Média. Um pintor teria peças mistas de texto em um livro exemplar e é este texto que nós usamos hoje. Outra versão diz que este é um trecho do livro de Cícero: "" De Finibus Bonorum e malorum "" seções 1.10.32 / 1.10.33. Este livro, muito popular durante a Renascença, é um tratado sobre a teoria da ética. </p>
            </div>
        </div>
        <div class="box-accordion">
            <h3 class="accordion">Como assinar?</h3>
            <div class="accordion" data-id="3">
                <p> Lorem Ipsum tem sido o padrão desde a Idade Média. Um pintor teria peças mistas de texto em um livro exemplar e é este texto que nós usamos hoje. Outra versão diz que este é um trecho do livro de Cícero: "" De Finibus Bonorum e malorum "" seções 1.10.32 / 1.10.33. Este livro, muito popular durante a Renascença, é um tratado sobre a teoria da ética. </p>
            </div>
        </div>
        <div class="box-accordion">
            <h3 class="accordion">O que fazer se os dados estiverem errados?</h3>
            <div class="accordion" data-id="4">
                <p> Lorem Ipsum tem sido o padrão desde a Idade Média. Um pintor teria peças mistas de texto em um livro exemplar e é este texto que nós usamos hoje. Outra versão diz que este é um trecho do livro de Cícero: "" De Finibus Bonorum e malorum "" seções 1.10.32 / 1.10.33. Este livro, muito popular durante a Renascença, é um tratado sobre a teoria da ética. </p>
            </div>
        </div>
    </div>  
</div>

<div class="row gtr-uniform">
    <div class="col-6">
        <a href="javascript:void(0);">VOLTAR</a>
    </div>
    <div class="col-6 text-right">
        <button type="button" class="btn btn-default mb-10">Continuar</button>
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
@endsection


@section('class_body') body-screen-celular @endsection
