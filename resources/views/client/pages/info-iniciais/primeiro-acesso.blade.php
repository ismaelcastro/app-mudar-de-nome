@extends('client.layout.acesso')

@section('content')
<div class="row">
    <div class="col-12 text-justify">
        <h2 class="p-b-20">Olá <span>{{auth()->user()->first_name}}</span>,</h2>
        <p>
            Em seu primeiro acesso ao painel do cliente, o <strong>Dr. Thiago Ratsbone</strong> gostaria de lhe desejar boas-vindas e explicar um pouco mais sobre nossa plataforma 100% digital e exclusiva, desenvolvida especialmente para nossos clientes.
        </p>

        <div class="responsive-video" style="display: none">
            <iframe class="text-center" width="100%"
                    style="margin: 0 auto;display: block;"
                    src="https://www.youtube.com/embed/S9uPNppGsGo">
            </iframe>            
        </div>

        <p>
            Nossa busca contínua por inovações tecnológicas que tornem a experiência jurídica dos nossos clientes a mais agradável possível nos levou a desenvolver uma plataforma 100% exclusiva.
        </p>
        <p>
            Com isso, nossos clientes usufruem de uma experiência única, tornando todo o processo desde à etapa que antecede a contratação de nossos serviços até sua conclusão o mais rápido, prático e informativo possível.
        </p>
    </div>
</div>

<div class="row gtr-uniform">
    <div class="col-12 text-right">
        <button type="button" class="btn btn-default mb-10" onclick="location.href = '{{ route('client.iniciais.start') }}';">Iniciar</button>
    </div>
</div>
@endsection


@section('class_body') body-iniciais-bem-vindo @endsection
