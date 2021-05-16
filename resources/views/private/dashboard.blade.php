<x-layout title="Akif - Dashboard">
    <x-dashboard>
        <x-slot name="breadcrumb">
            <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('index') }}">Index</a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="ml-auto"><a class="text-secondary" href="{{ route('profile') }}">My Profile</a></li>
        </x-slot>
        <h2>Dashboard</h2>
        <ul>
            <li>Display reports</li>
            <li>Display activity log</li>
        </ul>
    </x-dashboard>
</x-layout>