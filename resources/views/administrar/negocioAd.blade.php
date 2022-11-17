@extends('layouts.template')

@section('content')
    <style>
        #map {
            height: 300px;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/admLugares.css') }}">

    <div class="container">
        <h4 class="text-white text-center mt-2 mb-2">Administrar negocio</h4>
        @livewire('administrar.administrar-negocio', [
            'id_negocio' => $id_negocio,
            'tipo' => $tipo,
        ])
    </div>

    <script>
        var map = L.map('map').setView([20.14024166748934, -98.67254608536996], 30);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map)
    </script>
@endsection
