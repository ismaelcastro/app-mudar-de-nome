@extends('client.layout.acesso')

@section('content')
    <div class="row p-b-30">
        <ul class="breadcrumb">
            <li><a href="javascript:void(0);">Documentação</a></li>
            <li>Requerentes e outros</li>
        </ul>
        <div class="col-12 ico-user-i p-b-30">
            <h2>Requerentes e outros</h2>
            <p>
                Caso tenha digitado algo de errado, aqui você poderá selecionar e editar as informações das pessoas
                envolvidas.
            </p>
        </div>
        <div class="col-8 col-12-xsmall">
            <div class="row gtr-uniform">
                <div class="col-11">
                    <strong>Requerentes e outros</strong>

                    @if($call->is_claimant == 1)
                        <div class="box-upload m-b-25 ">
                            <div class="row">
                                <div class="col-8 col-12-xsmall">
                                    <div class="box-upload-success m-b-20">

                                    </div>
                                    <h3> {{$client->name}} </h3>
                                    <p class="m-b-0">Requerente</p>
                                </div>
                                <div class="col-4 col-12-xsmall text-right alignbuttom">
                                    <a href="{{route('client.claimant.edit',['client'=>$client->id])}}"
                                       class="text-uppercase dis-block w-full">
                                        <img src="{{asset('assets-client/images/icones/edit.png')}}" alt="Editar"
                                             height="18">
                                        EDITAR
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif

                    @foreach ($affiliations as $affiliation)
                        <div class="box-upload m-b-25 ">
                            <div class="row">
                                <div class="col-8 col-12-xsmall">
                                    <div class="box-upload-success m-b-20">

                                    </div>
                                    <h3> {{$affiliation->client->name}} </h3>
                                    <p class="m-b-0">{{ $type_list[$affiliation->type] }}</p>
                                </div>
                                <div class="col-4 col-12-xsmall text-right alignbuttom">
                                    <a href="{{route('client.affiliation.edit',['affiliation'=>$affiliation->id])}}"
                                       class="text-uppercase dis-block w-full">
                                        <img src="{{asset('assets-client/images/icones/edit.png')}}" alt="Editar"
                                             height="18">
                                        EDITAR
                                    </a>
                                </div>
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
        <div class="col-6">
            <a href="{{route('client.iniciais.start')}}">VOLTAR</a>
        </div>
        <div class="col-6 text-right">
            <button type="button" class="btn btn-default mb-10"
                    onclick="location.href='{{route('client.iniciais.start')}}';">Continuar
            </button>
        </div>
    </div>
@endsection

@section('step')
    <div class="wrapperStepTriagem">
        <ul class="StepProgress">
            <li class="StepProgress-item current">
                <a href="javascript:void(0);">
                    <strong>Informações Iniciais</strong>
                </a>
            </li>
            <li class="StepProgress-item">
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


@section('class_body') body-dados-contratante @endsection
