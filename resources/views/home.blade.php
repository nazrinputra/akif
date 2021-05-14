<x-layout>
    <div class="container mt-5 py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <span class="my-auto">Dashboard</span>
                        <button type="button" class="btn btn-primary"><a href="{{ url('/logout') }}" class="text-white"
                                style="text-decoration: none">Logout</a></button>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <div class="row bg-success py-3">
                            <div class="col d-flex justify-content-center">
                                <a class="btn btn-outline-dark btn-social mx-1" href="#">
                                    <i class="fa fa-cash-register"></i>
                                </a>
                                <p class="ml-3 mt-1 pt-2">Counter Menu</p>
                            </div>
                            <div class="col d-flex justify-content-center">
                                <a class="btn btn-outline-dark btn-social mx-1" href="#">
                                    <i class="fa fa-calculator"></i>
                                </a>
                                <p class="ml-3 mt-1 pt-2">Modify Whatsapp Text</p>
                            </div>
                        </div>

                        <div class="row bg-success py-3">
                            <div class="col d-flex justify-content-center">
                                <a class="btn btn-outline-dark btn-social mx-1" href="#">
                                    <i class="fa fa-cash-register"></i>
                                </a>
                                <p class="ml-3 mt-1 pt-2">Manage Cars</p>
                            </div>
                            <div class="col d-flex justify-content-center">
                                <a class="btn btn-outline-dark btn-social mx-1" href="#">
                                    <i class="fa fa-calculator"></i>
                                </a>
                                <p class="ml-3 mt-1 pt-2">Manage Customers</p>
                            </div>
                        </div>

                        <div class="row mt-3 bg-warning py-3">
                            <div class="col d-flex justify-content-center">
                                <a class="btn btn-outline-dark btn-social mx-1" href="#">
                                    <i class="fa fa-key"></i>
                                </a>
                                <p class="ml-3 mt-1 pt-2">Manage Services</p>
                            </div>
                            <div class="col d-flex justify-content-center">
                                <a class="btn btn-outline-dark btn-social mx-1" href="#">
                                    <i class="fa fa-desktop"></i>
                                </a>
                                <p class="ml-3 mt-1 pt-2">Manage Packages</p>
                            </div>
                        </div>

                        <div class="row mt-3 bg-danger py-3">
                            <div class="col d-flex justify-content-center">
                                <a class="btn btn-outline-dark btn-social mx-1" href="#">
                                    <i class="fa fa-folder-open"></i>
                                </a>
                                <p class="ml-3 mt-1 pt-2">Dashboard Reports</p>
                            </div>
                            <div class="col d-flex justify-content-center">
                                <a class="btn btn-outline-dark btn-social mx-1" href="#">
                                    <i class="fa fa-hourglass"></i>
                                </a>
                                <p class="ml-3 mt-1 pt-2">Manage Staffs</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>