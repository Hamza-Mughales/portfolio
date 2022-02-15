<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset ('css/bootstrap.min.css') }}" media="all" />
    <link rel="stylesheet" href="{{ asset ('css/bootstrap.min.css.map') }}" media="all" />
    <link rel="stylesheet" href="{{ asset ('css/fontawesome.min.css') }}" media="all" />
    <link rel="stylesheet" href="{{ asset ('css/animate.css') }}" media="all" />
    <!-- <link rel="stylesheet" href="{{ asset ('css/main.css') }}" /> -->
    <link rel="stylesheet" href="{{ asset ('css/dashboard.css') }}" />
</head>

<body>
    <div class="contianer">

        <!-- Logout Button -->
        <div class="logout">
            <a class=" btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>

        <!-- Side Menu -->
        <section class="side-menu">
            <div class="navbar-brand">
                <a href="{{ route('admin') }}">
                    <h3>Dashboard</h3>
                </a>
            </div>
            <ul class="navbar-nav mr-auto">
                <li><a href="{{ route('navbar') }}">Navbar</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('skills') }}">Skills</a></li>
                <li><a href="{{ route('projects') }}">Projects</a></li>
            </ul>
            </li>
        </section>

        <!-- Main Content  -->
        <section class="dash-content">
            <div class="container">
                <div class="row">

                    @yield('content')

                </div>
            </div>
        </section>
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