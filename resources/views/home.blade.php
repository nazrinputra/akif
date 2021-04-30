<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Akif - Car Grooming Center</title>

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
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Akif Car Grooming Center</a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#services">Services</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#stores">Stores</a></li>
                        {{-- @if (Route::has('login'))
                            @auth
                                <li class="nav-item mx-0 mx-lg-1 hidden"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ url('/dashboard') }}">Dashboard</a></li>
                            @else
                                <li class="nav-item mx-0 mx-lg-1 hidden"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ route('login') }}">Log in</a></li>
                            @if (Route::has('register'))
                                <li class="nav-item mx-0 mx-lg-1 hidden"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ route('register') }}">Register</a></li>
                            @endif
                            @endauth
                        @endif --}}
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead text-center mb-5">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar py-4" src="assets/img/logo.png" alt="" />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">Car Grooming Center</h1>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">Akif Car Grooming Center are committed to ensuring the external and internal cleaning of your vehicle.</p>
                <p class="masthead-subheading font-weight-light mb-0">Give us your trust, and we will give you satisfaction!</p>
            </div>
        </header>
        <!-- Services Section-->
        <section class="page-section bg-primary store" id="services">
            <div class="container">
                <!-- Services Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase mb-4">Services</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Service Items-->
                <div class="row justify-content-center">
                    <!-- Service Item 1-->
                    <div class="col-md-6 col-lg-3">
                        <div class="store-item mx-auto">
                            <div class="store-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="service-item-caption-content text-white">
                                    <ul>
                                        <li>VIP wash</li>
                                        <li>Signature wash</li>
                                        <li>Maintenance wash</li>
                                    </ul>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/service/wash.png" alt="Wash" />
                        </div>
                    </div>
                    <!-- Service Item 2-->
                    <div class="col-md-6 col-lg-3">
                        <div class="store-item mx-auto">
                            <div class="store-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="service-item-caption-content text-white">
                                    <ul>
                                        <li>Conditioner</li>
                                        <li>Glaze & wax</li>
                                        <li>Paint coatings</li>
                                        <li>Protection wax</li>
                                        <li>Engine bay wash</li>
                                        <li>Sanitize nano mist</li>
                                        <li>Paint protective films</li>
                                        <li>Inner plastic & leather</li>    
                                    </ul>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/service/maintenance.png" alt="Maintenance" />
                        </div>
                    </div>
                    <!-- Service Item 3-->
                    <div class="col-md-6 col-lg-3">
                        <div class="store-item mx-auto">
                            <div class="store-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="service-item-caption-content text-white">
                                    <ul>
                                        <li>Polish</li>
                                        <li>Scrubbing</li>
                                        <li>Windows tattooing</li>
                                        <li>Windows treatment</li>
                                        <li>Headlamp restoration</li>
                                        <li>Seat & interior cleaning</li>
                                        <li>Inner cabin pest control</li>
                                    </ul>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/service/treatment.png" alt="Treatment" />
                        </div>
                    </div>
                    <!-- Service Item 4-->
                    <div class="col-md-6 col-lg-3">
                        <div class="store-item mx-auto">
                            <div class="store-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="service-item-caption-content text-white">
                                    <ul>
                                        <li>Roadtax</li>
                                        <li>Insurance</li>
                                        <li>Car tinted</li>
                                        <li>Car service</li>
                                        <li>Paint & touchup</li>
                                        <li>Cushion restore</li>
                                    </ul>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/service/others.png" alt="Others" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Store Section-->
        <section class="page-section store" id="stores">
            <div class="container">
                <!-- Store Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase mb-0">Stores</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Store Grid Items-->
                <div class="row justify-content-center">
                    <!-- Store Item 1-->
                    <div class="col-md-6 col-lg-4">
                        <a href="/store-one">
                            <div class="store-item mx-auto">
                                <div class="store-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                    <div class="store-item-caption-content text-center text-white"><i class="fas fa-search fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/store/tambak_bugis.png" alt="" />
                            </div>
                        </a>
                    </div>
                    <!-- Store Item 2-->
                    <div class="col-md-6 col-lg-4">
                        <a href="/store-two">
                            <div class="store-item mx-auto">
                                <div class="store-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                    <div class="store-item-caption-content text-center text-white"><i class="fas fa-search fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/store/bukit_katil.png" alt="" />
                            </div>
                        </a>
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
