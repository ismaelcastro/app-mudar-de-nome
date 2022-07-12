<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('assets-adm/js/app.js') }}" ></script>
    <script src="{{ asset('assets-adm/js/scripts.js') }}" ></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets-adm/css/app.css') }}?v=2" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="/favicon.png">
    @yield('stylecss')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-dark2 shadow-sm">            
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('assets-adm/images/logo.png') }}" alt="RatsboneMagri" width="170">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-5 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <select id="select_search"></select>
                </div>
            </form>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span data-toggle="tooltip" data-placement="bottom" title="Adicionar">
                                    <i class="fa fa-plus fa-lg"></i>
                                </span>                                
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">
                                    Processo manual
                                </a>
                                <a class="dropdown-item" href="#">
                                    Caso
                                </a>
                                <a class="dropdown-item" href="#">
                                    Atendimento
                                </a>
                                <span class="css-divider"></span>
                                <a class="dropdown-item" href="#">
                                    Tarefas
                                </a>
                                <a class="dropdown-item" href="#">
                                    Eventos
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    Sair
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
            
        </nav>

        <div id="wrapper">

            <div class="sidebar sidebar-dark">
                @include('admin.partials._menu-left')
            </div>

            <div id="content-wrapper" class="d-flex flex-column">
                <main id="content">
                    @yield('content')
                </main>
            </div>            
        </div>
        
    </div>


    <au-loading show="$ctrl.loading" label="Carregando..." overlay="local" class="ng-isolate-scope" >
        <div class="au-loading au-loading--overlay-local">
            <div class="au-loading__wraper">
                <div class="au-loading__spin">
                    <svg class="au-loading__spin__svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 78.5 78.5">
                    <path class="au-loading__fill-1" d="M39.25 5V0A39.25 39.25 0 0 0 0 39.25h5A34.29 34.29 0 0 1 39.25 5"></path>
                    <path class="au-loading__fill-2" d="M39.25 0v5A34.25 34.25 0 1 1 5 39.25H0A39.25 39.25 0 1 0 39.25 0z"></path>
                    </svg>
                </div>
                <div class="au-loading__label ng-binding ng-scope" >
                    Carregando...
                </div>
            </div>
        </div>
    </au-loading>

    @include('global.alert-flash')
    @yield('scriptjs')
    @stack('scripts')
  
   <script>
       $(document).ready(function(){
        
        $('#select_search').select2({
            placeholder: "Pesquisar",
            minimumInputLength: 3,
            ajax: {
                url: '/manager-setup/search_json',
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                }
            }
        });
        $('#select_search').on('select2:select', function (e) {
            var data = e.params.data;
            location.href= '/manager-setup/clients/'+data.id;
        });
    });
   </script>
</body>
</html>
