<x-layout title="Akif - Profile">
    <x-dashboard>
        <x-slot name="breadcrumb">
            <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('index') }}">Index</a></li>
            <li class="breadcrumb-item">Profile</li>
            <li class="ml-auto">My Profile</li>
        </x-slot>
        <h2>Profile</h2>
        <ul>
            <li>{{ auth()->user()->name }}</li>
            <li>Display user info</li>
        </ul>
    </x-dashboard>
</x-layout>