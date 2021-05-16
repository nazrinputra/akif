<x-layout title="Akif - Profile">
    <x-dashboard>
        <h2>Profile</h2>
        <ul>
            <li>{{ auth()->user()->name }}</li>
            <li>Display user info</li>
        </ul>
    </x-dashboard>
</x-layout>