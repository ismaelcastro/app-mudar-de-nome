@extends('admin.layout.app')

@section('content')
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        {{-- begin::Breadcrumbs--}}
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Calendário</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{  route('admin.calendar.index') }}" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">calendário</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        {{-- end::Breadcrumbs--}}
    </div>

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header"></div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body">
                    <!--begin::Calendar-->
                    <div id="kt_calendar_app" class="fc fc-media-screen fc-direction-ltr fc-theme-standard">
                        <div class="fc-header-toolbar fc-toolbar fc-toolbar-ltr">
                            <div class="fc-toolbar-chunk">
                                <div class="fc-button-group">
                                    <button type="button" title="Previous month" aria-pressed="false" class="fc-prev-button fc-button fc-button-primary">
                                        <span class="fc-icon fc-icon-chevron-left"></span>
                                    </button>
                                    <button type="button" title="Next month" aria-pressed="false" class="fc-next-button fc-button fc-button-primary">
                                        <span class="fc-icon fc-icon-chevron-right"></span>
                                    </button>
                                </div>
                                <button type="button" title="This month" disabled="" aria-pressed="false" class="fc-today-button fc-button fc-button-primary">today</button>
                            </div>
                            <div class="fc-toolbar-chunk">
                                <h2 class="fc-toolbar-title" id="fc-dom-1">July 2022</h2>
                            </div>
                            <div class="fc-toolbar-chunk">
                                <div class="fc-button-group">
                                    <button type="button" title="month view" aria-pressed="true" class="fc-dayGridMonth-button fc-button fc-button-primary fc-button-active">
                                        mês
                                    </button>
                                    <button type="button" title="week view" aria-pressed="false" class="fc-timeGridWeek-button fc-button fc-button-primary">
                                        semana
                                    </button>
                                    <button type="button" title="day view" aria-pressed="false" class="fc-timeGridDay-button fc-button fc-button-primary">
                                        dia
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div aria-labelledby="fc-dom-1" class="fc-view-harness fc-view-harness-active" style="height: 890.37px;">
                            <div class="fc-daygrid fc-dayGridMonth-view fc-view">
                                <table role="grid" class="fc-scrollgrid  fc-scrollgrid-liquid">
                                    <thead role="rowgroup">
                                    <tr role="presentation" class="fc-scrollgrid-section fc-scrollgrid-section-header ">
                                        <th role="presentation">
                                            <div class="fc-scroller-harness">
                                                <div class="fc-scroller" style="overflow: hidden;">
                                                    <table role="presentation" class="fc-col-header"
                                                           style="width: 1199px;">
                                                        <colgroup></colgroup>
                                                        <thead role="presentation">
                                                        <tr role="row">
                                                            <th role="columnheader"
                                                                class="fc-col-header-cell fc-day fc-day-sun">
                                                                <div class="fc-scrollgrid-sync-inner">
                                                                    <a aria-label="Sunday" class="fc-col-header-cell-cushion">Sun</a>
                                                                </div>
                                                            </th>
                                                            <th role="columnheader" class="fc-col-header-cell fc-day fc-day-mon">
                                                                <div class="fc-scrollgrid-sync-inner">
                                                                    <a aria-label="Monday" class="fc-col-header-cell-cushion">Mon</a>
                                                                </div>
                                                            </th>
                                                            <th role="columnheader"
                                                                class="fc-col-header-cell fc-day fc-day-tue">
                                                                <div class="fc-scrollgrid-sync-inner">
                                                                    <a aria-label="Tuesday" class="fc-col-header-cell-cushion">Tue</a>
                                                                </div>
                                                            </th>
                                                            <th role="columnheader" class="fc-col-header-cell fc-day fc-day-wed">
                                                                <div class="fc-scrollgrid-sync-inner">
                                                                    <a aria-label="Wednesday" class="fc-col-header-cell-cushion">Wed</a>
                                                                </div>
                                                            </th>
                                                            <th role="columnheader"
                                                                class="fc-col-header-cell fc-day fc-day-thu">
                                                                <div class="fc-scrollgrid-sync-inner"><a
                                                                            aria-label="Thursday"
                                                                            class="fc-col-header-cell-cushion ">Thu</a>
                                                                </div>
                                                            </th>
                                                            <th role="columnheader"
                                                                class="fc-col-header-cell fc-day fc-day-fri">
                                                                <div class="fc-scrollgrid-sync-inner"><a
                                                                            aria-label="Friday"
                                                                            class="fc-col-header-cell-cushion ">Fri</a>
                                                                </div>
                                                            </th>
                                                            <th role="columnheader"
                                                                class="fc-col-header-cell fc-day fc-day-sat">
                                                                <div class="fc-scrollgrid-sync-inner"><a
                                                                            aria-label="Saturday"
                                                                            class="fc-col-header-cell-cushion ">Sat</a>
                                                                </div>
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody role="rowgroup">
                                    <tr role="presentation"
                                        class="fc-scrollgrid-section fc-scrollgrid-section-body  fc-scrollgrid-section-liquid">
                                        <td role="presentation">
                                            <div class="fc-scroller-harness fc-scroller-harness-liquid">
                                                <div class="fc-scroller fc-scroller-liquid-absolute"
                                                     style="overflow: hidden auto;">
                                                    <div class="fc-daygrid-body fc-daygrid-body-balanced "
                                                         style="width: 1199px;">
                                                        <table role="presentation" class="fc-scrollgrid-sync-table"
                                                               style="width: 1199px; height: 842px;">
                                                            <colgroup></colgroup>
                                                            <tbody role="presentation">
                                                            <tr role="row">
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-sun fc-day-past fc-day-other"
                                                                    data-date="2022-06-26" aria-labelledby="fc-dom-2">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a id="fc-dom-2"
                                                                                                           class="fc-daygrid-day-number"
                                                                                                           title="Go to June 26, 2022"
                                                                                                           data-navlink=""
                                                                                                           tabindex="0">26</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-mon fc-day-past fc-day-other"
                                                                    data-date="2022-06-27" aria-labelledby="fc-dom-4">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a id="fc-dom-4"
                                                                                                           class="fc-daygrid-day-number"
                                                                                                           title="Go to June 27, 2022"
                                                                                                           data-navlink=""
                                                                                                           tabindex="0">27</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-tue fc-day-past fc-day-other"
                                                                    data-date="2022-06-28" aria-labelledby="fc-dom-6">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a id="fc-dom-6"
                                                                                                           class="fc-daygrid-day-number"
                                                                                                           title="Go to June 28, 2022"
                                                                                                           data-navlink=""
                                                                                                           tabindex="0">28</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-wed fc-day-past fc-day-other"
                                                                    data-date="2022-06-29" aria-labelledby="fc-dom-8">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a id="fc-dom-8"
                                                                                                           class="fc-daygrid-day-number"
                                                                                                           title="Go to June 29, 2022"
                                                                                                           data-navlink=""
                                                                                                           tabindex="0">29</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-thu fc-day-past fc-day-other"
                                                                    data-date="2022-06-30" aria-labelledby="fc-dom-10">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-10"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to June 30, 2022"
                                                                                    data-navlink="" tabindex="0">30</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-fri fc-day-past"
                                                                    data-date="2022-07-01" aria-labelledby="fc-dom-12">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-12"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to July 1, 2022"
                                                                                    data-navlink="" tabindex="0">1</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-event-harness"
                                                                                 style="margin-top: 0px;"><a
                                                                                        class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-past fc-event-danger fc-event-solid-warning"
                                                                                        tabindex="0">
                                                                                    <div class="fc-event-main">
                                                                                        <div class="fc-event-main-frame">
                                                                                            <div class="fc-event-title-container">
                                                                                                <div class="fc-event-title fc-sticky">
                                                                                                    All Day Event
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="fc-event-resizer fc-event-resizer-end"></div>
                                                                                </a></div>
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-sat fc-day-past"
                                                                    data-date="2022-07-02" aria-labelledby="fc-dom-14">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-14"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to July 2, 2022"
                                                                                    data-navlink="" tabindex="0">2</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-event-harness"
                                                                                 style="margin-top: 0px;"><a
                                                                                        class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-past fc-event-primary"
                                                                                        tabindex="0">
                                                                                    <div class="fc-event-main">
                                                                                        <div class="fc-event-main-frame">
                                                                                            <div class="fc-event-title-container">
                                                                                                <div class="fc-event-title fc-sticky">
                                                                                                    Company Trip
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="fc-event-resizer fc-event-resizer-end"></div>
                                                                                </a></div>
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr role="row">
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-sun fc-day-past"
                                                                    data-date="2022-07-03" aria-labelledby="fc-dom-16">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-16"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to July 3, 2022"
                                                                                    data-navlink="" tabindex="0">3</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-event-harness fc-daygrid-event-harness-abs"
                                                                                 style="top: 0px; left: 0px; right: -171.281px;">
                                                                                <a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-past fc-event-light fc-event-solid-primary"
                                                                                   tabindex="0">
                                                                                    <div class="fc-event-main">
                                                                                        <div class="fc-event-main-frame">
                                                                                            <div class="fc-event-title-container">
                                                                                                <div class="fc-event-title fc-sticky">
                                                                                                    ICT Expo 2021 -
                                                                                                    Product Release
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="fc-event-resizer fc-event-resizer-end"></div>
                                                                                </a></div>
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 30px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-mon fc-day-past"
                                                                    data-date="2022-07-04" aria-labelledby="fc-dom-18">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-18"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to July 4, 2022"
                                                                                    data-navlink="" tabindex="0">4</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 30px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-tue fc-day-past"
                                                                    data-date="2022-07-05" aria-labelledby="fc-dom-20">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-20"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to July 5, 2022"
                                                                                    data-navlink="" tabindex="0">5</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-wed fc-day-past"
                                                                    data-date="2022-07-06" aria-labelledby="fc-dom-22">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-22"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to July 6, 2022"
                                                                                    data-navlink="" tabindex="0">6</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-thu fc-day-past"
                                                                    data-date="2022-07-07" aria-labelledby="fc-dom-24">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-24"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to July 7, 2022"
                                                                                    data-navlink="" tabindex="0">7</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-fri fc-day-past"
                                                                    data-date="2022-07-08" aria-labelledby="fc-dom-26">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-26"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to July 8, 2022"
                                                                                    data-navlink="" tabindex="0">8</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-sat fc-day-past"
                                                                    data-date="2022-07-09" aria-labelledby="fc-dom-28">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-28"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to July 9, 2022"
                                                                                    data-navlink="" tabindex="0">9</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-event-harness"
                                                                                 style="margin-top: 0px;"><a
                                                                                        class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-past fc-event-danger"
                                                                                        tabindex="0">
                                                                                    <div class="fc-daygrid-event-dot"></div>
                                                                                    <div class="fc-event-time">4p</div>
                                                                                    <div class="fc-event-title">
                                                                                        Repeating Event
                                                                                    </div>
                                                                                </a></div>
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr role="row">
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-sun fc-day-past"
                                                                    data-date="2022-07-10" aria-labelledby="fc-dom-30">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-30"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to July 10, 2022"
                                                                                    data-navlink="" tabindex="0">10</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-mon fc-day-past"
                                                                    data-date="2022-07-11" aria-labelledby="fc-dom-32">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-32"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to July 11, 2022"
                                                                                    data-navlink="" tabindex="0">11</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-tue fc-day-past"
                                                                    data-date="2022-07-12" aria-labelledby="fc-dom-34">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-34"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to July 12, 2022"
                                                                                    data-navlink="" tabindex="0">12</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-event-harness"
                                                                                 style="margin-top: 0px;"><a
                                                                                        class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-past"
                                                                                        tabindex="0">
                                                                                    <div class="fc-event-main">
                                                                                        <div class="fc-event-main-frame">
                                                                                            <div class="fc-event-title-container">
                                                                                                <div class="fc-event-title fc-sticky">
                                                                                                    Dinner
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="fc-event-resizer fc-event-resizer-end"></div>
                                                                                </a></div>
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-wed fc-day-past"
                                                                    data-date="2022-07-13" aria-labelledby="fc-dom-36">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-36"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to July 13, 2022"
                                                                                    data-navlink="" tabindex="0">13</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-thu fc-day-past"
                                                                    data-date="2022-07-14" aria-labelledby="fc-dom-38">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-38"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to July 14, 2022"
                                                                                    data-navlink="" tabindex="0">14</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-event-harness"
                                                                                 style="margin-top: 0px;"><a
                                                                                        class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-past fc-event-success"
                                                                                        tabindex="0">
                                                                                    <div class="fc-daygrid-event-dot"></div>
                                                                                    <div class="fc-event-time">1:30p
                                                                                    </div>
                                                                                    <div class="fc-event-title">
                                                                                        Reporting
                                                                                    </div>
                                                                                </a></div>
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-fri fc-day-past"
                                                                    data-date="2022-07-15" aria-labelledby="fc-dom-40">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-40"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to July 15, 2022"
                                                                                    data-navlink="" tabindex="0">15</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-sat fc-day-past"
                                                                    data-date="2022-07-16" aria-labelledby="fc-dom-42">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-42"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to July 16, 2022"
                                                                                    data-navlink="" tabindex="0">16</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-event-harness"
                                                                                 style="margin-top: 0px;"><a
                                                                                        class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-past"
                                                                                        tabindex="0">
                                                                                    <div class="fc-daygrid-event-dot"></div>
                                                                                    <div class="fc-event-time">4p</div>
                                                                                    <div class="fc-event-title">
                                                                                        Repeating Event
                                                                                    </div>
                                                                                </a></div>
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr role="row">
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-sun fc-day-past"
                                                                    data-date="2022-07-17" aria-labelledby="fc-dom-44">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-44"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to July 17, 2022"
                                                                                    data-navlink="" tabindex="0">17</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-mon fc-day-past"
                                                                    data-date="2022-07-18" aria-labelledby="fc-dom-46">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-46"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to July 18, 2022"
                                                                                    data-navlink="" tabindex="0">18</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-tue fc-day-past"
                                                                    data-date="2022-07-19" aria-labelledby="fc-dom-48">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-48"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to July 19, 2022"
                                                                                    data-navlink="" tabindex="0">19</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-wed fc-day-past"
                                                                    data-date="2022-07-20" aria-labelledby="fc-dom-50">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-50"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to July 20, 2022"
                                                                                    data-navlink="" tabindex="0">20</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-thu fc-day-past"
                                                                    data-date="2022-07-21" aria-labelledby="fc-dom-52">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-52"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to July 21, 2022"
                                                                                    data-navlink="" tabindex="0">21</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-fri fc-day-past"
                                                                    data-date="2022-07-22" aria-labelledby="fc-dom-54">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-54"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to July 22, 2022"
                                                                                    data-navlink="" tabindex="0">22</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-sat fc-day-past"
                                                                    data-date="2022-07-23" aria-labelledby="fc-dom-56">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-56"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to July 23, 2022"
                                                                                    data-navlink="" tabindex="0">23</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr role="row">
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-sun fc-day-past"
                                                                    data-date="2022-07-24" aria-labelledby="fc-dom-58">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-58"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to July 24, 2022"
                                                                                    data-navlink="" tabindex="0">24</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-mon fc-day-past"
                                                                    data-date="2022-07-25" aria-labelledby="fc-dom-60">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-60"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to July 25, 2022"
                                                                                    data-navlink="" tabindex="0">25</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-tue fc-day-past"
                                                                    data-date="2022-07-26" aria-labelledby="fc-dom-62">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-62"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to July 26, 2022"
                                                                                    data-navlink="" tabindex="0">26</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-wed fc-day-today "
                                                                    data-date="2022-07-27" aria-labelledby="fc-dom-64">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-64"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to July 27, 2022"
                                                                                    data-navlink="" tabindex="0">27</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-event-harness"
                                                                                 style="margin-top: 0px;"><a
                                                                                        class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-today"
                                                                                        tabindex="0">
                                                                                    <div class="fc-daygrid-event-dot"></div>
                                                                                    <div class="fc-event-time">10:30a
                                                                                    </div>
                                                                                    <div class="fc-event-title">
                                                                                        Meeting
                                                                                    </div>
                                                                                </a></div>
                                                                            <div class="fc-daygrid-event-harness"
                                                                                 style="margin-top: 0px;"><a
                                                                                        class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-today fc-event-info"
                                                                                        tabindex="0">
                                                                                    <div class="fc-daygrid-event-dot"></div>
                                                                                    <div class="fc-event-time">12p</div>
                                                                                    <div class="fc-event-title">Lunch
                                                                                    </div>
                                                                                </a></div>
                                                                            <div class="fc-daygrid-event-harness fc-daygrid-event-harness-abs"
                                                                                 style="visibility: hidden; top: 0px; left: 0px; right: 0px;">
                                                                                <a class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-today fc-event-warning"
                                                                                   tabindex="0">
                                                                                    <div class="fc-daygrid-event-dot"></div>
                                                                                    <div class="fc-event-time">2:30p
                                                                                    </div>
                                                                                    <div class="fc-event-title">
                                                                                        Meeting
                                                                                    </div>
                                                                                </a></div>
                                                                            <div class="fc-daygrid-event-harness fc-daygrid-event-harness-abs"
                                                                                 style="visibility: hidden; top: 0px; left: 0px; right: 0px;">
                                                                                <a class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-today fc-event-info"
                                                                                   tabindex="0">
                                                                                    <div class="fc-daygrid-event-dot"></div>
                                                                                    <div class="fc-event-time">5:30p
                                                                                    </div>
                                                                                    <div class="fc-event-title">Happy
                                                                                        Hour
                                                                                    </div>
                                                                                </a></div>
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"><a
                                                                                        class="fc-daygrid-more-link fc-more-link"
                                                                                        title="Show 2 more events"
                                                                                        aria-expanded="false"
                                                                                        aria-controls="" tabindex="0">+2
                                                                                    more</a></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-thu fc-day-future"
                                                                    data-date="2022-07-28" aria-labelledby="fc-dom-66">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-66"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to July 28, 2022"
                                                                                    data-navlink="" tabindex="0">28</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-event-harness"
                                                                                 style="margin-top: 0px;"><a
                                                                                        class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-future fc-event-solid-info fc-event-light"
                                                                                        tabindex="0">
                                                                                    <div class="fc-event-main">
                                                                                        <div class="fc-event-main-frame">
                                                                                            <div class="fc-event-title-container">
                                                                                                <div class="fc-event-title fc-sticky">
                                                                                                    Site visit
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="fc-event-resizer fc-event-resizer-end"></div>
                                                                                </a></div>
                                                                            <div class="fc-daygrid-event-harness"
                                                                                 style="margin-top: 0px;"><a
                                                                                        class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-future fc-event-primary"
                                                                                        tabindex="0">
                                                                                    <div class="fc-daygrid-event-dot"></div>
                                                                                    <div class="fc-event-time">12p</div>
                                                                                    <div class="fc-event-title">Birthday
                                                                                        Party
                                                                                    </div>
                                                                                </a></div>
                                                                            <div class="fc-daygrid-event-harness"
                                                                                 style="margin-top: 0px;"><a
                                                                                        class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-future fc-event-solid-danger fc-event-light"
                                                                                        tabindex="0">
                                                                                    <div class="fc-daygrid-event-dot"></div>
                                                                                    <div class="fc-event-time">6p</div>
                                                                                    <div class="fc-event-title">Dinner
                                                                                    </div>
                                                                                </a></div>
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-fri fc-day-future"
                                                                    data-date="2022-07-29" aria-labelledby="fc-dom-68">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-68"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to July 29, 2022"
                                                                                    data-navlink="" tabindex="0">29</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-sat fc-day-future"
                                                                    data-date="2022-07-30" aria-labelledby="fc-dom-70">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-70"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to July 30, 2022"
                                                                                    data-navlink="" tabindex="0">30</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr role="row">
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-sun fc-day-future"
                                                                    data-date="2022-07-31" aria-labelledby="fc-dom-72">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-72"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to July 31, 2022"
                                                                                    data-navlink="" tabindex="0">31</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-mon fc-day-future fc-day-other"
                                                                    data-date="2022-08-01" aria-labelledby="fc-dom-74">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-74"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to August 1, 2022"
                                                                                    data-navlink="" tabindex="0">1</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-tue fc-day-future fc-day-other"
                                                                    data-date="2022-08-02" aria-labelledby="fc-dom-76">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-76"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to August 2, 2022"
                                                                                    data-navlink="" tabindex="0">2</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-wed fc-day-future fc-day-other"
                                                                    data-date="2022-08-03" aria-labelledby="fc-dom-78">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-78"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to August 3, 2022"
                                                                                    data-navlink="" tabindex="0">3</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-thu fc-day-future fc-day-other"
                                                                    data-date="2022-08-04" aria-labelledby="fc-dom-80">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-80"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to August 4, 2022"
                                                                                    data-navlink="" tabindex="0">4</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-fri fc-day-future fc-day-other"
                                                                    data-date="2022-08-05" aria-labelledby="fc-dom-82">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-82"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to August 5, 2022"
                                                                                    data-navlink="" tabindex="0">5</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td role="gridcell"
                                                                    class="fc-daygrid-day fc-day fc-day-sat fc-day-future fc-day-other"
                                                                    data-date="2022-08-06" aria-labelledby="fc-dom-84">
                                                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                    id="fc-dom-84"
                                                                                    class="fc-daygrid-day-number"
                                                                                    title="Go to August 6, 2022"
                                                                                    data-navlink="" tabindex="0">6</a>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                 style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--end::Calendar-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
            <!--begin::Modals-->

            <!--begin::Modal - New Product-->
            <div class="modal fade" id="kt_modal_add_event" tabindex="-1" style="display: none;" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Form-->
                        <form class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#"
                              id="kt_modal_add_event_form">
                            <!--begin::Modal header-->
                            <div class="modal-header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bold" data-kt-calendar="title">Edit an Event</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-icon-primary" id="kt_modal_add_event_close">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                    <span class="svg-icon svg-icon-1">
																<svg width="24" height="24" viewBox="0 0 24 24"
                                                                     fill="none" xmlns="http://www.w3.org/2000/svg">
																	<rect opacity="0.5" x="6" y="17.3137" width="16"
                                                                          height="2" rx="1"
                                                                          transform="rotate(-45 6 17.3137)"
                                                                          fill="currentColor"></rect>
																	<rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                                          transform="rotate(45 7.41422 6)"
                                                                          fill="currentColor"></rect>
																</svg>
															</span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body py-10 px-lg-17">
                                <!--begin::Input group-->
                                <div class="fv-row mb-9 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold required mb-2">Event Name</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder=""
                                           name="calendar_event_name" value="">
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-9">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold mb-2">Event Description</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder=""
                                           name="calendar_event_description">
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-9">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold mb-2">Event Location</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder=""
                                           name="calendar_event_location">
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-9">
                                    <!--begin::Checkbox-->
                                    <label class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value=""
                                               id="kt_calendar_datepicker_allday">
                                        <span class="form-check-label fw-semibold" for="kt_calendar_datepicker_allday">All Day</span>
                                    </label>
                                    <!--end::Checkbox-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row row-cols-lg-2 g-10">
                                    <div class="col">
                                        <div class="fv-row mb-9 fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2 required">Event Start Date</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input class="form-control form-control-solid flatpickr-input"
                                                   name="calendar_event_start_date" placeholder="Pick a start date"
                                                   id="kt_calendar_datepicker_start_date" type="text"
                                                   readonly="readonly" value="">
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="col d-none" data-kt-calendar="datepicker">
                                        <div class="fv-row mb-9">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">Event Start Time</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input class="form-control form-control-solid flatpickr-input"
                                                   name="calendar_event_start_time" placeholder="Pick a start time"
                                                   id="kt_calendar_datepicker_start_time" type="text"
                                                   readonly="readonly">
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row row-cols-lg-2 g-10">
                                    <div class="col">
                                        <div class="fv-row mb-9 fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2 required">Event End Date</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input class="form-control form-control-solid flatpickr-input"
                                                   name="calendar_event_end_date" placeholder="Pick a end date"
                                                   id="kt_calendar_datepicker_end_date" type="text" readonly="readonly"
                                                   value="">
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="col d-none" data-kt-calendar="datepicker">
                                        <div class="fv-row mb-9">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">Event End Time</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input class="form-control form-control-solid flatpickr-input"
                                                   name="calendar_event_end_time" placeholder="Pick a end time"
                                                   id="kt_calendar_datepicker_end_time" type="text" readonly="readonly">
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Modal body-->
                            <!--begin::Modal footer-->
                            <div class="modal-footer flex-center">
                                <!--begin::Button-->
                                <button type="reset" id="kt_modal_add_event_cancel" class="btn btn-light me-3">Cancel
                                </button>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="button" id="kt_modal_add_event_submit" class="btn btn-primary">
                                    <span class="indicator-label">Submit</span>
                                    <span class="indicator-progress">Please wait...
															<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Button-->
                            </div>
                            <!--end::Modal footer-->
                            <div></div>
                        </form>
                        <!--end::Form-->
                    </div>
                </div>
            </div>
            <!--end::Modal - New Product-->
            <!--begin::Modal - New Product-->
            <div class="modal fade" id="kt_modal_view_event" tabindex="-1" style="display: none;" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Modal header-->
                        <div class="modal-header border-0 justify-content-end">
                            <!--begin::Edit-->
                            <div class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-primary me-2"
                                 data-bs-toggle="tooltip" data-bs-dismiss="click" id="kt_modal_view_event_edit"
                                 data-kt-initialized="1">
                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                <span class="svg-icon svg-icon-2">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
																<path opacity="0.3"
                                                                      d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                                      fill="currentColor"></path>
																<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                                      fill="currentColor"></path>
															</svg>
														</span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Edit-->
                            <!--begin::Edit-->
                            <div class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-danger me-2"
                                 data-bs-toggle="tooltip" data-bs-dismiss="click" id="kt_modal_view_event_delete"
                                 data-kt-initialized="1">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                <span class="svg-icon svg-icon-2">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
																<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                                      fill="currentColor"></path>
																<path opacity="0.5"
                                                                      d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                                      fill="currentColor"></path>
																<path opacity="0.5"
                                                                      d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                                      fill="currentColor"></path>
															</svg>
														</span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Edit-->
                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-color-gray-500 btn-active-icon-primary"
                                 data-bs-toggle="tooltip" data-bs-dismiss="modal" data-kt-initialized="1">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                <span class="svg-icon svg-icon-1">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
																<rect opacity="0.5" x="6" y="17.3137" width="16"
                                                                      height="2" rx="1"
                                                                      transform="rotate(-45 6 17.3137)"
                                                                      fill="currentColor"></rect>
																<rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                                      transform="rotate(45 7.41422 6)"
                                                                      fill="currentColor"></rect>
															</svg>
														</span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--end::Modal header-->
                        <!--begin::Modal body-->
                        <div class="modal-body pt-0 pb-20 px-lg-17">
                            <!--begin::Row-->
                            <div class="d-flex">
                                <!--begin::Icon-->
                                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                <span class="svg-icon svg-icon-1 svg-icon-muted me-5">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
																<path opacity="0.3"
                                                                      d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z"
                                                                      fill="currentColor"></path>
																<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z"
                                                                      fill="currentColor"></path>
																<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z"
                                                                      fill="currentColor"></path>
															</svg>
														</span>
                                <!--end::Svg Icon-->
                                <!--end::Icon-->
                                <div class="mb-9">
                                    <!--begin::Event name-->
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="fs-3 fw-bold me-3" data-kt-calendar="event_name">ICT Expo 2021 - Product Release</span>
                                        <span class="badge badge-light-success"
                                              data-kt-calendar="all_day">All Day</span>
                                    </div>
                                    <!--end::Event name-->
                                    <!--begin::Event description-->
                                    <div class="fs-6" data-kt-calendar="event_description">Lorem ipsum dolor sit tempor
                                        inci
                                    </div>
                                    <!--end::Event description-->
                                </div>
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Icon-->
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs050.svg-->
                                <span class="svg-icon svg-icon-1 svg-icon-success me-5">
															<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                                 height="24px" viewBox="0 0 24 24" version="1.1">
																<circle fill="currentColor" cx="12" cy="12"
                                                                        r="8"></circle>
															</svg>
														</span>
                                <!--end::Svg Icon-->
                                <!--end::Icon-->
                                <!--begin::Event start date/time-->
                                <div class="fs-6">
                                    <span class="fw-bold">Starts</span>
                                    <span data-kt-calendar="event_start_date">3rd Jul, 2022</span>
                                </div>
                                <!--end::Event start date/time-->
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="d-flex align-items-center mb-9">
                                <!--begin::Icon-->
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs050.svg-->
                                <span class="svg-icon svg-icon-1 svg-icon-danger me-5">
															<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                                 height="24px" viewBox="0 0 24 24" version="1.1">
																<circle fill="currentColor" cx="12" cy="12"
                                                                        r="8"></circle>
															</svg>
														</span>
                                <!--end::Svg Icon-->
                                <!--end::Icon-->
                                <!--begin::Event end date/time-->
                                <div class="fs-6">
                                    <span class="fw-bold">Ends</span>
                                    <span data-kt-calendar="event_end_date">5th Jul, 2022</span>
                                </div>
                                <!--end::Event end date/time-->
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="d-flex align-items-center">
                                <!--begin::Icon-->
                                <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                <span class="svg-icon svg-icon-1 svg-icon-muted me-5">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
																<path opacity="0.3"
                                                                      d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z"
                                                                      fill="currentColor"></path>
																<path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z"
                                                                      fill="currentColor"></path>
															</svg>
														</span>
                                <!--end::Svg Icon-->
                                <!--end::Icon-->
                                <!--begin::Event location-->
                                <div class="fs-6" data-kt-calendar="event_location">Melbourne Exhibition Hall</div>
                                <!--end::Event location-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Modal body-->
                    </div>
                </div>
            </div>
            <!--end::Modal - New Product-->
            <!--end::Modals-->
        </div>
        <!--end::Content container-->
    </div>
@endsection