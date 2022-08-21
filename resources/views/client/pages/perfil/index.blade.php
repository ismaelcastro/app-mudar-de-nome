@extends('client.layout.acesso')

@section('content')
    @php($client = auth()->user())
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            <div class="d-flex flex-column flex-xl-row">
                <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                    <div class="card mb-5 mb-xl-8">
                        <div class="card-body pt-15">
                            <div class="d-flex flex-center flex-column mb-5">
                                <div class="symbol symbol-150px symbol-circle mb-7">
                                    <img src="{{ asset("metronic/media/avatars/blank.png")  }}" alt="image">
                                </div>

                                <span class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-1">{{ $client->name }}</span>
                                <span class="fs-5 fw-bold text-muted text-hover-primary mb-6">{{ $client->email }}</span>
                            </div>

                            <div class="d-flex flex-stack fs-4 py-3">
                                <div class="fw-bolder">Detalhes</div>
                                <div class="badge badge-light-info d-inline">Premium user</div>
                            </div>

                            <div class="separator separator-dashed my-3"></div>
                            <div class="pb-5 fs-6">
                                <div class="fw-bolder mt-5">Telefone</div>
                                <div class="text-gray-600">{{ $client->phone_formated }}</div>

                                <div class="fw-bolder mt-5">Endereço de Entrega</div>
                                <div class="text-gray-600">{{ $client->addressstreet }}, {{ $client->addressnumber }}
                                    <br>{{ $client->addresscep }}
                                    <br>{{ $client->addressstate }} {{ $client->addresscity }} {{ $client->addressdistrict }}
                                </div>

                                <div class="fw-bolder mt-5">Ultima Transação</div>
                                <div class="text-gray-600">
                                    <a href="#"
                                       class="text-gray-600 text-hover-primary">#14534</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex-lg-row-fluid ms-lg-15">
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8"
                        role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                               href="#kt_ecommerce_customer_overview" aria-selected="true" role="tab">Meus Pedidos</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                               href="#kt_ecommerce_customer_general" aria-selected="false" tabindex="-1" role="tab">Meus
                                Dados</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                               href="#kt_ecommerce_customer_advanced" aria-selected="false" tabindex="-1" role="tab">Redefinir
                                Senha</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="kt_ecommerce_customer_overview" role="tabpanel">
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <h2>Histórico de transações</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0 pb-5">
                                    <div id="kt_table_customers_payment_wrapper"
                                         class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="table-responsive">
                                            <table class="table align-middle table-row-dashed gy-5 dataTable no-footer"
                                                   id="kt_table_customers_payment">
                                                <thead class="border-bottom border-gray-200 fs-7 fw-bolder">

                                                <tr class="text-start text-muted text-uppercase gs-0">
                                                    <th class="min-w-100px sorting" tabindex="0"
                                                        aria-controls="kt_table_customers_payment" rowspan="1"
                                                        colspan="1"
                                                        aria-label="order No.: activate to sort column ascending"
                                                        style="width: 150.688px;">order No.
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="kt_table_customers_payment" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Status: activate to sort column ascending"
                                                        style="width: 121.969px;">Status
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="kt_table_customers_payment" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Amount: activate to sort column ascending"
                                                        style="width: 113.891px;">Amount
                                                    </th>
                                                    <th class="min-w-100px sorting_disabled" rowspan="1" colspan="1"
                                                        aria-label="Date" style="width: 221.562px;">Date
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody class="fs-6 fw-bold text-gray-600">
                                                <tr class="odd">
                                                    <td>
                                                        <a href="{{ route("client.pedido.detalhes") }}"
                                                           class="text-gray-600 text-hover-primary mb-1">#15400</a>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-light-success">Successful</span>
                                                    </td>
                                                    <td>$1,200.00</td>
                                                    <td>14 Dec 2020, 8:43 pm</td>
                                                </tr>
                                                <tr class="even">
                                                    <td>
                                                        <a href="{{ route("client.pedido.detalhes") }}"
                                                           class="text-gray-600 text-hover-primary mb-1">#15509</a>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-light-success">Successful</span>
                                                    </td>
                                                    <td>$79.00</td>
                                                    <td>01 Dec 2020, 10:12 am</td>
                                                </tr>
                                                <tr class="odd">
                                                    <td>
                                                        <a href="{{ route("client.pedido.detalhes") }}"
                                                           class="text-gray-600 text-hover-primary mb-1">#14337</a>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-light-success">Successful</span>
                                                    </td>
                                                    <td>$5,500.00</td>
                                                    <td>12 Nov 2020, 2:01 pm</td>
                                                </tr>
                                                <tr class="even">
                                                    <td>
                                                        <a href="{{ route("client.pedido.detalhes") }}"
                                                           class="text-gray-600 text-hover-primary mb-1">#14317</a>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-light-warning">Pending</span>
                                                    </td>
                                                    <td>$880.00</td>
                                                    <td>21 Oct 2020, 5:54 pm</td>
                                                </tr>
                                                <tr class="odd">
                                                    <td>
                                                        <a href="{{ route("client.pedido.detalhes") }}"
                                                           class="text-gray-600 text-hover-primary mb-1">#15828</a>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-light-success">Successful</span>
                                                    </td>
                                                    <td>$7,650.00</td>
                                                    <td>19 Oct 2020, 7:32 am</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"></div>
                                            <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                                <div class="dataTables_paginate paging_simple_numbers" id="kt_table_customers_payment_paginate">
                                                    <ul class="pagination">
                                                        <li class="paginate_button page-item previous disabled" id="kt_table_customers_payment_previous">
                                                            <a href="#" aria-controls="kt_table_customers_payment" data-dt-idx="0" tabindex="0" class="page-link">
                                                                <i class="previous"></i>
                                                            </a>
                                                        </li>
                                                        <li class="paginate_button page-item active">
                                                            <a href="#" aria-controls="kt_table_customers_payment" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                                                        </li>
                                                        <li class="paginate_button page-item ">
                                                            <a href="#" aria-controls="kt_table_customers_payment" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                                                        </li>
                                                        <li class="paginate_button page-item next" id="kt_table_customers_payment_next">
                                                            <a href="#" aria-controls="kt_table_customers_payment" data-dt-idx="3" tabindex="0" class="page-link">
                                                                <i class="next"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="kt_ecommerce_customer_general" role="tabpanel">
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <h2>Perfil</h2>
                                    </div>
                                </div>

                                <div class="card-body pt-0 pb-5">
                                    <form id="kt_ecommerce_customer_profile" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                                        <div class="mb-7">
                                            <label class="fs-6 fw-bold mb-2">
                                                <span>Atualizar Avatar</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                   title="" data-bs-original-title="Allowed file types: png, jpg, jpeg."
                                                   aria-label="Allowed file types: png, jpg, jpeg." data-kt-initialized="1">
                                                </i>
                                            </label>

                                            <div class="mt-1">
                                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{ asset("metronic/media/avatars/300-1.jpg") }})">
                                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ asset("metronic/media/avatars/") }})"></div>

                                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                            title="" data-bs-original-title="Mudar avatar"
                                                            data-kt-initialized="1">
                                                        <i class="bi bi-pencil-fill fs-7"></i>
                                                        <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                                                        <input type="hidden" name="avatar_remove">
                                                    </label>

                                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title=""
                                                            data-bs-original-title="Cancelar" data-kt-initialized="1">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip" title=""
                                                            data-bs-original-title="Remover avatar" data-kt-initialized="1">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="fv-row mb-7 fv-plugins-icon-container">
                                            <label class="fs-6 fw-bold mb-2 required">Nome</label>
                                            <input type="text" class="form-control form-control-solid" placeholder="" name="name" value="Max Smith">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>

                                        <div class="fv-row mb-7 fv-plugins-icon-container">
                                            <label class="fs-6 fw-bold mb-2 required">Email</label>
                                            <input type="email" class="form-control form-control-solid" placeholder=""
                                                   name="email" value="client@email">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>

                                        <div class="d-flex justify-content-end">
                                            <button type="submit" id="kt_ecommerce_customer_profile_submit" class="btn btn-light-primary">
                                                <span class="indicator-label">Salvar</span>
                                                <span class="indicator-progress">Por favor aguarde...
                                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                </span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="card pt-4 mb-6 mb-xl-9">
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <h2>Livro de Endereços</h2>
                                    </div>
                                </div>

                                <div id="kt_ecommerce_customer_addresses" class="card-body pt-0 pb-5">
                                    <div class="py-0">
                                        <div class="py-3 d-flex flex-stack flex-wrap">
                                            <div class="d-flex align-items-center collapsible collapsed rotate"
                                                 data-bs-toggle="collapse" href="#kt_ecommerce_customer_addresses_1"
                                                 role="button" aria-expanded="false"
                                                 aria-controls="kt_customer_view_payment_method_1">
                                                <div class="me-3 rotate-90">
                                                    {!! file_get_contents('metronic/media/icons/duotune/arrows/arr071.svg') !!}
                                                </div>

                                                <div class="me-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="fs-4 fw-bolder">Home</div>
                                                        <div class="badge badge-light-primary ms-5">Default Address</div>
                                                    </div>
                                                    <div class="text-muted">101 Collin Street</div>
                                                </div>
                                            </div>
                                            <div class="d-flex my-3 ms-9">
                                                <a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_update_address">
                                                    <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="" data-bs-original-title="Edit" data-kt-initialized="1">
                                                        {!! file_get_contents('metronic/media/icons/duotune/art/art005.svg') !!}
                                                    </span>
                                                </a>

                                                <a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                                   data-bs-toggle="tooltip" title="" data-kt-customer-payment-method="delete"
                                                   data-bs-original-title="Delete" data-kt-initialized="1">
                                                    {!! file_get_contents('metronic/media/icons/duotune/general/gen027.svg') !!}
                                                </a>

                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3" data-kt-payment-mehtod-action="set_as_default">Set as default address</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="kt_ecommerce_customer_addresses_1" class="collapse fs-6 ps-9" data-bs-parent="#kt_ecommerce_customer_addresses">
                                            <div class="d-flex flex-column pb-5">
                                                <div class="fw-bolder text-gray-600">Max Smith</div>
                                                <div class="text-muted">101 Collin Street,
                                                    <br>Melbourne, VIC 3000,
                                                    <br>Australia
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="kt_ecommerce_customer_advanced" role="tabpanel">
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <h2>Detalhes de Segurança</h2>
                                    </div>
                                </div>

                                <div class="card-body pt-0 pb-5">
                                    <div class="table-responsive">
                                        <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                                            <tbody class="fs-6 fw-bold text-gray-600">
                                                <tr>
                                                    <td>Senha</td>
                                                    <td>******</td>
                                                    <td class="text-end">
                                                        <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto"
                                                                data-bs-toggle="modal" data-bs-target="#kt_modal_update_password">
                                                            {!! file_get_contents('metronic/media/icons/duotune/art/art005.svg') !!}
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="kt_modal_update_address" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <div class="modal-content">
                        <form class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#"
                              id="kt_modal_update_address_form">

                            <div class="modal-header" id="kt_modal_update_address_header">
                                <h2 class="fw-bolder">Atualizar o Endereço</h2>
                                <div id="kt_modal_update_address_close"
                                     class="btn btn-icon btn-sm btn-active-icon-primary">
                                    {!! file_get_contents('metronic/media/icons/duotune/arrows/arr061.svg') !!}
                                </div>
                            </div>

                            <div class="modal-body py-10 px-lg-17">
                                <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_address_scroll"
                                     data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                     data-kt-scroll-max-height="auto"
                                     data-kt-scroll-dependencies="#kt_modal_update_address_header"
                                     data-kt-scroll-wrappers="#kt_modal_update_address_scroll"
                                     data-kt-scroll-offset="300px"
                                     style="max-height: 317px;">

                                    <div class="fw-bolder fs-3 rotate collapsible collapsed mb-7"
                                         data-bs-toggle="collapse" href="#kt_modal_update_address_billing_info"
                                         role="button"
                                         aria-expanded="false" aria-controls="kt_modal_update_address_billing_info">
                                        Detalhes
                                        {!! file_get_contents('metronic/media/icons/duotune/arrows/arr072.svg') !!}
                                    </div>

                                    <div id="kt_modal_update_address_billing_info" class="collapse show">
                                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                            <label class="fs-6 fw-bold mb-2 required">CEP</label>
                                            <input class="form-control form-control-solid" placeholder=""
                                                   name="addresscep" value="">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>

                                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                            <label class="fs-6 fw-bold mb-2 required">Endereço</label>
                                            <input class="form-control form-control-solid" placeholder=""
                                                   name="addressstreet">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>

                                        <div class="row g-9 mb-7">
                                            <div class="col-md-6 fv-row fv-plugins-icon-container">
                                                <label class="fs-6 fw-bold mb-2 required">Cidade</label>
                                                <input class="form-control form-control-solid" placeholder=""
                                                       name="addressstate" value="">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>

                                            <div class="col-md-6 fv-row fv-plugins-icon-container">
                                                <label class="fs-6 fw-bold mb-2 required">Estado</label>
                                                <input class="form-control form-control-solid" placeholder=""
                                                       name="postcode" value="">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                            <label class="fs-6 fw-bold mb-2 required">Cidade</label>
                                            <input class="form-control form-control-solid" placeholder=""
                                                   name="addresscity"
                                                   value="Melbourne">
                                            <div class="fv-plugins-message-container invalid-feedback">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer flex-center">
                                <button type="reset" id="kt_modal_update_address_cancel" class="btn btn-light me-3">Cancelar</button>
                                <button type="submit" id="kt_modal_update_address_submit" class="btn btn-primary">
                                    <span class="indicator-label">Enviar</span>
                                    <span class="indicator-progress">Por favor aguarde...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <div></div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="kt_modal_update_password" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="fw-bolder">Atualizar senha</h2>
                            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                                {!! file_get_contents('metronic/media/icons/duotune/arrows/arr061.svg') !!}
                            </div>
                        </div>

                        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                            <form id="kt_modal_update_password_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <label class="required form-label fs-6 mb-2">Senha Atual</label>
                                    <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="current_password" autocomplete="off">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>

                                <div class="mb-10 fv-row fv-plugins-icon-container" data-kt-password-meter="true">
                                    <div class="mb-1">
                                        <label class="form-label fw-bold fs-6 mb-2">Nova senha</label>
                                        <div class="position-relative mb-3">
                                            <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="new_password" autocomplete="off">
                                            <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                                <i class="bi bi-eye-slash fs-2"></i>
                                                <i class="bi bi-eye fs-2 d-none"></i>
                                            </span>
                                        </div>

                                        <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                        </div>
                                    </div>

                                    <div class="text-muted">Use 8 ou mais caracteres com uma mistura de letras, números e &amp; símbolos.</div>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>

                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <label class="form-label fw-bold fs-6 mb-2">Confirme a nova senha</label>
                                    <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="confirm_password" autocomplete="off">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>

                                <div class="text-center pt-15">
                                    <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Cancelar</button>
                                    <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                        <span class="indicator-label">Enviar</span>
                                        <span class="indicator-progress">Por favor aguarde...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="kt_modal_update_phone" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="fw-bolder">Atualizar telefone de contato</h2>
                            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                                {!! file_get_contents('metronic/media/icons/duotune/arrows/arr061.svg') !!}
                            </div>
                        </div>
                        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                            <form id="kt_modal_update_phone_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                                <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                                    {!! file_get_contents('metronic/media/icons/duotune/general/gen044.svg') !!}

                                    <div class="d-flex flex-stack flex-grow-1">
                                        <div class="fw-bold">
                                            <div class="fs-6 text-gray-700">Observe que um número de telefone válido
                                                pode ser necessário para reagendamento do pedido ou do envio.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="fs-6 fw-bold form-label mb-2">
                                        <span class="required">Telefone</span>
                                    </label>
                                    <input class="form-control form-control-solid" placeholder="" name="profile_phone"
                                           value="{{ old($client->phoneFormated) }}">
                                    <div class="fv-plugins-message-container invalid-feedback">
                                    </div>
                                </div>
                                <div class="text-center pt-15">
                                    <button type="reset" class="btn btn-light me-3"
                                            data-kt-users-modal-action="cancel">Cancelar
                                    </button>
                                    <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                        <span class="indicator-label">Enviar</span>
                                        <span class="indicator-progress">Por favor aguarde...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                                <div></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="kt_modal_add_address" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <div class="modal-content">
                        <form class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#" id="kt_modal_add_address_form">
                            <div class="modal-header" id="kt_modal_add_address_header">
                                <h2 class="fw-bolder">Add New Address</h2>
                                <div id="kt_modal_add_address_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                                    {!! file_get_contents('metronic/media/icons/duotune/arrows/arr061.svg') !!}s
                                </div>
                            </div>

                            <div class="modal-body py-10 px-lg-17">
                                <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_address_scroll"
                                     data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                     data-kt-scroll-max-height="auto"
                                     data-kt-scroll-dependencies="#kt_modal_add_address_header"
                                     data-kt-scroll-wrappers="#kt_modal_add_address_scroll"
                                     data-kt-scroll-offset="300px"
                                     style="max-height: 317px;">
                                    <div class="fw-bolder fs-3 rotate collapsible collapsed mb-7" data-bs-toggle="collapse"
                                         href="#kt_modal_add_address_billing_info" role="button" aria-expanded="false"
                                         aria-controls="kt_modal_add_address_billing_info">Shipping Information

                                        <span class="ms-2 rotate-180">
                                            {!! file_get_contents('metronic/media/icons/duotune/arrows/arr072.svg') !!}
                                        </span>
                                    </div>
                                    <div id="kt_modal_add_address_billing_info" class="collapse show">
                                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                            <label class="fs-6 fw-bold mb-2 required">Address Name</label>
                                            <input class="form-control form-control-solid" placeholder="" name="name" value="">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>

                                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                            <label class="fs-6 fw-bold mb-2 required">Address Line1</label>
                                            <input class="form-control form-control-solid" placeholder="" name="address1" value="">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>

                                        <div class="d-flex flex-column mb-7 fv-row">
                                            <label class="fs-6 fw-bold mb-2">Address Line 2</label>
                                            <input class="form-control form-control-solid" placeholder="" name="address2">
                                        </div>

                                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                            <label class="fs-6 fw-bold mb-2 required">City / Town</label>
                                            <input class="form-control form-control-solid" placeholder="" name="city" value="">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>

                                        <div class="row g-9 mb-7">
                                            <div class="col-md-6 fv-row fv-plugins-icon-container">
                                                <label class="fs-6 fw-bold mb-2 required">State / Province</label>
                                                <input class="form-control form-control-solid" placeholder="" name="state" value="">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>

                                            <div class="col-md-6 fv-row fv-plugins-icon-container">
                                                <label class="fs-6 fw-bold mb-2 required">Post Code</label>
                                                <input class="form-control form-control-solid" placeholder="" name="postcode" value="">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                            <label class="fs-6 fw-bold mb-2">
                                                <span class="required">Country</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title=""
                                                   data-bs-original-title="Country of origination"
                                                   aria-label="Country of origination" data-kt-initialized="1">
                                                </i>
                                            </label>
                                            <select name="country" aria-label="Select a Country" data-control="select2"
                                                    data-placeholder="Select a Country..."
                                                    data-dropdown-parent="#kt_modal_add_address"
                                                    class="form-select form-select-solid fw-bolder select2-hidden-accessible"
                                                    data-select2-id="select2-data-10-piel" tabindex="-1"
                                                    aria-hidden="true"
                                                    data-kt-initialized="1">
                                                <option value="" data-select2-id="select2-data-12-msbf">Select a
                                                    Country...
                                                </option>
                                                <option value="AF">Afghanistan</option>
                                                <option value="AX">Aland Islands</option>
                                                <option value="AL">Albania</option>
                                                <option value="DZ">Algeria</option>
                                                <option value="AS">American Samoa</option>
                                                <option value="AD">Andorra</option>
                                                <option value="AO">Angola</option>
                                                <option value="AI">Anguilla</option>
                                                <option value="AG">Antigua and Barbuda</option>
                                                <option value="AR">Argentina</option>
                                                <option value="AM">Armenia</option>
                                                <option value="AW">Aruba</option>
                                                <option value="AU">Australia</option>
                                                <option value="AT">Austria</option>
                                                <option value="AZ">Azerbaijan</option>
                                                <option value="BS">Bahamas</option>
                                                <option value="BH">Bahrain</option>
                                                <option value="BD">Bangladesh</option>
                                                <option value="BB">Barbados</option>
                                                <option value="BY">Belarus</option>
                                                <option value="BE">Belgium</option>
                                                <option value="BZ">Belize</option>
                                                <option value="BJ">Benin</option>
                                                <option value="BM">Bermuda</option>
                                                <option value="BT">Bhutan</option>
                                                <option value="BO">Bolivia, Plurinational State of
                                                </option>
                                                <option value="BQ">Bonaire, Sint Eustatius and Saba
                                                </option>
                                                <option value="BA">Bosnia and Herzegovina</option>
                                                <option value="BW">Botswana</option>
                                                <option value="BR">Brazil</option>
                                                <option value="IO">British Indian Ocean Territory
                                                </option>
                                                <option value="BN">Brunei Darussalam</option>
                                                <option value="BG">Bulgaria</option>
                                                <option value="BF">Burkina Faso</option>
                                                <option value="BI">Burundi</option>
                                                <option value="KH">Cambodia</option>
                                                <option value="CM">Cameroon</option>
                                                <option value="CA">Canada</option>
                                                <option value="CV">Cape Verde</option>
                                                <option value="KY">Cayman Islands</option>
                                                <option value="CF">Central African Republic</option>
                                                <option value="TD">Chad</option>
                                                <option value="CL">Chile</option>
                                                <option value="CN">China</option>
                                                <option value="CX">Christmas Island</option>
                                                <option value="CC">Cocos (Keeling) Islands</option>
                                                <option value="CO">Colombia</option>
                                                <option value="KM">Comoros</option>
                                                <option value="CK">Cook Islands</option>
                                                <option value="CR">Costa Rica</option>
                                                <option value="CI">Côte d'Ivoire</option>
                                                <option value="HR">Croatia</option>
                                                <option value="CU">Cuba</option>
                                                <option value="CW">Curaçao</option>
                                                <option value="CZ">Czech Republic</option>
                                                <option value="DK">Denmark</option>
                                                <option value="DJ">Djibouti</option>
                                                <option value="DM">Dominica</option>
                                                <option value="DO">Dominican Republic</option>
                                                <option value="EC">Ecuador</option>
                                                <option value="EG">Egypt</option>
                                                <option value="SV">El Salvador</option>
                                                <option value="GQ">Equatorial Guinea</option>
                                                <option value="ER">Eritrea</option>
                                                <option value="EE">Estonia</option>
                                                <option value="ET">Ethiopia</option>
                                                <option value="FK">Falkland Islands (Malvinas)
                                                </option>
                                                <option value="FJ">Fiji</option>
                                                <option value="FI">Finland</option>
                                                <option value="FR">France</option>
                                                <option value="PF">French Polynesia</option>
                                                <option value="GA">Gabon</option>
                                                <option value="GM">Gambia</option>
                                                <option value="GE">Georgia</option>
                                                <option value="DE">Germany</option>
                                                <option value="GH">Ghana</option>
                                                <option value="GI">Gibraltar</option>
                                                <option value="GR">Greece</option>
                                                <option value="GL">Greenland</option>
                                                <option value="GD">Grenada</option>
                                                <option value="GU">Guam</option>
                                                <option value="GT">Guatemala</option>
                                                <option value="GG">Guernsey</option>
                                                <option value="GN">Guinea</option>
                                                <option value="GW">Guinea-Bissau</option>
                                                <option value="HT">Haiti</option>
                                                <option value="VA">Holy See (Vatican City State)
                                                </option>
                                                <option value="HN">Honduras</option>
                                                <option value="HK">Hong Kong</option>
                                                <option value="HU">Hungary</option>
                                                <option value="IS">Iceland</option>
                                                <option value="IN">India</option>
                                                <option value="ID">Indonesia</option>
                                                <option value="IR">Iran, Islamic Republic of
                                                </option>
                                                <option value="IQ">Iraq</option>
                                                <option value="IE">Ireland</option>
                                                <option value="IM">Isle of Man</option>
                                                <option value="IL">Israel</option>
                                                <option value="IT">Italy</option>
                                                <option value="JM">Jamaica</option>
                                                <option value="JP">Japan</option>
                                                <option value="JE">Jersey</option>
                                                <option value="JO">Jordan</option>
                                                <option value="KZ">Kazakhstan</option>
                                                <option value="KE">Kenya</option>
                                                <option value="KI">Kiribati</option>
                                                <option value="KP">Korea, Democratic People's
                                                    Republic of
                                                </option>
                                                <option value="KW">Kuwait</option>
                                                <option value="KG">Kyrgyzstan</option>
                                                <option value="LA">Lao People's Democratic Republic
                                                </option>
                                                <option value="LV">Latvia</option>
                                                <option value="LB">Lebanon</option>
                                                <option value="LS">Lesotho</option>
                                                <option value="LR">Liberia</option>
                                                <option value="LY">Libya</option>
                                                <option value="LI">Liechtenstein</option>
                                                <option value="LT">Lithuania</option>
                                                <option value="LU">Luxembourg</option>
                                                <option value="MO">Macao</option>
                                                <option value="MG">Madagascar</option>
                                                <option value="MW">Malawi</option>
                                                <option value="MY">Malaysia</option>
                                                <option value="MV">Maldives</option>
                                                <option value="ML">Mali</option>
                                                <option value="MT">Malta</option>
                                                <option value="MH">Marshall Islands</option>
                                                <option value="MQ">Martinique</option>
                                                <option value="MR">Mauritania</option>
                                                <option value="MU">Mauritius</option>
                                                <option value="MX">Mexico</option>
                                                <option value="FM">Micronesia, Federated States of
                                                </option>
                                                <option value="MD">Moldova, Republic of</option>
                                                <option value="MC">Monaco</option>
                                                <option value="MN">Mongolia</option>
                                                <option value="ME">Montenegro</option>
                                                <option value="MS">Montserrat</option>
                                                <option value="MA">Morocco</option>
                                                <option value="MZ">Mozambique</option>
                                                <option value="MM">Myanmar</option>
                                                <option value="NA">Namibia</option>
                                                <option value="NR">Nauru</option>
                                                <option value="NP">Nepal</option>
                                                <option value="NL">Netherlands</option>
                                                <option value="NZ">New Zealand</option>
                                                <option value="NI">Nicaragua</option>
                                                <option value="NE">Niger</option>
                                                <option value="NG">Nigeria</option>
                                                <option value="NU">Niue</option>
                                                <option value="NF">Norfolk Island</option>
                                                <option value="MP">Northern Mariana Islands</option>
                                                <option value="NO">Norway</option>
                                                <option value="OM">Oman</option>
                                                <option value="PK">Pakistan</option>
                                                <option value="PW">Palau</option>
                                                <option value="PS">Palestinian Territory, Occupied
                                                </option>
                                                <option value="PA">Panama</option>
                                                <option value="PG">Papua New Guinea</option>
                                                <option value="PY">Paraguay</option>
                                                <option value="PE">Peru</option>
                                                <option value="PH">Philippines</option>
                                                <option value="PL">Poland</option>
                                                <option value="PT">Portugal</option>
                                                <option value="PR">Puerto Rico</option>
                                                <option value="QA">Qatar</option>
                                                <option value="RO">Romania</option>
                                                <option value="RU">Russian Federation</option>
                                                <option value="RW">Rwanda</option>
                                                <option value="BL">Saint Barthélemy</option>
                                                <option value="KN">Saint Kitts and Nevis</option>
                                                <option value="LC">Saint Lucia</option>
                                                <option value="MF">Saint Martin (French part)
                                                </option>
                                                <option value="VC">Saint Vincent and the Grenadines
                                                </option>
                                                <option value="WS">Samoa</option>
                                                <option value="SM">San Marino</option>
                                                <option value="ST">Sao Tome and Principe</option>
                                                <option value="SA">Saudi Arabia</option>
                                                <option value="SN">Senegal</option>
                                                <option value="RS">Serbia</option>
                                                <option value="SC">Seychelles</option>
                                                <option value="SL">Sierra Leone</option>
                                                <option value="SG">Singapore</option>
                                                <option value="SX">Sint Maarten (Dutch part)
                                                </option>
                                                <option value="SK">Slovakia</option>
                                                <option value="SI">Slovenia</option>
                                                <option value="SB">Solomon Islands</option>
                                                <option value="SO">Somalia</option>
                                                <option value="ZA">South Africa</option>
                                                <option value="KR">South Korea</option>
                                                <option value="SS">South Sudan</option>
                                                <option value="ES">Spain</option>
                                                <option value="LK">Sri Lanka</option>
                                                <option value="SD">Sudan</option>
                                                <option value="SR">Suriname</option>
                                                <option value="SZ">Swaziland</option>
                                                <option value="SE">Sweden</option>
                                                <option value="CH">Switzerland</option>
                                                <option value="SY">Syrian Arab Republic</option>
                                                <option value="TW">Taiwan, Province of China
                                                </option>
                                                <option value="TJ">Tajikistan</option>
                                                <option value="TZ">Tanzania, United Republic of
                                                </option>
                                                <option value="TH">Thailand</option>
                                                <option value="TG">Togo</option>
                                                <option value="TK">Tokelau</option>
                                                <option value="TO">Tonga</option>
                                                <option value="TT">Trinidad and Tobago</option>
                                                <option value="TN">Tunisia</option>
                                                <option value="TR">Turkey</option>
                                                <option value="TM">Turkmenistan</option>
                                                <option value="TC">Turks and Caicos Islands</option>
                                                <option value="TV">Tuvalu</option>
                                                <option value="UG">Uganda</option>
                                                <option value="UA">Ukraine</option>
                                                <option value="AE">United Arab Emirates</option>
                                                <option value="GB">United Kingdom</option>
                                                <option value="US">United States</option>
                                                <option value="UY">Uruguay</option>
                                                <option value="UZ">Uzbekistan</option>
                                                <option value="VU">Vanuatu</option>
                                                <option value="VE">Venezuela, Bolivarian Republic of
                                                </option>
                                                <option value="VN">Vietnam</option>
                                                <option value="VI">Virgin Islands</option>
                                                <option value="YE">Yemen</option>
                                                <option value="ZM">Zambia</option>
                                                <option value="ZW">Zimbabwe</option>
                                            </select><span
                                                    class="select2 select2-container select2-container--bootstrap5"
                                                    dir="ltr" data-select2-id="select2-data-2-m7t9"
                                                    style="width: 100%;"><span
                                                        class="selection"><span
                                                            class="select2-selection select2-selection--single form-select form-select-solid fw-bolder"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="-1"
                                                            aria-disabled="false"
                                                            aria-labelledby="select2-country-44-container"
                                                            aria-controls="select2-country-44-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-country-44-container" role="textbox"
                                                                aria-readonly="true" title="Select a Country..."><span
                                                                    class="select2-selection__placeholder">Select
                                                            a Country...</span></span><span
                                                                class="select2-selection__arrow"
                                                                role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span><span
                                                    class="select2 select2-container select2-container--bootstrap5"
                                                    dir="ltr"
                                                    data-select2-id="select2-data-11-8lbu" style="width: 100%;"><span
                                                        class="selection"><span
                                                            class="select2-selection select2-selection--single form-select form-select-solid fw-bolder"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0"
                                                            aria-disabled="false"
                                                            aria-labelledby="select2-country-oa-container"
                                                            aria-controls="select2-country-oa-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-country-oa-container" role="textbox"
                                                                aria-readonly="true" title="Select a Country..."><span
                                                                    class="select2-selection__placeholder">Select
                                                            a Country...</span></span><span
                                                                class="select2-selection__arrow"
                                                                role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            <div class="fv-plugins-message-container invalid-feedback">
                                            </div>
                                        </div>
                                        <div class="fv-row mb-7">
                                            <div class="d-flex flex-stack">
                                                <div class="me-5">
                                                    <label class="fs-6 fw-bold">Use as a billing address?</label>
                                                    <div class="fs-7 fw-bold text-muted">If you need more info, please check budget planning </div>
                                                </div>
                                                <label class="form-check form-switch form-check-custom form-check-solid">
                                                    <input class="form-check-input" name="billing" type="checkbox" value="1" id="kt_modal_add_address_billing" checked="checked">
                                                    <span class="form-check-label fw-bold text-muted" for="kt_modal_add_address_billing">Yes</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer flex-center">
                                <button type="reset" id="kt_modal_add_address_cancel" class="btn btn-light me-3">Cancelar</button>
                                <button type="submit" id="kt_modal_add_address_submit" class="btn btn-primary">
                                    <span class="indicator-label">Enviar</span>
                                    <span class="indicator-progress">Por favor aguarde...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="kt_modal_add_auth_app" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="fw-bolder">Adicionar aplicativo autenticador</h2>
                            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                                <span class="svg-icon svg-icon-1">
                                    {!! file_get_contents('metronic/media/icons/duotune/arrows/arr061.svg') !!}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="kt_modal_add_one_time_password" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="fw-bolder">Enable One Time Password</h2>
                            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                                <span class="svg-icon svg-icon-1">
                                    {!! file_get_contents('metronic/media/icons/duotune/arrows/arr061.svg') !!}
                                </span>
                            </div>
                        </div>

                        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                            <form class="form fv-plugins-bootstrap5 fv-plugins-framework" id="kt_modal_add_one_time_password_form">
                                <div class="fw-bolder mb-9">Digite o novo número de telefone para receber um SMS ao fazer login.</div>
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="fs-6 fw-bold form-label mb-2">
                                        <span class="required">Número de celular</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title=""
                                           data-bs-original-title="A valid mobile number is required to receive the one-time password to validate your account login."
                                           aria-label="A valid mobile number is required to receive the one-time password to validate your account login."
                                           data-kt-initialized="1"></i>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="otp_mobile_number" placeholder="+6123 456 789" value="">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>

                                <div class="separator saperator-dashed my-5"></div>
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-bold form-label mb-2">
                                        <span class="required">Email</span>
                                    </label>
                                    <input type="email" class="form-control form-control-solid" name="otp_email" value="smith@kpmg.com" readonly="readonly">
                                </div>
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="fs-6 fw-bold form-label mb-2">
                                        <span class="required">Confirm password</span>
                                    </label>
                                    <input type="password" class="form-control form-control-solid" name="otp_confirm_password" value="">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <div class="text-center pt-15">
                                    <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Cancelar</button>
                                    <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                        <span class="indicator-label">Enviar</span>
                                        <span class="indicator-progress">Por favor aguarde...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection