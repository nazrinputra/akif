@extends('layouts.app')

@section('content')
<!-- Service Section-->
<section class="page-section" id="service">
    <div class="container text-uppercase">

        <!-- Service Section Heading-->
        <div class="row">
            <div class="col">
                <h2 class="text-center text-secondary pt-5">Seat & Interiors Cleaning</h2>
            </div>
        </div>

        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <i class="fas fa-car"></i>
            </div>
            <div class="divider-custom-line"></div>
        </div>

        <div class="row text-center">
            <div class="col">
                <h5>Duration: 10 min</h5>
            </div>
            <div class="col">
                <h5>Frequency: When neccesary</h5>
            </div>
        </div>

        <!-- Service Detail Excerpt-->
        <div class="row mt-5">
            <div class="col">
                <h3>Lorem ipsum</h3>
            </div>
        </div>

        <!-- Service Subheading-->
        <div class="row">
            <div class="col">
                <p class="text-left font-weight-light">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                    pariatur.
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
                    id est laborum
                    <a href="/service-detail" class="text-secondary">Learn more..</a>
                </p>
            </div>
        </div>

        <!-- Service Package -->
        <div class="row">
            <div class="col">
                <h3>Package</h3>
                <ol>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                </ol>
            </div>
        </div>


        <!-- Service Price -->
        <div class="row">
            <div class="col">
                <h3>Price</h3>

                <table>
                    <tr>
                        <td></td>
                    </tr>
                </table>
                <table class="table table-bordered">
                    <tr>
                        <th rowspan="3">Kesemua kerusi fabrik/kulit</th>
                        <td>Small = RM10</td>
                    </tr>
                    <tr>
                        <td>Medium = RM20</td>
                    </tr>
                    <tr>
                        <td>Large = RM30</td>
                    </tr>
                    <tr>
                        <th>Boot</th>
                        <td>RM 20</td>
                    </tr>
                    <tr>
                        <th>Panel Pintu</th>
                        <td>RM 50</td>
                    </tr>
                    <tr>
                        <th>Karpet</th>
                        <td>RM 6</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection