<x-layout title="Akif - Customers">
    <x-dashboard>
        <x-slot name="breadcrumb">
            <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('index') }}">Index</a></li>
            <li class="breadcrumb-item">Customers</li>
        </x-slot>
        <h2>Customers</h2>
        <ul>
            <li>Show form for customer</li>
            <li>List all customers in tables</li>
            <li>
                @foreach ($customers as $customer)
                <a href="{{ route('customer', $customer->slug) }}">
                    {{ $customer->name }}
                </a>
                &emsp;
                @endforeach
            </li>
        </ul>
    </x-dashboard>
</x-layout>