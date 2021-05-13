@extends('layouts.app')

@section('content')
<!-- Queue Section-->
<section class="page-section" id="store-name">
    <div class="container">
        @foreach ($stores as $store)
        <!-- Store Section Heading-->
        <h2 class="page-section-heading text-secondary text-center text-uppercase pt-5">{{ $store->name }}</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <i class="fas fa-car"></i>
            </div>
            <div class="divider-custom-line"></div>
        </div>
        @endforeach
    </div>
</section>
@endsection