@props(['breadcrumb' => ''])

<div class="container mt-4 pt-5 pb-3">
    <div class="card">
        <div class="card-header text-center">Hello, {{ auth()->user()->name }}</div>

        <div class="card-body">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    {{ $breadcrumb }}
                </ol>
            </nav>
            {{ $slot }}
        </div>
    </div>
</div>