@php
    $iconProcedural = $call_procedural_icons[$call->procedural_status][0] ?? '';
    $styleProcedural = $call_procedural_icons[$call->procedural_status][1] ?? '';
    $hab = 'yes';
@endphp

@extends('client.layout.acesso')

@section('content')
    <div class="row p-b-30">
        <div class="col-12 ico-balanca p-b-30">
            <h2>Acompanhamento Processual</h2>
            <p>
                Olá <strong>{{ $client->name }}</strong>! Segue abaixo as informações sobre o seu processo.
            </p>
        </div>
        {{-- Dados do Processo --}}
        <div class="col-8 col-12-xsmall">
            <div class="row gtr-uniform mt-25 mb-25">
                <div class="col-11">
                    <table width="100%" class="table">
                        <tr>
                            <td align="right" class="fs-18"><strong>Processo nº</strong></td>
                            <td class="fs-18">{{ $call->process_number }}</td>
                        </tr>
                        <tr>
                            <td align="right" class="fs-18"><strong>Assunto</strong></td>
                            <td class="fs-18">{{ $call_subject[$call->subject] }}</td>
                        </tr>
                        <tr>
                            <td align="right" class="fs-18"><strong>Juízo</strong></td>
                            <td class="fs-18">{{ $call->judgment_number }} {{ $call->judgment_stick }} {{$call->court_jurisdiction}}</td>
                        </tr>
                        <tr>
                            <td align="right" class="fs-18"><strong>Distribuído em</strong></td>
                            <td class="fs-18">{{$call->distributed_date}}</td>
                        </tr>
                        <tr>
                            @php
                                $tom_color = get_tomcolor($process_categories_colors[$call->procedural_step]) ?? 0;
                            @endphp
                            <td align="right" class="fs-18">
                                <strong>Etapa Processual</strong>
                            </td>
                            <td class="fs-18">
                                <a href="javascript:void(0);" class="badge badge-secondary mb-1" style="border-color: transparent; background-color:{{ $process_categories_colors[$call->procedural_step] ?? '' }}; @if ($tom_color > 190) color:#333; @else color:#fff; @endif">
                                    {{ $call->procedural_step }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" class="fs-18"><strong>Status</strong></td>
                            <td class="fs-18">
                                <a href="#">
                                    <i class="fa {{ $iconProcedural}} {{ $styleProcedural }}" style="font-size:24px"></i>
                                </a>
                                {{ $call_procedural_status[$call->procedural_status] ?? $call->procedural_status }}
                                {!! $call->dateStatus !!}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            {{-- Documentos Extras --}}
            @if($docExtras > 0 && $call->procedural_status == "com_requerente" || $call->procedural_status == "com_advogado")
                <div class="col-8 mt-25">
                    <div class="row">
                        <div class="col-11">
                            <div class="box-upload m-b-25 @if($percent == 100) border-right-success @else border-right-danger @endif">
                                <div class="row">
                                    @if($percent == 100 && $call->procedural_status == "com_advogado")
                                        <div class="boxescurecido">
                                            Os Documentos enviados estão sendo analisados.
                                        </div>
                                    @else
                                        <div class="col-9 col-12-xsmall">                                        
                                            <span class="chartpie" data-percent="{{ $percent }}" style="height: 100%">
                                                <span class="percent"></span>
                                            </span>
                                            <h3>Documentos Extras</h3>
                                            <p class="text-capitalize text-justify" style="display: flex">
                                                Após análise preliminar do Promotor Público e/ou do Juiz responsável pelo seu
                                                processo, foi solicitado o envio de mais alguns documentos.
                                            </p>
                                            
                                        </div>
                                        <div class="col-3 col-12-xsmall justify-content-center">
                                            @if($docExtras && $call->procedural_status == "com_requerente")
                                                <a href="{{ route('client.processo.docsextra') }}">
                                                    <button class="btn btn-default text-uppercase">
                                                        Iniciar
                                                    </button>
                                                </a>
                                            @else
                                                <button class="btn btn-default text-uppercase disabled">Iniciar</button>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            @endif
        </div>
        {{-- Recibo de Protocolo --}}
        <div class="col-4 col-12-xsmall mb-25 borda-esquerda">
            <h3 class="mb-30 ico-papiro">Documentos Processuais</h3>
            <table class="table">
                @if (!is_null($call->protocol))
                    <tr>
                        <td class="fs-18">Recibo de Protocolo</td>
                        <td align="right">
                            <a href="{{route('recibo_protocol', $call->id)}}"
                               class="text-primary-inverse badge2 bg-yellow">1</a>
                        </td>
                    </tr>
                @endif
            </table>
        </div>
    </div>
    
@endsection

@section('step')
    @include('client.layout._left_side')
@endsection

@section('class_body') body-screen-advogado @endsection

@push('scriptjs2')
    
    @if($percent == 100 && $call->procedural_status == "com_advogado")
    
    <script>
        /*
        $(document).ready(function(){
            $('#lockCertidaoModal').modal('show');
        });
        */
    </script>
    @endif

    <style>
        .nav {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        padding-left: 0;
        margin-bottom: 0;
        list-style: none;
        }

        .nav-link {
        display: block;
        padding: 0.5rem 1rem;
        }

        .nav-link:hover, .nav-link:focus {
        text-decoration: none;
        }

        .nav-link.disabled {
        color: #6c757d;
        }

        .nav-tabs {
        border-bottom: 1px solid #dee2e6;
        }

        .nav-tabs .nav-item {
        margin-bottom: -1px;
        }

        .nav-tabs .nav-link {
        border: 1px solid transparent;
        border-top-left-radius: 0.25rem;
        border-top-right-radius: 0.25rem;
        }

        .nav-tabs .nav-link:hover, .nav-tabs .nav-link:focus {
        border-color: #e9ecef #e9ecef #dee2e6;
        }

        .nav-tabs .nav-link.disabled {
        color: #6c757d;
        background-color: transparent;
        border-color: transparent;
        }

        .nav-tabs .nav-link.active,
        .nav-tabs .nav-item.show .nav-link {
        color: #495057;
        background-color: #fff;
        border-color: #dee2e6 #dee2e6 #fff;
        }

        .nav-tabs .dropdown-menu {
        margin-top: -1px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        }

        .nav-pills .nav-link {
        border-radius: 0.25rem;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show > .nav-link {
        color: #fff;
        background-color: #007bff;
        }

        .nav-fill .nav-item {
        -webkit-box-flex: 1;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        text-align: center;
        }

        .nav-justified .nav-item {
        -ms-flex-preferred-size: 0;
        flex-basis: 0;
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        text-align: center;
        }

        .tab-content > .tab-pane {
        display: none;
        }

        .tab-content > .active {
        display: block;
        }

        .navbar {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        padding: 0.5rem 1rem;
        }

        .navbar > .container,
        .navbar > .container-fluid {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        }

        .navbar-brand {
        display: inline-block;
        padding-top: 0.3125rem;
        padding-bottom: 0.3125rem;
        margin-right: 1rem;
        font-size: 1.25rem;
        line-height: inherit;
        white-space: nowrap;
        }

        .navbar-brand:hover, .navbar-brand:focus {
        text-decoration: none;
        }

        .navbar-nav {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        padding-left: 0;
        margin-bottom: 0;
        list-style: none;
        }

        .navbar-nav .nav-link {
        padding-right: 0;
        padding-left: 0;
        }

        .navbar-nav .dropdown-menu {
        position: static;
        float: none;
        }

        .navbar-text {
        display: inline-block;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        }

        .navbar-collapse {
        -ms-flex-preferred-size: 100%;
        flex-basis: 100%;
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        }

        .navbar-toggler {
        padding: 0.25rem 0.75rem;
        font-size: 1.25rem;
        line-height: 1;
        background-color: transparent;
        border: 1px solid transparent;
        border-radius: 0.25rem;
        }

        .navbar-toggler:hover, .navbar-toggler:focus {
        text-decoration: none;
        }

        .navbar-toggler:not(:disabled):not(.disabled) {
        cursor: pointer;
        }

        .navbar-toggler-icon {
        display: inline-block;
        width: 1.5em;
        height: 1.5em;
        vertical-align: middle;
        content: "";
        background: no-repeat center center;
        background-size: 100% 100%;
        }
    </style>
@endpush