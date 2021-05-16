@php
$number = "0123456789";
$name = "Admin";
$string = "Tak perlu menaip lagi - " . $name;
@endphp
<x-layout title="Akif - WhatsApp">
    <x-dashboard>
        <x-slot name="breadcrumb">
            <li class="breadcrumb-item">WhatsApp</li>
        </x-slot>
        <h2>WhatsApp</h2>
        <ul>
            <li>Make links like:
                <a href="https://api.whatsapp.com/send?phone=6{{ $number }}&text={{ urlencode($string) }}"
                    target="_blank">
                    Test link
                </a>
            </li>
            <li>Show preset messages</li>
            <li>Form to send custom message</li>
        </ul>

    </x-dashboard>
</x-layout>