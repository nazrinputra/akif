<x-layout title="Akif - {{ $car->plate_no }}">
    <x-dashboard>
        <x-slot name="breadcrumb">
            <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('index') }}">Index</a></li>
            <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('cars') }}">Cars</a></li>
            <li class="breadcrumb-item">Car</li>
            <li class="ml-auto"><a class="text-secondary" href="{{ route('profile') }}">My Profile</a></li>
        </x-slot>
        <h2>Car</h2>
        <ul>
            <li>Display car info</li>
            <li>{{ $car->plate_no }}</li>
            <li>Display owner(s) from customer</li>
            <li>Owner(s)</li>
            @foreach ($car->owners as $owner)
            <li>{{ $owner->name }}</li>
            @endforeach
        </ul>
    </x-dashboard>
</x-layout>