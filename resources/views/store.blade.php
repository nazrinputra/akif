<x-layout>
    <x-navbar/>
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
                <x-queue-table class="table-danger">
                    <x-slot name="status">
                        Queuing <i class="fas fa-hourglass-start"></i>
                    </x-slot>
                    <h4>ABC1234</h4>
                    <h4>ABC1234</h4>
                    <h4>ABC1234</h4>
                    <h4>ABC1234</h4>
                </x-queue-table>
                <!-- Queue Table 2 -->
                <x-queue-table class="table-warning">
                    <x-slot name="status">
                        Queuing <i class="fas fa-hands-wash"></i>
                    </x-slot>
                    <h4>ABC1234</h4>
                    <h4>ABC1234</h4>
                </x-queue-table>
                <!-- Queue Table 3 -->
                <x-queue-table class="table-success">
                    <x-slot name="status">
                        Queuing <i class="fas fa-clipboard-check"></i>
                    </x-slot>
                    <h4>ABC1234</h4>
                    <h4>ABC1234</h4>
                    <h4>ABC1234</h4>
                </x-queue-table>
            </div>
        </div>
    </section>
</x-layout>