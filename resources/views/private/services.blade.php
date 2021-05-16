<x-layout title="Akif - Services">
    <x-dashboard>
        <x-slot name="breadcrumb">
            <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('index') }}">Index</a></li>
            <li class="breadcrumb-item">Services</li>
            <li class="ml-auto"><a class="text-secondary" href="{{ route('profile') }}">My Profile</a></li>
        </x-slot>
        <h2>Services</h2>
        <ul>
            <li>Show form for service</li>
            <li>List all services in tables</li>
            <li>Example: <a href="{{ route('service') }}">Link</a></li>
        </ul>
    </x-dashboard>
</x-layout>