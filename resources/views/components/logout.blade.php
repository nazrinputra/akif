<a {{ $attributes(['class' => '']) }} href="{{ route('logout') }}"
    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
    Logout
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>