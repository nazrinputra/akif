<x-layout title="Akif - Service">
    <x-dashboard>
        <x-slot name="breadcrumb">
            <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('index') }}">Index</a></li>
            <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('services') }}">Services</a></li>
            <li class="breadcrumb-item">Service</li>
        </x-slot>
        <h2>Service</h2>
        <ul>
            <li>Show form for one service</li>
        </ul>
    </x-dashboard>
</x-layout>