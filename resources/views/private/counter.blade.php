<x-layout title="Akif - Counter">
    <x-dashboard>
        <x-slot name="breadcrumb">
            <li class="breadcrumb-item">Counter</li>
        </x-slot>
        <h2>Counter</h2>

        <form method="POST" action="#">
            @csrf

            <div class="row d-flex justify-content-between">
                <label for="plate_no" class="col-md-4 col-form-label text-md-right">Plate Number</label>

                <div class="col-md-4 pb-1">
                    <input id="plate_no" type="text" class="form-control @error('plate_no') is-invalid @enderror"
                        name="plate_no" value="{{ old('plate_no') }}" required autofocus>

                    @error('plate_no')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">
                        Next
                    </button>
                </div>
            </div>
        </form>

        {{-- <ul>
            <li>Show form for queue</li>
            <li>Progress with stepper</li>
            <li>Add or select car</li>
            <li>Add or select owner</li>
        </ul> --}}
    </x-dashboard>
</x-layout>