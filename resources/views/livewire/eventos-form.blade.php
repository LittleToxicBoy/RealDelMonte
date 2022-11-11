<div>
    <label style="color: black !important;">
        <p class="m-0">Nombre</p>
    </label>
    <div class="input-group mb-3">
        <input wire:model.defer="name" type="text" class="form-control" placeholder="Casa abandonada">
    </div>

    <label style="color: black !important;">
        <p class="m-0">Descripcion</p>
    </label>
    <div class="input-group mb-3">
        <input wire:model.defer="description" type="text" class="form-control" placeholder="Descripcion">
    </div>

    <label style="color: black !important;">
        <p class="m-0">Comienzo</p>
    </label>
    <div class="input-group mb-3">
        <input type="date" wire:model.defer="dateStart" class="form-control">
    </div>

    <label style="color: black !important;">
        <p class="m-0">Termino</p>
    </label>
    <div class="input-group mb-3">
        <input type="date" wire:model.defer="dateEnd" class="form-control">
    </div>

    <label style="color: black !important;">
        <p class="m-0">Imagenes (Se necesitan 3 imagenes)</p>
    </label>
    <div  class="input-group mb-3">
        <input wire:model="images" multiple type="file" class="form-control">
    </div>
    <label style="color: black !important;">
        <p class="m-0">Localizacion del lugar</p>
    </label>

    <div wire:ignore style="height: 180px;" id="map">

    </div>


    <input type="text" wire:model.defer="latitude" hidden id="latitud" value="">
    <input type="text" wire:model.defer="longitude" hidden id="longitud" value="">


    <div class="text-center">
        <button type="button" wire:click="createEvento" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Aceptar</button>
    </div>
</div>
