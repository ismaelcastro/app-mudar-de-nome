@extends('client.layout.acesso')

@section('content')
<div class="row p-b-30">
    
    <div class="col-12 ico-money p-b-30">        
        <h2>Financeiro - Carnê</h2>
        <p>
            Acompanhe abaixo a evolução dos pagamentos, baixando 2a via do boleto caso necessário.
        </p>
    </div>  
    <div class="col-8 col-12-xsmall">
        <div class="row gtr-uniform">
            <div class="col-11">

                <div class="row">
                    <div class="col-12">
                        <h4>Carnê Nº {{$gerencianet_id}}</h4>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-4 col-12-xsmall">                        
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td>Parcelas</td>
                                    <td>{{$call->installments}}x de R${{$valor_parcela}}</td>
                                </tr>
                                <tr>
                                    <td>Envio</td>
                                    <td><i class="fa fa-envelope"></i>  E-mail</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-4 col-12-xsmall">
                        <table class="table table2 table-hover">
                            <thead>
                                <tr>
                                    <th>Próximo Vencimento</th>
                                </tr>
                            </thead>
                            <tbody>                                
                                <tr align="center">
                                    <td id="prxvenc"> <i class="fa fa-calendar"></i> carregando...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-4 col-12-xsmall">
                        <table class="table table2 table-hover">
                            <thead>
                                <tr>
                                    <th>Valor Total da Cobrança</th>
                                </tr>
                            </thead>
                            <tbody>                                
                                <tr>
                                    <td align="right">R$ {{$call_honorary}}</td>
                                </tr>
                            </tbody>
                        </table>                       
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <h4>Parcelas do Carnê</h4>
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                @foreach ($looping0 as $key => $value)
                                <li @if($value['parcel']==1) class="active" @endif>
                                    <a href="#tab_{{$value['parcel']}}" data-toggle="tab">{{$value['parcel']}}</a>
                                </li>
                                @endforeach
                            </ul>
                            <div class="tab-content">
                                
                                @foreach ($looping0 as $key => $value)
                                    @php
                                    $vencimento =  $value['expire_at'];
                                    $vencimentoBr = date('d/m/Y',strtotime($vencimento));
                                    $statuscc = $value['status'];
                                    $link = $value['url'];
                                    $charge_id = $value['charge_id'];
                                    @endphp
                                    <div class="tab-pane @if($value['parcel']==1)active @endif" id="tab_{{$value['parcel']}}">
                                        <div class="row">
                                            <div class="col-1 col-12-xsmall text-center">
                                                <a href="{{$link}}" target="_blank" class="btn btn-yellow">
                                                    <i class="fa fa-link"></i>
                                                </a>
                                                <a href="{{$link}}" target="_blank" class="text-primary">
                                                    link
                                                </a>
                                            </div>
                                            <div class="col-3 col-12-xsmall">
                                                <table class="table table2 table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th align="center">Vencimento</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>                                
                                                        <tr align="center">
                                                            <td> <i class="fa fa-calendar"></i> {{$vencimentoBr}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-2 col-12-xsmall">
                                                <table class="table table2 table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th align="center">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>                                
                                                        <tr align="center">
                                                            <td> 
                                                                @if ($statuscc == 'waiting')
                                                                    <strong class="text-warning">Aguardando</strong>
                                                                    
                                                                    @if($prxVencimento=='')
                                                                        @php
                                                                            $prxVencimento = $vencimentoBr;
                                                                        @endphp
                                                                        <script type="text/javascript">
                                                                            window.document.getElementById('prxvenc').innerHTML = '<i class="fa fa-calendar"></i> {{$prxVencimento}}';
                                                                        </script>
                                                                    @endif
                                                                @elseif ($statuscc == 'paid')
                                                                    <strong class="text-success">Pago</strong>
                                                                @elseif($statuscc == 'canceled')
                                                                    <strong class="text-danger">Cancelado</strong>
                                                                    <script type="text/javascript">
                                                                        window.document.getElementById('prxvenc').innerHTML = '<i class="fa fa-calendar"></i> Cancelado';
                                                                    </script>
                                                                @elseif($statuscc == 'expired')
                                                                    <strong class="text-primary">Expirado</strong>
                                                                @elseif($statuscc == 'unpaid')
                                                                    <strong class="text-danger">Em atraso</strong>
                                                                @else
                                                                    <strong class="text-primary">{{$statuscc}}</strong>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-3 col-12-xsmall">
                                                <table class="table table2 table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th align="center">Valor da Parcela</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>                                
                                                        <tr align="right">
                                                            <td> R$ {{$valor_parcela}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-3 col-12-xsmall">
                                                <table class="table table2 table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th align="center">Cobrança</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>                                
                                                        <tr align="center">
                                                            <td> {{$charge_id}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>        

    </div>
    <div class="col-4 col-12-xsmall borda-esquerda">
        <h3 class="mb-30 tit2">Podemos te ajudar?</h3>
        @include('client.partials._helps')
    </div>  
</div>

<div class="row gtr-uniform">
    <div class="col-12">
        <a href="javascript:void(0);" style="display: none">VOLTAR</a>
    </div>                       
</div>


<div class="modal fade" id="uploadCustasInicialModal" tabindex="-1" role="dialog" aria-labelledby="uploadProcuracaoModalTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Instruções de envio de comprovante Custas Inicial</h4>
            </div>
            <div class="modal-body">
                <div class="p-t-40 p-b-40 p-l-40 p-r-40 fs-24">
                   <ol>
                       <li>Faça o download da Guia DARE em PDF.  <button type="button" class="btn btn-default mb-10 iverse">Download</button> </li>
                       <li>Efetue o pagamento através de internet banking ou em qualquer agência pessoalmente.</li>
                       <li>Envie o comprovante de pagamento.</li>
                   </ol>
                   <div class="row">
                       <div class="col-12 text-center">                            
                            <button type="button" class="btn btn-default mb-10">
                                <input type="file" name="procuracao">
                                Enviar
                            </button>
                       </div>
                   </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="uploadCustasMandatoModal" tabindex="-1" role="dialog" aria-labelledby="uploadCustasMandatoModalTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Instruções de envio de comprovante Custas Mandato</h4>
            </div>
            <div class="modal-body">
                <div class="p-t-40 p-b-40 p-l-40 p-r-40 fs-24">
                   <ol>
                       <li>Faça o download da Guia DARE em PDF.  <button type="button" class="btn btn-default mb-10 iverse">Download</button> </li>
                       <li>Efetue o pagamento através de internet banking ou em qualquer agência pessoalmente.</li>
                       <li>Envie o comprovante de pagamento.</li>
                   </ol>
                   <div class="row">
                       <div class="col-12 text-center">                            
                            <button type="button" class="btn btn-default mb-10">
                                <input type="file" name="procuracao">
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

@section('class_body') body-iniciais-gerencianet @endsection

