@extends('admin.layout.app')

@section('content')
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6"></div>
    <!--end::Toolbar-->

    <!--begin::Content - ClientIndex-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        @include('admin.pages.certificates._filter')
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            <!--begin::Filter-->
                            <button type="button" class="btn btn-light-primary me-3">
                                {!! file_get_contents('metronic/media/icons/duotune/general/gen031.svg') !!}
                                Filtro
                            </button>
                            <!--end::Filter-->
                            <!--begin::Export-->
                            <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal"
                                    data-bs-target="#kt_customers_export_modal">
                                {!! file_get_contents('metronic/media/icons/duotune/arrows/arr078.svg') !!}
                                Exportar
                            </button>
                            <!--end::Export-->
                            <!--begin::Add customer-->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_add_customer">Adcionar
                            </button>
                            <!--end::Add customer-->
                        </div>
                        <!--end::Toolbar-->
                        <!--begin::Group actions-->
                        <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                            <div class="fw-bold me-5">
                                <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected</div>
                            <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Excluir os selecionado(s)</button>
                        </div>
                        <!--end::Group actions-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <div id="kt_customers_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_customers_table">
                                <!--begin::Table head-->
                                <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2 sorting_disabled" aria-label="">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                            <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                   data-kt-check-target="#kt_customers_table .form-check-input"
                                                   value="1">
                                        </div>
                                    </th>
                                    <th class="min-w-50px sorting" tabindex="0" aria-controls="kt_customers_table"
                                        rowspan="1" colspan="1">ID
                                    </th>

                                    <th class="min-w-50px sorting" tabindex="0" aria-controls="kt_customers_table"
                                        rowspan="1" colspan="1">Dias
                                    </th>

                                    <th class="min-w-200px sorting" tabindex="0" aria-controls="kt_customers_table"
                                        rowspan="1" colspan="1">Nome Completo
                                    </th>

                                    <th class="min-w-50px sorting" tabindex="0" aria-controls="kt_customers_table"
                                        rowspan="1" colspan="1">UF
                                    </th>

                                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table"
                                        rowspan="1" colspan="1">Objetivo
                                    </th>

                                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table"
                                        rowspan="1" colspan="1">Estágio
                                    </th>

                                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table"
                                        rowspan="1" colspan="1">Origem
                                    </th>

                                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table"
                                        rowspan="1" colspan="1">Data
                                    </th>
                                </tr>
                                <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->

                                <!--begin::Table body-->
                                <tbody class="fw-semibold text-gray-600">
                                @forelse($clients as $client)
                                    <tr class="odd">
                                        <!--begin::Checkbox-->
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="1">
                                            </div>
                                        </td>
                                        <!--end::Checkbox-->
                                        <td>{{ $client->id }}</td>
                                        <td>0 dias</td>
                                        <td>
                                            <a href="{{ route('admin.certificates.show', ['client' => $client->id]) }}" class="text-gray-800 text-hover-primary mb-1">
                                                {{ $client->name }}
                                            </a>
                                        </td>
                                        <td>
                                            <span class="text-gray-600 text-hover-primary mb-1">{{ $client->addressstate ?? " - "}}</span>
                                        </td>
                                        <td>
                                            @php($alerts = ['text-success', 'text-primary', 'text-warning', 'text-danger'])
                                            <span class="fw-bold fs-6 {{ $alerts[array_rand($alerts)] }}">Objetivo</span>
                                        </td>
                                        <td>
                                            @php($alertsBadge = ['badge-light-success', 'badge-light-primary', 'badge-light-warning', 'badge-light-danger'])
                                            <span class="badge {{ $alertsBadge[array_rand($alertsBadge)] }} fs-7 fw-bold">Estágio</span>
                                        </td>
                                        <td>{!! file_get_contents('metronic/media/svg/brand-logos/facebook-4.svg') !!}</td>
                                        <td>{{ $client->created_at }}</td>
                                    </tr>
                                @empty
                                    <tr class="even">
                                        <td colspan="7">
                                            <p>Nenhum resultado encontrado</p>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                        {{-- begin::Paginação --}}
                        <div class="row">
                            <div class="align-items-center justify-content-center justify-content-md-end">
                                @if($clients instanceof \Illuminate\Pagination\LengthAwarePaginator )
                                    {{$clients->appends($dataForm)->links()}}
                                @endif
                            </div>
                        </div>
                        {{-- end::Paginação --}}
                    </div>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
            <!--begin::Modals-->
            <!--begin::Modal - Adjust Balance-->
            <div class="modal fade" id="kt_customers_export_modal" tabindex="-1" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Modal header-->
                        <div class="modal-header">
                            <!--begin::Modal title-->
                            <h2 class="fw-bold">Exportar Contatos</h2>
                            <!--end::Modal title-->
                            <!--begin::Close-->
                            <div id="kt_customers_export_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                                {!! file_get_contents('metronic/media/icons/duotune/arrows/arr061.svg') !!}
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--end::Modal header-->
                        <!--begin::Modal body-->
                        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                            <!--begin::Form-->
                            <form id="kt_customers_export_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-semibold form-label mb-5">Selecione o formato:</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select data-control="select2" data-placeholder="Select a format" data-hide-search="true" name="format" class="form-select form-select-solid select2-hidden-accessible" data-select2-id="select2-data-16-jd0c" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                        <option value="excell" data-select2-id="select2-data-18-pldt">Excel</option>
                                        <option value="pdf">PDF</option>
                                        <option value="cvs">CVS</option>
                                        <option value="zip">ZIP</option>
                                    </select>
                                    <span class="select2 select2-container select2-container--bootstrap5" dir="ltr"
                                          data-select2-id="select2-data-17-7whv" style="width: 100%;">
                                        <span class="selection">
                                            <span class="select2-selection select2-selection--single form-select form-select-solid"
                                                  role="combobox" aria-haspopup="true" aria-expanded="false"
                                                  tabindex="0" aria-disabled="false"
                                                  aria-labelledby="select2-format-jz-container"
                                                  aria-controls="select2-format-jz-container">
                                                <span class="select2-selection__rendered"
                                                      id="select2-format-jz-container" role="textbox"
                                                      aria-readonly="true" title="Excel">Excel</span>
                                                <span class="select2-selection__arrow" role="presentation">
                                                    <b role="presentation"></b>
                                                </span>
                                            </span>
                                        </span>
                                        <span class="dropdown-wrapper" aria-hidden="true"></span>
                                    </span>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-semibold form-label mb-5">Selecione uma data:</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid flatpickr-input"
                                           placeholder="Pick a date" name="date" type="hidden"><input
                                            class="form-control form-control-solid form-control input"
                                            placeholder="Pick a date" tabindex="0" type="text" readonly="readonly">
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <!--end::Input group-->
                                <!--begin::Row-->
                                <div class="row fv-row mb-15">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-semibold form-label mb-5">Tipo de Pagamento:</label>
                                    <!--end::Label-->
                                    <!--begin::Radio group-->
                                    <div class="d-flex flex-column">
                                        <!--begin::Radio button-->
                                        <label class="form-check form-check-custom form-check-sm form-check-solid mb-3">
                                            <input class="form-check-input" type="checkbox" value="1" checked="checked" name="payment_type">
                                            <span class="form-check-label text-gray-600 fw-semibold">All</span>
                                        </label>
                                        <!--end::Radio button-->
                                        <!--begin::Radio button-->
                                        <label class="form-check form-check-custom form-check-sm form-check-solid mb-3">
                                            <input class="form-check-input" type="checkbox" value="2" checked="checked" name="payment_type">
                                            <span class="form-check-label text-gray-600 fw-semibold">Visa</span>
                                        </label>
                                        <!--end::Radio button-->
                                        <!--begin::Radio button-->
                                        <label class="form-check form-check-custom form-check-sm form-check-solid mb-3">
                                            <input class="form-check-input" type="checkbox" value="3" name="payment_type">
                                            <span class="form-check-label text-gray-600 fw-semibold">Mastercard</span>
                                        </label>
                                        <!--end::Radio button-->
                                        <!--begin::Radio button-->
                                        <label class="form-check form-check-custom form-check-sm form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="4" name="payment_type">
                                            <span class="form-check-label text-gray-600 fw-semibold">American Express</span>
                                        </label>
                                        <!--end::Radio button-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Row-->
                                <!--begin::Actions-->
                                <div class="text-center">
                                    <button type="reset" id="kt_customers_export_cancel" class="btn btn-light me-3">Descartar</button>
                                    <button type="submit" id="kt_customers_export_submit" class="btn btn-primary">
                                        <span class="indicator-label">Enviar</span>
                                        <span class="indicator-progress">
                                            Por favor aguarde...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                    </button>
                                </div>
                                <!--end::Actions-->
                                <div></div></form>
                            <!--end::Form-->
                        </div>
                        <!--end::Modal body-->
                    </div>
                    <!--end::Modal content-->
                </div>
                <!--end::Modal dialog-->
            </div>
            <!--end::Modal - New Card-->
            <!--end::Modals-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content - ClientIndex-->
@endsection