<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>{{ $title }}</title>

        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="/img/favicon.ico" />
        <!-- Google fonts-->
        <link rel="stylesheet" href="/css/google.fonts.css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="/css/styles.css" />
    </head>
    <body id="page-top">
        <x-navbar :stores="$stores" />

        {{ $slot }}

        <x-footer/>
        
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright © Akif Car Grooming Center 2021</small></div>
        </div>
        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
        <div class="scroll-to-top d-lg-none position-fixed">
            <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
        </div>
        
        <!-- Bootstrap core JS-->
        <script src="/js/jquery.min.js"></script>
        <script src="/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="/js/jquery.easing.min.js"></script>
        <!-- Font Awesome icons (free version)-->
        <script src="/js/font.awesome.all.js"></script>
        <!-- Core theme JS-->
        <script type="text/javascript" src="/js/scripts.js"></script>
    </body>
</html>
