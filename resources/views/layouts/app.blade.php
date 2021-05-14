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
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico" />

    <!-- Mix CSS-->
    <link rel="stylesheet" href="{{mix ('css/app.css')}}">
</head>

<body>
    <div id="app">
        <x-navbar />

        <main class="pt-5">
            @yield('content')
        </main>
    </div>

    <!-- Mix JS-->
    <script src="{{mix ('js/app.js')}}"></script>

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

{{-- FIXME remove after finish development --}}
<x-alert class="alert-info fixed-bottom mb-0">
    <strong>Hey there!</strong> This site is still under development. Any data you see here is not real.
</x-alert>

</html>