@extends('client.layout.acesso')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="d-flex flex-column gap-7 gap-lg-10">
                    <div class="d-flex flex-wrap flex-stack gap-5 gap-lg-10">
                        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-lg-n2 me-auto" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                   href="#kt_ecommerce_sales_order_summary" aria-selected="true" role="tab">Resumo do Pedido</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_sales_order_history" aria-selected="false" tabindex="-1" role="tab">
                                    Consulta
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <!--begin::Tab pane RESUMO DO PEDIDO-->
                        @include('client.pages.pedido._tab_resumo_pedido')
                        <!--end::Tab pane RESUMO DO PEDIDO-->
                        <!--begin::Tab pane CONSULTA -->
                        @include('client.pages.pedido._tab_consulta')
                        <!--end::Tab pane CONSULTA-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection