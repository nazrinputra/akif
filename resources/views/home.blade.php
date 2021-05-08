<x-layout>
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
    <x-modal.wash/>
    <x-modal.maintenance/>
    <x-modal.treatment/>
    <x-modal.other/>
</x-layout>