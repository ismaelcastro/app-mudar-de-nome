<!DOCTYPE HTML>
<html>
	<head>
		<title>Painel do Cliente</title>
		<meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link href="{{ asset('assets-client/css/app.css') }}?v=2" rel="stylesheet">
        <link rel="icon" type="image/png" href="{{ asset('assets-client/images/favicon.png') }}">
		<noscript>
            <style>
                body.is-preload #header.alt > * {
                    opacity: 1;
                }
                body.is-preload #header.alt .logo {
                    -moz-transform: none;
                    -webkit-transform: none;
                    -ms-transform: none;
                    transform: none;
                }
            </style>
        </noscript>
	</head>
	<body class="@yield('class_body') is-preload">

        <div id="page-preloader" class="visible">
            <div class="preloader">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                </div>
            </div>
        </div>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
                        {{ Form::open(['route' => 'client.login.logout','id' => 'panel-logout','class'=>'d-none' ]) }}
                        {{ Form::close() }}
                        <div class="container text-center position-relative">
                            <a href="javascript:void(0);" class="btn-user js-show-sidebar">
                                <img src="{{asset('assets-client/images/icones/user-menu.png')}}" alt="{{auth('client')->user()->name}}" /> 
                                <span>{{auth('client')->user()->name}}</span> <i class="fa fa-caret-down"></i>
                            </a>

                            <img src="{{asset('assets-client/images/logo.png')}}" class="logo" alt="Ratsbone Magri" height="74" />
                            <a href="javascript:void(0);" class="btn-sair" onclick="document.getElementById('panel-logout').submit();">
                                <span>Sair</span>
                                <img src="{{asset('assets-client/images/icones/exit.png')}}" alt="Sair" /> 
                            </a>
                        </div>                        
					</header>
                    @include('client.partials._sidebar')
				<!-- Main -->
					<div id="main">

                    <!-- Content -->
                        <section id="content" class="main">                            
                            @yield('content')                            
                        </section>

					</div>

				<!-- Footer -->
                <footer id="footer text-center">
                    <section class="text-center pb-10">
                        <img src="{{asset('assets-client/images/ssl.jpg')}}" alt="Ambiente Seguro" height="30" />
                    </section>						
                </footer>
               
                @yield('step')

			</div>

        <!-- Scripts -->
            
            <script src="{{ asset('assets-client/js/scripts.js') }}"></script>
            
            @include('global.alert-flash')
            @yield('scriptjs')
            

            <div class="modal fade" id="lockInitialModal" tabindex="-1" role="dialog" aria-labelledby="lockInitialModalTitle" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="p-t-40 p-b-40 p-l-40 p-r-40 text-center">
                                <img src="{{asset('assets-client/images/icones/time.png')}}" width="200" alt="">
                                <h2 class="p-b-15">Olá {{auth('client')->user()->first_name}}!<br /> Suas informações estão em análise.</h2>
                                <p>
                                    Os dados enviados para abertura do caso já estão com nossa equipe jurídica. Agora é só esperar, em breve entraremos em contato por e-mail solicitando os documentos.
                                </p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="lockCertidaoModal" tabindex="-1" role="dialog" aria-labelledby="lockInitialModalTitle" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="p-t-40 p-b-40 p-l-40 p-r-40 text-center">
                                <img src="{{asset('assets-client/images/icones/time.png')}}" width="200" alt="">
                                <h2 class="p-b-15">Olá {{auth('client')->user()->first_name}}!<br /> Os documentos enviados estão em análise.</h2>
                                <p>
                                    Os documentos enviados já estão com nossa equipe de especialistas. Agora é só esperar, em breve entraremos em contato por e-mail.
                                </p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="lockCustasInicialModal" tabindex="-1" role="dialog" aria-labelledby="lockCustasInicialModalTitle" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="p-t-40 p-b-40 p-l-40 p-r-40 text-center">
                                <h2 class="p-b-15">Comprovante das Guias de Custas<br /> enviados com sucesso!</h2>
                                <img src="{{asset('assets-client/icones/success.svg')}}" width="200" alt="">                                
                                <h4>
                                    Após análise dos Comprovantes enviados, seu caso será encaminhado para fase final de elaboração.
                                </h4>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

    </body>
    @stack('scriptjs2')
</html>