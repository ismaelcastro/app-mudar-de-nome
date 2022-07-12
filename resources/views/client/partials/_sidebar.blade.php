<aside class="wrap-sidebar js-sidebar">
    <div class="s-full js-hide-sidebar"></div>

    <div class="sidebar flex-col-l p-t-22 p-b-25">
        <div class="flex-r w-full p-b-30 p-r-27">
            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
                <i class="fa fa-times"></i>
            </div>
        </div>

        <div class="sidebar-content flex-w w-full p-lr-50 js-pscroll">
            <div class="sidebar-link w-full"> 
                <div class="p-b-13">
                    <a href="{{route('client.contratacao.dados')}}" class="stext-102 cl2 hov-cl1 trans-04">
                        <i class="fa fa-home"></i>
                        Página Inicial
                    </a>
                </div> 

                @if (!is_null(auth('client')->user()->call()->orderBy('id','desc')->first()->paymentform))
                    @php
                        $paymentform = auth('client')->user()->call()->orderBy('id','desc')->first()->paymentform;
                    @endphp
                    <div class="p-b-13">
                        @if ($paymentform == 'gerencianet')
                            <a href="{{route('client.financeiro.carne')}}" class="stext-102 cl2 hov-cl1 trans-04">
                                <i class="fa fa-dollar-sign"></i>
                                Financeiro
                            </a>
                        @elseif ($paymentform == 'adexitum')
                            <a href="{{route('client.financeiro.adexitum')}}" class="stext-102 cl2 hov-cl1 trans-04">
                                <i class="fa fa-dollar-sign"></i>
                                Financeiro
                            </a>
                        @elseif ($paymentform == 'deposito')
                            <a href="{{route('client.financeiro.transferencia')}}" class="stext-102 cl2 hov-cl1 trans-04">
                                <i class="fa fa-dollar-sign"></i>
                                Financeiro
                            </a>
                        @endif
                    </div>
                @endif

                @if(isset($call) && !is_null($call->process_number))
                <div class="p-b-13">
                    <a href="{{route('client.processo.docsextra')}}" class="stext-102 cl2 hov-cl1 trans-04">
                        <i class="fa fa-file-contract"></i>
                        Documentos
                    </a>
                </div> 
                @endif
                

                <div class="p-b-13">
                    <a href="{{route('client.processo.acompanhamento')}}" class="stext-102 cl2 hov-cl1 trans-04">
                        <i class="fa fa-balance-scale"></i>
                        Processo
                    </a>
                </div>

                               
            </div>
        </div>
    </div>
</aside>