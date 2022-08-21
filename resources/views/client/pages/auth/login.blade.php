@extends('client.layout.auth')

@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h2>Acesse sua Conta</h2>
            <p>
                Use suas credenciais para entrar no painel do cliente
            </p>
        </div>
    </div>

    {{ Form::open(['route' => 'client.login.store' ]) }}
    <div class="row gtr-uniform">
        <div class="col-12">
            {{ Form::text('username', null, ['class' => $errors->has('username') ?  'is-invalid' : '', 'placeholder' => 'Insira E-Mail ou CPF', 'required' => 'required']) }}
        </div>
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-default mb-10">Entrar</button>
        </div>
    </div>
    {{ Form::close() }}
@endsection

@section('class_body') body-dados-contratante @endsection
