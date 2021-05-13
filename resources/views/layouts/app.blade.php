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
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
</head>

<body>
    <div id="app">
        <x-navbar />

        <main class="pt-5">
            {{-- FIXME remove after finish development --}}
            <x-alert class="alert-info">
                <strong>Hey there!</strong> This site is still under development. Any data you see here is not real.
            </x-alert>

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
    <div class="container"><small>Copyright © <a href="/login" class="text-primary">Akif Car Grooming Center</a>
            2021</small></div>
</div>
<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
<div class="scroll-to-top d-lg-none position-fixed">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i
            class="fa fa-chevron-up"></i></a>
</div>

</html>