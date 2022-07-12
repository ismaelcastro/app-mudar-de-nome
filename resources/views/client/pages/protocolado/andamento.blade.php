@extends('client.layout.acesso')

@section('content')
<div class="row p-b-20">
    <div class="col-12 ico-docs">
        <h2>Documentação</h2>
        <p>
            Olá THIAGO RATSBONE! Abaixo os documentos que já foram enviados.
        </p>
    </div>    
</div>
<div class="row borda-baixo m-b-30 p-b-20">
    <div class="col-10 col-12-xsmall ico-success">       
        <h2>
            <img src="{{asset('assets-client/images/icones/sign-grey.png')}}" alt="" height="40"> &nbsp;
            Procuração
        </h2>
        <p>
            Necessária para que possamos representar o Requerente e os demais integrantes no processo.
        </p>
    </div>
    <div class="col-2 col-12-xsmall text-right alignbuttom">
        <button type="button" class="btn btn-default iverse mb-10">Ver</button>
    </div>
</div>
<div class="row borda-baixo m-b-50">
    <div class="col-10 col-12-xsmall ico-success">
        <h2>
            <img src="{{asset('assets-client/images/icones/cracha.png')}}" alt="" height="40"> &nbsp;
            Documentos Pessoais
        </h2>
        <p>
            Documentos necessários para anexarmos ao processo.
        </p>
    </div>
    <div class="col-2 col-12-xsmall text-right alignbuttom">
        <button type="button" class="btn btn-default iverse mb-10">Ver</button>
    </div>  
</div>
<div class="row m-b-50">
    <div class="col-10 col-12-xsmall ico-success">
        <h2>
            <img src="{{asset('assets-client/images/icones/search-content.png')}}" alt="" height="40"> &nbsp;
            Provas
        </h2>
        <p>
            Os documentos mais importantes do processo. São utilizados para comprovar ao Promotor Público e ao Juiz que os motivos alegados pelo Requerente são verdadeiros e o processo deve ser procedente.
        </p>
    </div>
    <div class="col-2 col-12-xsmall text-right alignbuttom">
        <button type="button" class="btn btn-default iverse mb-10">Ver</button>
    </div>  
</div>

<div class="row gtr-uniform">
    <div class="col-12">
        <a href="javascript:void(0);">VOLTAR</a>
    </div>                      
</div>
@endsection


@section('class_body') body-screen-celular @endsection
