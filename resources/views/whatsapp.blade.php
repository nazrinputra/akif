@php
$number = "0123456789";
$name = "Admin";
$string = "Tak perlu menaip lagi - " . $name;
@endphp
<x-layout title="Akif - Cars">
    <div class="container mt-5 py-5">
        <h2>WhatsApp</h2>
        <a href="https://api.whatsapp.com/send?phone=6{{ $number }}&text={{ urlencode($string) }}" target="_blank">
            Test link
        </a>
    </div>
</x-layout>