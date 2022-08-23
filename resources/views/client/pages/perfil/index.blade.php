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
                               href="#kt_meus_pedidos" aria-selected="true" role="tab">Meus Pedidos</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                               href="#kt_meus_dados" aria-selected="false" tabindex="-1" role="tab">Meus Dados</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                               href="#kt_redefinir_senha" aria-selected="false" tabindex="-1" role="tab">Redefinir Senha</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="kt_meus_pedidos" role="tabpanel">
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

                        <div class="tab-pane fade" id="kt_meus_dados" role="tabpanel">
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
                                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ asset("metronic/media/avatars/blank.png") }})"></div>

                                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                            title="" data-bs-original-title="Mudar avatar"
                                                            data-kt-initialized="1">
                                                        <i class="bi bi-pencil-fill fs-7"></i>
                                                        <input type="file" name="image" accept=".png, .jpg, .jpeg">
                                                        <input type="hidden" name="image_remove">
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
                                            <input type="text" class="form-control form-control-solid" placeholder="Informe o nome"
                                                   name="name" value="{{ old($client->name) }}">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>

                                        <div class="fv-row mb-7 fv-plugins-icon-container">
                                            <label class="fs-6 fw-bold mb-2 required">Email</label>
                                            <input type="email" class="form-control form-control-solid" placeholder="Informe e-mail"
                                                   name="email" value="{{ old($client->email) }}">
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

                        <div class="tab-pane fade" id="kt_redefinir_senha" role="tabpanel">
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
                        <form class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#" id="kt_modal_update_address_form">
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
                                                   name="addressstreet" value="">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>

                                        <div class="row g-9 mb-7">
                                            <div class="col-md-6 fv-row fv-plugins-icon-container">
                                                <label class="fs-6 fw-bold mb-2 required">Cidade</label>
                                                <input class="form-control form-control-solid" placeholder=""
                                                       name="addresscity" value="">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>

                                            <div class="col-md-6 fv-row fv-plugins-icon-container">
                                                <label class="fs-6 fw-bold mb-2 required">Estado</label>
                                                <input class="form-control form-control-solid" placeholder=""
                                                       name="addressstate" value="">
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
                                            <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off">
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
        </div>
    </div>
@endsection