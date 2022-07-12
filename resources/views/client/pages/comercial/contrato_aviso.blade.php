@extends('client.layout.app')

@section('content')
<div class="row">
    <div class="col-12 ico-contract">
        <h2>Assinatura Eletrônica</h2>
        <p>
            Nosso escritório utiliza uma plataforma 100% digital para assinatura e armazenamento dos contratos eletronicamente. Tudo de forma extremamente segura e confiável para nossos clientes.
        </p>
    </div>
</div>


<div class="row pt-40">
    <div class="col-8 col-12-xsmall">
        <div class="row gtr-uniform">
            <div id='signature-div'>                
                <div class="col-12 ico_msg_contract">
                    <p>Seu contrato foi enviado para assinatura em:</p>
                    <p>
                        <strong>{{$email}}</strong> 
                        <a href="javascript:void(0);" data-toggle="modal" data-target="#changemailModal" class="text-info">(editar) <i class="fa fa-envelope"></i></a> 
                    </p>
                    <p class="text-danger"> 
                        Favor acessar seu e-mail e assinar digitalmente.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4 col-12-xsmall">
        <h3 class="mb-30 tit2">Podemos te ajudar?</h3>
        @include('client.partials._helps')
    </div>
</div>



<div class="modal fade" id="changemailModal" tabindex="-1" role="dialog" aria-labelledby="changemailModalLabel" aria-hidden="true">
    {{ Form::open(['route' => 'client.client.change_mail' ]) }}
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Alterar e-mail</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{ Form::email('email', null, ['class' => $errors->has('email') ?  'is-invalid' : '', 'placeholder' => 'E-mail', 'required' => 'required']) }}
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default">Reenviar Contrato</button>
        </div>
      </div>
    </div>
    {{ Form::close() }}
</div>

{{ Form::open(['route' => 'client.contratacao.contrato.store' ]) }}
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
        <li class="StepProgress-item is-done">
            <a href="javascript:void(0);">
                <strong>Assinatura</strong>
            </a>
        </li>
    </ul>
</div>

<script type="text/javascript">
    
</script>
@endsection

@section('class_body') body-dados-assinatura @endsection
