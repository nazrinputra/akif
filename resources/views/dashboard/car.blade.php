<x-layout title="Akif - {{ $car->plate_no }}">
    <x-dashboard>
        <h2>Car</h2>
        <ul>
            <li>{{ $car->plate_no }}</li>
            <li>Display car info</li>
            <li>Display owner(s) from customer</li>
        </ul>
    </x-dashboard>
</x-layout>