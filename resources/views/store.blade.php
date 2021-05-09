<x-layout>
    <x-slot name="title">Akif - {{ $store->name }}</x-slot>
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
                <x-queue-table class="table-danger">
                    <x-slot name="status">Queuing</x-slot>
                    <h4>ABC1234</h4>
                </x-queue-table>
                <!-- Queue Table 2 -->
                <x-queue-table class="table-warning">
                    <x-slot name="status">Grooming</x-slot>
                    <h4>ABC1234</h4>
                </x-queue-table>
                <!-- Queue Table 3 -->
                <x-queue-table class="table-success">
                    <x-slot name="status">Completed</x-slot>
                    <h4>ABC1234</h4>
                </x-queue-table>
            </div>
        </div>
    </section>
</x-layout>