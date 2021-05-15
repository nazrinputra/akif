<x-layout title="Akif - Customers">
    <x-dashboard>
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