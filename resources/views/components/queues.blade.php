<div class="col-md-4 col-sm-12">
    <table class="table text-center">
        <thead>
            <tr>
                <th>
                    <h2>
                        {!! $status !!}
                    </h2>
                </th>
            </tr>
        </thead>
        @if ($queues->count() > 0)
        <tbody>
            <tr>
                <td {{ $attributes([ 'class' => '']) }}>
                    @foreach ($queues as $queue)
                    <h4>{{ $queue->car->plate_no }}</h4>
                    @endforeach
                    {{ $slot }}
                </td>
            </tr>
        </tbody>
        @endif
    </table>
</div>