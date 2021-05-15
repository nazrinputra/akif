<div class="container mt-4 pt-5 pb-3">
    <div class="card">
        <div class="card-header text-center">Hello, {{ Auth::user()->name }}</div>

        <div class="card-body">
            {{ $slot }}
        </div>
    </div>
</div>