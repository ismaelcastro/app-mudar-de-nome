<div class="tab-pane fade show active" id="kt_ecommerce_sales_order_summary" role="tab-panel">
    <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10 pb-5">
        <div class="card card-flush py-4 flex-row-fluid">
            <div class="card-header">
                <div class="card-title">
                    <h2>Detalhes do Pedido (#14534)</h2>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                        <tbody class="fw-semibold text-gray-600">
                        <tr>
                            <td class="text-muted">
                                <div class="d-flex align-items-center">
                                    <span class="svg-icon svg-icon-2 me-2">
                                        {!! file_get_contents('metronic/media/icons/duotune/files/fil002.svg') !!}
                                    </span>
                                    Data Adicionada
                                </div>
                            </td>
                            <td class="fw-bold text-end">05/07/2022</td>
                        </tr>
                        <tr>
                            <td class="text-muted">
                                <div class="d-flex align-items-center">
                                    <span class="svg-icon svg-icon-2 me-2">
                                        {!! file_get_contents('metronic/media/icons/duotune/finance/fin008.svg') !!}
                                    </span>
                                    Metódo de Pagamento
                                </div>
                            </td>
                            <td class="fw-bold text-end">Online
                                <img src="{{ asset("metronic/media/svg/card-logos/visa.svg") }}" class="w-50px ms-2">
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted">
                                <div class="d-flex align-items-center">
                                    <span class="svg-icon svg-icon-2 me-2">
                                        {!! file_get_contents('metronic/media/icons/duotune/ecommerce/ecm006.svg') !!}
                                    </span>
                                    Método de Envio
                                </div>
                            </td>
                            <td class="fw-bold text-end">Taxa de Envio Fixo</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card card-flush py-4 flex-row-fluid">
            <div class="card-header">
                <div class="card-title">
                    <h2>Detalhes do Cliente</h2>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                        <tbody class="fw-semibold text-gray-600">
                        <tr>
                            <td class="text-muted">
                                <div class="d-flex align-items-center">
                                    <span class="svg-icon svg-icon-2 me-2">
                                        {!! file_get_contents('metronic/media/icons/duotune/communication/com006.svg') !!}
                                    </span>
                                    Cliente
                                </div>
                            </td>
                            <td class="fw-bold text-end">
                                <div class="d-flex align-items-center justify-content-end">
                                    <div class="symbol symbol-circle symbol-25px overflow-hidden me-3">
                                        <a href="#">
                                            <div class="symbol-label">
                                                <img src="{{ asset("metronic/media/avatars/300-23.jpg") }}" alt="Dan Wilson" class="w-100">
                                            </div>
                                        </a>
                                    </div>
                                    <a href="#" class="text-gray-600 text-hover-primary">Dan Wilson</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted">
                                <div class="d-flex align-items-center">
                                    <span class="svg-icon svg-icon-2 me-2">
                                        {!! file_get_contents('metronic/media/icons/duotune/communication/com011.svg') !!}
                                    </span>
                                    Email
                                </div>
                            </td>
                            <td class="fw-bold text-end">
                                <a href="#" class="text-gray-600 text-hover-primary">dam@consilting.com</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted">
                                <div class="d-flex align-items-center">
                                    <span class="svg-icon svg-icon-2 me-2">
                                        {!! file_get_contents('metronic/media/icons/duotune/electronics/elc003.svg') !!}
                                    </span>
                                    Telefone
                                </div>
                            </td>
                            <td class="fw-bold text-end">+6141 234 567</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card card-flush py-4 flex-row-fluid">
            <div class="card-header">
                <div class="card-title">
                    <h2>Documentos</h2>
                </div>
            </div>

            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                        <tbody class="fw-semibold text-gray-600">
                        <tr>
                            <td class="text-muted">
                                <div class="d-flex align-items-center">
                                    <span class="svg-icon svg-icon-2 me-2">
                                        {!! file_get_contents('metronic/media/icons/duotune/ecommerce/ecm008.svg') !!}
                                    </span>
                                    Fatura
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="View the invoice generated by this order." data-kt-initialized="1"></i>
                                </div>
                            </td>
                            <td class="fw-bold text-end">
                                <a href="#" class="text-gray-600 text-hover-primary">#INV-000414</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted">
                                <div class="d-flex align-items-center">
                                    <span class="svg-icon svg-icon-2 me-2">
                                        {!! file_get_contents('metronic/media/icons/duotune/ecommerce/ecm006.svg') !!}
                                    </span>
                                    Transporte
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="View the shipping manifest generated by this order." data-kt-initialized="1"></i>
                                </div>
                            </td>
                            <td class="fw-bold text-end">
                                <a href="#" class="text-gray-600 text-hover-primary">#SHP-0025410</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted">
                                <div class="d-flex align-items-center">
                                    <span class="svg-icon svg-icon-2 me-2">
                                        {!! file_get_contents('metronic/media/icons/duotune/ecommerce/ecm011.svg') !!}
                                    </span>
                                    Pontos de Recompensa
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Reward value earned by customer when purchasing this order." data-kt-initialized="1"></i>
                                </div>
                            </td>
                            <td class="fw-bold text-end">600</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--begin::Orders-->
    <div class="d-flex flex-column gap-7 gap-lg-10">
        <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
            <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                <div class="position-absolute top-0 end-0 opacity-10 pe-none text-end">
                    <img src="{{ asset("metronic/media/icons/duotune/ecommerce/ecm001.svg") }}" class="w-175px">
                </div>

                <div class="card-header">
                    <div class="card-title">
                        <h2>Endereço de Pagamento</h2>
                    </div>
                </div>

                <div class="card-body pt-0">Unit 1/23 Hastings Road,
                    <br>Melbourne 3000,
                    <br>Victoria,
                    <br>Australia.
                </div>
            </div>

            <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                <div class="position-absolute top-0 end-0 opacity-10 pe-none text-end">
                    <img src="{{ asset("metronic/media/icons/duotune/ecommerce/ecm006.svg") }}" class="w-175px">
                </div>

                <div class="card-header">
                    <div class="card-title">
                        <h2>Endereço de Envio</h2>
                    </div>
                </div>

                <div class="card-body pt-0">Unit 1/23 Hastings Road,
                    <br>Melbourne 3000,
                    <br>Victoria,
                    <br>Australia.
                </div>
            </div>
        </div>

        <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
            <div class="card-header">
                <div class="card-title">
                    <h2>Pedido #14534</h2>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                        <thead>
                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                            <th class="min-w-175px">Product</th>
                            <th class="min-w-70px text-end">Quantidade</th>
                            <th class="min-w-100px text-end">Total</th>
                        </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url({{ asset("metronic/media//stock/ecommerce/1.gif") }});"></span>
                                    </a>
                                    <div class="ms-5">
                                        <a href="#" class="fw-bold text-gray-600 text-hover-primary">Product 1</a>
                                        <div class="fs-7 text-muted">Delivery Date: 05/07/2022</div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end">2</td>
                            <td class="text-end">$240.00</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url({{ asset("metronic/media/stock/ecommerce/100.gif") }});"></span>
                                    </a>
                                    <div class="ms-5">
                                        <a href="#" class="fw-bold text-gray-600 text-hover-primary">Footwear</a>
                                        <div class="fs-7 text-muted">Delivery Date: 05/07/2022</div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end">1</td>
                            <td class="text-end">$24.00</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-end">Subtotal</td>
                            <td class="text-end">$264.00</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-end">Taxa de Envio</td>
                            <td class="text-end">$5.00</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="fs-3 text-dark text-end">Total</td>
                            <td class="text-dark fs-3 fw-bolder text-end">$269.00</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--end::Orders-->
</div>
