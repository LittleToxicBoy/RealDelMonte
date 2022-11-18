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
        ])
    </div>

   
@endsection
