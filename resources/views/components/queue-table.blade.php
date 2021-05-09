@props(['status'])

<div class="col-md-4 col-sm-12">
    <table class="table text-center">
        <thead>	
            <tr>
                <th>
                    <h2>{!! $status !!}</h3>
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