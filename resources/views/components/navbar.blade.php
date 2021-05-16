<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="{{ route('welcome') }}"><img class="img-thumbnail"
                src="/img/logo-navbar.png" alt="Akif" /></a>
        <button
            class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded"
            type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
            aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                @foreach ($stores as $store)
                @if (request()->is('store/'.$store->slug))
                <li class="nav-item  mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                        href="#{{ $store->slug }}">{{ $store->name }}</a>
                </li>
                @else
                <li class="nav-item  mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                        href="{{ route('store', $store->slug) }}">{{ $store->name }}</a>
                </li>
                @endif
                @endforeach
                <li class="nav-item  mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                        href="{{ route('promotions') }}">Promotions</a>
                </li>
            </ul>
        </div>
    </div>
</nav>