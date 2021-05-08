<x-layout>
    <x-navbar-store></x-navbar-store>
    <!-- Queue Section-->
    <section class="page-section" id="{{ $slug }}">
        <div class="container">
            <!-- Queue Section Heading-->
            <h2 class="page-section-heading text-secondary text-center text-uppercase pt-5">{{ $name }}</h2>
            <!-- Icon Divider-->
            <x-divider/>
            <!-- Queue Subheading-->
            <div class="row text-uppercase">
                <!-- Queue Table 1 -->
                <x-queue-table status="Queuing <i class='fas fa-hourglass-start'></i>" table="table-danger"/>
                <!-- Queue Table 2 -->
                <x-queue-table status="Grooming <i class='fas fa-hands-wash'></i>" table="table-warning"/>
                <!-- Queue Table 3 -->
                <x-queue-table status="Completed <i class='fas fa-clipboard-check'></i>" table="table-success"/>
            </div>
        </div>
    </section>
</x-layout>