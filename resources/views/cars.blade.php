<x-layout title="Akif - Cars">
    <div class="container mt-5 py-5">
        <h2>Cars</h2>
        @foreach ($cars as $car)
        <a href="/car/{{ $car->plate_no }}">
            {{ $car->plate_no }}
        </a>
        &emsp;
        @endforeach
    </div>
</x-layout>