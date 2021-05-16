<x-layout title="Akif - Crew">
    <x-dashboard>
        <x-slot name="breadcrumb">
            <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('index') }}">Index</a></li>
            <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('packages') }}">Crews</a></li>
            <li class="breadcrumb-item">Crew</li>
            <li class="ml-auto"><a class="text-secondary" href="{{ route('profile') }}">My Profile</a></li>
        </x-slot>
        <h2>Crew</h2>
        <ul>
            <li>Show form for one staff</li>
        </ul>
    </x-dashboard>
</x-layout>