<x-layout title="Akif - Packages">
    <x-dashboard>
        <x-slot name="breadcrumb">
            <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('index') }}">Index</a></li>
            <li class="breadcrumb-item">Packages</li>
            <li class="ml-auto"><a class="text-secondary" href="{{ route('profile') }}">My Profile</a></li>
        </x-slot>
        <h2>Packages</h2>
        <ul>
            <li>Show form for package</li>
            <li>List all packages in tables</li>
            <li>Example: <a href="{{ route('package') }}">Link</a></li>
        </ul>
    </x-dashboard>
</x-layout>