<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Page Title</title>
    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->

    <link rel="stylesheet" href="{{ asset ('css/bootstrap.min.css') }}" media="all" />
    <link rel="stylesheet" href="{{ asset ('css/bootstrap.min.css.map') }}" media="all" />
    <link rel="stylesheet" href="{{ asset ('css/fontawesome.min.css') }}" media="all" />
    <link rel="stylesheet" href="{{ asset ('css/animate.css') }}" media="all" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />

    <!-- <link rel="stylesheet" href="{{ asset ('css/main.css') }}" /> -->
    <!-- <link rel="stylesheet" href="{{ asset ('css/dashboard.css') }}" /> -->
</head>

<body>
    <div class="row">
        <div class="col-12">
            <div id="app">
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                    <div class="container">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <!-- {{ config('app.name', 'Laravel') }} -->
                            Portfolio
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" 
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

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

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"  
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="col-12">
            @yield('content')
        </div>
    </div>




    <script src="{{ asset ( 'js/jquery-3.2.1.min.js') }} "></script>
    <script src="{{ asset ( 'js/popper.min.js') }} "></script>
    <script src="{{ asset ( 'js/bootstrap.min.js') }} "></script>
    <script src="{{ asset ( 'js/bootstrap.bundle.min.js') }} "></script>
    <script src="{{ asset ( 'js/fontawesome.min.js') }} "></script>
    <script src="{{ asset ( 'js/wow.min.js') }} "></script>
    <script>
        new WOW().init();
    </script>
</body>

</html>