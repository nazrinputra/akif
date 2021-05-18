<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    @routes
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="/"><img class="img-thumbnail" src="/img/logo-navbar.png"
                    alt="Akif" /></a>
            <button
                class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded"
                type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-store-alt"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item  mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                            href="{{ route('store', 'tambak-bugis') }}">Tambak
                            Bugis</a>
                    </li>
                    <li class="nav-item  mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                            href="{{ route('store', 'bukit-katil') }}">Bukit
                            Katil</a>
                    </li>
                    <li class="nav-item  mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#">Promotions</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="masthead">
        @inertia
    </section>
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
    <div class="container"><small>Copyright © <a href="{{ route('login') }}" class="text-primary">Akif Car Grooming
                Center</a> 2021</small></div>
</div>

@if(config('app.env') != 'production')
<div class="container">
    <div class="alert-warning fixed-bottom mb-0 alert alert-dismissible fade show text-center" role="alert">
        <strong>Hey there!</strong> This site is still under development. Some data are simulated.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif

</html>