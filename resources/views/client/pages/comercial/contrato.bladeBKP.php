@extends('client.layout.app')

@section('content')
<div class="row">
    <div class="col-12 ico-contract">
        <h2>Visualização do Contrato</h2>
        <p>
            Leia atentamente o contrato de honorários advocatícios, e somente após conferir se os dados do Contratante foram preenchidos corretamente solicite sua emissão.
        </p>
    </div>
</div>

{{ Form::open(['route' => 'client.contratacao.forma.store' ]) }}
<div class="row pt-40">
    <div class="col-8 col-12-xsmall">
        <div class="row gtr-uniform">
            <div id='signature-div'></div>
        </div>
    </div>
    <div class="col-4 col-12-xsmall borda-esquerda">
        <h3 class="mb-30 tit2">Podemos te ajudar?</h3>
        <div class="box-accordion">
            <h3 class="accordion">O que são Honorários Advocatícios?</h3>
            <div class="accordion" data-id="1">
                <p> Lorem Ipsum tem sido o padrão desde a Idade Média. Um pintor teria peças mistas de texto em um livro exemplar e é este texto que nós usamos hoje. Outra versão diz que este é um trecho do livro de Cícero: "" De Finibus Bonorum e malorum "" seções 1.10.32 / 1.10.33. Este livro, muito popular durante a Renascença, é um tratado sobre a teoria da ética. </p>
            </div>
        </div>
        <div class="box-accordion">
            <h3 class="accordion">Quais são as formas de contratação?</h3>
            <div class="accordion" data-id="2">
                <p> Lorem Ipsum tem sido o padrão desde a Idade Média. Um pintor teria peças mistas de texto em um livro exemplar e é este texto que nós usamos hoje. Outra versão diz que este é um trecho do livro de Cícero: "" De Finibus Bonorum e malorum "" seções 1.10.32 / 1.10.33. Este livro, muito popular durante a Renascença, é um tratado sobre a teoria da ética. </p>
            </div>
        </div>
        <div class="box-accordion">
            <h3 class="accordion">Quando começo a pagar?</h3>
            <div class="accordion" data-id="3">
                <p> Lorem Ipsum tem sido o padrão desde a Idade Média. Um pintor teria peças mistas de texto em um livro exemplar e é este texto que nós usamos hoje. Outra versão diz que este é um trecho do livro de Cícero: "" De Finibus Bonorum e malorum "" seções 1.10.32 / 1.10.33. Este livro, muito popular durante a Renascença, é um tratado sobre a teoria da ética. </p>
            </div>
        </div>

    </div>
    <div class="col-6 pt-40">
        <a href="javascript:void(0);" class="text-uppercase">Voltar</a>
    </div>
</div>
{{ Form::close() }}
@endsection

@section('step')
<div class="wrapperStepComercial">
    <ul class="StepProgress">
        <li class="StepProgress-item is-done">
            <a href="javascript:void(0);">
                <strong>Dados do Contratante</strong>    
            </a>            
        </li>
        <li class="StepProgress-item is-done">
            <a href="javascript:void(0);">
                <strong>Forma de Contratação</strong>
            </a>
        </li>
        <li class="StepProgress-item current">
            <a href="javascript:void(0);">
                <strong>Assinatura</strong>
            </a>
        </li>
    </ul>
</div>
@endsection

@section('class_body') body-dados-assinatura @endsection



@section('scriptjs')
    <script src='https://s3-sa-east-1.amazonaws.com/embed-d4sign/d4sign.js' type='text/javascript'></script>
    <script>
        /*
        d4sign.configure({
            container: "signature-div",
            key: "f39db9be-5d56-4155-8170-b10594007ba4",
            protocol: "https",
            host: "secure.d4sign.com.br/embed/viewblob",
            signer: {
                email: "suporte@cleverweb.com.br",
                display_name: "Mauro Teste Parcela", //optional,
                documentation: "123.321.123-40", //optional,
                birthday: "10/05/1958", //optional,
                disable_preview: "0", //optional
                key_signer: "NTAxNjMzMQ=="
            },
            width: '1025',
            height: '400',
            callback: function(event) {
              if (event.data === "signed") {
                alert('ASSINADO');
              }
            }
        });
        */
       /*
        d4sign.configure({
            container: "signature-div",
            key: "4b771918-fe24-48dc-82e4-61c753aec504",
            protocol: "https",
            host: "secure.d4sign.com.br/embed/viewblob",
            signer: {
                email: "l_martins1979@icloud.com",
                display_name: "Lilian Pierri Martins", //optional,
                documentation: "181.959.678-84", //optional,
                birthday: "01/01/1979", //optional,
                disable_preview: "0", //optional
                key_signer: "MjgwMzY1Nw=="
            },
            width: '1025',
            height: '400',
            callback: function(event) {
              if (event.data === "signed") {
                alert('ASSINADO');
              }
            }
        });
        */
        d4sign.configure({
            container: "signature-div",
            key: "88e74898-4ad9-4661-b0d1-654b54dcf3b4",
            protocol: "https",
            host: "secure.d4sign.com.br/embed/viewblob",
            signer: {
                email: "Thaynagraciano@hotmail.com"
            },
            width: '1025',
            height: '400',
            callback: function(event) {
              if (event.data === "signed") {
                alert('ASSINADO');
              }
            }
        });
        </script>
@endsection
