<x-layout title="Akif - {{ $car->plate_no }}">
    <x-dashboard>
        <x-slot name="breadcrumb">
            <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('index') }}">Index</a></li>
            <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('cars') }}">Cars</a></li>
            <li class="breadcrumb-item">Car</li>
        </x-slot>
        <h2>Car</h2>
        <ul>
            <li>{{ $car->plate_no }}</li>
            <li>Display car info</li>
            <li>Display owner(s) from customer</li>
        </ul>
    </x-dashboard>
</x-layout>