<x-layout title="Akif - Counter">
    <x-dashboard>
        <x-slot name="breadcrumb">
            <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('index') }}">Index</a></li>
            <li class="breadcrumb-item">Counter</li>
            <li class="ml-auto"><a class="text-secondary" href="{{ route('profile') }}">My Profile</a></li>
        </x-slot>
        <h2>Counter</h2>
        <ul>
            <li>Show form for queue</li>
            <li>Progress with stepper</li>
            <li>Add or select car</li>
            <li>Add or select owner</li>
        </ul>
    </x-dashboard>
</x-layout>