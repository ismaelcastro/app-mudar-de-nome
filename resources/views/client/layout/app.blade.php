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
                        <div class="container position-relative">
                            <img src="{{asset('assets-client/images/logo.png')}}" class="logo" alt="Ratsbone Magri" height="70" />
                            <a href="javascript:void(0);" class="btn-sair" onclick="document.getElementById('panel-logout').submit();">
                                Sair
                                <img src="{{asset('assets-client/images/icones/exit.png')}}" alt="Sair" /> 
                            </a>
                        </div>                        
					</header>

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
            @stack('scripts2')

	</body>
</html>