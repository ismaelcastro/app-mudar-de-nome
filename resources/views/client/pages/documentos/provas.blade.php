@extends('client.layout.acesso')

@section('content')
<div class="row p-b-30">
    <ul class="breadcrumb">
        <li><a href="javascript:void(0);">Documentação</a></li>
        <li>Provas</li>
    </ul>
    <div class="col-12 ico-search p-b-30">        
        <h2>Provas</h2>
        <p>
            Fique atento para que as provas sejam anexados nos campos corretos e lembre-se que elas são fundamentais para o êxito do seu processo.
        </p>
    </div>  
    <div class="col-8 col-12-xsmall">
        <div class="row gtr-uniform">
            <div class="col-11">

                <div class="box-upload m-b-25">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#uploadDeclaracalModal" class="box-input-file">
                        
                    </a>                    
                    <h3>Declaração de Testemunha</h3>
                    <p class="m-b-0">Assinada com firma reconhecida.</p>
                </div>


                <div class="box-upload">
                    <div class="row">
                        <div class="col-8 col-12-xsmall">
                            <div class="box-upload-success">
                        
                            </div>                    
                            <h3>Redes Sociais</h3>
                            <button type="button" class="btn btn-default mb-10 iverse">Visualizar</button>
                        </div>
                        <div class="col-4 col-12-xsmall text-right alignbuttom">
                            <a href="javascript:void(0);" class="text-uppercase dis-block w-full">Remover</a>
                        </div>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-11 text-center p-t-20">
                        <button type="button" class="btn btn-default mb-10 iverse fs-16">
                            <span class="fs-20 p-t-5 d-inline-block">+</span> Adicionar Prova
                        </button>
                    </div>  
                </div>


            </div>
        </div>        

    </div>
    <div class="col-4 col-12-xsmall borda-esquerda">
        <h3 class="mb-30 tit2">Podemos te ajudar?</h3>
        <div class="box-accordion">
            <h3 class="accordion">Por que devo enviar provas?</h3>
            <div class="accordion" data-id="1">
                <p> Lorem Ipsum tem sido o padrão desde a Idade Média. Um pintor teria peças mistas de texto em um livro exemplar e é este texto que nós usamos hoje. Outra versão diz que este é um trecho do livro de Cícero: "" De Finibus Bonorum e malorum "" seções 1.10.32 / 1.10.33. Este livro, muito popular durante a Renascença, é um tratado sobre a teoria da ética. </p>
            </div>
        </div>
        <div class="box-accordion">
            <h3 class="accordion">Quando devo Adcionar Provas?</h3>
            <div class="accordion" data-id="2">
                <p> Lorem Ipsum tem sido o padrão desde a Idade Média. Um pintor teria peças mistas de texto em um livro exemplar e é este texto que nós usamos hoje. Outra versão diz que este é um trecho do livro de Cícero: "" De Finibus Bonorum e malorum "" seções 1.10.32 / 1.10.33. Este livro, muito popular durante a Renascença, é um tratado sobre a teoria da ética. </p>
            </div>
        </div>
        <div class="box-accordion">
            <h3 class="accordion">Para que serve a Declaração de Testemunha?</h3>
            <div class="accordion" data-id="3">
                <p> Lorem Ipsum tem sido o padrão desde a Idade Média. Um pintor teria peças mistas de texto em um livro exemplar e é este texto que nós usamos hoje. Outra versão diz que este é um trecho do livro de Cícero: "" De Finibus Bonorum e malorum "" seções 1.10.32 / 1.10.33. Este livro, muito popular durante a Renascença, é um tratado sobre a teoria da ética. </p>
            </div>
        </div>
        <div class="box-accordion">
            <h3 class="accordion">Que tipo de provas posso enviar?</h3>
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


<div class="modal fade" id="uploadDeclaracalModal" tabindex="-1" role="dialog" aria-labelledby="uploadDeclaracalModalTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Instruções de envio da Declaração de Testemunha
                </h4>
            </div>
            <div class="modal-body">
                <div class="p-t-40 p-b-40 p-l-40 p-r-40 fs-24">
                   <ol>
                       <li>Faça o download do Modelo de Declaração em Word. <button type="button" class="btn btn-default mb-10 iverse">Download</button> </li>
                       <li>Preencha corretamente os dados completos da Testemunha</li>
                       <li>Leia atentamente as instruções contidas no modelo disponível.</li>
                       <li>Obrigatório a assinatura da Testemunha com Reconhecimento de Firma.</li>
                       <li>Escaneie ou tire uma foto legível com seu smartphone.</li>
                   </ol>
                   <div class="row">
                       <div class="col-12 text-center">                            
                            <button type="button" class="btn btn-default mb-10">
                                <input type="file" name="rg">
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


@section('class_body') body-screen-search @endsection
