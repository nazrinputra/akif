<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Akif Car Grooming Center</title>

    <link rel="icon" type="image/x-icon" href="/img/favicon.ico" />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    @routes
</head>

<body class="font-sans antialiased" style="overflow-x:hidden;">
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <span id="homeButton" class="js-scroll-trigger">
            </span>
            <span id="menuButton" class="navbar-toggler navbar-toggler-right" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"></span>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto js-scroll-trigger" id="navLinks">
                </ul>
            </div>
        </div>
    </nav>
    @inertia
</body>

<footer id="footer"></footer>

<div class="copyright py-4 text-center text-white" id="copyright">
</div>

@if(config('app.env') != 'production')
<div class="container">
    <div class="alert-warning fixed-bottom mb-0 alert alert-dismissible fade show text-center" role="alert">
        <strong>Hey there!</strong> This site is still under development. Some data are
        simulated.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif

</html>
