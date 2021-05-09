@php
    $queuing = $store->queues->where('status', 'Queuing');
    $grooming = $store->queues->where('status', 'Grooming');
    $completed = $store->queues->where('status', 'Completed');
@endphp

<x-layout title="Akif - {{ $store->name }}" :stores="$stores">
    <!-- Queue Section-->
    <section class="page-section" id="{{ $store->slug }}">
        <div class="container">
            <!-- Queue Section Heading-->
            <h2 class="page-section-heading text-secondary text-center text-uppercase pt-5">{{ $store->name }}</h2>
            <!-- Icon Divider-->
            <x-divider/>
            <!-- Queue Subheading-->
            <div class="row text-uppercase">
                <!-- Queue Table 1 -->
                <x-queue-table class="table-danger" status="Queuing" :queues="$queuing" />
                <!-- Queue Table 2 -->
                <x-queue-table class="table-warning" status="Grooming" :queues="$grooming" />
                <!-- Queue Table 3 -->
                <x-queue-table class="table-success" status="Completed" :queues="$completed" />
            </div>
        </div>
    </section>
</x-layout>