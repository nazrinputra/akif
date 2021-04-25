<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Akif - Auto Detailing Service</title>

        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="/css/styles.css">
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Akif Car Wash</a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#stores">Stores</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">About</a></li>
                        @if (Route::has('login'))
                            @auth
                                <li class="nav-item mx-0 mx-lg-1 hidden"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ url('/dashboard') }}">Dashboard</a></li>
                            @else
                                <li class="nav-item mx-0 mx-lg-1 hidden"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ route('login') }}">Log in</a></li>
                            @if (Route::has('register'))
                                <li class="nav-item mx-0 mx-lg-1 hidden"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ route('register') }}">Register</a></li>
                            @endif
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar" src="assets/img/akif.png" alt="" />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">Auto Detailing Service</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">Washing - Cleaning - Grooming</p>
            </div>
        </header>
        <!-- Store Section-->
        <section class="page-section bg-primary store" id="stores">
            <div class="container">
                <!-- Store Section Heading-->
                <h2 class="page-section-heading text-center text-white text-uppercase mb-0">Stores</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Store Grid Items-->
                <div class="row justify-content-center">
                    <!-- Store Item 1-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <a href="/store-one" target="_blank">
                            <div class="store-item mx-auto">
                                <div class="store-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                    <div class="store-item-caption-content text-center text-white"><i class="fas fa-external-link-alt fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/store/cabin.png" alt="" />
                            </div>
                        </a>
                    </div>
                    <!-- Store Item 2-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <a href="/store-two" target="_blank">
                            <div class="store-item mx-auto">
                                <div class="store-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                    <div class="store-item-caption-content text-center text-white"><i class="fas fa-external-link-alt fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/store/circus.png" alt="" />
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Section-->
        <section class="page-section mb-0" id="about">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase">About</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <div class="col ml-auto text-center">
                        <p class="lead">Akif Car Wash are committed to ensuring the external and internal cleaning of your vehicle.</p>
                        <p class="lead">Give us your trust , and we will give you satisfaction!</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Location</h4>
                        <a href="https://www.google.com/maps/dir/?api=1&destination=2.2292139767895%2C102.30516583928" class="text-white">
                            <p class="lead mb-0">
                                Lot 3589, Jalan Tun Kudu,
                                <br />
                                75400 Bukit Katil, Malacca
                            </p>
                        </a>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Contact Us</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://www.facebook.com/akifcarwash/"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://api.whatsapp.com/send?phone=60136541240"><i class="fab fa-fw fa-whatsapp"></i></a>
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4">About Us</h4>
                        <p class="lead mb-0">
                            Akif Car Wash are committed to ensuring the external and internal cleaning of your vehicle.
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright © Akif Car Wash 2021</small></div>
        </div>
        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
        <div class="scroll-to-top d-lg-none position-fixed">
            <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Core theme JS-->
        <script type="text/javascript" src="js/scripts.js"></script>
    </body>
</html>
