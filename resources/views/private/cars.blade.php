<x-layout title="Akif - Cars">
    <x-dashboard>
        <x-slot name="breadcrumb">
            <li class="breadcrumb-item">Cars</li>
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