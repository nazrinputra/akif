<x-layout title="Akif - Cars">
    <x-dashboard>
        <x-slot name="breadcrumb">
            <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('index') }}">Index</a></li>
            <li class="breadcrumb-item">Cars</li>
            <li class="ml-auto"><a class="text-secondary" href="{{ route('profile') }}">My Profile</a></li>
        </x-slot>
        <h2>Cars</h2>
        <ul>
            <li>List all cars</li>
            <li>Present in table for managing</li>
            <li>
                @foreach ($cars as $car)
                <a href="{{ route('car', $car->plate_no) }}">
                    {{ $car->plate_no }}
                </a>
                &emsp;
                @endforeach
            </li>
        </ul>
    </x-dashboard>
</x-layout>