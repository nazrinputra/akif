@extends('layouts.app')

@section('content')
<div class="container mt-5 py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <a class="btn btn-outline-dark btn-social mx-1" href="#">
                                <i class="fa fa-key"></i>
                            </a>
                            <p class="ml-3 mt-1 pt-2">Click for menu 1</p>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <a class="btn btn-outline-dark btn-social mx-1" href="#">
                                <i class="fa fa-calculator"></i>
                            </a>
                            <p class="ml-3 mt-1 pt-2">Click for menu 2</p>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col d-flex justify-content-center">
                            <a class="btn btn-outline-dark btn-social mx-1" href="#">
                                <i class="fa fa-cash-register"></i>
                            </a>
                            <p class="ml-3 mt-1 pt-2">Click for menu 3</p>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <a class="btn btn-outline-dark btn-social mx-1" href="#">
                                <i class="fa fa-desktop"></i>
                            </a>
                            <p class="ml-3 mt-1 pt-2">Click for menu 4</p>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col d-flex justify-content-center">
                            <a class="btn btn-outline-dark btn-social mx-1" href="#">
                                <i class="fa fa-folder-open"></i>
                            </a>
                            <p class="ml-3 mt-1 pt-2">Click for menu 5</p>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <a class="btn btn-outline-dark btn-social mx-1" href="#">
                                <i class="fa fa-hourglass"></i>
                            </a>
                            <p class="ml-3 mt-1 pt-2">Click for menu 6</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection