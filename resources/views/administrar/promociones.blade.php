@extends('layouts.template')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admLugares.css') }}">

    <div class="container">
        @livewire('promociones.tabla', [
            'id_negocio' => $negocio,
        ])
    </div>
   
@endsection
