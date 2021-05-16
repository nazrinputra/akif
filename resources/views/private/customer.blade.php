<x-layout title="Akif - Customer">
    <x-dashboard>
        <x-slot name="breadcrumb">
            <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('customers') }}">Customers</a></li>
            <li class="breadcrumb-item">Customer</li>
        </x-slot>
        <h2>Customer</h2>
        <ul>
            <li>Display customer info</li>
            <li>{{ $customer->name }}</li>
            <li>Display car(s) owned</li>
            <li>
                @foreach ($customer->cars as $car)
                <a href="{{ route('car', $car->plate_no) }}">
                    {{ $car->plate_no }}
                </a>
                &emsp;
                @endforeach
            </li>
        </ul>
    </x-dashboard>
</x-layout>