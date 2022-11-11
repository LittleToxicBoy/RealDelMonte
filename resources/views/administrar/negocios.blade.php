@extends('layouts.template')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admLugares.css' ) }}">

<div class="container">
    <h4 class="text-white text-center mt-2 mb-2">Administrar negocios</h4>

    @livewire('administrar.negocios')
</div>
@endsection
