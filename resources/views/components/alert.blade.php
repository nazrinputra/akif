<div class="container">
    <div {{ $attributes([ 'class' => 'alert alert-dismissible fade show fixed-bottom mb-0']) }} role="alert">
        {!! $slot !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>