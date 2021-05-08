<div class="service-modal modal fade" id="serviceModal{{ $index }}" tabindex="-1" role="dialog" aria-labelledby="serviceModal{{ $index }}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <!-- Service Modal - Title-->
                            <h2 class="service-modal-title text-secondary text-uppercase mb-0" id="serviceModal{{ $index }}Label">{{ $title }}</h2>
                            <!-- Icon Divider-->
                            <x-divider></x-divider>
                            <p class="mb-5 text-uppercase">
                                {{ $slot }}
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