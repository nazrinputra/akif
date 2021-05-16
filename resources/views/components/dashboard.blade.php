@props(['breadcrumb' => ''])

<div class="container mt-4 pt-5 pb-3">
    <div class="card">
        <div class="card-body">
            <nav class="text-center" aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center:">
                    @if (request()->is('index'))
                    <li class="breadcrumb-item">Index</li>
                    @else
                    <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('index') }}">Index</a></li>
                    @endif
                    {{ $breadcrumb }}
                    @if (request()->is('profile'))
                    <li class="ml-auto">Hello, {{ auth()->user()->name }}</li>&emsp;
                    <x-logout class="text-secondary" />
                    @else
                    <li class="ml-auto">Hello, <a class="text-secondary"
                            href="{{ route('profile') }}">{{ auth()->user()->name }}</a>&emsp;</li>
                    <x-logout class="text-secondary" />
                    @endif
                </ol>
            </nav>
            {{ $slot }}
        </div>
    </div>
</div>