<x-layout>
    <header class="masthead text-center mb-5">
        <div class="container d-flex align-items-center flex-column">
            <!-- Logo Image-->
            <img class="masthead-avatar py-4" src="/img/logo-web.png" alt="Akif" />
            <!-- Logo Heading-->
            <h1 class="masthead-heading text-secondary text-uppercase mb-0">Car Grooming Center</h1>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon">
                    <i class="fas fa-car"></i>
                </div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Logo Subheading-->
            <p class="masthead-subheading font-weight-light mb-0">Akif Car Grooming Center are committed to ensuring the
                external and internal cleaning of your vehicle.</p>
            <p class="masthead-subheading font-weight-light mb-0">Give us your trust, and we will give you satisfaction!
            </p>
        </div>
    </header>
    <!-- Services Section-->
    <section class="page-section bg-primary" id="services">
        <div class="container">
            <!-- Services Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase">Services</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon">
                    <i class="fas fa-car"></i>
                </div>
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
    <!-- Service Modals-->
    {{-- FIXME make this dynamic --}}
    <x-modal index="1" title="Wash">
        VIP wash<br>
        Signature wash<br>
        Maintenance wash
    </x-modal>
    <x-modal index="2" title="Maintain">
        Conditioner<br>
        Glaze & wax<br>
        Paint coatings<br>
        Protection wax<br>
        Engine bay wash<br>
        Sanitize nano mist<br>
        Paint protective films<br>
        Inner plastic & leather
    </x-modal>
    <x-modal index="3" title="Treatment">
        Polish<br>
        Scrubbing<br>
        Windows tattooing<br>
        Windows treatment<br>
        Headlamp restoration<br>
        Seat & interior cleaning<br>
        Inner cabin pest control
    </x-modal>
    <x-modal index="4" title="Others">
        Roadtax<br>
        Insurance<br>
        Car tinted<br>
        Car service<br>
        Paint & touchup<br>
        Cushion restore
    </x-modal>
</x-layout>