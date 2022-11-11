@extends('layouts.template')

@section('content')

<div class="container">
    <h4 class="text-white text-center mt-2 mb-2">Administrar Eventos</h4>
    @livewire('administrar.table-eventos')
</div>
@endsection
