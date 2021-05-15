<x-layout title="Akif - Customer">
    <x-dashboard>
        <x-slot name="breadcrumb">
            <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('index') }}">Index</a></li>
            <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('customers') }}">Customers</a></li>
            <li class="breadcrumb-item">Customer</li>
        </x-slot>
        <h2>Customer</h2>
        <ul>
            <li>{{ $customer->name }}</li>
            <li>Display customer info</li>
            <li>Display car(s) owned</li>
        </ul>
    </x-dashboard>
</x-layout>