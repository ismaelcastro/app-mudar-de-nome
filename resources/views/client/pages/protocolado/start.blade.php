@extends('client.layout.acesso')

@section('content')
<div class="row p-b-30">   
     
    <div class="col-8 col-12-xsmall">
        <div class="row gtr-uniform">
            <div class="col-11 ico-content-ptotocolado">

                <h2>Olá {{$client->name}}!</h2>
                <p>
                    Toda a documentação enviada foi aprovada.
                </p>
                <p>
                    Neste momento seu caso está nas mãos do advogado responsável em fase final de elaboração.
                </p>
                <p>
                    Dentro de alguns dias você receberá em seu e-mail a confirmação da distribuição do seu processo no Tribunal de Justiça.
                </p>

            </div>
        </div>        

    </div>
    <div class="col-4 col-12-xsmall borda-esquerda">
        <h3 class="mb-30 tit2">Podemos te ajudar?</h3>
        @include('client.partials._helps')
    </div>  
</div>
@if (!is_null($call->procedural_step))
    <div class="row gtr-uniform">
        <div class="col-12 text-right">
            <button type="button" class="btn btn-default mb-10">Continuar</button>
        </div>                               
    </div>
@endif

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
        <li class="StepProgress-item is-done">
            <a href="javascript:void(0);">
                <strong>Custas Processuais</strong>
            </a>
        </li>
        <li class="StepProgress-item current">
            <a href="javascript:void(0);">
                <strong>Protocolado</strong>
            </a>
        </li>
    </ul>
</div>

@endsection


@section('class_body') body-iniciais-teclado @endsection

