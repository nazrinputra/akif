<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title-->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}" />

    <!-- Google fonts-->
    <link rel="stylesheet" href="{{ asset('css/google.fonts.css') }}" />

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="{{ url('/') }}"><img class="img-thumbnail"
                        src="/img/logo-navbar.png" alt="Akif" /></a>
                <button
                    class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded"
                    type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item  mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/tambak-bugis">Tambak
                                Bugis</a>
                        </li>
                        <li class="nav-item  mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/bukit-katil">Bukit
                                Katil</a>
                        </li>
                        <li class="nav-item  mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/counter">Counter</a>
                        </li>
                        @guest
                        <li class="nav-item  mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                                href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @else
                        <li class="nav-item  mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="pt-5">
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap core JS-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <!-- Third party plugin JS-->
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>

    <!-- Font Awesome icons (free version)-->
    <script src="{{ asset('js/font.awesome.all.js') }}"></script>

    <!-- Core theme JS-->
    <script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>

</body>

<!-- Footer section-->
<footer class="footer text-center">
    <div class="container">
        <div class="row">
            <!-- Footer Social Icons-->
            <div class="col-lg mb-lg-0">
                <h4 class="text-uppercase">Contact Us</h4>
                <a class="btn btn-outline-light btn-social mx-1" href="https://www.facebook.com/akifcarwash/">
                    <i class="fab fa-fw fa-facebook-f"></i>
                </a>
                <a class="btn btn-outline-light btn-social mx-1" href="https://api.whatsapp.com/send?phone=60136541240">
                    <i class="fab fa-fw fa-whatsapp"></i>
                </a>
            </div>
        </div>
    </div>
</footer>

<!-- Copyright Section-->
<div class="copyright py-4 text-center text-white">
    <div class="container"><small>Copyright © Akif Car Grooming Center 2021</small></div>
</div>
<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
<div class="scroll-to-top d-lg-none position-fixed">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i
            class="fa fa-chevron-up"></i></a>
</div>

</html>