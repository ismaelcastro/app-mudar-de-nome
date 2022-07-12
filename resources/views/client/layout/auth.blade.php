<!DOCTYPE HTML>
<html>
	<head>
		<title>Painel do Cliente</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link href="{{ asset('assets-client/css/app.css') }}" rel="stylesheet">
        <link rel="icon" type="image/png" href="{{ asset('assets-client/images/favicon.png') }}">
        <script src='https://www.google.com/recaptcha/api.js'></script>
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

		<!-- Wrapper -->
			<div id="wrapper-login">

				<!-- Header -->
					<header id="header">
                        <div class="container text-center">
                            <img src="{{asset('assets-client/images/logo.png')}}" class="logo" alt="Ratsbone Magri" height="70" />
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
            <script src="{{ asset('assets-client/js/scripts.js') }}" defer></script>
            
            @include('global.alert-flash')
            @yield('scriptjs')

	</body>
</html>