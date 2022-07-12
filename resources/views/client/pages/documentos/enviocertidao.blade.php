@extends('client.layout.acesso')

@section('content')
<div class="row p-b-30">
    <ul class="breadcrumb">
        <li><a href="javascript:void(0);">Documentação</a></li>
        <li><a href="javascript:void(0);">Certidões Negativas</a></li>
        <li>Thiago Ratsbone</li>
    </ul>
    <div class="col-12 ico-docs2 p-b-30">        
        <h2>Envio das Certidões Negativas</h2>
        <p>
            Fique atento para que os Certidões sejam anexados nos campos corretos.
        </p>
    </div>  
    <div class="col-8 col-12-xsmall">
        <div class="row gtr-uniform">
            <div class="col-11">

                <div class="box-upload m-b-25">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#uploadRgModal" class="box-input-file">
                        
                    </a>                    
                    <h3>Cartório de Protestos de Títulos</h3>
                    <p class="m-b-0">(Últimos 5 anos)</p>
                </div>

                <div class="box-upload m-b-25">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#uploadCertidaoModal" class="box-input-file">
                        
                    </a>                    
                    <h3>Distribuição Civil, Família e Sucessões</h3>
                    <p class="m-b-0">Atualizada com no mínimo 2 anos.</p>
                </div>

                <div class="box-upload">
                    <div class="row">
                        <div class="col-8 col-12-xsmall">
                            <div class="box-upload-success">
                        
                            </div>                    
                            <h3>Distribuição Criminal</h3>
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
            <h3 class="accordion">Onde emitir as Certidões as Certidões Negativas?</h3>
            <div class="accordion" data-id="1">
                <p> Lorem Ipsum tem sido o padrão desde a Idade Média. Um pintor teria peças mistas de texto em um livro exemplar e é este texto que nós usamos hoje. Outra versão diz que este é um trecho do livro de Cícero: "" De Finibus Bonorum e malorum "" seções 1.10.32 / 1.10.33. Este livro, muito popular durante a Renascença, é um tratado sobre a teoria da ética. </p>
            </div>
        </div>
        <div class="box-accordion">
            <h3 class="accordion">Posso contratar um Despachante de minha confiança?</h3>
            <div class="accordion" data-id="2">
                <p> Lorem Ipsum tem sido o padrão desde a Idade Média. Um pintor teria peças mistas de texto em um livro exemplar e é este texto que nós usamos hoje. Outra versão diz que este é um trecho do livro de Cícero: "" De Finibus Bonorum e malorum "" seções 1.10.32 / 1.10.33. Este livro, muito popular durante a Renascença, é um tratado sobre a teoria da ética. </p>
            </div>
        </div>
        <div class="box-accordion">
            <h3 class="accordion">Qual a validade das Certidões Negativas?</h3>
            <div class="accordion" data-id="3">
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


<div class="modal fade" id="uploadRgModal" tabindex="-1" role="dialog" aria-labelledby="uploadRgModalTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Instruções de envio do RG 
                    (Frente e Verso)
                </h4>
            </div>
            <div class="modal-body">
                <div class="p-t-40 p-b-40 p-l-40 p-r-40 fs-24">
                   <ol>
                       <li>O documento deve estar válido e não é aceito cópia autenticada </li>
                       <li>Escaneie ou tire uma foto legível com seu smartphone.</li>
                       <li>O documento deve estar enquadrado e em bom estado de conservação.</li>
                       <li>Não é permitido o envio de CNH</li>
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


<div class="modal fade" id="uploadCertidaoModal" tabindex="-1" role="dialog" aria-labelledby="uploadCertidaoModalTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Instruções de envio da Certidão de Nascimento
                </h4>
            </div>
            <div class="modal-body">
                <div class="p-t-40 p-b-40 p-l-40 p-r-40 fs-24">
                   <ol>
                       <li>A Certidão deve ser atualizada (mínimo 2 anos) e não será aceito cópia autenticada</li>
                       <li>Caso prefira contratar despachante para emissão de via atualizada <a href="javascript:void(0);">clique aqui</a> </li>
                       <li>Escaneie ou tire uma foto legível com seu smartphone.</li>
                       <li>O documento deve estar enquadrado e em bom estado de conservação.</li>
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


<div class="modal fade" id="uploadCertidaoCasamentoModal" tabindex="-1" role="dialog" aria-labelledby="uploadCertidaoCasamentoModalTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Instruções de envio da Certidão de Casamento
                </h4>
            </div>
            <div class="modal-body">
                <div class="p-t-40 p-b-40 p-l-40 p-r-40 fs-24">
                   <ol>
                       <li>A Certidão deve ser atualizada (mínimo 2 anos) e não será aceito cópia autenticada</li>
                       <li>Caso prefira contratar despachante para emissão de via atualizada <a href="javascript:void(0);">clique aqui</a> </li>
                       <li>Escaneie ou tire uma foto legível com seu smartphone.</li>
                       <li>O documento deve estar enquadrado e em bom estado de conservação.</li>
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


@section('class_body') body-screen-cracha @endsection

@section('scriptjs')
<script>    
    setTimeout(function(){ $('#lockCertidaoModal').modal({backdrop: 'static',keyboard: true,show: true}); }, 9000);   
</script>
@endsection
