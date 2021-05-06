<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Akif - Car Grooming Center</title>

        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Akif</a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#stores">Stores</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#services">Services</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Logo -->
        <header class="masthead text-center mb-5">
            <div class="container d-flex align-items-center flex-column">
                <!-- Logo Image-->
                <img class="masthead-avatar py-4" src="img/logo-web.png" alt="" />
                <!-- Logo Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">Car Grooming Center</h1>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Logo Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">Akif Car Grooming Center are committed to ensuring the external and internal cleaning of your vehicle.</p>
                <p class="masthead-subheading font-weight-light mb-0">Give us your trust, and we will give you satisfaction!</p>
            </div>
        </header>
        <!-- Store Section-->
        <section class="page-section bg-primary store" id="stores">
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
                    <div class="col-lg-3 col-lg-offset-3">
                        <a href="/tambak-bugis">
                            <img class="img-fluid pb-3" src="img/store/tambak-bugis.png" alt="Tambak Bugis" />
                        </a>
                    </div>
                    <!-- Store Item 2-->
                    <div class="col-lg-3 col-lg-offset-3">
                        <a href="/bukit-katil">
                            <img class="img-fluid pb-3" src="img/store/bukit-katil.png" alt="Bukit Katil" />
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services Section-->
        <section class="page-section" id="services">
            <div class="container">
                <!-- Services Section Heading-->
                <!-- FIXME remove hyperlink for service when done -->
                <h2 class="page-section-heading text-center text-uppercase mb-4"><a href="/service">Services</a></h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Service Items-->
                <div class="row justify-content-center text-center text-uppercase">
                    <div class="col-md-3 col-sm-12" data-toggle="modal" data-target="#serviceModal1">
                        <h3 class="img-fluid pb-3">Wash</h3>
                    </div>
                    <div class="col-md-3 col-sm-12" data-toggle="modal" data-target="#serviceModal2">
                        <h3 class="img-fluid pb-3">Maintain</h3>
                    </div>
                    <div class="col-md-3 col-sm-12" data-toggle="modal" data-target="#serviceModal3">
                        <h3 class="img-fluid pb-3">Treatment</h3>
                    </div>
                    <div class="col-md-3 col-sm-12" data-toggle="modal" data-target="#serviceModal4">
                        <h3 class="img-fluid pb-3">Others</h3>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Social Icons-->
                    <div class="col-lg mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Contact Us</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://www.facebook.com/akifcarwash/"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://api.whatsapp.com/send?phone=60136541240"><i class="fab fa-fw fa-whatsapp"></i></a>
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
            <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
        </div>
        <!-- Service Modals-->
        <!-- Service Modal 1-->
        <div class="service-modal modal fade" id="serviceModal1" tabindex="-1" role="dialog" aria-labelledby="serviceModal1Label" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Service Modal - Title-->
                                    <h2 class="service-modal-title text-secondary text-uppercase mb-0" id="serviceModal1Label">Wash</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <p class="mb-5 text-uppercase">
                                        VIP wash<br>
                                        Signature wash<br>
                                        Maintenance wash
                                    </p>
                                    <button class="btn btn-primary" data-dismiss="modal">
                                        <i class="fas fa-times fa-fw"></i>
                                        Close Window
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service Modal 2-->
        <div class="service-modal modal fade" id="serviceModal2" tabindex="-1" role="dialog" aria-labelledby="serviceModal2Label" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Service Modal - Title-->
                                    <h2 class="service-modal-title text-secondary text-uppercase mb-0" id="serviceModal2Label">Maintenance</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <p class="mb-5 text-uppercase">
                                        Conditioner<br>
                                        Glaze & wax<br>
                                        Paint coatings<br>
                                        Protection wax<br>
                                        Engine bay wash<br>
                                        Sanitize nano mist<br>
                                        Paint protective films<br>
                                        Inner plastic & leather
                                    </p>
                                    <button class="btn btn-primary" data-dismiss="modal">
                                        <i class="fas fa-times fa-fw"></i>
                                        Close Window
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service Modal 3-->
        <div class="service-modal modal fade" id="serviceModal3" tabindex="-1" role="dialog" aria-labelledby="serviceModal3Label" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Service Modal - Title-->
                                    <h2 class="service-modal-title text-secondary text-uppercase mb-0" id="serviceModal3Label">Treatment</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <p class="mb-5 text-uppercase">
                                        Polish<br>
                                        Scrubbing<br>
                                        Windows tattooing<br>
                                        Windows treatment<br>
                                        Headlamp restoration<br>
                                        Seat & interior cleaning<br>
                                        Inner cabin pest control
                                    </p>
                                    <button class="btn btn-primary" data-dismiss="modal">
                                        <i class="fas fa-times fa-fw"></i>
                                        Close Window
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service Modal 4-->
        <div class="service-modal modal fade" id="serviceModal4" tabindex="-1" role="dialog" aria-labelledby="serviceModal4Label" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Service Modal - Title-->
                                    <h2 class="service-modal-title text-secondary text-uppercase mb-0" id="serviceModal4Label">Others</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <p class="mb-5 text-uppercase">
                                        Roadtax<br>
                                        Insurance<br>
                                        Car tinted<br>
                                        Car service<br>
                                        Paint & touchup<br>
                                        Cushion restore
                                    </p>
                                    <button class="btn btn-primary" data-dismiss="modal">
                                        <i class="fas fa-times fa-fw"></i>
                                        Close Window
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
