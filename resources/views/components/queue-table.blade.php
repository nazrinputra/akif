@props(['status'])

<div class="col-md-4 col-sm-12">
    <table class="table text-center">
        <thead>	
            <tr>
                <th>
                    <h2>
                        {{ $status }}
                        @if ($status == 'Queuing')
                            <i class="fas fa-hourglass-start"></i>
                        @elseif ($status == 'Grooming')
                            <i class="fas fa-hands-wash"></i>
                        @elseif ($status == 'Completed')
                            <i class="fas fa-clipboard-check"></i>
                        @endif
                    </h2>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td {{ $attributes([ 'class' => '']) }}>
                    {{ $slot }}
                </td>
            </tr>
        </tbody>
    </table>
</div>