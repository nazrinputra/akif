<x-layout title="Akif - Dashboard">
    <x-dashboard>
        <x-slot name="breadcrumb">
            <li class="breadcrumb-item">Index</li>
            <li class="ml-auto"><a class="text-secondary" href="{{ route('profile') }}">My Profile</a></li>
        </x-slot>
        <div class="row p-3">
            <div class="col-lg-3 col-md-4 col-sm-6 pb-5">
                <h2>Counter</h2>
                <p>Register car and customer into queue.</p>
                <p><a class="btn btn-secondary" href="{{ route('counter') }}">Counter</a></p>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-5">
                <h2>WhatsApp</h2>
                <p>Modify WhatsApp message sent by the system.
                </p>
                <p><a class="btn btn-secondary" href="{{ route('whatsapp') }}">WhatsApp</a></p>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-5">
                <h2>Cars</h2>
                <p>View, add or edit cars registered in the system.</p>
                <p><a class="btn btn-secondary" href="{{ route('cars') }}">Cars</a></p>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-5">
                <h2>Customers</h2>
                <p>Add new customer, view or update existing customers.</p>
                <p><a class="btn btn-secondary" href="{{ route('customers') }}">Customers</a></p>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-5">
                <h2>Services</h2>
                <p>View services in the system and make modifications.</p>
                <p><a class="btn btn-secondary" href="{{ route('services') }}">Services</a></p>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-5">
                <h2>Packages</h2>
                <p>Define packages or create new promotional package.</p>
                <p><a class="btn btn-secondary" href="{{ route('packages') }}">Packages</a></p>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-5">
                <h2>Dashboard</h2>
                <p>Generate monthly reports and statistics.</p>
                <p><a class="btn btn-secondary" href="{{ route('dashboard') }}">Dashboard</a></p>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-5">
                <h2>Crews</h2>
                <p>Enable or disable staff access to the system.</p>
                <p><a class="btn btn-secondary" href="{{ route('crews') }}">Crews</a></p>
            </div>
        </div>
    </x-dashboard>
</x-layout>