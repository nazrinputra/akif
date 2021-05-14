@php
$waiting = $store->queues->where('status', 'Waiting');
$grooming = $store->queues->where('status', 'Grooming');
$completed = $store->queues->where('status', 'Completed');
@endphp

<x-layout>
    <!-- Queue Section-->
    <section class="page-section" id="store-name">
        <div class="container">
            <!-- Queue Section Heading-->
            <h2 class="page-section-heading text-secondary text-center text-uppercase">{{ $store->name }}</h2>
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
                <x-queues class="table-danger" status="Waiting <i class='fas fa-hourglass-start'></i>"
                    :queues="$waiting" />
                <!-- Queue Table 2 -->
                <x-queues class="table-warning" status="Grooming <i class='fas fa-hands-wash'></i>"
                    :queues="$grooming" />
                <!-- Queue Table 3 -->
                <x-queues class="table-success" status="Completed <i class='fas fa-clipboard-check'></i>"
                    :queues="$completed" />
            </div>
        </div>
    </section>
</x-layout>