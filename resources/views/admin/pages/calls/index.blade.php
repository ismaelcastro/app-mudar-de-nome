@extends('admin.layout.app')

@section('content')


<div class="row">
	<div class="col-sm-4">
		<div class="row">
			<div class="col-sm-6">
				<div class="card card-custom gutter-b bg-default" style="height:150px;">
					<div class="card-body">
						<span class="svg-icon svg-icon-3x svg-icon-dark-2">
							<!--begin::Svg Icon | path:/assets-adm/images/svgs/icons/Communication/Group.svg-->
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<polygon points="0 0 24 0 24 24 0 24"></polygon>
									<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
									<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
								</g>
							</svg>
							<!--end::Svg Icon-->
						</span>
						<div class="text-dark font-weight-bolder font-size-h2 mt-2">{{$qtd_calls_new}}</div>
						<a href="{{route('admin.calls.index',['status_call[]'=>'novo'])}}" class="text-gray72 text-hover-primary font-weight-bold font-size-lg mt-1">Novos</a>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="card card-custom bg-success gutter-b" style="height: 150px">
					<div class="card-body">
						<span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
							<!--begin::Svg Icon | path:/assets-adm/images/svgs/icons/Layout/Layout-4-blocks.svg-->
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24"></rect>
									<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"></rect>
									<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"></path>
								</g>
							</svg>
							<!--end::Svg Icon-->
						</span>
						<div class="text-inverse-success font-weight-bolder font-size-h2 mt-2">{{$qtd_calls_attempt}}</div>
						<a href="{{route('admin.calls.index',['status_call[]'=>'tentativa'])}}" class="text-inverse-success font-weight-bold font-size-lg mt-1">Abertos</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 py-4">
				<div class="card card-custom bg-light-warning card-stretch gutter-b">
					<!--begin::Body-->
					<div class="card-body my-4">
						<a href="#" class="card-title font-weight-bolder text-warning font-size-h6 mb-4 text-hover-state-dark d-block">Meta Mensal – Bônus de {{number_format($next_goal->bonus,2,',','.')}}</a>
						<div class="font-weight-bold text-muted font-size-sm">
						<span class="text-dark-75 font-weight-bolder font-size-h2 mr-2">{{$current_percent}}%</span>R$ {{number_format($remaining_goal,2,',','.')}} para alcançar próxima meta</div>
						<div class="progress progress-xs mt-7 bg-warning-o-60">
							<div class="progress-bar bg-warning" role="progressbar" style="width: {{$current_percent}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
					<!--end::Body-->
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="card card-custom gutter-b card-stretch">
			<!--begin::Header-->
			<div class="card-header border-0 pt-5">
				<div class="card-title font-weight-bolder">
					<div class="card-label">Progresso Comercial 
					<div class="font-size-sm text-muted mt-2">Estatística mensal de fechamentos</div></div>
				</div>
			</div>
			<!--end::Header-->
			<!--begin::Body-->
			<div class="card-body p-0 d-flex flex-column" style="position: relative;">
				<!--begin::Items-->
				<div class="flex-grow-1 card-spacer">
					<div class="row row-paddingless mb-10">
						<!--begin::Item-->
						<div class="col mb-2">
							<div class="d-flex align-items-center mr-2">
								<!--begin::Symbol-->
								<div class="symbol symbol-45 symbol-light-info mr-4 flex-shrink-0">
									<div class="symbol-label">
										<span class="svg-icon svg-icon-lg svg-icon-info">
											<!--begin::Svg Icon | path:/assets-adm/images/svgs/icons/Shopping/Cart3.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"/>
													<rect fill="#000000" opacity="0.3" x="7" y="4" width="10" height="4"/>
													<path d="M7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,20 C19,21.1045695 18.1045695,22 17,22 L7,22 C5.8954305,22 5,21.1045695 5,20 L5,4 C5,2.8954305 5.8954305,2 7,2 Z M8,12 C8.55228475,12 9,11.5522847 9,11 C9,10.4477153 8.55228475,10 8,10 C7.44771525,10 7,10.4477153 7,11 C7,11.5522847 7.44771525,12 8,12 Z M8,16 C8.55228475,16 9,15.5522847 9,15 C9,14.4477153 8.55228475,14 8,14 C7.44771525,14 7,14.4477153 7,15 C7,15.5522847 7.44771525,16 8,16 Z M12,12 C12.5522847,12 13,11.5522847 13,11 C13,10.4477153 12.5522847,10 12,10 C11.4477153,10 11,10.4477153 11,11 C11,11.5522847 11.4477153,12 12,12 Z M12,16 C12.5522847,16 13,15.5522847 13,15 C13,14.4477153 12.5522847,14 12,14 C11.4477153,14 11,14.4477153 11,15 C11,15.5522847 11.4477153,16 12,16 Z M16,12 C16.5522847,12 17,11.5522847 17,11 C17,10.4477153 16.5522847,10 16,10 C15.4477153,10 15,10.4477153 15,11 C15,11.5522847 15.4477153,12 16,12 Z M16,16 C16.5522847,16 17,15.5522847 17,15 C17,14.4477153 16.5522847,14 16,14 C15.4477153,14 15,14.4477153 15,15 C15,15.5522847 15.4477153,16 16,16 Z M16,20 C16.5522847,20 17,19.5522847 17,19 C17,18.4477153 16.5522847,18 16,18 C15.4477153,18 15,18.4477153 15,19 C15,19.5522847 15.4477153,20 16,20 Z M8,18 C7.44771525,18 7,18.4477153 7,19 C7,19.5522847 7.44771525,20 8,20 L12,20 C12.5522847,20 13,19.5522847 13,19 C13,18.4477153 12.5522847,18 12,18 L8,18 Z M7,4 L7,8 L17,8 L17,4 L7,4 Z" fill="#000000"/>
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</div>
								</div>
								<!--end::Symbol-->
								<!--begin::Title-->
								<div>
									<div class="font-size-h4 text-dark-75 font-weight-bolder">R$ {{number_format($total_honorary,2,',','.')}}</div>
									<div class="small text-muted font-weight-bold mt-1">Faturamento</div>
								</div>
								<!--end::Title-->
							</div>
						</div>
						<!--end::Item-->
						<!--begin::Item-->
						<div class="col mb-2">
							<div class="d-flex align-items-center mr-2">
								<!--begin::Symbol-->
								<div class="symbol symbol-45 symbol-light-danger mr-4 flex-shrink-0">
									<div class="symbol-label">
										<span class="svg-icon svg-icon-lg svg-icon-danger">
											<!--begin::Svg Icon | path:/assets-adm/images/svgs/icons/Home/Library.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24"/>
													<path d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
													<path d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero"/>
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</div>
								</div>
								<!--end::Symbol-->
								<!--begin::Title-->
								<div>
									<div class="font-size-h4 text-dark-75 font-weight-bolder">{{count($calls_signed)}}</div>
									<div class="small text-muted font-weight-bold mt-1">Contratos assinados</div>
								</div>
								<!--end::Title-->
							</div>
						</div>
						<!--end::Widget Item-->
					</div>
					<div class="row row-paddingless">
						<!--begin::Item-->
						<div class="col mb-2">
							<div class="d-flex align-items-center mr-2">
								<!--begin::Symbol-->
								<div class="symbol symbol-45 symbol-light-success mr-4 flex-shrink-0">
									<div class="symbol-label">
										<span class="svg-icon svg-icon-lg svg-icon-success">
											<!--begin::Svg Icon | path:/assets-adm/images/svgs/icons/Shopping/Cart3.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"/>
													<rect fill="#000000" opacity="0.3" x="11.5" y="2" width="2" height="4" rx="1"/>
													<rect fill="#000000" opacity="0.3" x="11.5" y="16" width="2" height="5" rx="1"/>
													<path d="M15.493,8.044 C15.2143319,7.68933156 14.8501689,7.40750104 14.4005,7.1985 C13.9508311,6.98949895 13.5170021,6.885 13.099,6.885 C12.8836656,6.885 12.6651678,6.90399981 12.4435,6.942 C12.2218322,6.98000019 12.0223342,7.05283279 11.845,7.1605 C11.6676658,7.2681672 11.5188339,7.40749914 11.3985,7.5785 C11.2781661,7.74950085 11.218,7.96799867 11.218,8.234 C11.218,8.46200114 11.2654995,8.65199924 11.3605,8.804 C11.4555005,8.95600076 11.5948324,9.08899943 11.7785,9.203 C11.9621676,9.31700057 12.1806654,9.42149952 12.434,9.5165 C12.6873346,9.61150047 12.9723317,9.70966616 13.289,9.811 C13.7450023,9.96300076 14.2199975,10.1308324 14.714,10.3145 C15.2080025,10.4981676 15.6576646,10.7419985 16.063,11.046 C16.4683354,11.3500015 16.8039987,11.7268311 17.07,12.1765 C17.3360013,12.6261689 17.469,13.1866633 17.469,13.858 C17.469,14.6306705 17.3265014,15.2988305 17.0415,15.8625 C16.7564986,16.4261695 16.3733357,16.8916648 15.892,17.259 C15.4106643,17.6263352 14.8596698,17.8986658 14.239,18.076 C13.6183302,18.2533342 12.97867,18.342 12.32,18.342 C11.3573285,18.342 10.4263378,18.1741683 9.527,17.8385 C8.62766217,17.5028317 7.88033631,17.0246698 7.285,16.404 L9.413,14.238 C9.74233498,14.6433354 10.176164,14.9821653 10.7145,15.2545 C11.252836,15.5268347 11.7879973,15.663 12.32,15.663 C12.5606679,15.663 12.7949989,15.6376669 13.023,15.587 C13.2510011,15.5363331 13.4504991,15.4540006 13.6215,15.34 C13.7925009,15.2259994 13.9286662,15.0740009 14.03,14.884 C14.1313338,14.693999 14.182,14.4660013 14.182,14.2 C14.182,13.9466654 14.1186673,13.7313342 13.992,13.554 C13.8653327,13.3766658 13.6848345,13.2151674 13.4505,13.0695 C13.2161655,12.9238326 12.9248351,12.7908339 12.5765,12.6705 C12.2281649,12.5501661 11.8323355,12.420334 11.389,12.281 C10.9583312,12.141666 10.5371687,11.9770009 10.1255,11.787 C9.71383127,11.596999 9.34650161,11.3531682 9.0235,11.0555 C8.70049838,10.7578318 8.44083431,10.3968355 8.2445,9.9725 C8.04816568,9.54816454 7.95,9.03200304 7.95,8.424 C7.95,7.67666293 8.10199848,7.03700266 8.406,6.505 C8.71000152,5.97299734 9.10899753,5.53600171 9.603,5.194 C10.0970025,4.85199829 10.6543302,4.60183412 11.275,4.4435 C11.8956698,4.28516587 12.5226635,4.206 13.156,4.206 C13.9160038,4.206 14.6918294,4.34533194 15.4835,4.624 C16.2751706,4.90266806 16.9686637,5.31433061 17.564,5.859 L15.493,8.044 Z" fill="#000000"/>
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</div>
								</div>
								<!--end::Symbol-->
								<!--begin::Title-->
								<div>
									<div class="font-size-h4 text-dark-75 font-weight-bolder">R$ {{number_format($current_goal->bonus,2,',','.')}}</div>
									<div class="small text-muted font-weight-bold mt-1">Bônus</div>
								</div>
								<!--end::Title-->
							</div>
						</div>
						<!--end::Item-->
						<!--begin::Item-->
						<div class="col mb-2">
							<div class="d-flex align-items-center mr-2">
								<!--begin::Symbol-->
								<div class="symbol symbol-45 symbol-light-primary mr-4 flex-shrink-0">
									<div class="symbol-label">
										<span class="svg-icon svg-icon-lg svg-icon-primary">
											<!--begin::Svg Icon | path:/assets-adm/images/svgs/icons/Shopping/Barcode-read.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"/>
													<path d="M16.0322024,5.68722152 L5.75790403,15.945742 C5.12139076,16.5812778 5.12059836,17.6124773 5.75613416,18.2489906 C5.75642891,18.2492858 5.75672377,18.2495809 5.75701875,18.2498759 L5.75701875,18.2498759 C6.39304347,18.8859006 7.42424328,18.8859006 8.060268,18.2498759 C8.06056298,18.2495809 8.06085784,18.2492858 8.0611526,18.2489906 L18.3196731,7.9746922 C18.9505124,7.34288268 18.9501191,6.31942463 18.3187946,5.68810005 L18.3187946,5.68810005 C17.68747,5.05677547 16.6640119,5.05638225 16.0322024,5.68722152 Z" fill="#000000" fill-rule="nonzero"/>
													<path d="M9.85714286,6.92857143 C9.85714286,8.54730513 8.5469533,9.85714286 6.93006028,9.85714286 C5.31316726,9.85714286 4,8.54730513 4,6.92857143 C4,5.30983773 5.31316726,4 6.93006028,4 C8.5469533,4 9.85714286,5.30983773 9.85714286,6.92857143 Z M20,17.0714286 C20,18.6901623 18.6898104,20 17.0729174,20 C15.4560244,20 14.1428571,18.6901623 14.1428571,17.0714286 C14.1428571,15.4497247 15.4560244,14.1428571 17.0729174,14.1428571 C18.6898104,14.1428571 20,15.4497247 20,17.0714286 Z" fill="#000000" opacity="0.3"/>
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</div>
								</div>
								<!--end::Symbol-->
								<!--begin::Title-->
								<div>
									<div class="font-size-h4 text-dark-75 font-weight-bolder">{{$qtd_conversion}}%</div>
									<div class="small text-muted font-weight-bold mt-1">Conversão</div>
								</div>
								<!--end::Title-->
							</div>
						</div>
						<!--end::Item-->
					</div>
				</div>
				<!--end::Items-->
				<!--begin::Chart-->
				<div id="kt_mixed_widget_17_chart" class="card-rounded-bottom" data-color="warning" style="height: 200px; min-height: 200px;">
					<div id="apexchartsw5wmrzow" class="apexcharts-canvas apexchartsw5wmrzow apexcharts-theme-light" style="width: 100%; height: 200px;">
						<svg id="SvgjsSvg2122" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
							<g id="SvgjsG2124" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)">
								<defs id="SvgjsDefs2123">
									<clipPath id="gridRectMaskw5wmrzow">
										<rect id="SvgjsRect2127" width="420" height="203" x="-3.5" y="-1.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
									</clipPath>
									<clipPath id="gridRectMarkerMaskw5wmrzow">
										<rect id="SvgjsRect2128" width="417" height="204" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
									</clipPath>
								</defs>
								<g id="SvgjsG2135" class="apexcharts-xaxis" transform="translate(0, 0)">
									<g id="SvgjsG2136" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g>
								</g>
								<g id="SvgjsG2144" class="apexcharts-grid">
									<g id="SvgjsG2145" class="apexcharts-gridlines-horizontal" style="display: none;">
										<line id="SvgjsLine2147" x1="0" y1="0" x2="413" y2="0" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
										<line id="SvgjsLine2148" x1="0" y1="20" x2="413" y2="20" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
										<line id="SvgjsLine2149" x1="0" y1="40" x2="413" y2="40" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
										<line id="SvgjsLine2150" x1="0" y1="60" x2="413" y2="60" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
										<line id="SvgjsLine2151" x1="0" y1="80" x2="413" y2="80" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
										<line id="SvgjsLine2152" x1="0" y1="100" x2="413" y2="100" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
										<line id="SvgjsLine2153" x1="0" y1="120" x2="413" y2="120" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
										<line id="SvgjsLine2154" x1="0" y1="140" x2="413" y2="140" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
										<line id="SvgjsLine2155" x1="0" y1="160" x2="413" y2="160" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
										<line id="SvgjsLine2156" x1="0" y1="180" x2="413" y2="180" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
										<line id="SvgjsLine2157" x1="0" y1="200" x2="413" y2="200" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
									</g>
									<g id="SvgjsG2146" class="apexcharts-gridlines-vertical" style="display: none;"></g>
									<line id="SvgjsLine2159" x1="0" y1="200" x2="413" y2="200" stroke="transparent" stroke-dasharray="0"></line>
									<line id="SvgjsLine2158" x1="0" y1="1" x2="0" y2="200" stroke="transparent" stroke-dasharray="0"></line>
								</g>
								<g id="SvgjsG2129" class="apexcharts-area-series apexcharts-plot-series">
									<g id="SvgjsG2130" class="apexcharts-series" seriesName="NetxProfit" data:longestSeries="true" rel="1" data:realIndex="0">
										<path id="SvgjsPath2133" d="M 0 200L 0 100C 28.91 100 53.69000000000001 116.66666666666666 82.60000000000001 116.66666666666666C 111.51 116.66666666666666 136.29000000000002 50 165.20000000000002 50C 194.11 50 218.89000000000001 100 247.8 100C 276.71000000000004 100 301.49 16.666666666666657 330.40000000000003 16.666666666666657C 359.31 16.666666666666657 384.09000000000003 16.666666666666657 413 16.666666666666657C 413 16.666666666666657 413 16.666666666666657 413 200M 413 16.666666666666657z" fill="rgba(255,244,222,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskw5wmrzow)" pathTo="M 0 200L 0 100C 28.91 100 53.69000000000001 116.66666666666666 82.60000000000001 116.66666666666666C 111.51 116.66666666666666 136.29000000000002 50 165.20000000000002 50C 194.11 50 218.89000000000001 100 247.8 100C 276.71000000000004 100 301.49 16.666666666666657 330.40000000000003 16.666666666666657C 359.31 16.666666666666657 384.09000000000003 16.666666666666657 413 16.666666666666657C 413 16.666666666666657 413 16.666666666666657 413 200M 413 16.666666666666657z" pathFrom="M -1 200L -1 200L 82.60000000000001 200L 165.20000000000002 200L 247.8 200L 330.40000000000003 200L 413 200"></path><path id="SvgjsPath2134" d="M 0 100C 28.91 100 53.69000000000001 116.66666666666666 82.60000000000001 116.66666666666666C 111.51 116.66666666666666 136.29000000000002 50 165.20000000000002 50C 194.11 50 218.89000000000001 100 247.8 100C 276.71000000000004 100 301.49 16.666666666666657 330.40000000000003 16.666666666666657C 359.31 16.666666666666657 384.09000000000003 16.666666666666657 413 16.666666666666657" fill="none" fill-opacity="1" stroke="#ffa800" stroke-opacity="1" stroke-linecap="butt" stroke-width="3" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskw5wmrzow)" pathTo="M 0 100C 28.91 100 53.69000000000001 116.66666666666666 82.60000000000001 116.66666666666666C 111.51 116.66666666666666 136.29000000000002 50 165.20000000000002 50C 194.11 50 218.89000000000001 100 247.8 100C 276.71000000000004 100 301.49 16.666666666666657 330.40000000000003 16.666666666666657C 359.31 16.666666666666657 384.09000000000003 16.666666666666657 413 16.666666666666657" pathFrom="M -1 200L -1 200L 82.60000000000001 200L 165.20000000000002 200L 247.8 200L 330.40000000000003 200L 413 200"></path>
										<g id="SvgjsG2131" class="apexcharts-series-markers-wrap" data:realIndex="0">
											<g class="apexcharts-series-markers">
												<circle id="SvgjsCircle2165" r="0" cx="0" cy="0" class="apexcharts-marker w7w9we2l3k no-pointer-events" stroke="#ffa800" fill="#fff4de" fill-opacity="1" stroke-width="3" stroke-opacity="0.9" default-marker-size="0"></circle>
											</g>
										</g>
									</g>
									<g id="SvgjsG2132" class="apexcharts-datalabels" data:realIndex="0"></g>
								</g>
								<line id="SvgjsLine2160" x1="0" y1="0" x2="413" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line>
								<line id="SvgjsLine2161" x1="0" y1="0" x2="413" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line>
								<g id="SvgjsG2162" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG2163" class="apexcharts-xaxis-annotations"></g>
								<g id="SvgjsG2164" class="apexcharts-point-annotations"></g>
							</g>
							<g id="SvgjsG2143" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
							<g id="SvgjsG2125" class="apexcharts-annotations"></g>
						</svg>
						<div class="apexcharts-legend" style="max-height: 100px;"></div>
						<div class="apexcharts-tooltip apexcharts-theme-light">
							<div class="apexcharts-tooltip-title" style="font-family: Poppins; font-size: 12px;"></div>
							<div class="apexcharts-tooltip-series-group" style="order: 1;">
								<span class="apexcharts-tooltip-marker" style="background-color: rgb(255, 244, 222);"></span>
								<div class="apexcharts-tooltip-text" style="font-family: Poppins; font-size: 12px;">
									<div class="apexcharts-tooltip-y-group">
										<span class="apexcharts-tooltip-text-label"></span>
										<span class="apexcharts-tooltip-text-value"></span>
									</div>
									<div class="apexcharts-tooltip-z-group">
										<span class="apexcharts-tooltip-text-z-label"></span>
										<span class="apexcharts-tooltip-text-z-value"></span>
									</div>
								</div>
							</div>
						</div>
						<div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light">
							<div class="apexcharts-xaxistooltip-text" style="font-family: Poppins; font-size: 12px;"></div>
						</div>
						<div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
							<div class="apexcharts-yaxistooltip-text"></div>
						</div>
					</div>
				</div>
				<!--end::Chart-->
			<div class="resize-triggers"><div class="expand-trigger"><div style="width: 414px; height: 446px;"></div></div><div class="contract-trigger"></div></div></div>
			<!--end::Body-->
		</div>
	</div>
	<div class="col-sm-4">
		<div class="card card-custom card-stretch gutter-b fs-13">
			<!--begin::Header-->
			<div class="card-header border-0 pt-5">
				<h3 class="card-title align-items-start flex-column">
					<span class="card-label font-weight-bolder text-dark">Últimos Fechamentos</span>
					<span class="text-muted mt-3 font-weight-bold font-size-sm fs-13">{{count($calls_signed)}} contratos assinados no mês</span>
				</h3>
				<div class="card-toolbar">
					<ul class="nav nav-pills nav-pills-sm nav-dark-75">
						<li class="nav-item">
							<a class="nav-link py-2 px-4" data-toggle="tab" href="#kt_tab_pane_6_1">Mês</a>
						</li>
						<li class="nav-item">
							<a class="nav-link py-2 px-4" data-toggle="tab" href="#kt_tab_pane_6_2">Semana</a>
						</li>
						<li class="nav-item">
							<a class="nav-link py-2 px-4 active" data-toggle="tab" href="#kt_tab_pane_6_3">Dia</a>
						</li>
					</ul>
				</div>
			</div>
			<!--end::Header-->
			<!--begin::Body-->
			<div class="card-body pt-2 pb-0 mt-n3">
				<div class="tab-content mt-5" id="myTabTables6">
					<!--begin::Tap pane-->
					<div class="tab-pane fade" id="kt_tab_pane_6_1" role="tabpanel" aria-labelledby="kt_tab_pane_6_1">
						<!--begin::Table-->
						<div class="table-responsive">
							<table class="table table-borderless table-vertical-center">
								<thead>
									<tr>
										<th class="p-0 w-50px"></th>
										<th class="p-0 min-w-170px"></th>
										<th class="p-0 min-w-150px"></th>
										<th class="p-0 min-w-70px"></th>
										<th class="p-0 min-w-50px"></th>
									</tr>
								</thead>
								<tbody>
									@foreach ($calls_signed as $call)
									@php
										$client_name = $call->client->first_name;
										$client_name = strlen($client_name) >= 13 ? substr($client_name,0,13).'...' : $client_name;
									@endphp
									<tr>
										<td class="pl-0">
											<div class="symbol symbol-50 symbol-light">
												<span class="symbol-label"> 
													@if($call->paymentform == 'gerencianet')
														<img src="/assets-adm/images/ico-gerencianet.png" class="align-self-center" alt="{{$call->paymentform}}" width="100%">
													@elseif($call->paymentform == 'adexitum')
														<img src="/assets-adm/images/ico-adexitum.png" class="align-self-center" alt="{{$call->paymentform}}" width="100%">
													@else
														<img src="/assets-adm/images/ico-deposito.png" class="align-self-center" alt="{{$call->paymentform}}" width="100%">
													@endif
													
												</span>
											</div>
										</td>
										<td class="pl-0">
											<a href="{{ route('admin.calls.show', ['call' => $call->id]) }}" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg text-uppercase">{{$client_name}}</a>
											<span class="text-muted font-weight-bold d-block">{{$call->client->job}}</span>
										</td>
										<td></td>
										<td class="text-right">
											<span class="text-muted font-weight-bold d-block font-size-sm">
												R$ {{ number_format($call->call_honorary()->sum('amount'), 2, ',', '.') }}
											</span>
											
										</td>
										<td class="text-right pr-0">
											<a href="{{ route('admin.calls.show', ['call' => $call->id]) }}" class="btn btn-icon btn-light btn-sm">
												<span class="svg-icon svg-icon-md svg-icon-success">
													<!--begin::Svg Icon | path:/assets-adm/images/svgs/icons/Navigation/Arrow-right.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<polygon points="0 0 24 0 24 24 0 24"></polygon>
															<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
															<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>
											</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<!--end::Table-->
					</div>
					<!--end::Tap pane-->
					<!--begin::Tap pane-->
					<div class="tab-pane fade" id="kt_tab_pane_6_2" role="tabpanel" aria-labelledby="kt_tab_pane_6_2">
						<!--begin::Table-->
						<div class="table-responsive">
							<table class="table table-borderless table-vertical-center">
								<thead>
									<tr>
										<th class="p-0 w-50px"></th>
										<th class="p-0 min-w-150px"></th>
										<th class="p-0 min-w-120px"></th>
										<th class="p-0 min-w-70px"></th>
										<th class="p-0 min-w-70px"></th>
										<th class="p-0 min-w-50px"></th>
									</tr>
								</thead>
								<tbody>
									@foreach ($calls_signed_week as $call)
									@php
										$client_name = $call->client->first_name;
										$client_name = strlen($client_name) >= 13 ? substr($client_name,0,13).'...' : $client_name;
									@endphp
									<tr>
										<td class="pl-0">
											<div class="symbol symbol-50 symbol-light">
												<span class="symbol-label"> 
													@if($call->paymentform == 'gerencianet')
														<img src="/assets-adm/images/ico-gerencianet.png" class="align-self-center" alt="{{$call->paymentform}}" width="100%">
													@elseif($call->paymentform == 'adexitum')
														<img src="/assets-adm/images/ico-adexitum.png" class="align-self-center" alt="{{$call->paymentform}}" width="100%">
													@else
														<img src="/assets-adm/images/ico-deposito.png" class="align-self-center" alt="{{$call->paymentform}}" width="100%">
													@endif
													
												</span>
											</div>
										</td>
										<td class="pl-0">
											<a href="{{ route('admin.calls.show', ['call' => $call->id]) }}" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg text-uppercase">{{$client_name}}</a>
											<span class="text-muted font-weight-bold d-block">{{$call->client->job}}</span>
										</td>
										<td></td>
										<td class="text-right">
											<span class="text-muted font-weight-bold d-block font-size-sm">
												R$ {{ number_format($call->call_honorary()->sum('amount'), 2, ',', '.') }}
											</span>
										</td>
										<td class="text-right pr-0">
											<a href="{{ route('admin.calls.show', ['call' => $call->id]) }}" class="btn btn-icon btn-light btn-sm">
												<span class="svg-icon svg-icon-md svg-icon-success">
													<!--begin::Svg Icon | path:/assets-adm/images/svgs/icons/Navigation/Arrow-right.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<polygon points="0 0 24 0 24 24 0 24"></polygon>
															<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
															<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>
											</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<!--end::Table-->
					</div>
					<!--end::Tap pane-->
					<!--begin::Tap pane-->
					<div class="tab-pane fade show active" id="kt_tab_pane_6_3" role="tabpanel" aria-labelledby="kt_tab_pane_6_3">
						<!--begin::Table-->
						<div class="table-responsive">
							<table class="table table-borderless table-vertical-center">
								<thead>
									<tr>
										<th class="p-0 w-50px"></th>
										<th class="p-0 min-w-150px"></th>
										<th class="p-0 min-w-120px"></th>
										<th class="p-0 min-w-70px"></th>
										<th class="p-0 min-w-70px"></th>
										<th class="p-0 min-w-50px"></th>
									</tr>
								</thead>
								<tbody>
									@foreach ($calls_signed_day as $call)
									@php
										$client_name = $call->client->first_name;
										$client_name = strlen($client_name) >= 13 ? substr($client_name,0,13).'...' : $client_name;
									@endphp
									<tr>
										<td class="pl-0">
											<div class="symbol symbol-50 symbol-light">
												<span class="symbol-label"> 
													@if($call->paymentform == 'gerencianet')
														<img src="/assets-adm/images/ico-gerencianet.png" class="align-self-center" alt="{{$call->paymentform}}" width="100%">
													@elseif($call->paymentform == 'adexitum')
														<img src="/assets-adm/images/ico-adexitum.png" class="align-self-center" alt="{{$call->paymentform}}" width="100%">
													@else
														<img src="/assets-adm/images/ico-deposito.png" class="align-self-center" alt="{{$call->paymentform}}" width="100%">
													@endif
													
												</span>
											</div>
										</td>
										<td class="pl-0">
											<a href="{{ route('admin.calls.show', ['call' => $call->id]) }}" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg text-uppercase">{{$client_name}}</a>
											<span class="text-muted font-weight-bold d-block">{{$call->client->job}}</span>
										</td>
										<td></td>
										<td class="text-right">
											<span class="text-muted font-weight-bold d-block font-size-sm">
												R$ {{ number_format($call->call_honorary()->sum('amount'), 2, ',', '.') }}
											</span>
										</td>
										<td class="text-right pr-0">
											<a href="{{ route('admin.calls.show', ['call' => $call->id]) }}" class="btn btn-icon btn-light btn-sm">
												<span class="svg-icon svg-icon-md svg-icon-success">
													<!--begin::Svg Icon | path:/assets-adm/images/svgs/icons/Navigation/Arrow-right.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<polygon points="0 0 24 0 24 24 0 24"></polygon>
															<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
															<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>
											</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<!--end::Table-->
					</div>
					<!--end::Tap pane-->
				</div>
			</div>
			<!--end::Body-->
		</div>
	</div>
