<x-layout title="Akif - Crews">
    <x-dashboard>
        <x-slot name="breadcrumb">
            <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('index') }}">Index</a></li>
            <li class="breadcrumb-item">Crews</li>
            <li class="ml-auto"><a class="text-secondary" href="{{ route('profile') }}">My Profile</a></li>
        </x-slot>
        <h2>Crews</h2>
        <ul>
            <li>List all staffs</li>
            <li>Present in table for managing</li>
            <li>Example: <a href="{{ route('crew') }}">Link</a></li>
        </ul>
    </x-dashboard>
</x-layout>