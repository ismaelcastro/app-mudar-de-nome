<div class="tab-pane fade" id="kt_ecommerce_sales_order_history" role="tab-panel">
    <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid" id="kt_create_account_stepper" data-kt-stepper="true">
        <div class="card d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px w-xxl-400px me-9">
            <div class="card-body px-6 px-lg-10 px-xxl-15 py-20">
                <div class="stepper-nav">
                    <!--begin::Step Quem e o Solicitante -->
                    <div class="stepper-item current" data-kt-stepper-element="nav">
                        <div class="stepper-wrapper">
                            <div class="stepper-icon w-40px h-40px">
                                <i class="stepper-check fas fa-check"></i>
                                <span class="stepper-number">1</span>
                            </div>

                            <div class="stepper-label">
                                <h3 class="stepper-title">Quem é o solicitante?</h3>
                                <div class="stepper-desc fw-semibold">Informe quem deseja mudar o nome</div>
                            </div>
                        </div>
                        <div class="stepper-line h-40px"></div>
                    </div>
                    <!--end::Step Quem e o Solicitante -->

                    <!--begin::Step Detalhes -->
                    <div class="stepper-item" data-kt-stepper-element="nav">
                        <div class="stepper-wrapper">
                            <div class="stepper-icon w-40px h-40px">
                                <i class="stepper-check fas fa-check"></i>
                                <span class="stepper-number">2</span>
                            </div>
                            <div class="stepper-label">
                                <h3 class="stepper-title">Detalhes</h3>
                                <div class="stepper-desc fw-semibold">Nos informe sobre a Retificação desejada</div>
                            </div>
                        </div>
                        <div class="stepper-line h-40px"></div>
                    </div>
                    <!--end::Step Detalhes -->

                    <!--begin::Step Certidão de nascimento -->
                    <div class="stepper-item" data-kt-stepper-element="nav">
                        <div class="stepper-wrapper">
                            <div class="stepper-icon w-40px h-40px">
                                <i class="stepper-check fas fa-check"></i>
                                <span class="stepper-number">3</span>
                            </div>
                            <div class="stepper-label">
                                <h3 class="stepper-title">Certidão de Nascimento</h3>
                                <div class="stepper-desc fw-semibold">Informe sobre sua Certidão de Nascimento</div>
                            </div>
                        </div>
                        <div class="stepper-line h-40px"></div>
                    </div>
                    <!--end::Step Certidão de nascimento -->

                    <!--begin::Step Certidão de casamento-->
                    <div class="stepper-item" data-kt-stepper-element="nav">
                        <div class="stepper-wrapper">
                            <div class="stepper-icon w-40px h-40px">
                                <i class="stepper-check fas fa-check"></i>
                                <span class="stepper-number">4</span>
                            </div>
                            <div class="stepper-label">
                                <h3 class="stepper-title">Revisão</h3>
                                <div class="stepper-desc fw-semibold">Revisar e Enviar</div>
                            </div>
                        </div>
                        <div class="stepper-line h-40px"></div>
                    </div>
                    <!--end::Step Certidão de casamento-->

                    <!--begin::Step Concluido-->
                    <div class="stepper-item" data-kt-stepper-element="nav">
                        <div class="stepper-wrapper">
                            <div class="stepper-icon w-40px h-40px">
                                <i class="stepper-check fas fa-check"></i>
                                <span class="stepper-number">5</span>
                            </div>
                            <div class="stepper-label">
                                <h3 class="stepper-title">Concluído</h3>
                                <div class="stepper-desc fw-semibold"></div>
                            </div>
                        </div>
                    </div>
                    <!--end::Step Concluido-->
                </div>
            </div>
        </div>

        <div class="card d-flex flex-row-fluid flex-center">
            <form class="card-body py-20 w-100 w-xl-700px px-9 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" id="kt_create_account_form">
                <!--begin::Step Quem e o Solicitante -->
                <div class="current" data-kt-stepper-element="content">
                    <div class="w-100">
                        <div class="pb-10 pb-lg-15">
                            <h2 class="fw-bold d-flex align-items-center text-dark">Quem é o Solicitante?</h2>
                            <div class="text-muted fw-semibold fs-6">Informe quem deseja mudar o nome.</div>
                        </div>

                        <div class="fv-row fv-plugins-icon-container">
                            <div class="row">
                                <div class="mb-0 fv-row fv-plugins-icon-container">
                                    <div class="mb-0">
                                        <label class="d-flex flex-stack mb-5 cursor-pointer">
                                            <span class="d-flex align-items-center me-2">
                                                <span class="symbol symbol-50px me-6">
                                                    <span class="symbol-label">
                                                        <span class="svg-icon svg-icon-1 svg-icon-gray-600">
                                                            {!! file_get_contents('metronic/media/icons/duotune/communication/com013.svg') !!}
                                                        </span>
                                                    </span>
                                                </span>

                                                <span class="d-flex flex-column">
                                                    <span class="fw-bold text-gray-800 text-hover-primary fs-5">Eu</span>
                                                    <span class="fs-6 fw-semibold text-muted">Contratei o serviço para mim.</span>
                                                </span>
                                            </span>
                                            <span class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="radio" checked="checked" name="requester" value="self">
                                            </span>
                                        </label>

                                        <label class="d-flex flex-stack mb-5 cursor-pointer">
                                            <span class="d-flex align-items-center me-2">
                                                <span class="symbol symbol-50px me-6">
                                                    <span class="symbol-label">
                                                        <span class="svg-icon svg-icon-1 svg-icon-gray-600">
                                                            {!! file_get_contents('metronic/media/icons/duotune/communication/com014.svg') !!}
                                                        </span>
                                                    </span>
                                                </span>

                                                <span class="d-flex flex-column">
                                                    <span class="fw-bold text-gray-800 text-hover-primary fs-5">Outra pessoa</span>
                                                    <span class="fs-6 fw-semibold text-muted">Contratei o serviço para dar de presente.</span>
                                                </span>
                                            </span>

                                            <span class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="radio" name="requester" value="another">
                                            </span>
                                        </label>
                                    </div>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Step Quem e o Solicitante -->

                <!--begin::Step Detalhes -->
                <div data-kt-stepper-element="content">
                    <div class="w-100">
                        <div class="pb-10 pb-lg-15">
                            <h2 class="fw-bold text-dark">Detalhes</h2>
                            <div class="text-muted fw-semibold fs-6">Nos informe sobre a Retificação desejada.</div>
                        </div>

                        <div class="mb-10 fv-row fv-plugins-icon-container">
                            <label class="form-label mb-3">Qual a alteração desejada?</label>
                            <select class="form-select form-select-solid" data-control="select2" data-placeholder="Selecione uma opção">
                                <option></option>
                                @foreach($changeTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-10 fv-row fv-plugins-icon-container">
                            <label class="form-label mb-3">Possui CNH?</label>
                            <div class="form-control form-control-lg form-control-solid p-10">
                                <div class="mb-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="" id="cnh" name="cnh">
                                        <label class="form-check-label" for="cnh">Sim</label>
                                    </div>
                                </div>
                                <div class="mb-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="" id="cnh" name="cnh">
                                        <label class="form-check-label" for="cnh">Não</label>
                                    </div>
                                </div>
                            </div>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <div class="mb-10 fv-row fv-plugins-icon-container">
                            <label class="form-label mb-3">Possui Passaporte? SIM / NÃO</label>
                            <div class="form-control form-control-lg form-control-solid p-10">
                                <div class="mb-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="" id="passport" name="passport">
                                        <label class="form-check-label" for="passport">Sim</label>
                                    </div>
                                </div>
                                <div class="mb-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="" id="passport" name="passport">
                                        <label class="form-check-label" for="passport">Não</label>
                                    </div>
                                </div>
                            </div>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <div class="mb-10 fv-row fv-plugins-icon-container">
                            <label class="form-label mb-3">Qual o nome completo atual?</label>
                            <input type="text" class="form-control form-control-lg form-control-solid" name="account_name" placeholder="" value="">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <div class="mb-10 fv-row fv-plugins-icon-container">
                            <label class="form-label mb-3">Qual o nome completo pretendido?</label>
                            <input type="text" class="form-control form-control-lg form-control-solid" name="account_name" placeholder="" value="">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                <!--end::Step Detalhes -->

                <!--begin::Step Certidão de nascimento -->
                <div data-kt-stepper-element="content">
                    <div class="w-100">
                        <div class="pb-10 pb-lg-12">
                            <h2 class="fw-bold text-dark">Certidão de Nascimento</h2>
                            <div class="text-muted fw-semibold fs-6">Informe sobre sua Certidão de Nascimento.</div>
                        </div>
                        <div class="fv-row mb-10 fv-plugins-icon-container">
                            <label class="form-label required">Qual o cartório de Registro</label>
                            <input name="business_name" class="form-control form-control-lg form-control-solid" value="Keenthemes Inc.">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="fv-row mb-10 fv-plugins-icon-container">
                            <label class="d-flex align-items-center form-label">
                                <span class="required">Identificação do Registrado</span>
                            </label>
                            <input name="business_descriptor" class="form-control form-control-lg form-control-solid" value="KEENTHEMES">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                <!--end::Step Certidão de nascimento -->

                <!--begin::Step Certidão de casamento-->
                <div data-kt-stepper-element="content">
                    <div class="w-100">
                        <div class="pb-10 pb-lg-15">
                            <h2 class="fw-bold text-dark">Certidão de Casamento</h2>
                            <div class="text-muted fw-semibold fs-6">Informe sobre sua Certidão de Casamento.</div>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">Qual o Cartório do Casamento? </span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder="" name="card_name" value="Max Doe">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <label class="required fs-6 fw-semibold form-label mb-2">Identificação dos Cônjuges</label>
                            <div class="position-relative mb-5">
                                <input type="text" class="form-control form-control-solid" placeholder="Enter card number" name="card_number" value="4111 1111 1111 1111">
                            </div>
                            <div class="position-relative">
                                <input type="text" class="form-control form-control-solid" placeholder="Enter card number" name="card_number" value="4111 1111 1111 1111">
                            </div>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                <!--end::Step Certidão de casamento-->

                <!--begin::Step Concluido-->
                <div data-kt-stepper-element="content">
                    <div class="w-100">
                        <div class="pb-8 pb-lg-10">
                            <h2 class="fw-bold text-dark">Consulta Concluida!</h2>
                            <div class="text-muted fw-semibold fs-6">Enquanto aguarda a emissão da documentação,
                                <a href="#" class="link-primary fw-bold">clique aqui</a>
                                para acessar o seu retatóeio personalizado
                            </div>
                        </div>
                        <div class="mb-0">
                            <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                                <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                                    {!! file_get_contents('metronic/media/icons/duotune/general/gen044.svg') !!}
                                </span>

                                <div class="d-flex flex-stack flex-grow-1">
                                    <div class="fw-semibold">
                                        <h4 class="text-gray-900 fw-bold">Documentos em processamento!</h4>
                                        <div class="fs-6 text-gray-700">Para acompanhar o status da documentação
                                            <a href="#" class="fw-bold" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">clique aqui</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="notice d-flex bg-light-success rounded border-success border border-dashed p-6">
                                <span class="svg-icon svg-icon-2hx svg-icon-success me-4">
                                    {!! file_get_contents('metronic/media/icons/duotune/general/gen044.svg') !!}
                                </span>

                                <div class="d-flex flex-stack flex-grow-1">
                                    <div class="fw-semibold">
                                        <h4 class="text-gray-900 fw-bold">Relatório disponível</h4>
                                        <div class="fs-6 text-gray-700">Para baixar o seu relatório personalizado
                                            <a href="#" class="fw-bold" data-bs-toggle="modal"
                                               data-bs-target="#kt_modal_processamento_certidoes">clique aqui</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                    <span class="svg-icon svg-icon-1">
                                        {!! file_get_contents('metronic/media/icons/duotune/arrows/arr061.svg') !!}
                                    </span>
                                </div>
                            </div>

                            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                                <div class="mb-13 text-center">
                                    <h1 class="mb-3">Processamento das Certidões</h1>
                                    <div class="text-muted fw-semibold fs-5">Acompanhe em tempo real o processamento das certidões.</div>
                                </div>

                                <div class="col-md-6 col-lg-6 col-xl-6 offset-md-3 offset-lg-3 offset-xl-3">
                                    <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-center border-0 h-md-50 mb-5 mb-xl-10" style="background-color: #080655">
                                        <div class="card-header pt-5">
                                            <div class="card-title d-flex flex-column">
                                                <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">69</span>
                                                <span class="text-white opacity-50 pt-1 fw-semibold fs-6">Certdões Obrigatórias</span>
                                            </div>
                                        </div>

                                        <div class="card-body d-flex align-items-end pt-0">
                                            <div class="d-flex align-items-center flex-column mt-3 w-100">
                                                <div class="d-flex justify-content-between fw-bold fs-6 text-white opacity-50 w-100 mt-auto mb-2">
                                                    <span>43 Pending</span>
                                                    <span>72%</span>
                                                </div>
                                                <div class="h-8px mx-3 w-100 bg-light-danger rounded">
                                                    <div class="bg-danger rounded h-8px" role="progressbar" style="width: 72%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="tab-content rounded h-100 bg-light p-10">
                                        <div class="tab-pane fade show active" id="kt_upgrade_plan_startup" role="tabpanel">
                                            <div class="pb-5">
                                                <h2 class="fw-bold text-dark">What’s in Startup Plan?</h2>
                                                <div class="text-muted fw-semibold">Optimal for 10+ team size and new startup</div>
                                            </div>

                                            <div class="pt-1">
                                                <div class="d-flex align-items-center mb-7">
                                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Up to 10 Active Users</span>
                                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                                        {!! file_get_contents('metronic/media/icons/duotune/general/gen043.svg') !!}
                                                    </span>
                                                </div>

                                                <div class="d-flex align-items-center mb-7">
                                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Up to 30 Project Integrations</span>
                                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                                        {!! file_get_contents('metronic/media/icons/duotune/general/gen043.svg') !!}
                                                    </span>
                                                </div>

                                                <div class="d-flex align-items-center mb-7">
                                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Analytics Module</span>
                                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                                        {!! file_get_contents('metronic/media/icons/duotune/general/gen043.svg') !!}
                                                    </span>
                                                </div>

                                                <div class="d-flex align-items-center mb-7">
                                                    <span class="fw-semibold fs-5 text-muted flex-grow-1">Finance Module</span>
                                                    <span class="svg-icon svg-icon-1">
                                                        {!! file_get_contents('metronic/media/icons/duotune/general/gen040.svg') !!}
                                                    </span>
                                                </div>

                                                <div class="d-flex align-items-center mb-7">
                                                    <span class="fw-semibold fs-5 text-muted flex-grow-1">Accounting Module</span>
                                                    <span class="svg-icon svg-icon-1">
                                                        {!! file_get_contents('metronic/media/icons/duotune/general/gen040.svg') !!}
                                                    </span>
                                                </div>

                                                <div class="d-flex align-items-center mb-7">
                                                    <span class="fw-semibold fs-5 text-muted flex-grow-1">Network Platform</span>
                                                    <span class="svg-icon svg-icon-1">
                                                        {!! file_get_contents('metronic/media/icons/duotune/general/gen040.svg') !!}
                                                    </span>
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <span class="fw-semibold fs-5 text-muted flex-grow-1">Unlimited Cloud Space</span>
                                                    <span class="svg-icon svg-icon-1">
                                                        {!! file_get_contents('metronic/media/icons/duotune/general/gen040.svg') !!}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="kt_upgrade_plan_advanced" role="tabpanel">
                                            <div class="pb-5">
                                                <h2 class="fw-bold text-dark">What’s in Startup Plan?</h2>
                                                <div class="text-muted fw-semibold">Optimal for 100+ team size and grown company</div>
                                            </div>

                                            <div class="pt-1">
                                                <div class="d-flex align-items-center mb-7">
                                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Up to 10 Active Users</span>
                                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                                        {!! file_get_contents('metronic/media/icons/duotune/general/gen043.svg') !!}
                                                    </span>
                                                </div>

                                                <div class="d-flex align-items-center mb-7">
                                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Up to 30 Project Integrations</span>
                                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                                        {!! file_get_contents('metronic/media/icons/duotune/general/gen043.svg') !!}
                                                    </span>
                                                </div>

                                                <div class="d-flex align-items-center mb-7">
                                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Analytics Module</span>
                                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                                        {!! file_get_contents('metronic/media/icons/duotune/general/gen043.svg') !!}
                                                    </span>
                                                </div>

                                                <div class="d-flex align-items-center mb-7">
                                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Finance Module</span>
                                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                                        {!! file_get_contents('metronic/media/icons/duotune/general/gen043.svg') !!}
                                                    </span>
                                                </div>

                                                <div class="d-flex align-items-center mb-7">
                                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Accounting Module</span>
                                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                                        {!! file_get_contents('metronic/media/icons/duotune/general/gen043.svg') !!}
                                                    </span>
                                                </div>

                                                <div class="d-flex align-items-center mb-7">
                                                    <span class="fw-semibold fs-5 text-muted flex-grow-1">Network Platform</span>
                                                    <span class="svg-icon svg-icon-1">
                                                        {!! file_get_contents('metronic/media/icons/duotune/general/gen040.svg') !!}
                                                    </span>
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <span class="fw-semibold fs-5 text-muted flex-grow-1">Unlimited Cloud Space</span>
                                                    <span class="svg-icon svg-icon-1">
                                                        {!! file_get_contents('metronic/media/icons/duotune/general/gen040.svg') !!}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade"
                                             id="kt_upgrade_plan_enterprise" role="tabpanel">
                                            <div class="pb-5">
                                                <h2 class="fw-bold text-dark">What’s in Startup Plan?</h2>
                                                <div class="text-muted fw-semibold">Optimal for 1000+ team and enterpise</div>
                                            </div>

                                            <div class="pt-1">
                                                <div class="d-flex align-items-center mb-7">
                                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Up to 10 Active Users</span>
                                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                                        {!! file_get_contents('metronic/media/icons/duotune/general/gen043.svg') !!}
                                                    </span>
                                                </div>

                                                <div class="d-flex align-items-center mb-7">
                                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Up to 30 Project Integrations</span>
                                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                                        {!! file_get_contents('metronic/media/icons/duotune/general/gen043.svg') !!}
                                                    </span>
                                                </div>

                                                <div class="d-flex align-items-center mb-7">
                                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Analytics Module</span>
                                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                                        {!! file_get_contents('metronic/media/icons/duotune/general/gen043.svg') !!}
                                                    </span>
                                                </div>

                                                <div class="d-flex align-items-center mb-7">
                                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Finance Module</span>
                                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                                        {!! file_get_contents('metronic/media/icons/duotune/general/gen043.svg') !!}
                                                    </span>
                                                </div>

                                                <div class="d-flex align-items-center mb-7">
                                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Accounting Module</span>
                                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                                        {!! file_get_contents('metronic/media/icons/duotune/general/gen043.svg') !!}
                                                    </span>
                                                </div>

                                                <div class="d-flex align-items-center mb-7">
                                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Network Platform</span>
                                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                                         {!! file_get_contents('metronic/media/icons/duotune/general/gen043.svg') !!}
                                                    </span>
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Unlimited Cloud Space</span>
                                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                                        {!! file_get_contents('metronic/media/icons/duotune/general/gen043.svg') !!}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="kt_upgrade_plan_custom" role="tabpanel">
                                            <div class="pb-5">
                                                <h2 class="fw-bold text-dark">What’s in Startup Plan?</h2>
                                                <div class="text-muted fw-semibold">Optimal for corporations</div>
                                            </div>

                                            <div class="pt-1">
                                                <div class="d-flex align-items-center mb-7">
                                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Unlimited Users</span>
                                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                                        {!! file_get_contents('metronic/media/icons/duotune/general/gen043.svg') !!}
                                                    </span>
                                                </div>

                                                <div class="d-flex align-items-center mb-7">
                                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Unlimited Project Integrations</span>
                                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                                        {!! file_get_contents('metronic/media/icons/duotune/general/gen043.svg') !!}
                                                    </span>
                                                </div>

                                                <div class="d-flex align-items-center mb-7">
                                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Analytics Module</span>
                                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                                        {!! file_get_contents('metronic/media/icons/duotune/general/gen043.svg') !!}
                                                    </span>
                                                </div>

                                                <div class="d-flex align-items-center mb-7">
                                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Finance Module</span>
                                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                                        {!! file_get_contents('metronic/media/icons/duotune/general/gen043.svg') !!}
                                                    </span>
                                                </div>

                                                <div class="d-flex align-items-center mb-7">
                                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Accounting Module</span>
                                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                                        {!! file_get_contents('metronic/media/icons/duotune/general/gen043.svg') !!}
                                                    </span>
                                                </div>

                                                <div class="d-flex align-items-center mb-7">
                                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Network Platform</span>
                                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                                        {!! file_get_contents('metronic/media/icons/duotune/general/gen043.svg') !!}
                                                    </span>
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Unlimited Cloud Space</span>
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                    {!! file_get_contents('metronic/media/icons/duotune/general/gen043.svg') !!}
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Modal - Processamento de Certidões-->
                <!--end::Step Concluido-->

                <!--begin::Actions-->
                <div class="d-flex flex-stack pt-10">
                    <div class="mr-2">
                        <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                            <span class="svg-icon svg-icon-4 me-1">
                                {!! file_get_contents('metronic/media/icons/duotune/arrows/arr063.svg') !!}
                            </span>
                            Voltar
                        </button>
                    </div>

                    <div>
                        <button type="button" class="btn btn-lg btn-primary me-3" data-kt-stepper-action="submit">
                            <span class="indicator-label">Enviar
                                <span class="svg-icon svg-icon-3 ms-2 me-0">
                                    {!! file_get_contents('metronic/media/icons/duotune/arrows/arr064.svg') !!}
                                </span>
                            </span>
                            <span class="indicator-progress">Aguarde...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>

                        <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Continuar
                            <span class="svg-icon svg-icon-4 ms-1 me-0">
                                {!! file_get_contents('metronic/media/icons/duotune/arrows/arr064.svg') !!}
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ asset("metronic/js/custom/utilities/modals/create-account.js") }}"></script>
@endpush