</div>


<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
        <h1 class="h3 mb-0 text-gray-800">Atendimentos</h1>
        @can('create_calls')
        <a href="{{ route('admin.calls.create') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm">
            ADICIONAR
        </a>
        @endcan
    </div>
</div>

@include('admin.pages.calls._filter')

<div class="list-info-page">
    @if($calls instanceof \Illuminate\Pagination\LengthAwarePaginator )
        <p>Mostrando de {{ $calls->appends($dataForm)->firstItem() }} até {{ $calls->appends($dataForm)->lastItem() }} registros de um total de {{ $calls->appends($dataForm)->total() }}</p>
    @endif
</div>

<div class="card-border-primary">
    <div class="card-block">
    @forelse( $calls as $call )
        @include('admin.pages.calls._list')
    @empty
        <div class="card-header">
            <h5>Nenhum Resultado! </h5>               
        </div>
    @endforelse
    </div>
</div>

@if($calls instanceof \Illuminate\Pagination\LengthAwarePaginator )
    {{$calls->appends($dataForm)->links()}}
@endif

<form method="POST" id="form-star" >{!! csrf_field() !!} <input type="hidden" name="stars" id="starsChange"> </form>
<form method="POST" id="form-action" >{!! csrf_field() !!} <input type="hidden" name="caseaction" id="caseaction"> </form>
<form method="POST" id="form-changetype" >{!! csrf_field() !!} <input type="hidden" name="changetype_id" id="changetype_id"> </form>
<form method="POST" id="form-reason" >{!! csrf_field() !!} <input type="hidden" name="reason_id" id="reason_id"> </form>
@endsection