@extends('client.layout.app')

@section('content')
<div class="row">
    <div class="col-12 ico-pay">
        <h2>Forma de Contratação</h2>
        <p>
            Selecione a forma de contratação para enviarmos o contrato de honorários advocaticios para sua análise.
        </p>
    </div>
</div>

{{ Form::open(['route' => 'client.contratacao.forma.store' ]) }}
<div class="row pt-40">
    <div class="col-8 col-12-xsmall">
        <div class="row gtr-uniform ico-forma-contract">
            <div class="col-5 col-10-xsmall">
                <strong>Valor dos Honorários Advocatícios</strong>
            </div>
            <div class="col-5 col-10-xsmall">
                R${{ number_format(($sum_honrary), 2, ',', '.') }}
            </div>            
            <div class="col-5 col-10-xsmall">
                <strong>Forma de Contratação</strong>
            </div>
            <div class="col-5 col-10-xsmall">
                <img src="{{ asset('assets-client')}}/images/ico-{{ $call->paymentform }}.png" alt="{{ $call->paymentform }}">
            </div>
        </div>
        

        @if ($call->paymentform != 'adexitum')
        <div class="row gtr-uniform mt-20 ico-forma-pizza" @if ($call->paymentform != 'gerencianet') style="background-position: 1.5em 0em;padding-bottom: 5px;" @endif>
            @if ($call->paymentform == 'gerencianet')
            <div class="col-5 col-10-xsmall">
                <strong>Parcelamento</strong>
            </div>
            <div class="col-5 col-10-xsmall">
                @php
                    $installment = !is_null($call->installments) ? $call->installments : null;
                @endphp
                {{Form::select('installments', $array_installments,$installment,['class' => $errors->has('installments') ?  'is-invalid' : '', 'required' => 'required' ])}}                
            </div>
            @endif

            
                <div class="col-5 col-10-xsmall">
                    <strong>
                        @if ($call->paymentform == 'gerencianet')
                        Vencimento 1ª Parcela
                        @else
                        Vencimento
                        @endif
                    </strong>
                </div>            
                @if (isset($call->paydate) && !is_null($call->paydate) )
                    <div class="col-5 col-10-xsmall">
                        <div class="form-group">
                            {{ date('d/m/Y', strtotime($call->paydate)) }}
                            {{ Form::hidden('paydate', $call->paydate) }}
                        </div>
                    </div>
                @else
                    <div class="col-5 col-10-xsmall">
                        <div class="form-group">
                            {{Form::select('paydate', $days_payment,null,['class' => $errors->has('paydate') ?  'is-invalid' : '', 'required' => 'required' ])}}
                        </div>
                    </div>
                @endif
            
        </div>
        @endif
    </div>
    <div class="col-4 col-12-xsmall borda-esquerda">
        <h3 class="mb-30 tit2">Podemos te ajudar?</h3>        
        @include('client.partials._helps')
    </div>
    <div class="col-6 pt-40">
        <a href="javascript:void(0);" onclick="document.getElementById('id_change_stagecall').submit();" class="text-uppercase">Voltar</a>
    </div>
    <div class="col-6 text-right pt-40">
        <button type="submit" class="btn btn-default mb-10">Continuar</button>
    </div> 
</div>
{{ Form::close() }}

{{ Form::open(['route' => 'client.client.change_stagecall', 'id' => 'id_change_stagecall' ]) }}
    {{ Form::hidden('stage', 'dados') }}
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
        <li class="StepProgress-item current">
            <a href="javascript:void(0);">
                <strong>Forma de Contratação</strong>
            </a>
        </li>
        <li class="StepProgress-item">
            <a href="javascript:void(0);">
                <strong>Assinatura</strong>
            </a>
        </li>
    </ul>
</div>
@endsection

@section('class_body') body-dados-forma @endsection
