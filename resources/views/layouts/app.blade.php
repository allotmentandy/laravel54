<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Andy Demo') }}</title>

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
        Hi, i am Andy, a Londoner in my early 40's and have worked online for over 20 years.
        Recent work has focused on PHP, Laravel <i class="fab fa-laravel fa-3x"></i> and front end web development
        I am interested in Aviation, Allotment Gardening and lots of technology : php laravel css
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

                    <li><a href="{{ route('vue') }}"><button class="btn btn-primary btn-sm"><i class="fab fa-vuejs fa-2x"></i>Vue.js</button></li></a>

                    <li><a href="{{ route('rss') }}"><button class="btn btn-primary btn-sm"><i class="fas fa-rss fa-2x"></i>RSS</button></li></a>

                    <li><a href="{{ route('jquery') }}"><button class="btn btn-primary btn-sm"><i class="fab fa-node-js fa-2x"></i>Jquery</button></li></a>

<!--                     <li><a href="{{ route('cssE') }}"><button class="btn btn-primary btn-sm"><i class="fab fa-css3"></i>css</button></li></a>
 -->
                </ul>


                <ul class="nav navbar-nav navbar-right">
                    <li><a class="navbar-toggle btn btn-default btn-sm" id="toggleText" onclick="$('#dropDownMenu').toggle();">About Andy</a></li>

                    <li><a href="#"><button type="button" class="btn btn-default btn-sm"> <i class="fas fa-cogs fa-2x"></i></button></a></li>

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
