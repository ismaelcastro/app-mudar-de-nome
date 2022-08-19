@extends('admin.layout.app')

@section('content')
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack"></div>
        <!--end::Toolbar container-->
    </div>

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Navbar-->
            <div class="card mb-5 mb-xl-10">
                <div class="card-body pt-9 pb-0">
                    <!--begin::Details-->
                    <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                        <!--begin: Pic-->
                        <div class="me-7 mb-4">
                            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                <img src="{{asset('metronic/media/avatars/300-1.jpg')}}" alt="image">
                                <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px"></div>
                            </div>
                        </div>
                        <!--end::Pic-->
                        <!--begin::Info-->
                        <div class="flex-grow-1">
                            <!--begin::Title-->
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <!--begin::User-->
                                <div class="d-flex flex-column">
                                    <!--begin::Name-->
                                    <div class="d-flex align-items-center mb-2">
                                        <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">Max
                                            Smith</a>
                                        <a href="#">
                                            {!! file_get_contents('metronic/media/icons/duotune/general/gen026.svg') !!}
                                        </a>
                                        <a href="#" class="btn btn-sm btn-light-success fw-bold ms-2 fs-8 py-1 px-3"
                                           data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">Upgrade to
                                            Pro</a>
                                    </div>
                                    <!--end::Name-->
                                    <!--begin::Info-->
                                    <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                        <a href="#"
                                           class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                            {!! file_get_contents('metronic/media/icons/duotune/communication/com006.svg') !!}
                                            Developer
                                        </a>
                                        <a href="#"
                                           class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                            {!! file_get_contents('metronic/media/icons/duotune/general/gen018.svg') !!}
                                            SF, Bay Area
                                        </a>
                                        <a href="#"
                                           class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                            {!! file_get_contents('metronic/media/icons/duotune/communication/com011.svg') !!}
                                            max@kt.com
                                        </a>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Title-->
                            <!--begin::Stats-->
                            <div class="d-flex flex-wrap flex-stack">
                                <!--begin::Progress-->
                                <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                                    <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                        <span class="fw-semibold fs-6 text-gray-400">Progresso</span>
                                        <span class="fw-bold fs-6">50%</span>
                                    </div>
                                    <div class="h-5px mx-3 w-100 bg-light mb-3">
                                        <div class="bg-success rounded h-5px" role="progressbar" style="width: 50%;"
                                             aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <!--end::Progress-->
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Details-->
                    <!--begin::Navs-->
                    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5 active"
                               href="../../demo1/dist/account/overview.html">Consulta</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5"
                               href="../../demo1/dist/account/settings.html">Certidões</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5"
                               href="../../demo1/dist/account/security.html">Documentos</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5"
                               href="../../demo1/dist/account/billing.html">Agendamento</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5"
                               href="../../demo1/dist/account/statements.html">Processos</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5"
                               href="../../demo1/dist/account/referrals.html">Eventos e Logs</a>
                        </li>
                        <!--end::Nav item-->
                    </ul>
                    <!--begin::Navs-->
                </div>
            </div>
            <!--end::Navbar-->
            <!--begin::details View-->
            <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                <!--begin::Card header-->
                <div class="card-header cursor-pointer">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Profile Details</h3>
                    </div>
                    <!--end::Card title-->
                    <!--begin::Action-->
                    <a href="../../demo1/dist/account/settings.html" class="btn btn-primary align-self-center">Edit
                        Profile</a>
                    <!--end::Action-->
                </div>
                <!--begin::Card header-->
                <!--begin::Card body-->
                <div class="card-body p-9">
                    <!--begin::Row-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Full Name</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800">Max Smith</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Company</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <span class="fw-semibold text-gray-800 fs-6">Keenthemes</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Contact Phone
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                               aria-label="Phone number must be active" data-kt-initialized="1"></i></label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 d-flex align-items-center">
                            <span class="fw-bold fs-6 text-gray-800 me-2">044 3276 454 935</span>
                            <span class="badge badge-success">Verified</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Company Site</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <a href="#" class="fw-semibold fs-6 text-gray-800 text-hover-primary">keenthemes.com</a>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Country
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                               aria-label="Country of origination" data-kt-initialized="1"></i></label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800">Germany</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Communication</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800">Email, Phone</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-10">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Allow Changes</label>
                        <!--begin::Label-->
                        <!--begin::Label-->
                        <div class="col-lg-8">
                            <span class="fw-semibold fs-6 text-gray-800">Yes</span>
                        </div>
                        <!--begin::Label-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Notice-->
                    <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                        <!--begin::Icon-->
                        <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                        <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
														<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                              fill="currentColor"></rect>
														<rect x="11" y="14" width="7" height="2" rx="1"
                                                              transform="rotate(-90 11 14)" fill="currentColor"></rect>
														<rect x="11" y="17" width="2" height="2" rx="1"
                                                              transform="rotate(-90 11 17)" fill="currentColor"></rect>
													</svg>
												</span>
                        <!--end::Svg Icon-->
                        <!--end::Icon-->
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-grow-1">
                            <!--begin::Content-->
                            <div class="fw-semibold">
                                <h4 class="text-gray-900 fw-bold">We need your attention!</h4>
                                <div class="fs-6 text-gray-700">Your payment was declined. To start using tools, please
                                    <a class="fw-bold" href="../../demo1/dist/account/billing.html">Add Payment
                                        Method</a>.
                                </div>
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Notice-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::details View-->
            <!--begin::Row-->
            <div class="row gy-5 g-xl-10">
                <!--begin::Col-->
                <div class="col-xl-8 mb-xl-10">
                    <!--begin::Chart widget 5-->
                    <div class="card card-flush h-lg-100">
                        <!--begin::Header-->
                        <div class="card-header flex-nowrap pt-5">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-dark">Top Selling Categories</span>
                                <span class="text-gray-400 pt-2 fw-semibold fs-6">8k social visitors</span>
                            </h3>
                            <!--end::Title-->
                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Menu-->
                                <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                        data-kt-menu-overflow="true">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-gray-300 me-n1">
																<svg width="24" height="24" viewBox="0 0 24 24"
                                                                     fill="none" xmlns="http://www.w3.org/2000/svg">
																	<rect opacity="0.3" x="2" y="2" width="20"
                                                                          height="20" rx="4" fill="currentColor"></rect>
																	<rect x="11" y="11" width="2.6" height="2.6"
                                                                          rx="1.3" fill="currentColor"></rect>
																	<rect x="15" y="11" width="2.6" height="2.6"
                                                                          rx="1.3" fill="currentColor"></rect>
																	<rect x="7" y="11" width="2.6" height="2.6" rx="1.3"
                                                                          fill="currentColor"></rect>
																</svg>
															</span>
                                    <!--end::Svg Icon-->
                                </button>
                                <!--begin::Menu 2-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                     data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu separator-->
                                    <div class="separator mb-3 opacity-75"></div>
                                    <!--end::Menu separator-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">New Ticket</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">New Customer</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                         data-kt-menu-placement="right-start">
                                        <!--begin::Menu item-->
                                        <a href="#" class="menu-link px-3">
                                            <span class="menu-title">New Group</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <!--end::Menu item-->
                                        <!--begin::Menu sub-->
                                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">Admin Group</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">Staff Group</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">Member Group</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu sub-->
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">New Contact</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu separator-->
                                    <div class="separator mt-3 opacity-75"></div>
                                    <!--end::Menu separator-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content px-3 py-3">
                                            <a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
                                        </div>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu 2-->
                                <!--end::Menu-->
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-5 ps-6">
                            <div id="kt_charts_widget_5" class="min-h-auto" style="min-height: 365px;">
                                <div id="apexchartsvpf0mx2h"
                                     class="apexcharts-canvas apexchartsvpf0mx2h apexcharts-theme-light"
                                     style="width: 780px; height: 350px;">
                                    <svg id="SvgjsSvg1090" width="780" height="350" xmlns="http://www.w3.org/2000/svg"
                                         version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS"
                                         transform="translate(0, 0)" style="background: transparent;">
                                        <g id="SvgjsG1092" class="apexcharts-inner apexcharts-graphical"
                                           transform="translate(109.8297119140625, 30)">
                                            <defs id="SvgjsDefs1091">
                                                <linearGradient id="SvgjsLinearGradient1096" x1="0" y1="0" x2="0"
                                                                y2="1">
                                                    <stop id="SvgjsStop1097" stop-opacity="0.4"
                                                          stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                                    <stop id="SvgjsStop1098" stop-opacity="0.5"
                                                          stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                    <stop id="SvgjsStop1099" stop-opacity="0.5"
                                                          stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                </linearGradient>
                                                <clipPath id="gridRectMaskvpf0mx2h">
                                                    <rect id="SvgjsRect1101" width="651.9853134155273" height="272.64"
                                                          x="-2" y="0" rx="0" ry="0" opacity="1" stroke-width="0"
                                                          stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                </clipPath>
                                                <clipPath id="forecastMaskvpf0mx2h"></clipPath>
                                                <clipPath id="nonForecastMaskvpf0mx2h"></clipPath>
                                                <clipPath id="gridRectMarkerMaskvpf0mx2h">
                                                    <rect id="SvgjsRect1102" width="651.9853134155273" height="276.64"
                                                          x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0"
                                                          stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                </clipPath>
                                            </defs>
                                            <rect id="SvgjsRect1100" width="0" height="272.64" x="0" y="0" rx="0" ry="0"
                                                  opacity="1" stroke-width="0" stroke-dasharray="3"
                                                  fill="url(#SvgjsLinearGradient1096)" class="apexcharts-xcrosshairs"
                                                  y2="272.64" filter="none" fill-opacity="0.9"></rect>
                                            <g id="SvgjsG1138" class="apexcharts-yaxis apexcharts-xaxis-inversed"
                                               rel="0">
                                                <g id="SvgjsG1139"
                                                   class="apexcharts-yaxis-texts-g apexcharts-xaxis-inversed-texts-g"
                                                   transform="translate(-86.08367919921875, 0)">
                                                    <text id="SvgjsText1140" font-family="Helvetica, Arial, sans-serif"
                                                          x="-15" y="23.244675324675324" text-anchor="start"
                                                          dominant-baseline="auto" font-size="14px" font-weight="600"
                                                          fill="#3f4254" class="apexcharts-text apexcharts-yaxis-label "
                                                          style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1141">Phones</tspan>
                                                        <title>Phones</title></text>
                                                    <text id="SvgjsText1142" font-family="Helvetica, Arial, sans-serif"
                                                          x="-15" y="62.193246753246754" text-anchor="start"
                                                          dominant-baseline="auto" font-size="14px" font-weight="600"
                                                          fill="#3f4254" class="apexcharts-text apexcharts-yaxis-label "
                                                          style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1143">Laptops</tspan>
                                                        <title>Laptops</title></text>
                                                    <text id="SvgjsText1144" font-family="Helvetica, Arial, sans-serif"
                                                          x="-15" y="101.14181818181818" text-anchor="start"
                                                          dominant-baseline="auto" font-size="14px" font-weight="600"
                                                          fill="#3f4254" class="apexcharts-text apexcharts-yaxis-label "
                                                          style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1145">Headsets</tspan>
                                                        <title>Headsets</title></text>
                                                    <text id="SvgjsText1146" font-family="Helvetica, Arial, sans-serif"
                                                          x="-15" y="140.0903896103896" text-anchor="start"
                                                          dominant-baseline="auto" font-size="14px" font-weight="600"
                                                          fill="#3f4254" class="apexcharts-text apexcharts-yaxis-label "
                                                          style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1147">Games</tspan>
                                                        <title>Games</title></text>
                                                    <text id="SvgjsText1148" font-family="Helvetica, Arial, sans-serif"
                                                          x="-15" y="179.03896103896102" text-anchor="start"
                                                          dominant-baseline="auto" font-size="14px" font-weight="600"
                                                          fill="#3f4254" class="apexcharts-text apexcharts-yaxis-label "
                                                          style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1149">Keyboardsy</tspan>
                                                        <title>Keyboardsy</title></text>
                                                    <text id="SvgjsText1150" font-family="Helvetica, Arial, sans-serif"
                                                          x="-15" y="217.98753246753245" text-anchor="start"
                                                          dominant-baseline="auto" font-size="14px" font-weight="600"
                                                          fill="#3f4254" class="apexcharts-text apexcharts-yaxis-label "
                                                          style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1151">Monitors</tspan>
                                                        <title>Monitors</title></text>
                                                    <text id="SvgjsText1152" font-family="Helvetica, Arial, sans-serif"
                                                          x="-15" y="256.9361038961039" text-anchor="start"
                                                          dominant-baseline="auto" font-size="14px" font-weight="600"
                                                          fill="#3f4254" class="apexcharts-text apexcharts-yaxis-label "
                                                          style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1153">Speakers</tspan>
                                                        <title>Speakers</title></text>
                                                </g>
                                            </g>
                                            <g id="SvgjsG1121" class="apexcharts-xaxis apexcharts-yaxis-inversed">
                                                <g id="SvgjsG1122" class="apexcharts-xaxis-texts-g"
                                                   transform="translate(0, -9.333333333333334)">
                                                    <text id="SvgjsText1123" font-family="Helvetica, Arial, sans-serif"
                                                          x="647.9853134155273" y="302.64" text-anchor="middle"
                                                          dominant-baseline="auto" font-size="14px" font-weight="600"
                                                          fill="#b5b5c3" class="apexcharts-text apexcharts-xaxis-label "
                                                          style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1125">16K</tspan>
                                                        <title>16K</title></text>
                                                    <text id="SvgjsText1126" font-family="Helvetica, Arial, sans-serif"
                                                          x="485.8889850616455" y="302.64" text-anchor="middle"
                                                          dominant-baseline="auto" font-size="14px" font-weight="600"
                                                          fill="#b5b5c3" class="apexcharts-text apexcharts-xaxis-label "
                                                          style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1128">12K</tspan>
                                                        <title>12K</title></text>
                                                    <text id="SvgjsText1129" font-family="Helvetica, Arial, sans-serif"
                                                          x="323.79265670776374" y="302.64" text-anchor="middle"
                                                          dominant-baseline="auto" font-size="14px" font-weight="600"
                                                          fill="#b5b5c3" class="apexcharts-text apexcharts-xaxis-label "
                                                          style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1131">8K</tspan>
                                                        <title>8K</title></text>
                                                    <text id="SvgjsText1132" font-family="Helvetica, Arial, sans-serif"
                                                          x="161.69632835388188" y="302.64" text-anchor="middle"
                                                          dominant-baseline="auto" font-size="14px" font-weight="600"
                                                          fill="#b5b5c3" class="apexcharts-text apexcharts-xaxis-label "
                                                          style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1134">4K</tspan>
                                                        <title>4K</title></text>
                                                    <text id="SvgjsText1135" font-family="Helvetica, Arial, sans-serif"
                                                          x="-0.39999999999997726" y="302.64" text-anchor="middle"
                                                          dominant-baseline="auto" font-size="14px" font-weight="600"
                                                          fill="#b5b5c3" class="apexcharts-text apexcharts-xaxis-label "
                                                          style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1137">0K</tspan>
                                                        <title>0K</title></text>
                                                </g>
                                            </g>
                                            <g id="SvgjsG1154" class="apexcharts-grid">
                                                <g id="SvgjsG1155" class="apexcharts-gridlines-horizontal"></g>
                                                <g id="SvgjsG1156" class="apexcharts-gridlines-vertical">
                                                    <line id="SvgjsLine1157" x1="0" y1="0" x2="0" y2="272.64"
                                                          stroke="#e4e6ef" stroke-dasharray="4" stroke-linecap="butt"
                                                          class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1159" x1="162.29632835388185" y1="0"
                                                          x2="162.29632835388185" y2="272.64" stroke="#e4e6ef"
                                                          stroke-dasharray="4" stroke-linecap="butt"
                                                          class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1161" x1="324.5926567077637" y1="0"
                                                          x2="324.5926567077637" y2="272.64" stroke="#e4e6ef"
                                                          stroke-dasharray="4" stroke-linecap="butt"
                                                          class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1163" x1="486.88898506164554" y1="0"
                                                          x2="486.88898506164554" y2="272.64" stroke="#e4e6ef"
                                                          stroke-dasharray="4" stroke-linecap="butt"
                                                          class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1165" x1="649.1853134155274" y1="0"
                                                          x2="649.1853134155274" y2="272.64" stroke="#e4e6ef"
                                                          stroke-dasharray="4" stroke-linecap="butt"
                                                          class="apexcharts-gridline"></line>
                                                </g>
                                                <line id="SvgjsLine1158" x1="0" y1="273.64" x2="0" y2="279.64"
                                                      stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                                      class="apexcharts-xaxis-tick"></line>
                                                <line id="SvgjsLine1160" x1="162.29632835388185" y1="273.64"
                                                      x2="162.29632835388185" y2="279.64" stroke="#e0e0e0"
                                                      stroke-dasharray="0" stroke-linecap="butt"
                                                      class="apexcharts-xaxis-tick"></line>
                                                <line id="SvgjsLine1162" x1="324.5926567077637" y1="273.64"
                                                      x2="324.5926567077637" y2="279.64" stroke="#e0e0e0"
                                                      stroke-dasharray="0" stroke-linecap="butt"
                                                      class="apexcharts-xaxis-tick"></line>
                                                <line id="SvgjsLine1164" x1="486.88898506164554" y1="273.64"
                                                      x2="486.88898506164554" y2="279.64" stroke="#e0e0e0"
                                                      stroke-dasharray="0" stroke-linecap="butt"
                                                      class="apexcharts-xaxis-tick"></line>
                                                <line id="SvgjsLine1166" x1="649.1853134155274" y1="273.64"
                                                      x2="649.1853134155274" y2="279.64" stroke="#e0e0e0"
                                                      stroke-dasharray="0" stroke-linecap="butt"
                                                      class="apexcharts-xaxis-tick"></line>
                                                <line id="SvgjsLine1168" x1="0" y1="272.64" x2="647.9853134155273"
                                                      y2="272.64" stroke="transparent" stroke-dasharray="0"
                                                      stroke-linecap="butt"></line>
                                                <line id="SvgjsLine1167" x1="0" y1="1" x2="0" y2="272.64"
                                                      stroke="transparent" stroke-dasharray="0"
                                                      stroke-linecap="butt"></line>
                                            </g>
                                            <g id="SvgjsG1103" class="apexcharts-bar-series apexcharts-plot-series">
                                                <g id="SvgjsG1104" class="apexcharts-series" rel="1"
                                                   seriesName="seriesx1" data:realIndex="0">
                                                    <path id="SvgjsPath1108"
                                                          d="M 0.1 14.9952L 603.5862313270569 14.9952Q 607.5862313270569 14.9952 607.5862313270569 18.9952L 607.5862313270569 19.95337142857143Q 607.5862313270569 23.95337142857143 603.5862313270569 23.95337142857143L 603.5862313270569 23.95337142857143L 0.1 23.95337142857143L 0.1 23.95337142857143z"
                                                          fill="rgba(62,151,255,0.85)" fill-opacity="1"
                                                          stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                          stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                          clip-path="url(#gridRectMaskvpf0mx2h)"
                                                          pathTo="M 0.1 14.9952L 603.5862313270569 14.9952Q 607.5862313270569 14.9952 607.5862313270569 18.9952L 607.5862313270569 19.95337142857143Q 607.5862313270569 23.95337142857143 603.5862313270569 23.95337142857143L 603.5862313270569 23.95337142857143L 0.1 23.95337142857143L 0.1 23.95337142857143z"
                                                          pathFrom="M 0.1 14.9952L 0.1 14.9952L 0.1 23.95337142857143L 0.1 23.95337142857143L 0.1 23.95337142857143L 0.1 23.95337142857143L 0.1 23.95337142857143L 0.1 14.9952"
                                                          cy="53.943771428571424" cx="607.5862313270569" j="0" val="15"
                                                          barHeight="8.958171428571427"
                                                          barWidth="607.4862313270569"></path>
                                                    <path id="SvgjsPath1110"
                                                          d="M 0.1 53.943771428571424L 482.0889850616456 53.943771428571424Q 486.0889850616456 53.943771428571424 486.0889850616456 57.943771428571424L 486.0889850616456 58.90194285714285Q 486.0889850616456 62.90194285714285 482.0889850616456 62.90194285714285L 482.0889850616456 62.90194285714285L 0.1 62.90194285714285L 0.1 62.90194285714285z"
                                                          fill="rgba(241,65,108,0.85)" fill-opacity="1"
                                                          stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                          stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                          clip-path="url(#gridRectMaskvpf0mx2h)"
                                                          pathTo="M 0.1 53.943771428571424L 482.0889850616456 53.943771428571424Q 486.0889850616456 53.943771428571424 486.0889850616456 57.943771428571424L 486.0889850616456 58.90194285714285Q 486.0889850616456 62.90194285714285 482.0889850616456 62.90194285714285L 482.0889850616456 62.90194285714285L 0.1 62.90194285714285L 0.1 62.90194285714285z"
                                                          pathFrom="M 0.1 53.943771428571424L 0.1 53.943771428571424L 0.1 62.90194285714285L 0.1 62.90194285714285L 0.1 62.90194285714285L 0.1 62.90194285714285L 0.1 62.90194285714285L 0.1 53.943771428571424"
                                                          cy="92.89234285714285" cx="486.0889850616456" j="1" val="12"
                                                          barHeight="8.958171428571427"
                                                          barWidth="485.98898506164556"></path>
                                                    <path id="SvgjsPath1112"
                                                          d="M 0.1 92.89234285714285L 401.0908208847046 92.89234285714285Q 405.0908208847046 92.89234285714285 405.0908208847046 96.89234285714285L 405.0908208847046 97.85051428571428Q 405.0908208847046 101.85051428571428 401.0908208847046 101.85051428571428L 401.0908208847046 101.85051428571428L 0.1 101.85051428571428L 0.1 101.85051428571428z"
                                                          fill="rgba(80,205,137,0.85)" fill-opacity="1"
                                                          stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                          stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                          clip-path="url(#gridRectMaskvpf0mx2h)"
                                                          pathTo="M 0.1 92.89234285714285L 401.0908208847046 92.89234285714285Q 405.0908208847046 92.89234285714285 405.0908208847046 96.89234285714285L 405.0908208847046 97.85051428571428Q 405.0908208847046 101.85051428571428 401.0908208847046 101.85051428571428L 401.0908208847046 101.85051428571428L 0.1 101.85051428571428L 0.1 101.85051428571428z"
                                                          pathFrom="M 0.1 92.89234285714285L 0.1 92.89234285714285L 0.1 101.85051428571428L 0.1 101.85051428571428L 0.1 101.85051428571428L 0.1 101.85051428571428L 0.1 101.85051428571428L 0.1 92.89234285714285"
                                                          cy="131.8409142857143" cx="405.0908208847046" j="2" val="10"
                                                          barHeight="8.958171428571427"
                                                          barWidth="404.9908208847046"></path>
                                                    <path id="SvgjsPath1114"
                                                          d="M 0.1 131.8409142857143L 320.0926567077637 131.8409142857143Q 324.0926567077637 131.8409142857143 324.0926567077637 135.8409142857143L 324.0926567077637 136.79908571428572Q 324.0926567077637 140.79908571428572 320.0926567077637 140.79908571428572L 320.0926567077637 140.79908571428572L 0.1 140.79908571428572L 0.1 140.79908571428572z"
                                                          fill="rgba(255,199,0,0.85)" fill-opacity="1"
                                                          stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                          stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                          clip-path="url(#gridRectMaskvpf0mx2h)"
                                                          pathTo="M 0.1 131.8409142857143L 320.0926567077637 131.8409142857143Q 324.0926567077637 131.8409142857143 324.0926567077637 135.8409142857143L 324.0926567077637 136.79908571428572Q 324.0926567077637 140.79908571428572 320.0926567077637 140.79908571428572L 320.0926567077637 140.79908571428572L 0.1 140.79908571428572L 0.1 140.79908571428572z"
                                                          pathFrom="M 0.1 131.8409142857143L 0.1 131.8409142857143L 0.1 140.79908571428572L 0.1 140.79908571428572L 0.1 140.79908571428572L 0.1 140.79908571428572L 0.1 140.79908571428572L 0.1 131.8409142857143"
                                                          cy="170.78948571428572" cx="324.0926567077637" j="3" val="8"
                                                          barHeight="8.958171428571427"
                                                          barWidth="323.9926567077637"></path>
                                                    <path id="SvgjsPath1116"
                                                          d="M 0.1 170.78948571428572L 279.59357461929324 170.78948571428572Q 283.59357461929324 170.78948571428572 283.59357461929324 174.78948571428572L 283.59357461929324 175.74765714285715Q 283.59357461929324 179.74765714285715 279.59357461929324 179.74765714285715L 279.59357461929324 179.74765714285715L 0.1 179.74765714285715L 0.1 179.74765714285715z"
                                                          fill="rgba(114,57,234,0.85)" fill-opacity="1"
                                                          stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                          stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                          clip-path="url(#gridRectMaskvpf0mx2h)"
                                                          pathTo="M 0.1 170.78948571428572L 279.59357461929324 170.78948571428572Q 283.59357461929324 170.78948571428572 283.59357461929324 174.78948571428572L 283.59357461929324 175.74765714285715Q 283.59357461929324 179.74765714285715 279.59357461929324 179.74765714285715L 279.59357461929324 179.74765714285715L 0.1 179.74765714285715L 0.1 179.74765714285715z"
                                                          pathFrom="M 0.1 170.78948571428572L 0.1 170.78948571428572L 0.1 179.74765714285715L 0.1 179.74765714285715L 0.1 179.74765714285715L 0.1 179.74765714285715L 0.1 179.74765714285715L 0.1 170.78948571428572"
                                                          cy="209.73805714285714" cx="283.59357461929324" j="4" val="7"
                                                          barHeight="8.958171428571427"
                                                          barWidth="283.4935746192932"></path>
                                                    <path id="SvgjsPath1118"
                                                          d="M 0.1 209.73805714285714L 158.09632835388183 209.73805714285714Q 162.09632835388183 209.73805714285714 162.09632835388183 213.73805714285714L 162.09632835388183 214.69622857142858Q 162.09632835388183 218.69622857142858 158.09632835388183 218.69622857142858L 158.09632835388183 218.69622857142858L 0.1 218.69622857142858L 0.1 218.69622857142858z"
                                                          fill="rgba(80,205,205,0.85)" fill-opacity="1"
                                                          stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                          stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                          clip-path="url(#gridRectMaskvpf0mx2h)"
                                                          pathTo="M 0.1 209.73805714285714L 158.09632835388183 209.73805714285714Q 162.09632835388183 209.73805714285714 162.09632835388183 213.73805714285714L 162.09632835388183 214.69622857142858Q 162.09632835388183 218.69622857142858 158.09632835388183 218.69622857142858L 158.09632835388183 218.69622857142858L 0.1 218.69622857142858L 0.1 218.69622857142858z"
                                                          pathFrom="M 0.1 209.73805714285714L 0.1 209.73805714285714L 0.1 218.69622857142858L 0.1 218.69622857142858L 0.1 218.69622857142858L 0.1 218.69622857142858L 0.1 218.69622857142858L 0.1 209.73805714285714"
                                                          cy="248.68662857142857" cx="162.09632835388183" j="5" val="4"
                                                          barHeight="8.958171428571427"
                                                          barWidth="161.99632835388184"></path>
                                                    <path id="SvgjsPath1120"
                                                          d="M 0.1 248.68662857142857L 117.59724626541139 248.68662857142857Q 121.59724626541139 248.68662857142857 121.59724626541139 252.68662857142857L 121.59724626541139 253.64479999999998Q 121.59724626541139 257.6448 117.59724626541139 257.6448L 117.59724626541139 257.6448L 0.1 257.6448L 0.1 257.6448z"
                                                          fill="rgba(63,66,84,0.85)" fill-opacity="1" stroke-opacity="1"
                                                          stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                          class="apexcharts-bar-area" index="0"
                                                          clip-path="url(#gridRectMaskvpf0mx2h)"
                                                          pathTo="M 0.1 248.68662857142857L 117.59724626541139 248.68662857142857Q 121.59724626541139 248.68662857142857 121.59724626541139 252.68662857142857L 121.59724626541139 253.64479999999998Q 121.59724626541139 257.6448 117.59724626541139 257.6448L 117.59724626541139 257.6448L 0.1 257.6448L 0.1 257.6448z"
                                                          pathFrom="M 0.1 248.68662857142857L 0.1 248.68662857142857L 0.1 257.6448L 0.1 257.6448L 0.1 257.6448L 0.1 257.6448L 0.1 257.6448L 0.1 248.68662857142857"
                                                          cy="287.6352" cx="121.59724626541139" j="6" val="3"
                                                          barHeight="8.958171428571427"
                                                          barWidth="121.49724626541139"></path>
                                                    <g id="SvgjsG1106" class="apexcharts-bar-goals-markers"
                                                       style="pointer-events: none">
                                                        <g id="SvgjsG1107" className="apexcharts-bar-goals-groups"></g>
                                                        <g id="SvgjsG1109" className="apexcharts-bar-goals-groups"></g>
                                                        <g id="SvgjsG1111" className="apexcharts-bar-goals-groups"></g>
                                                        <g id="SvgjsG1113" className="apexcharts-bar-goals-groups"></g>
                                                        <g id="SvgjsG1115" className="apexcharts-bar-goals-groups"></g>
                                                        <g id="SvgjsG1117" className="apexcharts-bar-goals-groups"></g>
                                                        <g id="SvgjsG1119" className="apexcharts-bar-goals-groups"></g>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG1105" class="apexcharts-datalabels" data:realIndex="0"></g>
                                            </g>
                                            <line id="SvgjsLine1169" x1="0" y1="0" x2="647.9853134155273" y2="0"
                                                  stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                                  stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                            <line id="SvgjsLine1170" x1="0" y1="0" x2="647.9853134155273" y2="0"
                                                  stroke-dasharray="0" stroke-width="0" stroke-linecap="butt"
                                                  class="apexcharts-ycrosshairs-hidden"></line>
                                            <g id="SvgjsG1171" class="apexcharts-yaxis-annotations"></g>
                                            <g id="SvgjsG1172" class="apexcharts-xaxis-annotations"></g>
                                            <g id="SvgjsG1173" class="apexcharts-point-annotations"></g>
                                        </g>
                                        <g id="SvgjsG1093" class="apexcharts-annotations"></g>
                                    </svg>
                                    <div class="apexcharts-legend" style="max-height: 175px;"></div>
                                    <div class="apexcharts-tooltip apexcharts-theme-light">
                                        <div class="apexcharts-tooltip-title"
                                             style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                        <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                                    class="apexcharts-tooltip-marker"
                                                    style="background-color: rgb(62, 151, 255);"></span>
                                            <div class="apexcharts-tooltip-text"
                                                 style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                            class="apexcharts-tooltip-text-y-label"></span><span
                                                            class="apexcharts-tooltip-text-y-value"></span></div>
                                                <div class="apexcharts-tooltip-goals-group"><span
                                                            class="apexcharts-tooltip-text-goals-label"></span><span
                                                            class="apexcharts-tooltip-text-goals-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                            class="apexcharts-tooltip-text-z-label"></span><span
                                                            class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                        <div class="apexcharts-yaxistooltip-text"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Chart widget 5-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-4 mb-5 mb-xl-10">
                    <!--begin::Engage widget 1-->
                    <div class="card h-md-100">
                        <!--begin::Body-->
                        <div class="card-body d-flex flex-column flex-center">
                            <!--begin::Heading-->
                            <div class="mb-2">
                                <!--begin::Title-->
                                <h1 class="fw-semibold text-gray-800 text-center lh-lg">Have you tried
                                    <br>new
                                    <span class="fw-bolder">Mobile Application ?</span></h1>
                                <!--end::Title-->
                                <!--begin::Illustration-->
                                <div class="py-10 text-center">
                                    <img src="assets/media/svg/illustrations/easy/1.svg"
                                         class="theme-light-show w-200px" alt="">
                                    <img src="assets/media/svg/illustrations/easy/1-dark.svg"
                                         class="theme-dark-show w-200px" alt="">
                                </div>
                                <!--end::Illustration-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Links-->
                            <div class="text-center mb-1">
                                <!--begin::Link-->
                                <a class="btn btn-sm btn-primary me-2" data-bs-target="#kt_modal_create_app"
                                   data-bs-toggle="modal">Try now</a>
                                <!--end::Link-->
                                <!--begin::Link-->
                                <a class="btn btn-sm btn-light"
                                   href="../../demo1/dist/apps/invoices/view/invoice-1.html">Learn more</a>
                                <!--end::Link-->
                            </div>
                            <!--end::Links-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Engage widget 1-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row gy-5 g-xl-10">
                <!--begin::Col-->
                <div class="col-xl-4">
                    <!--begin::List widget 5-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-dark">Product Delivery</span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-6">1M Products Shipped so far</span>
                            </h3>
                            <!--end::Title-->
                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                <a href="../../demo1/dist/apps/ecommerce/sales/details.html"
                                   class="btn btn-sm btn-light">Order Details</a>
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Scroll-->
                            <div class="hover-scroll-overlay-y pe-6 me-n6" style="height: 415px">
                                <!--begin::Item-->
                                <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                    <!--begin::Info-->
                                    <div class="d-flex flex-stack mb-3">
                                        <!--begin::Wrapper-->
                                        <div class="me-3">
                                            <!--begin::Icon-->
                                            <img src="assets/media/stock/ecommerce/210.gif" class="w-50px ms-n1 me-1"
                                                 alt="">
                                            <!--end::Icon-->
                                            <!--begin::Title-->
                                            <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                               class="text-gray-800 text-hover-primary fw-bold">Elephant 1802</a>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Wrapper-->
                                        <!--begin::Action-->
                                        <div class="m-0">
                                            <!--begin::Menu-->
                                            <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                                    data-kt-menu-overflow="true">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
                                                <span class="svg-icon svg-icon-1">
																			<svg width="24" height="24"
                                                                                 viewBox="0 0 24 24" fill="none"
                                                                                 xmlns="http://www.w3.org/2000/svg">
																				<rect opacity="0.3" x="2" y="2"
                                                                                      width="20" height="20" rx="4"
                                                                                      fill="currentColor"></rect>
																				<rect x="11" y="11" width="2.6"
                                                                                      height="2.6" rx="1.3"
                                                                                      fill="currentColor"></rect>
																				<rect x="15" y="11" width="2.6"
                                                                                      height="2.6" rx="1.3"
                                                                                      fill="currentColor"></rect>
																				<rect x="7" y="11" width="2.6"
                                                                                      height="2.6" rx="1.3"
                                                                                      fill="currentColor"></rect>
																			</svg>
																		</span>
                                                <!--end::Svg Icon-->
                                            </button>
                                            <!--begin::Menu 2-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                                 data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick
                                                        Actions
                                                    </div>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu separator-->
                                                <div class="separator mb-3 opacity-75"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Ticket</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Customer</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                                     data-kt-menu-placement="right-start">
                                                    <!--begin::Menu item-->
                                                    <a href="#" class="menu-link px-3">
                                                        <span class="menu-title">New Group</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu sub-->
                                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Admin Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Staff Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Member Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu sub-->
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Contact</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu separator-->
                                                <div class="separator mt-3 opacity-75"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content px-3 py-3">
                                                        <a class="btn btn-primary btn-sm px-4" href="#">Generate
                                                            Reports</a>
                                                    </div>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu 2-->
                                            <!--end::Menu-->
                                        </div>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Customer-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Name-->
                                        <span class="text-gray-400 fw-bold">To:
																<a href="../../demo1/dist/apps/ecommerce/sales/details.html"
                                                                   class="text-gray-800 text-hover-primary fw-bold">Jason Bourne</a></span>
                                        <!--end::Name-->
                                        <!--begin::Label-->
                                        <span class="badge badge-light-success">Delivered</span>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Customer-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                    <!--begin::Info-->
                                    <div class="d-flex flex-stack mb-3">
                                        <!--begin::Wrapper-->
                                        <div class="me-3">
                                            <!--begin::Icon-->
                                            <img src="assets/media/stock/ecommerce/209.gif" class="w-50px ms-n1 me-1"
                                                 alt="">
                                            <!--end::Icon-->
                                            <!--begin::Title-->
                                            <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                               class="text-gray-800 text-hover-primary fw-bold">RiseUP</a>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Wrapper-->
                                        <!--begin::Action-->
                                        <div class="m-0">
                                            <!--begin::Menu-->
                                            <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                                    data-kt-menu-overflow="true">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
                                                <span class="svg-icon svg-icon-1">
																			<svg width="24" height="24"
                                                                                 viewBox="0 0 24 24" fill="none"
                                                                                 xmlns="http://www.w3.org/2000/svg">
																				<rect opacity="0.3" x="2" y="2"
                                                                                      width="20" height="20" rx="4"
                                                                                      fill="currentColor"></rect>
																				<rect x="11" y="11" width="2.6"
                                                                                      height="2.6" rx="1.3"
                                                                                      fill="currentColor"></rect>
																				<rect x="15" y="11" width="2.6"
                                                                                      height="2.6" rx="1.3"
                                                                                      fill="currentColor"></rect>
																				<rect x="7" y="11" width="2.6"
                                                                                      height="2.6" rx="1.3"
                                                                                      fill="currentColor"></rect>
																			</svg>
																		</span>
                                                <!--end::Svg Icon-->
                                            </button>
                                            <!--begin::Menu 2-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                                 data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick
                                                        Actions
                                                    </div>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu separator-->
                                                <div class="separator mb-3 opacity-75"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Ticket</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Customer</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                                     data-kt-menu-placement="right-start">
                                                    <!--begin::Menu item-->
                                                    <a href="#" class="menu-link px-3">
                                                        <span class="menu-title">New Group</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu sub-->
                                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Admin Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Staff Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Member Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu sub-->
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Contact</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu separator-->
                                                <div class="separator mt-3 opacity-75"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content px-3 py-3">
                                                        <a class="btn btn-primary btn-sm px-4" href="#">Generate
                                                            Reports</a>
                                                    </div>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu 2-->
                                            <!--end::Menu-->
                                        </div>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Customer-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Name-->
                                        <span class="text-gray-400 fw-bold">To:
																<a href="../../demo1/dist/apps/ecommerce/sales/details.html"
                                                                   class="text-gray-800 text-hover-primary fw-bold">Marie Durant</a></span>
                                        <!--end::Name-->
                                        <!--begin::Label-->
                                        <span class="badge badge-light-primary">Shipping</span>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Customer-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                    <!--begin::Info-->
                                    <div class="d-flex flex-stack mb-3">
                                        <!--begin::Wrapper-->
                                        <div class="me-3">
                                            <!--begin::Icon-->
                                            <img src="assets/media/stock/ecommerce/214.gif" class="w-50px ms-n1 me-1"
                                                 alt="">
                                            <!--end::Icon-->
                                            <!--begin::Title-->
                                            <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                               class="text-gray-800 text-hover-primary fw-bold">Yellow Stone</a>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Wrapper-->
                                        <!--begin::Action-->
                                        <div class="m-0">
                                            <!--begin::Menu-->
                                            <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                                    data-kt-menu-overflow="true">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
                                                <span class="svg-icon svg-icon-1">
																			<svg width="24" height="24"
                                                                                 viewBox="0 0 24 24" fill="none"
                                                                                 xmlns="http://www.w3.org/2000/svg">
																				<rect opacity="0.3" x="2" y="2"
                                                                                      width="20" height="20" rx="4"
                                                                                      fill="currentColor"></rect>
																				<rect x="11" y="11" width="2.6"
                                                                                      height="2.6" rx="1.3"
                                                                                      fill="currentColor"></rect>
																				<rect x="15" y="11" width="2.6"
                                                                                      height="2.6" rx="1.3"
                                                                                      fill="currentColor"></rect>
																				<rect x="7" y="11" width="2.6"
                                                                                      height="2.6" rx="1.3"
                                                                                      fill="currentColor"></rect>
																			</svg>
																		</span>
                                                <!--end::Svg Icon-->
                                            </button>
                                            <!--begin::Menu 2-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                                 data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick
                                                        Actions
                                                    </div>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu separator-->
                                                <div class="separator mb-3 opacity-75"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Ticket</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Customer</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                                     data-kt-menu-placement="right-start">
                                                    <!--begin::Menu item-->
                                                    <a href="#" class="menu-link px-3">
                                                        <span class="menu-title">New Group</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu sub-->
                                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Admin Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Staff Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Member Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu sub-->
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Contact</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu separator-->
                                                <div class="separator mt-3 opacity-75"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content px-3 py-3">
                                                        <a class="btn btn-primary btn-sm px-4" href="#">Generate
                                                            Reports</a>
                                                    </div>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu 2-->
                                            <!--end::Menu-->
                                        </div>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Customer-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Name-->
                                        <span class="text-gray-400 fw-bold">To:
																<a href="../../demo1/dist/apps/ecommerce/sales/details.html"
                                                                   class="text-gray-800 text-hover-primary fw-bold">Dan Wilson</a></span>
                                        <!--end::Name-->
                                        <!--begin::Label-->
                                        <span class="badge badge-light-danger">Confirmed</span>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Customer-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                    <!--begin::Info-->
                                    <div class="d-flex flex-stack mb-3">
                                        <!--begin::Wrapper-->
                                        <div class="me-3">
                                            <!--begin::Icon-->
                                            <img src="assets/media/stock/ecommerce/211.gif" class="w-50px ms-n1 me-1"
                                                 alt="">
                                            <!--end::Icon-->
                                            <!--begin::Title-->
                                            <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                               class="text-gray-800 text-hover-primary fw-bold">Elephant 1802</a>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Wrapper-->
                                        <!--begin::Action-->
                                        <div class="m-0">
                                            <!--begin::Menu-->
                                            <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                                    data-kt-menu-overflow="true">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
                                                <span class="svg-icon svg-icon-1">
																			<svg width="24" height="24"
                                                                                 viewBox="0 0 24 24" fill="none"
                                                                                 xmlns="http://www.w3.org/2000/svg">
																				<rect opacity="0.3" x="2" y="2"
                                                                                      width="20" height="20" rx="4"
                                                                                      fill="currentColor"></rect>
																				<rect x="11" y="11" width="2.6"
                                                                                      height="2.6" rx="1.3"
                                                                                      fill="currentColor"></rect>
																				<rect x="15" y="11" width="2.6"
                                                                                      height="2.6" rx="1.3"
                                                                                      fill="currentColor"></rect>
																				<rect x="7" y="11" width="2.6"
                                                                                      height="2.6" rx="1.3"
                                                                                      fill="currentColor"></rect>
																			</svg>
																		</span>
                                                <!--end::Svg Icon-->
                                            </button>
                                            <!--begin::Menu 2-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                                 data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick
                                                        Actions
                                                    </div>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu separator-->
                                                <div class="separator mb-3 opacity-75"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Ticket</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Customer</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                                     data-kt-menu-placement="right-start">
                                                    <!--begin::Menu item-->
                                                    <a href="#" class="menu-link px-3">
                                                        <span class="menu-title">New Group</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu sub-->
                                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Admin Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Staff Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Member Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu sub-->
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Contact</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu separator-->
                                                <div class="separator mt-3 opacity-75"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content px-3 py-3">
                                                        <a class="btn btn-primary btn-sm px-4" href="#">Generate
                                                            Reports</a>
                                                    </div>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu 2-->
                                            <!--end::Menu-->
                                        </div>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Customer-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Name-->
                                        <span class="text-gray-400 fw-bold">To:
																<a href="../../demo1/dist/apps/ecommerce/sales/details.html"
                                                                   class="text-gray-800 text-hover-primary fw-bold">Lebron Wayde</a></span>
                                        <!--end::Name-->
                                        <!--begin::Label-->
                                        <span class="badge badge-light-success">Delivered</span>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Customer-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                    <!--begin::Info-->
                                    <div class="d-flex flex-stack mb-3">
                                        <!--begin::Wrapper-->
                                        <div class="me-3">
                                            <!--begin::Icon-->
                                            <img src="assets/media/stock/ecommerce/215.gif" class="w-50px ms-n1 me-1"
                                                 alt="">
                                            <!--end::Icon-->
                                            <!--begin::Title-->
                                            <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                               class="text-gray-800 text-hover-primary fw-bold">RiseUP</a>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Wrapper-->
                                        <!--begin::Action-->
                                        <div class="m-0">
                                            <!--begin::Menu-->
                                            <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                                    data-kt-menu-overflow="true">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
                                                <span class="svg-icon svg-icon-1">
																			<svg width="24" height="24"
                                                                                 viewBox="0 0 24 24" fill="none"
                                                                                 xmlns="http://www.w3.org/2000/svg">
																				<rect opacity="0.3" x="2" y="2"
                                                                                      width="20" height="20" rx="4"
                                                                                      fill="currentColor"></rect>
																				<rect x="11" y="11" width="2.6"
                                                                                      height="2.6" rx="1.3"
                                                                                      fill="currentColor"></rect>
																				<rect x="15" y="11" width="2.6"
                                                                                      height="2.6" rx="1.3"
                                                                                      fill="currentColor"></rect>
																				<rect x="7" y="11" width="2.6"
                                                                                      height="2.6" rx="1.3"
                                                                                      fill="currentColor"></rect>
																			</svg>
																		</span>
                                                <!--end::Svg Icon-->
                                            </button>
                                            <!--begin::Menu 2-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                                 data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick
                                                        Actions
                                                    </div>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu separator-->
                                                <div class="separator mb-3 opacity-75"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Ticket</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Customer</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                                     data-kt-menu-placement="right-start">
                                                    <!--begin::Menu item-->
                                                    <a href="#" class="menu-link px-3">
                                                        <span class="menu-title">New Group</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu sub-->
                                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Admin Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Staff Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Member Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu sub-->
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Contact</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu separator-->
                                                <div class="separator mt-3 opacity-75"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content px-3 py-3">
                                                        <a class="btn btn-primary btn-sm px-4" href="#">Generate
                                                            Reports</a>
                                                    </div>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu 2-->
                                            <!--end::Menu-->
                                        </div>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Customer-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Name-->
                                        <span class="text-gray-400 fw-bold">To:
																<a href="../../demo1/dist/apps/ecommerce/sales/details.html"
                                                                   class="text-gray-800 text-hover-primary fw-bold">Ana Simmons</a></span>
                                        <!--end::Name-->
                                        <!--begin::Label-->
                                        <span class="badge badge-light-primary">Shipping</span>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Customer-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="border border-dashed border-gray-300 rounded px-7 py-3">
                                    <!--begin::Info-->
                                    <div class="d-flex flex-stack mb-3">
                                        <!--begin::Wrapper-->
                                        <div class="me-3">
                                            <!--begin::Icon-->
                                            <img src="assets/media/stock/ecommerce/192.gif" class="w-50px ms-n1 me-1"
                                                 alt="">
                                            <!--end::Icon-->
                                            <!--begin::Title-->
                                            <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                               class="text-gray-800 text-hover-primary fw-bold">Yellow Stone</a>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Wrapper-->
                                        <!--begin::Action-->
                                        <div class="m-0">
                                            <!--begin::Menu-->
                                            <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                                    data-kt-menu-overflow="true">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
                                                <span class="svg-icon svg-icon-1">
																			<svg width="24" height="24"
                                                                                 viewBox="0 0 24 24" fill="none"
                                                                                 xmlns="http://www.w3.org/2000/svg">
																				<rect opacity="0.3" x="2" y="2"
                                                                                      width="20" height="20" rx="4"
                                                                                      fill="currentColor"></rect>
																				<rect x="11" y="11" width="2.6"
                                                                                      height="2.6" rx="1.3"
                                                                                      fill="currentColor"></rect>
																				<rect x="15" y="11" width="2.6"
                                                                                      height="2.6" rx="1.3"
                                                                                      fill="currentColor"></rect>
																				<rect x="7" y="11" width="2.6"
                                                                                      height="2.6" rx="1.3"
                                                                                      fill="currentColor"></rect>
																			</svg>
																		</span>
                                                <!--end::Svg Icon-->
                                            </button>
                                            <!--begin::Menu 2-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                                 data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick
                                                        Actions
                                                    </div>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu separator-->
                                                <div class="separator mb-3 opacity-75"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Ticket</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Customer</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                                     data-kt-menu-placement="right-start">
                                                    <!--begin::Menu item-->
                                                    <a href="#" class="menu-link px-3">
                                                        <span class="menu-title">New Group</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu sub-->
                                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Admin Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Staff Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Member Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu sub-->
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Contact</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu separator-->
                                                <div class="separator mt-3 opacity-75"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content px-3 py-3">
                                                        <a class="btn btn-primary btn-sm px-4" href="#">Generate
                                                            Reports</a>
                                                    </div>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu 2-->
                                            <!--end::Menu-->
                                        </div>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Customer-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Name-->
                                        <span class="text-gray-400 fw-bold">To:
																<a href="../../demo1/dist/apps/ecommerce/sales/details.html"
                                                                   class="text-gray-800 text-hover-primary fw-bold">Kevin Leonard</a></span>
                                        <!--end::Name-->
                                        <!--begin::Label-->
                                        <span class="badge badge-light-danger">Confirmed</span>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Customer-->
                                </div>
                                <!--end::Item-->
                            </div>
                            <!--end::Scroll-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::List widget 5-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-8">
                    <!--begin::Table Widget 5-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Card header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-dark">Stock Report</span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-6">Total 2,356 Items in the Stock</span>
                            </h3>
                            <!--end::Title-->
                            <!--begin::Actions-->
                            <div class="card-toolbar">
                                <!--begin::Filters-->
                                <div class="d-flex flex-stack flex-wrap gap-4">
                                    <!--begin::Destination-->
                                    <div class="d-flex align-items-center fw-bold">
                                        <!--begin::Label-->
                                        <div class="text-muted fs-7 me-2">Cateogry</div>
                                        <!--end::Label-->
                                        <!--begin::Select-->
                                        <select class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bold py-0 ps-3 w-auto select2-hidden-accessible"
                                                data-control="select2" data-hide-search="true"
                                                data-dropdown-css-class="w-150px" data-placeholder="Select an option"
                                                data-select2-id="select2-data-10-49v5" tabindex="-1" aria-hidden="true"
                                                data-kt-initialized="1">
                                            <option></option>
                                            <option value="Show All" selected="selected"
                                                    data-select2-id="select2-data-12-5pwa">Show All
                                            </option>
                                            <option value="a">Category A</option>
                                            <option value="b">Category B</option>
                                        </select><span class="select2 select2-container select2-container--bootstrap5"
                                                       dir="ltr" data-select2-id="select2-data-11-wdww"
                                                       style="width: 100%;"><span class="selection"><span
                                                        class="select2-selection select2-selection--single form-select form-select-transparent text-dark fs-7 lh-1 fw-bold py-0 ps-3 w-auto"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="0" aria-disabled="false"
                                                        aria-labelledby="select2-616y-container"
                                                        aria-controls="select2-616y-container"><span
                                                            class="select2-selection__rendered"
                                                            id="select2-616y-container" role="textbox"
                                                            aria-readonly="true" title="Show All">Show All</span><span
                                                            class="select2-selection__arrow" role="presentation"><b
                                                                role="presentation"></b></span></span></span><span
                                                    class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Destination-->
                                    <!--begin::Status-->
                                    <div class="d-flex align-items-center fw-bold">
                                        <!--begin::Label-->
                                        <div class="text-muted fs-7 me-2">Status</div>
                                        <!--end::Label-->
                                        <!--begin::Select-->
                                        <select class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bold py-0 ps-3 w-auto select2-hidden-accessible"
                                                data-control="select2" data-hide-search="true"
                                                data-dropdown-css-class="w-150px" data-placeholder="Select an option"
                                                data-kt-table-widget-5="filter_status"
                                                data-select2-id="select2-data-13-ngoo" tabindex="-1" aria-hidden="true"
                                                data-kt-initialized="1">
                                            <option></option>
                                            <option value="Show All" selected="selected"
                                                    data-select2-id="select2-data-15-su4q">Show All
                                            </option>
                                            <option value="In Stock">In Stock</option>
                                            <option value="Out of Stock">Out of Stock</option>
                                            <option value="Low Stock">Low Stock</option>
                                        </select><span class="select2 select2-container select2-container--bootstrap5"
                                                       dir="ltr" data-select2-id="select2-data-14-4vx6"
                                                       style="width: 100%;"><span class="selection"><span
                                                        class="select2-selection select2-selection--single form-select form-select-transparent text-dark fs-7 lh-1 fw-bold py-0 ps-3 w-auto"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="0" aria-disabled="false"
                                                        aria-labelledby="select2-azcm-container"
                                                        aria-controls="select2-azcm-container"><span
                                                            class="select2-selection__rendered"
                                                            id="select2-azcm-container" role="textbox"
                                                            aria-readonly="true" title="Show All">Show All</span><span
                                                            class="select2-selection__arrow" role="presentation"><b
                                                                role="presentation"></b></span></span></span><span
                                                    class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Status-->
                                    <!--begin::Search-->
                                    <a href="../../demo1/dist/apps/ecommerce/catalog/products.html"
                                       class="btn btn-light btn-sm">View Stock</a>
                                    <!--end::Search-->
                                </div>
                                <!--begin::Filters-->
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body">
                            <!--begin::Table-->
                            <div id="kt_table_widget_5_table_wrapper"
                                 class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed fs-6 gy-3 dataTable no-footer"
                                           id="kt_table_widget_5_table">
                                        <!--begin::Table head-->
                                        <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="min-w-100px sorting" tabindex="0"
                                                aria-controls="kt_table_widget_5_table" rowspan="1" colspan="1"
                                                aria-label="Item: activate to sort column ascending"
                                                style="width: 142.875px;">Item
                                            </th>
                                            <th class="text-end pe-3 min-w-100px sorting_disabled" rowspan="1"
                                                colspan="1" aria-label="Product ID" style="width: 106.344px;">Product ID
                                            </th>
                                            <th class="text-end pe-3 min-w-150px sorting" tabindex="0"
                                                aria-controls="kt_table_widget_5_table" rowspan="1" colspan="1"
                                                aria-label="Date Added: activate to sort column ascending"
                                                style="width: 159px;">Date Added
                                            </th>
                                            <th class="text-end pe-3 min-w-100px sorting" tabindex="0"
                                                aria-controls="kt_table_widget_5_table" rowspan="1" colspan="1"
                                                aria-label="Price: activate to sort column ascending"
                                                style="width: 106.344px;">Price
                                            </th>
                                            <th class="text-end pe-3 min-w-50px sorting" tabindex="0"
                                                aria-controls="kt_table_widget_5_table" rowspan="1" colspan="1"
                                                aria-label="Status: activate to sort column ascending"
                                                style="width: 107.906px;">Status
                                            </th>
                                            <th class="text-end pe-0 min-w-25px sorting" tabindex="0"
                                                aria-controls="kt_table_widget_5_table" rowspan="1" colspan="1"
                                                aria-label="Qty: activate to sort column ascending"
                                                style="width: 60.4375px;">Qty
                                            </th>
                                        </tr>
                                        <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody class="fw-bold text-gray-600">


                                        <tr class="odd">
                                            <!--begin::Item-->
                                            <td>
                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                   class="text-dark text-hover-primary">Macbook Air M1</a>
                                            </td>
                                            <!--end::Item-->
                                            <!--begin::Product ID-->
                                            <td class="text-end">#XGY-356</td>
                                            <!--end::Product ID-->
                                            <!--begin::Date added-->
                                            <td class="text-end" data-order="2022-04-20T00:00:00-03:00">02 Apr, 2022
                                            </td>
                                            <!--end::Date added-->
                                            <!--begin::Price-->
                                            <td class="text-end">$1,230</td>
                                            <!--end::Price-->
                                            <!--begin::Status-->
                                            <td class="text-end">
                                                <span class="badge py-3 px-4 fs-7 badge-light-primary">In Stock</span>
                                            </td>
                                            <!--end::Status-->
                                            <!--begin::Qty-->
                                            <td class="text-end" data-order="58">
                                                <span class="text-dark fw-bold">58 PCS</span>
                                            </td>
                                            <!--end::Qty-->
                                        </tr>
                                        <tr class="even">
                                            <!--begin::Item-->
                                            <td>
                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                   class="text-dark text-hover-primary">Surface Laptop 4</a>
                                            </td>
                                            <!--end::Item-->
                                            <!--begin::Product ID-->
                                            <td class="text-end">#YHD-047</td>
                                            <!--end::Product ID-->
                                            <!--begin::Date added-->
                                            <td class="text-end" data-order="2022-04-20T00:00:00-03:00">01 Apr, 2022
                                            </td>
                                            <!--end::Date added-->
                                            <!--begin::Price-->
                                            <td class="text-end">$1,060</td>
                                            <!--end::Price-->
                                            <!--begin::Status-->
                                            <td class="text-end">
                                                <span class="badge py-3 px-4 fs-7 badge-light-danger">Out of Stock</span>
                                            </td>
                                            <!--end::Status-->
                                            <!--begin::Qty-->
                                            <td class="text-end" data-order="0">
                                                <span class="text-dark fw-bold">0 PCS</span>
                                            </td>
                                            <!--end::Qty-->
                                        </tr>
                                        <tr class="odd">
                                            <!--begin::Item-->
                                            <td>
                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                   class="text-dark text-hover-primary">Logitech MX 250</a>
                                            </td>
                                            <!--end::Item-->
                                            <!--begin::Product ID-->
                                            <td class="text-end">#SRR-678</td>
                                            <!--end::Product ID-->
                                            <!--begin::Date added-->
                                            <td class="text-end" data-order="2022-03-20T00:00:00-03:00">24 Mar, 2022
                                            </td>
                                            <!--end::Date added-->
                                            <!--begin::Price-->
                                            <td class="text-end">$64</td>
                                            <!--end::Price-->
                                            <!--begin::Status-->
                                            <td class="text-end">
                                                <span class="badge py-3 px-4 fs-7 badge-light-primary">In Stock</span>
                                            </td>
                                            <!--end::Status-->
                                            <!--begin::Qty-->
                                            <td class="text-end" data-order="290">
                                                <span class="text-dark fw-bold">290 PCS</span>
                                            </td>
                                            <!--end::Qty-->
                                        </tr>
                                        <tr class="even">
                                            <!--begin::Item-->
                                            <td>
                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                   class="text-dark text-hover-primary">AudioEngine HD3</a>
                                            </td>
                                            <!--end::Item-->
                                            <!--begin::Product ID-->
                                            <td class="text-end">#PXF-578</td>
                                            <!--end::Product ID-->
                                            <!--begin::Date added-->
                                            <td class="text-end" data-order="2022-03-20T00:00:00-03:00">24 Mar, 2022
                                            </td>
                                            <!--end::Date added-->
                                            <!--begin::Price-->
                                            <td class="text-end">$1,060</td>
                                            <!--end::Price-->
                                            <!--begin::Status-->
                                            <td class="text-end">
                                                <span class="badge py-3 px-4 fs-7 badge-light-danger">Out of Stock</span>
                                            </td>
                                            <!--end::Status-->
                                            <!--begin::Qty-->
                                            <td class="text-end" data-order="46">
                                                <span class="text-dark fw-bold">46 PCS</span>
                                            </td>
                                            <!--end::Qty-->
                                        </tr>
                                        <tr class="odd">
                                            <!--begin::Item-->
                                            <td>
                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                   class="text-dark text-hover-primary">HP Hyper LTR</a>
                                            </td>
                                            <!--end::Item-->
                                            <!--begin::Product ID-->
                                            <td class="text-end">#PXF-778</td>
                                            <!--end::Product ID-->
                                            <!--begin::Date added-->
                                            <td class="text-end" data-order="2022-01-20T00:00:00-03:00">16 Jan, 2022
                                            </td>
                                            <!--end::Date added-->
                                            <!--begin::Price-->
                                            <td class="text-end">$4500</td>
                                            <!--end::Price-->
                                            <!--begin::Status-->
                                            <td class="text-end">
                                                <span class="badge py-3 px-4 fs-7 badge-light-primary">In Stock</span>
                                            </td>
                                            <!--end::Status-->
                                            <!--begin::Qty-->
                                            <td class="text-end" data-order="78">
                                                <span class="text-dark fw-bold">78 PCS</span>
                                            </td>
                                            <!--end::Qty-->
                                        </tr>
                                        <tr class="even">
                                            <!--begin::Item-->
                                            <td>
                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                   class="text-dark text-hover-primary">Dell 32 UltraSharp</a>
                                            </td>
                                            <!--end::Item-->
                                            <!--begin::Product ID-->
                                            <td class="text-end">#XGY-356</td>
                                            <!--end::Product ID-->
                                            <!--begin::Date added-->
                                            <td class="text-end" data-order="2022-12-20T00:00:00-03:00">22 Dec, 2022
                                            </td>
                                            <!--end::Date added-->
                                            <!--begin::Price-->
                                            <td class="text-end">$1,060</td>
                                            <!--end::Price-->
                                            <!--begin::Status-->
                                            <td class="text-end">
                                                <span class="badge py-3 px-4 fs-7 badge-light-warning">Low Stock</span>
                                            </td>
                                            <!--end::Status-->
                                            <!--begin::Qty-->
                                            <td class="text-end" data-order="8">
                                                <span class="text-dark fw-bold">8 PCS</span>
                                            </td>
                                            <!--end::Qty-->
                                        </tr>
                                        <tr class="odd">
                                            <!--begin::Item-->
                                            <td>
                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                   class="text-dark text-hover-primary">Google Pixel 6 Pro</a>
                                            </td>
                                            <!--end::Item-->
                                            <!--begin::Product ID-->
                                            <td class="text-end">#XVR-425</td>
                                            <!--end::Product ID-->
                                            <!--begin::Date added-->
                                            <td class="text-end" data-order="2022-12-20T00:00:00-03:00">27 Dec, 2022
                                            </td>
                                            <!--end::Date added-->
                                            <!--begin::Price-->
                                            <td class="text-end">$1,060</td>
                                            <!--end::Price-->
                                            <!--begin::Status-->
                                            <td class="text-end">
                                                <span class="badge py-3 px-4 fs-7 badge-light-primary">In Stock</span>
                                            </td>
                                            <!--end::Status-->
                                            <!--begin::Qty-->
                                            <td class="text-end" data-order="124">
                                                <span class="text-dark fw-bold">124 PCS</span>
                                            </td>
                                            <!--end::Qty-->
                                        </tr>
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"></div>
                                    <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end"></div>
                                </div>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Table Widget 5-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Content container-->
    </div>
@endsection