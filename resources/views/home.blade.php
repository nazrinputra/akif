<x-layout>
    <x-slot name="title">Akif - Car Grooming Center</x-slot>
    <!-- Logo -->
    <x-header/>
    <!-- Store Section-->
    <section class="page-section bg-primary store" id="stores">
        <div class="container">
            <!-- Store Section Heading-->
            <h2 class="page-section-heading text-secondary text-center text-uppercase mb-0">Stores</h2>
            <!-- Icon Divider-->
            <x-divider/>
            <!-- Store Grid Items-->
            <div class="row justify-content-center">
                @foreach ($stores as $store)
                <div class="col-lg-3 col-lg-offset-3">
                    <a href="/store/{{ $store->slug }}">
                        <img class="img-fluid pb-3" src="img/store/{{ $store->slug }}.png" alt="{{ $store->name }}" />
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Services Section-->
    <section class="page-section" id="services">
        <div class="container">
            <!-- Services Section Heading-->
            <!-- FIXME remove hyperlink for service when done -->
            <h2 class="page-section-heading text-center text-uppercase mb-4"><a href="/service" style="text-decoration: none; color: #2c3e50">Services</a></h2>
            <!-- Icon Divider-->
            <x-divider/>
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
    <x-modal>
        <x-slot name="index">1</x-slot>
        <x-slot name="title">Wash</x-slot>
        VIP wash<br>
        Signature wash<br>
        Maintenance wash
    </x-modal>
    <x-modal>
        <x-slot name="index">2</x-slot>
        <x-slot name="title">Maintenance</x-slot>
        Conditioner<br>
        Glaze & wax<br>
        Paint coatings<br>
        Protection wax<br>
        Engine bay wash<br>
        Sanitize nano mist<br>
        Paint protective films<br>
        Inner plastic & leather
    </x-modal>
    <x-modal>
        <x-slot name="index">3</x-slot>
        <x-slot name="title">Treatment</x-slot>
        Polish<br>
        Scrubbing<br>
        Windows tattooing<br>
        Windows treatment<br>
        Headlamp restoration<br>
        Seat & interior cleaning<br>
        Inner cabin pest control
    </x-modal>
    <x-modal>
        <x-slot name="index">4</x-slot>
        <x-slot name="title">Other</x-slot>
        Roadtax<br>
        Insurance<br>
        Car tinted<br>
        Car service<br>
        Paint & touchup<br>
        Cushion restore
    </x-modal>
</x-layout>