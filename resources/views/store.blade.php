@extends('layouts.app')

@section('content')
<!-- Queue Section-->
<section class="page-section" id="store-name">
    <div class="container">
        <!-- Queue Section Heading-->
        <h2 class="page-section-heading text-secondary text-center text-uppercase pt-5">{{ $store->name }}</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <i class="fas fa-car"></i>
            </div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Queue Subheading-->
        <div class="row text-uppercase">
            <!-- Queue Table 1 -->
            <x-queues class="table-danger" status="Queuing" :store="$store" />
            <!-- Queue Table 2 -->
            <x-queues class="table-warning" status="Grooming" :store="$store" />
            <!-- Queue Table 3 -->
            <x-queues class="table-success" status="Completed" :store="$store" />
        </div>
    </div>
</section>
@endsection