@extends('client.layout.acesso')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Order details page-->
                <div class="d-flex flex-column gap-7 gap-lg-10">
                    <div class="d-flex flex-wrap flex-stack gap-5 gap-lg-10">
                        <!--begin:::Tabs-->
                        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-lg-n2 me-auto"
                            role="tablist">
                            <!--begin:::Tab item-->
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                   href="#kt_ecommerce_sales_order_summary" aria-selected="true" role="tab">Resumo do Pedido</a>
                            </li>
                            <!--end:::Tab item-->
                            <!--begin:::Tab item-->
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_sales_order_history" aria-selected="false" tabindex="-1" role="tab">
                                    Consulta
                                </a>
                            </li>
                            <!--end:::Tab item-->
                        </ul>
                        <!--end:::Tabs-->
                    </div>
                    <!--end::Order summary-->
                    <!--begin::Tab content-->
                    <div class="tab-content">
                        <!--begin::Tab pane RESUMO DO PEDIDO -->
                        <div class="tab-pane fade show active" id="kt_ecommerce_sales_order_summary" role="tab-panel">
                            <!--begin::Order summary-->
                            <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10 pb-5">
                                <!--begin::Order details-->
                                <div class="card card-flush py-4 flex-row-fluid">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Detalhes do Pedido (#14534)</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                                <!--begin::Table body-->
                                                <tbody class="fw-semibold text-gray-600">
                                                <!--begin::Date-->
                                                <tr>
                                                    <td class="text-muted">
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Svg Icon | path: icons/duotune/files/fil002.svg-->
                                                            <span class="svg-icon svg-icon-2 me-2">
																					<svg width="20" height="21"
                                                                                         viewBox="0 0 20 21" fill="none"
                                                                                         xmlns="http://www.w3.org/2000/svg">
																						<path opacity="0.3"
                                                                                              d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z"
                                                                                              fill="currentColor"></path>
																						<path d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z"
                                                                                              fill="currentColor"></path>
																					</svg>
																				</span>
                                                            <!--end::Svg Icon-->Data Adicionada
                                                        </div>
                                                    </td>
                                                    <td class="fw-bold text-end">05/07/2022</td>
                                                </tr>
                                                <!--end::Date-->
                                                <!--begin::Payment method-->
                                                <tr>
                                                    <td class="text-muted">
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Svg Icon | path: icons/duotune/finance/fin008.svg-->
                                                            <span class="svg-icon svg-icon-2 me-2">
																					<svg width="24" height="24"
                                                                                         viewBox="0 0 24 24" fill="none"
                                                                                         xmlns="http://www.w3.org/2000/svg">
																						<path opacity="0.3"
                                                                                              d="M3.20001 5.91897L16.9 3.01895C17.4 2.91895 18 3.219 18.1 3.819L19.2 9.01895L3.20001 5.91897Z"
                                                                                              fill="currentColor"></path>
																						<path opacity="0.3"
                                                                                              d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21C21.6 10.9189 22 11.3189 22 11.9189V15.9189C22 16.5189 21.6 16.9189 21 16.9189H16C14.3 16.9189 13 15.6189 13 13.9189ZM16 12.4189C15.2 12.4189 14.5 13.1189 14.5 13.9189C14.5 14.7189 15.2 15.4189 16 15.4189C16.8 15.4189 17.5 14.7189 17.5 13.9189C17.5 13.1189 16.8 12.4189 16 12.4189Z"
                                                                                              fill="currentColor"></path>
																						<path d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21V7.91895C21 6.81895 20.1 5.91895 19 5.91895H3C2.4 5.91895 2 6.31895 2 6.91895V20.9189C2 21.5189 2.4 21.9189 3 21.9189H19C20.1 21.9189 21 21.0189 21 19.9189V16.9189H16C14.3 16.9189 13 15.6189 13 13.9189Z"
                                                                                              fill="currentColor"></path>
																					</svg>
																				</span>
                                                            <!--end::Svg Icon-->
                                                            Metódo de Pagamento
                                                        </div>
                                                    </td>
                                                    <td class="fw-bold text-end">Online
                                                        <img src="{{ asset("metronic/media/svg/card-logos/visa.svg") }}" class="w-50px ms-2">
                                                    </td>
                                                </tr>
                                                <!--end::Payment method-->
                                                <!--begin::Date-->
                                                <tr>
                                                    <td class="text-muted">
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm006.svg-->
                                                            <span class="svg-icon svg-icon-2 me-2">
                                                                <svg width="24" height="24"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M20 8H16C15.4 8 15 8.4 15 9V16H10V17C10 17.6 10.4 18 11 18H16C16 16.9 16.9 16 18 16C19.1 16 20 16.9 20 18H21C21.6 18 22 17.6 22 17V13L20 8Z"
                                                                          fill="currentColor"></path>
                                                                    <path opacity="0.3"
                                                                          d="M20 18C20 19.1 19.1 20 18 20C16.9 20 16 19.1 16 18C16 16.9 16.9 16 18 16C19.1 16 20 16.9 20 18ZM15 4C15 3.4 14.6 3 14 3H3C2.4 3 2 3.4 2 4V13C2 13.6 2.4 14 3 14H15V4ZM6 16C4.9 16 4 16.9 4 18C4 19.1 4.9 20 6 20C7.1 20 8 19.1 8 18C8 16.9 7.1 16 6 16Z"
                                                                          fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->Método de Envio
                                                        </div>
                                                    </td>
                                                    <td class="fw-bold text-end">Taxa de Envio Fixo</td>
                                                </tr>
                                                <!--end::Date-->
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Order details-->
                                <!--begin::Customer details-->
                                <div class="card card-flush py-4 flex-row-fluid">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Detalhes do Cliente</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                                <!--begin::Table body-->
                                                <tbody class="fw-semibold text-gray-600">
                                                <!--begin::Customer name-->
                                                <tr>
                                                    <td class="text-muted">
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                                            <span class="svg-icon svg-icon-2 me-2">
                                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path opacity="0.3" d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z" fill="currentColor"></path>
                                                                    <path d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z" fill="currentColor"></path>
                                                                    <rect x="7" y="6" width="4" height="4" rx="2" fill="currentColor"></rect>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                            Cliente
                                                        </div>
                                                    </td>
                                                    <td class="fw-bold text-end">
                                                        <div class="d-flex align-items-center justify-content-end">
                                                            <!--begin:: Avatar -->
                                                            <div class="symbol symbol-circle symbol-25px overflow-hidden me-3">
                                                                <a href="#">
                                                                    <div class="symbol-label">
                                                                        <img src="{{ asset("metronic/media/avatars/300-23.jpg") }}" alt="Dan Wilson" class="w-100">
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <!--begin::Name-->
                                                            <a href="#" class="text-gray-600 text-hover-primary">Dan Wilson</a>
                                                            <!--end::Name-->
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!--end::Customer name-->
                                                <!--begin::Customer email-->
                                                <tr>
                                                    <td class="text-muted">
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                                            <span class="svg-icon svg-icon-2 me-2">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="currentColor"></path>
                                                                    <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                            Email
                                                        </div>
                                                    </td>
                                                    <td class="fw-bold text-end">
                                                        <a href="#" class="text-gray-600 text-hover-primary">dam@consilting.com</a>
                                                    </td>
                                                </tr>
                                                <!--end::Payment method-->
                                                <!--begin::Date-->
                                                <tr>
                                                    <td class="text-muted">
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Svg Icon | path: icons/duotune/electronics/elc003.svg-->
                                                            <span class="svg-icon svg-icon-2 me-2">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M5 20H19V21C19 21.6 18.6 22 18 22H6C5.4 22 5 21.6 5 21V20ZM19 3C19 2.4 18.6 2 18 2H6C5.4 2 5 2.4 5 3V4H19V3Z" fill="currentColor"></path>
                                                                    <path opacity="0.3" d="M19 4H5V20H19V4Z" fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                            Telefone
                                                        </div>
                                                    </td>
                                                    <td class="fw-bold text-end">+6141 234 567</td>
                                                </tr>
                                                <!--end::Date-->
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Customer details-->
                                <!--begin::Documents-->
                                <div class="card card-flush py-4 flex-row-fluid">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Documentos</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                                <!--begin::Table body-->
                                                <tbody class="fw-semibold text-gray-600">
                                                <!--begin::Invoice-->
                                                <tr>
                                                    <td class="text-muted">
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                                                            <span class="svg-icon svg-icon-2 me-2">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path opacity="0.3" d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z" fill="currentColor"></path>
                                                                    <path d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z" fill="currentColor"></path>
                                                                    <path d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z" fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->Fatura
                                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="View the invoice generated by this order." data-kt-initialized="1"></i>
                                                        </div>
                                                    </td>
                                                    <td class="fw-bold text-end">
                                                        <a href="#" class="text-gray-600 text-hover-primary">#INV-000414</a>
                                                    </td>
                                                </tr>
                                                <!--end::Invoice-->
                                                <!--begin::Shipping-->
                                                <tr>
                                                    <td class="text-muted">
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm006.svg-->
                                                            <span class="svg-icon svg-icon-2 me-2">
                                                                <svg width="24" height="24"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M20 8H16C15.4 8 15 8.4 15 9V16H10V17C10 17.6 10.4 18 11 18H16C16 16.9 16.9 16 18 16C19.1 16 20 16.9 20 18H21C21.6 18 22 17.6 22 17V13L20 8Z"
                                                                          fill="currentColor"></path>
                                                                    <path opacity="0.3"
                                                                          d="M20 18C20 19.1 19.1 20 18 20C16.9 20 16 19.1 16 18C16 16.9 16.9 16 18 16C19.1 16 20 16.9 20 18ZM15 4C15 3.4 14.6 3 14 3H3C2.4 3 2 3.4 2 4V13C2 13.6 2.4 14 3 14H15V4ZM6 16C4.9 16 4 16.9 4 18C4 19.1 4.9 20 6 20C7.1 20 8 19.1 8 18C8 16.9 7.1 16 6 16Z"
                                                                          fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->Transporte
                                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="View the shipping manifest generated by this order." data-kt-initialized="1"></i>
                                                        </div>
                                                    </td>
                                                    <td class="fw-bold text-end">
                                                        <a href="#" class="text-gray-600 text-hover-primary">#SHP-0025410</a>
                                                    </td>
                                                </tr>
                                                <!--end::Shipping-->
                                                <!--begin::Rewards-->
                                                <tr>
                                                    <td class="text-muted">
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm011.svg-->
                                                            <span class="svg-icon svg-icon-2 me-2">
                                                                <svg width="24" height="24"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                    <path opacity="0.3"
                                                                          d="M21.6 11.2L19.3 8.89998V5.59993C19.3 4.99993 18.9 4.59993 18.3 4.59993H14.9L12.6 2.3C12.2 1.9 11.6 1.9 11.2 2.3L8.9 4.59993H5.6C5 4.59993 4.6 4.99993 4.6 5.59993V8.89998L2.3 11.2C1.9 11.6 1.9 12.1999 2.3 12.5999L4.6 14.9V18.2C4.6 18.8 5 19.2 5.6 19.2H8.9L11.2 21.5C11.6 21.9 12.2 21.9 12.6 21.5L14.9 19.2H18.2C18.8 19.2 19.2 18.8 19.2 18.2V14.9L21.5 12.5999C22 12.1999 22 11.6 21.6 11.2Z"
                                                                          fill="currentColor"></path>
                                                                    <path d="M11.3 9.40002C11.3 10.2 11.1 10.9 10.7 11.3C10.3 11.7 9.8 11.9 9.2 11.9C8.8 11.9 8.40001 11.8 8.10001 11.6C7.80001 11.4 7.50001 11.2 7.40001 10.8C7.20001 10.4 7.10001 10 7.10001 9.40002C7.10001 8.80002 7.20001 8.4 7.30001 8C7.40001 7.6 7.7 7.29998 8 7.09998C8.3 6.89998 8.7 6.80005 9.2 6.80005C9.5 6.80005 9.80001 6.9 10.1 7C10.4 7.1 10.6 7.3 10.8 7.5C11 7.7 11.1 8.00005 11.2 8.30005C11.3 8.60005 11.3 9.00002 11.3 9.40002ZM10.1 9.40002C10.1 8.80002 10 8.39998 9.90001 8.09998C9.80001 7.79998 9.6 7.70007 9.2 7.70007C9 7.70007 8.8 7.80002 8.7 7.90002C8.6 8.00002 8.50001 8.2 8.40001 8.5C8.40001 8.7 8.30001 9.10002 8.30001 9.40002C8.30001 9.80002 8.30001 10.1 8.40001 10.4C8.40001 10.6 8.5 10.8 8.7 11C8.8 11.1 9 11.2001 9.2 11.2001C9.5 11.2001 9.70001 11.1 9.90001 10.8C10 10.4 10.1 10 10.1 9.40002ZM14.9 7.80005L9.40001 16.7001C9.30001 16.9001 9.10001 17.1 8.90001 17.1C8.80001 17.1 8.70001 17.1 8.60001 17C8.50001 16.9 8.40001 16.8001 8.40001 16.7001C8.40001 16.6001 8.4 16.5 8.5 16.4L14 7.5C14.1 7.3 14.2 7.19998 14.3 7.09998C14.4 6.99998 14.5 7 14.6 7C14.7 7 14.8 6.99998 14.9 7.09998C15 7.19998 15 7.30002 15 7.40002C15.2 7.30002 15.1 7.50005 14.9 7.80005ZM16.6 14.2001C16.6 15.0001 16.4 15.7 16 16.1C15.6 16.5 15.1 16.7001 14.5 16.7001C14.1 16.7001 13.7 16.6 13.4 16.4C13.1 16.2 12.8 16 12.7 15.6C12.5 15.2 12.4 14.8001 12.4 14.2001C12.4 13.3001 12.6 12.7 12.9 12.3C13.2 11.9 13.7 11.7001 14.5 11.7001C14.8 11.7001 15.1 11.8 15.4 11.9C15.7 12 15.9 12.2 16.1 12.4C16.3 12.6 16.4 12.9001 16.5 13.2001C16.6 13.4001 16.6 13.8001 16.6 14.2001ZM15.4 14.1C15.4 13.5 15.3 13.1 15.2 12.9C15.1 12.6 14.9 12.5 14.5 12.5C14.3 12.5 14.1 12.6001 14 12.7001C13.9 12.8001 13.8 13.0001 13.7 13.2001C13.6 13.4001 13.6 13.8 13.6 14.1C13.6 14.7 13.7 15.1 13.8 15.4C13.9 15.7 14.1 15.8 14.5 15.8C14.8 15.8 15 15.7 15.2 15.4C15.3 15.2 15.4 14.7 15.4 14.1Z"
                                                                          fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->Pontos de Recompensa
                                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Reward value earned by customer when purchasing this order." data-kt-initialized="1"></i>
                                                        </div>
                                                    </td>
                                                    <td class="fw-bold text-end">600</td>
                                                </tr>
                                                <!--end::Rewards-->
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Documents-->
                            </div>
                            <!--end::Order summary-->
                            <!--begin::Orders-->
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
                                    <!--begin::Payment address-->
                                    <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                                        <!--begin::Background-->
                                        <div class="position-absolute top-0 end-0 opacity-10 pe-none text-end">
                                            <img src="{{ asset("metronic/media/icons/duotune/ecommerce/ecm001.svg") }}" class="w-175px">
                                        </div>
                                        <!--end::Background-->
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Endereço de Pagamento</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">Unit 1/23 Hastings Road,
                                            <br>Melbourne 3000,
                                            <br>Victoria,
                                            <br>Australia.
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Payment address-->
                                    <!--begin::Shipping address-->
                                    <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                                        <!--begin::Background-->
                                        <div class="position-absolute top-0 end-0 opacity-10 pe-none text-end">
                                            <img src="{{ asset("metronic/media/icons/duotune/ecommerce/ecm006.svg") }}" class="w-175px">
                                        </div>
                                        <!--end::Background-->
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Endereço de Envio</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">Unit 1/23 Hastings Road,
                                            <br>Melbourne 3000,
                                            <br>Victoria,
                                            <br>Australia.
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Shipping address-->
                                </div>
                                <!--begin::Product List-->
                                <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Pedido #14534</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                                <!--begin::Table head-->
                                                <thead>
                                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                    <th class="min-w-175px">Product</th>
                                                    <th class="min-w-70px text-end">Quantidade</th>
                                                    <th class="min-w-100px text-end">Total</th>
                                                </tr>
                                                </thead>
                                                <!--end::Table head-->
                                                <!--begin::Table body-->
                                                <tbody class="fw-semibold text-gray-600">
                                                <!--begin::Products-->
                                                <tr>
                                                    <!--begin::Product-->
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Thumbnail-->
                                                            <a href="#" class="symbol symbol-50px">
                                                                <span class="symbol-label" style="background-image:url({{ asset("metronic/media//stock/ecommerce/1.gif") }});"></span>
                                                            </a>
                                                            <!--end::Thumbnail-->
                                                            <!--begin::Title-->
                                                            <div class="ms-5">
                                                                <a href="#" class="fw-bold text-gray-600 text-hover-primary">Product 1</a>
                                                                <div class="fs-7 text-muted">Delivery Date: 05/07/2022</div>
                                                            </div>
                                                            <!--end::Title-->
                                                        </div>
                                                    </td>
                                                    <!--end::Product-->
                                                    <!--begin::Quantity-->
                                                    <td class="text-end">2</td>
                                                    <!--end::Quantity-->
                                                    <!--begin::Total-->
                                                    <td class="text-end">$240.00</td>
                                                    <!--end::Total-->
                                                </tr>
                                                <tr>
                                                    <!--begin::Product-->
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Thumbnail-->
                                                            <a href="#" class="symbol symbol-50px">
                                                                <span class="symbol-label" style="background-image:url({{ asset("metronic/media/stock/ecommerce/100.gif") }});"></span>
                                                            </a>
                                                            <!--end::Thumbnail-->
                                                            <!--begin::Title-->
                                                            <div class="ms-5">
                                                                <a href="#" class="fw-bold text-gray-600 text-hover-primary">Footwear</a>
                                                                <div class="fs-7 text-muted">Delivery Date: 05/07/2022</div>
                                                            </div>
                                                            <!--end::Title-->
                                                        </div>
                                                    </td>
                                                    <!--end::Product-->
                                                    <!--begin::Quantity-->
                                                    <td class="text-end">1</td>
                                                    <!--end::Quantity-->
                                                    <!--begin::Total-->
                                                    <td class="text-end">$24.00</td>
                                                    <!--end::Total-->
                                                </tr>
                                                <!--end::Products-->
                                                <!--begin::Subtotal-->
                                                <tr>
                                                    <td colspan="4" class="text-end">Subtotal</td>
                                                    <td class="text-end">$264.00</td>
                                                </tr>
                                                <!--end::Subtotal-->
                                                <!--begin::Shipping-->
                                                <tr>
                                                    <td colspan="4" class="text-end">Taxa de Envio</td>
                                                    <td class="text-end">$5.00</td>
                                                </tr>
                                                <!--end::Shipping-->
                                                <!--begin::Grand total-->
                                                <tr>
                                                    <td colspan="4" class="fs-3 text-dark text-end">Total</td>
                                                    <td class="text-dark fs-3 fw-bolder text-end">$269.00</td>
                                                </tr>
                                                <!--end::Grand total-->
                                                </tbody>
                                                <!--end::Table head-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Product List-->
                            </div>
                            <!--end::Orders-->
                        </div>
                        <!--end::Tab pane RESUMO DO PEDIDO-->
                        <!--begin::Tab pane CONSULTA -->
                        <div class="tab-pane fade" id="kt_ecommerce_sales_order_history" role="tab-panel">
                            <!--begin::Orders-->
                            <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid" id="kt_create_account_stepper" data-kt-stepper="true">
                                <!--begin::Aside-->
                                <div class="card d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px w-xxl-400px me-9">
                                    <!--begin::Wrapper-->
                                    <div class="card-body px-6 px-lg-10 px-xxl-15 py-20">
                                        <!--begin::Nav-->
                                        <div class="stepper-nav">
                                            <!--begin::Step 1-->
                                            <div class="stepper-item current" data-kt-stepper-element="nav">
                                                <!--begin::Wrapper-->
                                                <div class="stepper-wrapper">
                                                    <!--begin::Icon-->
                                                    <div class="stepper-icon w-40px h-40px">
                                                        <i class="stepper-check fas fa-check"></i>
                                                        <span class="stepper-number">1</span>
                                                    </div>
                                                    <!--end::Icon-->
                                                    <!--begin::Label-->
                                                    <div class="stepper-label">
                                                        <h3 class="stepper-title">Account Type</h3>
                                                        <div class="stepper-desc fw-semibold">Setup Your Account Details</div>
                                                    </div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Line-->
                                                <div class="stepper-line h-40px"></div>
                                                <!--end::Line-->
                                            </div>
                                            <!--end::Step 1-->

                                            <!--begin::Step 2-->
                                            <div class="stepper-item" data-kt-stepper-element="nav">
                                                <!--begin::Wrapper-->
                                                <div class="stepper-wrapper">
                                                    <!--begin::Icon-->
                                                    <div class="stepper-icon w-40px h-40px">
                                                        <i class="stepper-check fas fa-check"></i>
                                                        <span class="stepper-number">2</span>
                                                    </div>
                                                    <!--end::Icon-->
                                                    <!--begin::Label-->
                                                    <div class="stepper-label">
                                                        <h3 class="stepper-title">Account Settings</h3>
                                                        <div class="stepper-desc fw-semibold">Setup Your Account
                                                            Settings
                                                        </div>
                                                    </div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Line-->
                                                <div class="stepper-line h-40px"></div>
                                                <!--end::Line-->
                                            </div>
                                            <!--end::Step 2-->

                                            <!--begin::Step 3-->
                                            <div class="stepper-item" data-kt-stepper-element="nav">
                                                <!--begin::Wrapper-->
                                                <div class="stepper-wrapper">
                                                    <!--begin::Icon-->
                                                    <div class="stepper-icon w-40px h-40px">
                                                        <i class="stepper-check fas fa-check"></i>
                                                        <span class="stepper-number">4</span>
                                                    </div>
                                                    <!--end::Icon-->
                                                    <!--begin::Label-->
                                                    <div class="stepper-label">
                                                        <h3 class="stepper-title">Business Info</h3>
                                                        <div class="stepper-desc fw-semibold">Your Business Related
                                                            Info
                                                        </div>
                                                    </div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Line-->
                                                <div class="stepper-line h-40px"></div>
                                                <!--end::Line-->
                                            </div>
                                            <!--end::Step 3-->

                                            <!--begin::Step 4-->
                                            <div class="stepper-item" data-kt-stepper-element="nav">
                                                <!--begin::Wrapper-->
                                                <div class="stepper-wrapper">
                                                    <!--begin::Icon-->
                                                    <div class="stepper-icon w-40px h-40px">
                                                        <i class="stepper-check fas fa-check"></i>
                                                        <span class="stepper-number">5</span>
                                                    </div>
                                                    <!--end::Icon-->
                                                    <!--begin::Label-->
                                                    <div class="stepper-label">
                                                        <h3 class="stepper-title">Billing Details</h3>
                                                        <div class="stepper-desc fw-semibold">Set Your Payment Methods
                                                        </div>
                                                    </div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Line-->
                                                <div class="stepper-line h-40px"></div>
                                                <!--end::Line-->
                                            </div>
                                            <!--end::Step 5-->

                                            <!--begin::Step 5-->
                                            <div class="stepper-item" data-kt-stepper-element="nav">
                                                <!--begin::Wrapper-->
                                                <div class="stepper-wrapper">
                                                    <!--begin::Icon-->
                                                    <div class="stepper-icon w-40px h-40px">
                                                        <i class="stepper-check fas fa-check"></i>
                                                        <span class="stepper-number">6</span>
                                                    </div>
                                                    <!--end::Icon-->
                                                    <!--begin::Label-->
                                                    <div class="stepper-label">
                                                        <h3 class="stepper-title">Completed</h3>
                                                        <div class="stepper-desc fw-semibold">Woah, we are here</div>
                                                    </div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <!--end::Step 5-->
                                        </div>
                                        <!--end::Nav-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--begin::Aside-->
                                <!--begin::Content-->
                                <div class="card d-flex flex-row-fluid flex-center">
                                    <!--begin::Form-->
                                    <form class="card-body py-20 w-100 w-xl-700px px-9 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" id="kt_create_account_form">
                                        <!--begin::Step 1-->
                                        <div class="current" data-kt-stepper-element="content">
                                            <!--begin::Wrapper-->
                                            <div class="w-100">
                                                <!--begin::Heading-->
                                                <div class="pb-10 pb-lg-15">
                                                    <!--begin::Title-->
                                                    <h2 class="fw-bold d-flex align-items-center text-dark">Quem é o Solicitante?</h2>
                                                    <!--end::Title-->
                                                    <!--begin::Notice-->
                                                    <div class="text-muted fw-semibold fs-6">Informe quem deseja mudar o nome.</div>
                                                    <!--end::Notice-->
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Input group-->
                                                <div class="fv-row fv-plugins-icon-container">
                                                    <!--begin::Row-->
                                                    <div class="row">
                                                        <!--begin::Col-->
                                                        <div class="col-lg-6">
                                                            <!--begin::Option-->
                                                            <input type="radio" class="btn-check" name="account_type"
                                                                   value="personal" checked="checked"
                                                                   id="kt_create_account_form_account_type_personal">
                                                            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center mb-10" for="kt_create_account_form_account_type_personal">
                                                                <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                                                                <span class="svg-icon svg-icon-3x me-5">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z"
                                                                              fill="currentColor"></path>
                                                                        <path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z"
                                                                              fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                                <!--begin::Info-->
                                                                <span class="d-block fw-semibold text-start">
																						<span class="text-dark fw-bold d-block fs-4 mb-2">Personal Account</span>
																						<span class="text-muted fw-semibold fs-6">If you need more info, please check it out</span>
																					</span>
                                                                <!--end::Info-->
                                                            </label>
                                                            <!--end::Option-->
                                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                                        </div>
                                                        <!--end::Col-->
                                                        <!--begin::Col-->
                                                        <div class="col-lg-6">
                                                            <!--begin::Option-->
                                                            <input type="radio" class="btn-check" name="account_type"
                                                                   value="corporate"
                                                                   id="kt_create_account_form_account_type_corporate">
                                                            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center"
                                                                   for="kt_create_account_form_account_type_corporate">
                                                                <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                                                                <span class="svg-icon svg-icon-3x me-5">
                                                                    <svg width="24" height="24"
                                                                         viewBox="0 0 24 24"
                                                                         fill="none"
                                                                         xmlns="http://www.w3.org/2000/svg">
                                                                        <path opacity="0.3"
                                                                              d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z"
                                                                              fill="currentColor"></path>
                                                                        <path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z"
                                                                              fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                                <!--begin::Info-->
                                                                <span class="d-block fw-semibold text-start">
                                                                    <span class="text-dark fw-bold d-block fs-4 mb-2">Corporate Account</span>
                                                                    <span class="text-muted fw-semibold fs-6">Create corporate account to mane users</span>
                                                                </span>
                                                                <!--end::Info-->
                                                            </label>
                                                            <!--end::Option-->
                                                        </div>
                                                        <!--end::Col-->
                                                    </div>
                                                    <!--end::Row-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Step 1-->

                                        <!--begin::Step 2-->
                                        <div data-kt-stepper-element="content">
                                            <!--begin::Wrapper-->
                                            <div class="w-100">
                                                <!--begin::Heading-->
                                                <div class="pb-10 pb-lg-15">
                                                    <!--begin::Title-->
                                                    <h2 class="fw-bold text-dark">Detalhes</h2>
                                                    <!--end::Title-->
                                                    <!--begin::Notice-->
                                                    <div class="text-muted fw-semibold fs-6">Nos informe sobre a Retificação desejada.</div>
                                                    <!--end::Notice-->
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="d-flex align-items-center form-label mb-3">Specify Team Size
                                                        <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                           data-bs-toggle="tooltip"
                                                           aria-label="Provide your team size to help us setup your billing"
                                                           data-kt-initialized="1"></i>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Row-->
                                                    <div class="row mb-2" data-kt-buttons="true" data-kt-initialized="1">
                                                        <!--begin::Col-->
                                                        <div class="col">
                                                            <!--begin::Option-->
                                                            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary w-100 p-4">
                                                                <input type="radio" class="btn-check" name="account_team_size" value="1-1">
                                                                <span class="fw-bold fs-3">1-1</span>
                                                            </label>
                                                            <!--end::Option-->
                                                        </div>
                                                        <!--end::Col-->
                                                        <!--begin::Col-->
                                                        <div class="col">
                                                            <!--begin::Option-->
                                                            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary w-100 p-4 active">
                                                                <input type="radio" class="btn-check"
                                                                       name="account_team_size" checked="checked"
                                                                       value="2-10">
                                                                <span class="fw-bold fs-3">2-10</span>
                                                            </label>
                                                            <!--end::Option-->
                                                        </div>
                                                        <!--end::Col-->
                                                        <!--begin::Col-->
                                                        <div class="col">
                                                            <!--begin::Option-->
                                                            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary w-100 p-4">
                                                                <input type="radio" class="btn-check"
                                                                       name="account_team_size" value="10-50">
                                                                <span class="fw-bold fs-3">10-50</span>
                                                            </label>
                                                            <!--end::Option-->
                                                        </div>
                                                        <!--end::Col-->
                                                        <!--begin::Col-->
                                                        <div class="col">
                                                            <!--begin::Option-->
                                                            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary w-100 p-4">
                                                                <input type="radio" class="btn-check"
                                                                       name="account_team_size" value="50+">
                                                                <span class="fw-bold fs-3">50+</span>
                                                            </label>
                                                            <!--end::Option-->
                                                        </div>
                                                        <!--end::Col-->
                                                    </div>
                                                    <!--end::Row-->
                                                    <!--begin::Hint-->
                                                    <div class="form-text">Customers will see this shortened version of
                                                        your statement descriptor
                                                    </div>
                                                    <!--end::Hint-->
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="form-label mb-3">Team Account Name</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text"
                                                           class="form-control form-control-lg form-control-solid"
                                                           name="account_name" placeholder="" value="">
                                                    <!--end::Input-->
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="mb-0 fv-row fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="d-flex align-items-center form-label mb-5">Select
                                                        Account Plan
                                                        <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                           data-bs-toggle="tooltip"
                                                           aria-label="Monthly billing will be based on your account plan"
                                                           data-kt-initialized="1"></i></label>
                                                    <!--end::Label-->
                                                    <!--begin::Options-->
                                                    <div class="mb-0">
                                                        <!--begin:Option-->
                                                        <label class="d-flex flex-stack mb-5 cursor-pointer">
                                                            <!--begin:Label-->
                                                            <span class="d-flex align-items-center me-2">
																					<!--begin::Icon-->
																					<span class="symbol symbol-50px me-6">
																						<span class="symbol-label">
																							<!--begin::Svg Icon | path: icons/duotune/finance/fin001.svg-->
																							<span class="svg-icon svg-icon-1 svg-icon-gray-600">
																								<svg width="24"
                                                                                                     height="24"
                                                                                                     viewBox="0 0 24 24"
                                                                                                     fill="none"
                                                                                                     xmlns="http://www.w3.org/2000/svg">
																									<path d="M20 19.725V18.725C20 18.125 19.6 17.725 19 17.725H5C4.4 17.725 4 18.125 4 18.725V19.725H3C2.4 19.725 2 20.125 2 20.725V21.725H22V20.725C22 20.125 21.6 19.725 21 19.725H20Z"
                                                                                                          fill="currentColor"></path>
																									<path opacity="0.3"
                                                                                                          d="M22 6.725V7.725C22 8.325 21.6 8.725 21 8.725H18C18.6 8.725 19 9.125 19 9.725C19 10.325 18.6 10.725 18 10.725V15.725C18.6 15.725 19 16.125 19 16.725V17.725H15V16.725C15 16.125 15.4 15.725 16 15.725V10.725C15.4 10.725 15 10.325 15 9.725C15 9.125 15.4 8.725 16 8.725H13C13.6 8.725 14 9.125 14 9.725C14 10.325 13.6 10.725 13 10.725V15.725C13.6 15.725 14 16.125 14 16.725V17.725H10V16.725C10 16.125 10.4 15.725 11 15.725V10.725C10.4 10.725 10 10.325 10 9.725C10 9.125 10.4 8.725 11 8.725H8C8.6 8.725 9 9.125 9 9.725C9 10.325 8.6 10.725 8 10.725V15.725C8.6 15.725 9 16.125 9 16.725V17.725H5V16.725C5 16.125 5.4 15.725 6 15.725V10.725C5.4 10.725 5 10.325 5 9.725C5 9.125 5.4 8.725 6 8.725H3C2.4 8.725 2 8.325 2 7.725V6.725L11 2.225C11.6 1.925 12.4 1.925 13.1 2.225L22 6.725ZM12 3.725C11.2 3.725 10.5 4.425 10.5 5.225C10.5 6.025 11.2 6.725 12 6.725C12.8 6.725 13.5 6.025 13.5 5.225C13.5 4.425 12.8 3.725 12 3.725Z"
                                                                                                          fill="currentColor"></path>
																								</svg>
																							</span>
                                                                                            <!--end::Svg Icon-->
																						</span>
																					</span>
                                                                <!--end::Icon-->
                                                                <!--begin::Description-->
																					<span class="d-flex flex-column">
																						<span class="fw-bold text-gray-800 text-hover-primary fs-5">Company Account</span>
																						<span class="fs-6 fw-semibold text-muted">Use images to enhance your post flow</span>
																					</span>
                                                                <!--end:Description-->
																				</span>
                                                            <!--end:Label-->
                                                            <!--begin:Input-->
                                                            <span class="form-check form-check-custom form-check-solid">
																					<input class="form-check-input"
                                                                                           type="radio"
                                                                                           name="account_plan"
                                                                                           value="1">
																				</span>
                                                            <!--end:Input-->
                                                        </label>
                                                        <!--end::Option-->
                                                        <!--begin:Option-->
                                                        <label class="d-flex flex-stack mb-5 cursor-pointer">
                                                            <!--begin:Label-->
                                                            <span class="d-flex align-items-center me-2">
                                                                <!--begin::Icon-->
                                                                <span class="symbol symbol-50px me-6">
                                                                    <span class="symbol-label">
                                                                        <!--begin::Svg Icon | path: icons/duotune/graphs/gra006.svg-->
                                                                        <span class="svg-icon svg-icon-1 svg-icon-gray-600">
                                                                            <svg width="24"
                                                                                 height="24"
                                                                                 viewBox="0 0 24 24"
                                                                                 fill="none"
                                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M13 5.91517C15.8 6.41517 18 8.81519 18 11.8152C18 12.5152 17.9 13.2152 17.6 13.9152L20.1 15.3152C20.6 15.6152 21.4 15.4152 21.6 14.8152C21.9 13.9152 22.1 12.9152 22.1 11.8152C22.1 7.01519 18.8 3.11521 14.3 2.01521C13.7 1.91521 13.1 2.31521 13.1 3.01521V5.91517H13Z"
                                                                                      fill="currentColor"></path>
                                                                                <path opacity="0.3"
                                                                                      d="M19.1 17.0152C19.7 17.3152 19.8 18.1152 19.3 18.5152C17.5 20.5152 14.9 21.7152 12 21.7152C9.1 21.7152 6.50001 20.5152 4.70001 18.5152C4.30001 18.0152 4.39999 17.3152 4.89999 17.0152L7.39999 15.6152C8.49999 16.9152 10.2 17.8152 12 17.8152C13.8 17.8152 15.5 17.0152 16.6 15.6152L19.1 17.0152ZM6.39999 13.9151C6.19999 13.2151 6 12.5152 6 11.8152C6 8.81517 8.2 6.41515 11 5.91515V3.01519C11 2.41519 10.4 1.91519 9.79999 2.01519C5.29999 3.01519 2 7.01517 2 11.8152C2 12.8152 2.2 13.8152 2.5 14.8152C2.7 15.4152 3.4 15.7152 4 15.3152L6.39999 13.9151Z"
                                                                                      fill="currentColor"></path>
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                                                </span>
                                                                <!--end::Icon-->
                                                                <!--begin::Description-->
                                                                    <span class="d-flex flex-column">
                                                                        <span class="fw-bold text-gray-800 text-hover-primary fs-5">Developer Account</span>
                                                                        <span class="fs-6 fw-semibold text-muted">Use images to your post time</span>
                                                                    </span>
                                                                <!--end:Description-->
                                                            </span>
                                                            <!--end:Label-->
                                                            <!--begin:Input-->
                                                            <span class="form-check form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="radio" checked="checked" name="account_plan" value="2">
                                                            </span>
                                                            <!--end:Input-->
                                                        </label>
                                                        <!--end::Option-->
                                                        <!--begin:Option-->
                                                        <label class="d-flex flex-stack mb-0 cursor-pointer">
                                                            <!--begin:Label-->
                                                            <span class="d-flex align-items-center me-2">
                                                                <!--begin::Icon-->
                                                                <span class="symbol symbol-50px me-6">
                                                                    <span class="symbol-label">
                                                                        <!--begin::Svg Icon | path: icons/duotune/graphs/gra008.svg-->
                                                                        <span class="svg-icon svg-icon-1 svg-icon-gray-600">
                                                                            <svg width="24"
                                                                                 height="24"
                                                                                 viewBox="0 0 24 24"
                                                                                 fill="none"
                                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M13 10.9128V3.01281C13 2.41281 13.5 1.91281 14.1 2.01281C16.1 2.21281 17.9 3.11284 19.3 4.61284C20.7 6.01284 21.6 7.91285 21.9 9.81285C22 10.4129 21.5 10.9128 20.9 10.9128H13Z"
                                                                                      fill="currentColor"></path>
                                                                                <path opacity="0.3"
                                                                                      d="M13 12.9128V20.8129C13 21.4129 13.5 21.9129 14.1 21.8129C16.1 21.6129 17.9 20.7128 19.3 19.2128C20.7 17.8128 21.6 15.9128 21.9 14.0128C22 13.4128 21.5 12.9128 20.9 12.9128H13Z"
                                                                                      fill="currentColor"></path>
                                                                                <path opacity="0.3"
                                                                                      d="M11 19.8129C11 20.4129 10.5 20.9129 9.89999 20.8129C5.49999 20.2129 2 16.5128 2 11.9128C2 7.31283 5.39999 3.51281 9.89999 3.01281C10.5 2.91281 11 3.41281 11 4.01281V19.8129Z"
                                                                                      fill="currentColor"></path>
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                                                </span>
                                                                <!--end::Icon-->
                                                                <!--begin::Description-->
                                                                    <span class="d-flex flex-column">
                                                                        <span class="fw-bold text-gray-800 text-hover-primary fs-5">Testing Account</span>
                                                                        <span class="fs-6 fw-semibold text-muted">Use images to enhance time travel rivers</span>
                                                                    </span>
                                                                <!--end:Description-->
																				</span>
                                                            <!--end:Label-->
                                                            <!--begin:Input-->
                                                            <span class="form-check form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="radio" name="account_plan" value="3">
                                                            </span>
                                                            <!--end:Input-->
                                                        </label>
                                                        <!--end::Option-->
                                                    </div>
                                                    <!--end::Options-->
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Step 2-->

                                        <!--begin::Step 3-->
                                        <div data-kt-stepper-element="content">
                                            <!--begin::Wrapper-->
                                            <div class="w-100">
                                                <!--begin::Heading-->
                                                <div class="pb-10 pb-lg-12">
                                                    <!--begin::Title-->
                                                    <h2 class="fw-bold text-dark">Certidão de Nascimento</h2>
                                                    <!--end::Title-->
                                                    <!--begin::Notice-->
                                                    <div class="text-muted fw-semibold fs-6">Informe sobre sua Certidão de Nascimento.</div>
                                                    <!--end::Notice-->
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="form-label required">Business Name</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input name="business_name"
                                                           class="form-control form-control-lg form-control-solid"
                                                           value="Keenthemes Inc.">
                                                    <!--end::Input-->
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="d-flex align-items-center form-label">
                                                        <span class="required">Shortened Descriptor</span>
                                                        <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                           data-bs-toggle="popover" data-bs-trigger="hover"
                                                           data-bs-html="true"
                                                           data-bs-content="<div class='p-4 rounded bg-light'> <div class='d-flex flex-stack text-muted mb-4'> <i class='fas fa-university fs-3 me-3'></i> <div class='fw-bold'>INCBANK **** 1245 STATEMENT</div> </div> <div class='d-flex flex-stack fw-semibold text-gray-600'> <div>Amount</div> <div>Transaction</div> </div> <div class='separator separator-dashed my-2'></div> <div class='d-flex flex-stack text-dark fw-bold mb-2'> <div>USD345.00</div> <div>KEENTHEMES*</div> </div> <div class='d-flex flex-stack text-muted mb-2'> <div>USD75.00</div> <div>Hosting fee</div> </div> <div class='d-flex flex-stack text-muted'> <div>USD3,950.00</div> <div>Payrol</div> </div> </div>"
                                                           data-kt-initialized="1"></i>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input name="business_descriptor"
                                                           class="form-control form-control-lg form-control-solid"
                                                           value="KEENTHEMES">
                                                    <!--end::Input-->
                                                    <!--begin::Hint-->
                                                    <div class="form-text">Customers will see this shortened version of your statement descriptor</div>
                                                    <!--end::Hint-->
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                                    <!--end::Label-->
                                                    <label class="form-label">Business Description</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <textarea name="business_description" class="form-control form-control-lg form-control-solid" rows="3"></textarea>
                                                    <!--end::Input-->
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-semibold form-label required">Contact Email</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input name="business_email" class="form-control form-control-lg form-control-solid" value="corp@support.com">
                                                    <!--end::Input-->
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Step 3-->

                                        <!--begin::Step 4-->
                                        <div data-kt-stepper-element="content">
                                            <!--begin::Wrapper-->
                                            <div class="w-100">
                                                <!--begin::Heading-->
                                                <div class="pb-10 pb-lg-15">
                                                    <!--begin::Title-->
                                                    <h2 class="fw-bold text-dark">Certidão de Casamento</h2>
                                                    <!--end::Title-->
                                                    <!--begin::Notice-->
                                                    <div class="text-muted fw-semibold fs-6">Informe sobre sua Certidão de Casamento.</div>
                                                    <!--end::Notice-->
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Input group-->
                                                <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                        <span class="required">Name On Card</span>
                                                        <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                           data-bs-toggle="tooltip"
                                                           aria-label="Specify a card holder's name"
                                                           data-kt-initialized="1"></i>
                                                    </label>
                                                    <!--end::Label-->
                                                    <input type="text" class="form-control form-control-solid"
                                                           placeholder="" name="card_name" value="Max Doe">
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="required fs-6 fw-semibold form-label mb-2">Card Number</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input wrapper-->
                                                    <div class="position-relative">
                                                        <!--begin::Input-->
                                                        <input type="text" class="form-control form-control-solid"
                                                               placeholder="Enter card number" name="card_number"
                                                               value="4111 1111 1111 1111">
                                                        <!--end::Input-->
                                                        <!--begin::Card logos-->
                                                        <div class="position-absolute translate-middle-y top-50 end-0 me-5">
                                                            <img src="{{ asset("metronic/media/svg/card-logos/visa.svg") }}" alt="" class="h-25px">
                                                            <img src="{{ asset("metronic/media/svg/card-logos/mastercard.svg") }}" alt="" class="h-25px">
                                                            <img src="{{ asset("metronic/media/svg/card-logos/american-express.svg") }}" alt="" class="h-25px">
                                                        </div>
                                                        <!--end::Card logos-->
                                                    </div>
                                                    <!--end::Input wrapper-->
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Step 4-->

                                        <!--begin::Step 5-->
                                        <div data-kt-stepper-element="content">
                                            <!--begin::Wrapper-->
                                            <div class="w-100">
                                                <!--begin::Heading-->
                                                <div class="pb-8 pb-lg-10">
                                                    <!--begin::Title-->
                                                    <h2 class="fw-bold text-dark">Consulta Concluida!</h2>
                                                    <!--end::Title-->
                                                    <!--begin::Notice-->
                                                    <div class="text-muted fw-semibold fs-6">Enquanto aguarda a emissão da documentação,
                                                        <a href="#" class="link-primary fw-bold">clique aqui</a>
                                                        para acessar o seu retatóeio personalizado
                                                    </div>
                                                    <!--end::Notice-->
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Body-->
                                                <div class="mb-0">
                                                    <!--begin::Alert-->
                                                    <!--begin::Notice-->
                                                    <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                                                        <!--begin::Icon-->
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                                                        <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"></rect>
                                                                <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor"></rect>
                                                                <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor"></rect>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        <!--end::Icon-->
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex flex-stack flex-grow-1">
                                                            <!--begin::Content-->
                                                            <div class="fw-semibold">
                                                                <h4 class="text-gray-900 fw-bold">Documentos em processamento!</h4>
                                                                <div class="fs-6 text-gray-700">Para acompanhar o status da documentação
                                                                    <a href="#" class="fw-bold" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">clique aqui</a>
                                                                </div>
                                                            </div>
                                                            <!--end::Content-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </div>
                                                    <!--end::Notice-->
                                                    <!--begin::Notice-->
                                                    <div class="notice d-flex bg-light-success rounded border-success border border-dashed p-6">
                                                        <!--begin::Icon-->
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                                                        <span class="svg-icon svg-icon-2hx svg-icon-success me-4">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor"></path>
															<path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor"></path>
														</svg>
													</span>
                                                        <!--end::Svg Icon-->
                                                        <!--end::Icon-->
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex flex-stack flex-grow-1">
                                                            <!--begin::Content-->
                                                            <div class="fw-semibold">
                                                                <h4 class="text-gray-900 fw-bold">Relatório disponível</h4>
                                                                <div class="fs-6 text-gray-700">Para baixar o seu relatório personalizado
                                                                    <a href="#" class="fw-bold" data-bs-toggle="modal"
                                                                       data-bs-target="#kt_modal_processamento_certidoes">clique aqui</a>
                                                                </div>
                                                            </div>
                                                            <!--end::Content-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </div>
                                                    <!--end::Notice-->
                                                    <!--end::Alert-->
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--begin::Modal - Processamento de Certidões-->
                                        <div class="modal fade" id="kt_modal_processamento_certidoes" tabindex="-1" style="display: none;" aria-hidden="true">
                                            <!--begin::Modal dialog-->
                                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                                <!--begin::Modal content-->
                                                <div class="modal-content rounded">
                                                    <!--begin::Modal header-->
                                                    <div class="modal-header pb-0 border-0 justify-content-end">
                                                        <!--begin::Close-->
                                                        <div class="btn btn-sm btn-icon btn-active-color-primary"
                                                             data-bs-dismiss="modal">
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                            <span class="svg-icon svg-icon-1">
								                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
									                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
								                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>
                                                    <!--begin::Modal header-->
                                                    <!--begin::Modal body-->
                                                    <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                                                        <!--begin::Heading-->
                                                        <div class="mb-13 text-center">
                                                            <!--begin::Title-->
                                                            <h1 class="mb-3">Processamento das Certidões</h1>
                                                            <!--end::Title-->
                                                            <!--begin::Description-->
                                                            <div class="text-muted fw-semibold fs-5">Acompanhe em tempo real o processamento das certidões.</div>
                                                            <!--end::Description-->
                                                        </div>
                                                        <!--end::Heading-->
                                                        <div class="col-md-6 col-lg-6 col-xl-6 offset-md-3 offset-lg-3 offset-xl-3">
                                                            <!--begin::Card widget 16-->
                                                            <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-center border-0 h-md-50 mb-5 mb-xl-10"
                                                                 style="background-color: #080655">
                                                                <!--begin::Header-->
                                                                <div class="card-header pt-5">
                                                                    <!--begin::Title-->
                                                                    <div class="card-title d-flex flex-column">
                                                                        <!--begin::Amount-->
                                                                        <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">69</span>
                                                                        <!--end::Amount-->
                                                                        <!--begin::Subtitle-->
                                                                        <span class="text-white opacity-50 pt-1 fw-semibold fs-6">Certdões Obrigatórias</span>
                                                                        <!--end::Subtitle-->
                                                                    </div>
                                                                    <!--end::Title-->
                                                                </div>
                                                                <!--end::Header-->
                                                                <!--begin::Card body-->
                                                                <div class="card-body d-flex align-items-end pt-0">
                                                                    <!--begin::Progress-->
                                                                    <div class="d-flex align-items-center flex-column mt-3 w-100">
                                                                        <div class="d-flex justify-content-between fw-bold fs-6 text-white opacity-50 w-100 mt-auto mb-2">
                                                                            <span>43 Pending</span>
                                                                            <span>72%</span>
                                                                        </div>
                                                                        <div class="h-8px mx-3 w-100 bg-light-danger rounded">
                                                                            <div class="bg-danger rounded h-8px" role="progressbar" style="width: 72%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Progress-->
                                                                </div>
                                                                <!--end::Card body-->
                                                            </div>
                                                            <!--end::Card widget 16-->
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <!--begin::Tab content-->
                                                            <div class="tab-content rounded h-100 bg-light p-10">
                                                                <!--begin::Tab Pane-->
                                                                <div class="tab-pane fade show active"
                                                                     id="kt_upgrade_plan_startup" role="tabpanel">
                                                                    <!--begin::Heading-->
                                                                    <div class="pb-5">
                                                                        <h2 class="fw-bold text-dark">What’s in Startup Plan?</h2>
                                                                        <div class="text-muted fw-semibold">Optimal for 10+ team size and new startup</div>
                                                                    </div>
                                                                    <!--end::Heading-->
                                                                    <!--begin::Body-->
                                                                    <div class="pt-1">
                                                                        <!--begin::Item-->
                                                                        <div class="d-flex align-items-center mb-7">
                                                                            <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Up to 10 Active Users</span>
                                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                                            <span class="svg-icon svg-icon-1 svg-icon-success">
                                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"></rect>
                                                                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor"></path>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </div>
                                                                        <!--end::Item-->
                                                                        <!--begin::Item-->
                                                                        <div class="d-flex align-items-center mb-7">
                                                                            <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Up to 30 Project Integrations</span>
                                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                                            <span class="svg-icon svg-icon-1 svg-icon-success">
                                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"></rect>
                                                                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor"></path>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </div>
                                                                        <!--end::Item-->
                                                                        <!--begin::Item-->
                                                                        <div class="d-flex align-items-center mb-7">
                                                                            <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Analytics Module</span>
                                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                                            <span class="svg-icon svg-icon-1 svg-icon-success">
                                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                                                          rx="10" fill="currentColor"></rect>
                                                                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                                          fill="currentColor"></path>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </div>
                                                                        <!--end::Item-->
                                                                        <!--begin::Item-->
                                                                        <div class="d-flex align-items-center mb-7">
                                                                            <span class="fw-semibold fs-5 text-muted flex-grow-1">Finance Module</span>
                                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                                            <span class="svg-icon svg-icon-1">
                                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                                                          rx="10" fill="currentColor"></rect>
                                                                                    <rect x="7" y="15.3137" width="12" height="2" rx="1"
                                                                                          transform="rotate(-45 7 15.3137)"
                                                                                          fill="currentColor"></rect>
                                                                                    <rect x="8.41422" y="7" width="12" height="2" rx="1"
                                                                                          transform="rotate(45 8.41422 7)"
                                                                                          fill="currentColor"></rect>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </div>
                                                                        <!--end::Item-->
                                                                        <!--begin::Item-->
                                                                        <div class="d-flex align-items-center mb-7">
                                                                            <span class="fw-semibold fs-5 text-muted flex-grow-1">Accounting Module</span>
                                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                                            <span class="svg-icon svg-icon-1">
                                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                                                          rx="10" fill="currentColor"></rect>
                                                                                    <rect x="7" y="15.3137" width="12" height="2" rx="1"
                                                                                          transform="rotate(-45 7 15.3137)"
                                                                                          fill="currentColor"></rect>
                                                                                    <rect x="8.41422" y="7" width="12" height="2" rx="1"
                                                                                          transform="rotate(45 8.41422 7)"
                                                                                          fill="currentColor"></rect>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </div>
                                                                        <!--end::Item-->
                                                                        <!--begin::Item-->
                                                                        <div class="d-flex align-items-center mb-7">
                                                                            <span class="fw-semibold fs-5 text-muted flex-grow-1">Network Platform</span>
                                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                                            <span class="svg-icon svg-icon-1">
                                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                                                          rx="10" fill="currentColor"></rect>
                                                                                    <rect x="7" y="15.3137" width="12" height="2" rx="1"
                                                                                          transform="rotate(-45 7 15.3137)"
                                                                                          fill="currentColor"></rect>
                                                                                    <rect x="8.41422" y="7" width="12" height="2" rx="1"
                                                                                          transform="rotate(45 8.41422 7)"
                                                                                          fill="currentColor"></rect>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </div>
                                                                        <!--end::Item-->
                                                                        <!--begin::Item-->
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="fw-semibold fs-5 text-muted flex-grow-1">Unlimited Cloud Space</span>
                                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                                            <span class="svg-icon svg-icon-1">
                                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                                                          rx="10" fill="currentColor"></rect>
                                                                                    <rect x="7" y="15.3137" width="12" height="2" rx="1"
                                                                                          transform="rotate(-45 7 15.3137)"
                                                                                          fill="currentColor"></rect>
                                                                                    <rect x="8.41422" y="7" width="12" height="2" rx="1"
                                                                                          transform="rotate(45 8.41422 7)"
                                                                                          fill="currentColor"></rect>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </div>
                                                                        <!--end::Item-->
                                                                    </div>
                                                                    <!--end::Body-->
                                                                </div>
                                                                <!--end::Tab Pane-->
                                                                <!--begin::Tab Pane-->
                                                                <div class="tab-pane fade" id="kt_upgrade_plan_advanced"
                                                                     role="tabpanel">
                                                                    <!--begin::Heading-->
                                                                    <div class="pb-5">
                                                                        <h2 class="fw-bold text-dark">What’s in Startup Plan?</h2>
                                                                        <div class="text-muted fw-semibold">Optimal for 100+ team size and grown company</div>
                                                                    </div>
                                                                    <!--end::Heading-->
                                                                    <!--begin::Body-->
                                                                    <div class="pt-1">
                                                                        <!--begin::Item-->
                                                                        <div class="d-flex align-items-center mb-7">
                                                                            <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Up to 10 Active Users</span>
                                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                                            <span class="svg-icon svg-icon-1 svg-icon-success">
                                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                                                          rx="10" fill="currentColor"></rect>
                                                                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                                          fill="currentColor"></path>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </div>
                                                                        <!--end::Item-->
                                                                        <!--begin::Item-->
                                                                        <div class="d-flex align-items-center mb-7">
                                                                            <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Up to 30 Project Integrations</span>
                                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                                            <span class="svg-icon svg-icon-1 svg-icon-success">
                                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                                                          rx="10" fill="currentColor"></rect>
                                                                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                                          fill="currentColor"></path>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </div>
                                                                        <!--end::Item-->
                                                                        <!--begin::Item-->
                                                                        <div class="d-flex align-items-center mb-7">
                                                                            <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Analytics Module</span>
                                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                                            <span class="svg-icon svg-icon-1 svg-icon-success">
                                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                                                          rx="10" fill="currentColor"></rect>
                                                                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                                          fill="currentColor"></path>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </div>
                                                                        <!--end::Item-->
                                                                        <!--begin::Item-->
                                                                        <div class="d-flex align-items-center mb-7">
                                                                            <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Finance Module</span>
                                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                                            <span class="svg-icon svg-icon-1 svg-icon-success">
                                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                                                          rx="10" fill="currentColor"></rect>
                                                                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                                          fill="currentColor"></path>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </div>
                                                                        <!--end::Item-->
                                                                        <!--begin::Item-->
                                                                        <div class="d-flex align-items-center mb-7">
                                                                            <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Accounting Module</span>
                                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                                            <span class="svg-icon svg-icon-1 svg-icon-success">
                                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                                                          rx="10" fill="currentColor"></rect>
                                                                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                                          fill="currentColor"></path>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </div>
                                                                        <!--end::Item-->
                                                                        <!--begin::Item-->
                                                                        <div class="d-flex align-items-center mb-7">
                                                                            <span class="fw-semibold fs-5 text-muted flex-grow-1">Network Platform</span>
                                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                                            <span class="svg-icon svg-icon-1">
                                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                                                          rx="10" fill="currentColor"></rect>
                                                                                    <rect x="7" y="15.3137" width="12" height="2" rx="1"
                                                                                          transform="rotate(-45 7 15.3137)"
                                                                                          fill="currentColor"></rect>
                                                                                    <rect x="8.41422" y="7" width="12" height="2" rx="1"
                                                                                          transform="rotate(45 8.41422 7)"
                                                                                          fill="currentColor"></rect>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </div>
                                                                        <!--end::Item-->
                                                                        <!--begin::Item-->
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="fw-semibold fs-5 text-muted flex-grow-1">Unlimited Cloud Space</span>
                                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                                            <span class="svg-icon svg-icon-1">
                                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                                                          rx="10" fill="currentColor"></rect>
                                                                                    <rect x="7" y="15.3137" width="12" height="2" rx="1"
                                                                                          transform="rotate(-45 7 15.3137)"
                                                                                          fill="currentColor"></rect>
                                                                                    <rect x="8.41422" y="7" width="12" height="2" rx="1"
                                                                                          transform="rotate(45 8.41422 7)"
                                                                                          fill="currentColor"></rect>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </div>
                                                                        <!--end::Item-->
                                                                    </div>
                                                                    <!--end::Body-->
                                                                </div>
                                                                <!--end::Tab Pane-->
                                                                <!--begin::Tab Pane-->
                                                                <div class="tab-pane fade"
                                                                     id="kt_upgrade_plan_enterprise" role="tabpanel">
                                                                    <!--begin::Heading-->
                                                                    <div class="pb-5">
                                                                        <h2 class="fw-bold text-dark">What’s in Startup Plan?</h2>
                                                                        <div class="text-muted fw-semibold">Optimal for 1000+ team and enterpise</div>
                                                                    </div>
                                                                    <!--end::Heading-->
                                                                    <!--begin::Body-->
                                                                    <div class="pt-1">
                                                                        <!--begin::Item-->
                                                                        <div class="d-flex align-items-center mb-7">
                                                                            <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Up to 10 Active Users</span>
                                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                                            <span class="svg-icon svg-icon-1 svg-icon-success">
                                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                                                          rx="10" fill="currentColor"></rect>
                                                                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                                          fill="currentColor"></path>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </div>
                                                                        <!--end::Item-->
                                                                        <!--begin::Item-->
                                                                        <div class="d-flex align-items-center mb-7">
                                                                            <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Up to 30 Project Integrations</span>
                                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                                            <span class="svg-icon svg-icon-1 svg-icon-success">
                                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                                                          rx="10" fill="currentColor"></rect>
                                                                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                                          fill="currentColor"></path>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </div>
                                                                        <!--end::Item-->
                                                                        <!--begin::Item-->
                                                                        <div class="d-flex align-items-center mb-7">
                                                                            <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Analytics Module</span>
                                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                                            <span class="svg-icon svg-icon-1 svg-icon-success">
                                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                                                          rx="10" fill="currentColor"></rect>
                                                                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                                          fill="currentColor"></path>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </div>
                                                                        <!--end::Item-->
                                                                        <!--begin::Item-->
                                                                        <div class="d-flex align-items-center mb-7">
                                                                            <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Finance Module</span>
                                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                                            <span class="svg-icon svg-icon-1 svg-icon-success">
                                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                                                          rx="10" fill="currentColor"></rect>
                                                                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                                          fill="currentColor"></path>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </div>
                                                                        <!--end::Item-->
                                                                        <!--begin::Item-->
                                                                        <div class="d-flex align-items-center mb-7">
                                                                            <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Accounting Module</span>
                                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                                            <span class="svg-icon svg-icon-1 svg-icon-success">
                                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                                                          rx="10" fill="currentColor"></rect>
                                                                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                                          fill="currentColor"></path>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </div>
                                                                        <!--end::Item-->
                                                                        <!--begin::Item-->
                                                                        <div class="d-flex align-items-center mb-7">
                                                                            <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Network Platform</span>
                                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                                            <span class="svg-icon svg-icon-1 svg-icon-success">
                                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                                                          rx="10" fill="currentColor"></rect>
                                                                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                                          fill="currentColor"></path>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </div>
                                                                        <!--end::Item-->
                                                                        <!--begin::Item-->
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Unlimited Cloud Space</span>
                                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                                            <span class="svg-icon svg-icon-1 svg-icon-success">
                                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                                                          rx="10" fill="currentColor"></rect>
                                                                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                                          fill="currentColor"></path>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </div>
                                                                        <!--end::Item-->
                                                                    </div>
                                                                    <!--end::Body-->
                                                                </div>
                                                                <!--end::Tab Pane-->
                                                                <!--begin::Tab Pane-->
                                                                <div class="tab-pane fade" id="kt_upgrade_plan_custom"
                                                                     role="tabpanel">
                                                                    <!--begin::Heading-->
                                                                    <div class="pb-5">
                                                                        <h2 class="fw-bold text-dark">What’s in Startup Plan?</h2>
                                                                        <div class="text-muted fw-semibold">Optimal for corporations</div>
                                                                    </div>
                                                                    <!--end::Heading-->
                                                                    <!--begin::Body-->
                                                                    <div class="pt-1">
                                                                        <!--begin::Item-->
                                                                        <div class="d-flex align-items-center mb-7">
                                                                            <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Unlimited Users</span>
                                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                                            <span class="svg-icon svg-icon-1 svg-icon-success">
                                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                                                          rx="10" fill="currentColor"></rect>
                                                                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                                          fill="currentColor"></path>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </div>
                                                                        <!--end::Item-->
                                                                        <!--begin::Item-->
                                                                        <div class="d-flex align-items-center mb-7">
                                                                            <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Unlimited Project Integrations</span>
                                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                                            <span class="svg-icon svg-icon-1 svg-icon-success">
                                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                                                          rx="10" fill="currentColor"></rect>
                                                                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                                          fill="currentColor"></path>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </div>
                                                                        <!--end::Item-->
                                                                        <!--begin::Item-->
                                                                        <div class="d-flex align-items-center mb-7">
                                                                            <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Analytics Module</span>
                                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                                            <span class="svg-icon svg-icon-1 svg-icon-success">
                                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                                                          rx="10" fill="currentColor"></rect>
                                                                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                                          fill="currentColor"></path>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </div>
                                                                        <!--end::Item-->
                                                                        <!--begin::Item-->
                                                                        <div class="d-flex align-items-center mb-7">
                                                                            <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Finance Module</span>
                                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                                            <span class="svg-icon svg-icon-1 svg-icon-success">
                                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                                                          rx="10" fill="currentColor"></rect>
                                                                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                                          fill="currentColor"></path>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </div>
                                                                        <!--end::Item-->
                                                                        <!--begin::Item-->
                                                                        <div class="d-flex align-items-center mb-7">
                                                                            <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Accounting Module</span>
                                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                                            <span class="svg-icon svg-icon-1 svg-icon-success">
                                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                                                          rx="10" fill="currentColor"></rect>
                                                                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                                          fill="currentColor"></path>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </div>
                                                                        <!--end::Item-->
                                                                        <!--begin::Item-->
                                                                        <div class="d-flex align-items-center mb-7">
                                                                            <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Network Platform</span>
                                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                                            <span class="svg-icon svg-icon-1 svg-icon-success">
                                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                                                          rx="10" fill="currentColor"></rect>
                                                                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                                          fill="currentColor"></path>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </div>
                                                                        <!--end::Item-->
                                                                        <!--begin::Item-->
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Unlimited Cloud Space</span>
                                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                                            <span class="svg-icon svg-icon-1 svg-icon-success">
                                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                                                          rx="10" fill="currentColor"></rect>
                                                                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                                          fill="currentColor"></path>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </div>
                                                                        <!--end::Item-->
                                                                    </div>
                                                                    <!--end::Body-->
                                                                </div>
                                                                <!--end::Tab Pane-->
                                                            </div>
                                                            <!--end::Tab content-->
                                                        </div>
                                                        <!--end:Form-->
                                                    </div>
                                                    <!--end::Modal body-->
                                                </div>
                                                <!--end::Modal content-->
                                            </div>
                                            <!--end::Modal dialog-->
                                        </div>
                                        <!--end::Modal - Processamento de Certidões-->
                                        <!--end::Step 5-->

                                        <!--begin::Actions-->
                                        <div class="d-flex flex-stack pt-10">
                                            <!--begin::Wrapper-->
                                            <div class="mr-2">
                                                <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                                                    <span class="svg-icon svg-icon-4 me-1">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="currentColor"></rect>
                                                            <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    Voltar
                                                </button>
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Wrapper-->
                                            <div>
                                                <button type="button" class="btn btn-lg btn-primary me-3" data-kt-stepper-action="submit">
                                                    <span class="indicator-label">Enviar
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                                        <span class="svg-icon svg-icon-3 ms-2 me-0">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor"></rect>
                                                                <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                    <span class="indicator-progress">Aguarde...
                                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                    </span>
                                                </button>
                                                <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Continuar
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                                    <span class="svg-icon svg-icon-4 ms-1 me-0">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor"></rect>
                                                            <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </button>
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Actions-->
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Orders-->
                        </div>
                        <!--end::Tab pane CONSULTA-->
                    </div>
                    <!--end::Tab content-->
                </div>
                <!--end::Order details page-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
@endsection