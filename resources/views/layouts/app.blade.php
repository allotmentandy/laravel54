<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel Demo') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/andy.css') }}" rel="stylesheet">

    <script defer src="https://use.fontawesome.com/releases/v5.0.2/js/all.js"></script>

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>

<div id="dropDownMenu" style="display: none">
    <div class="container">
        <h1>About Andy</h1>
        <img src="/images/andy.jpg">
        I am a UK national in my early 40's and have worked online and with computers for over 20 years.
        Recent work has focused on PHP, Laravel and front end web development
        I am interested in Aviation, Allotment Gardening
        Technology : php laravel css

        <i class="fab fa-vuejs fa-3x"></i>
        <i class="fab fa-github fa-3x"></i>
        <i class="fab fa-twitter fa-3x"></i>
        <i class="fab fa-youtube fa-3x"></i>
        <i class="fab fa-laravel fa-3x"></i>


    </div>
</div>

<div id="app">
    <nav class="navbar navbar-static-top navbar-inverse">
        <div class="container">

            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle " data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Andys') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">

                    <li><a href="{{ route('planes') }}"><button type="button" class="btn btn-primary btn-sm"> <i class="fas fa-plane fa-2x"></i> Private JETS</button></a></li>

                    <li><a href="{{ route('londinium') }}"><button type="button" class="btn btn-primary btn-sm"> <i class="fab fa-linode fa-2x"></i> Londinium</button></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><button type="button" class="btn btn-default btn-sm"> <i class="fas fa-cogs fa-2x"></i> Settings</button></a></li>
                    <li><a class="navbar-toggle button" id="toggleText" onclick="$('#dropDownMenu').toggle();">About Andy</a></li>
                </ul>
            </div>
        </div>
    </nav>
@yield('content')
</div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.2.1.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/jquery.bootstrap-growl.min.js') }}"></script>
    @yield('scripts')
</body>
</html>
