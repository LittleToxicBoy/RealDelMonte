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
        <p class="m-0">Imagenes (10 imagenes maximo)</p>
    </label>
    <div class="input-group mb-3">
        <input wire:model="images" multiple type="file" class="form-control">
    </div>
    <div wire:loading wire:target="images" class="spinner-border text-warning" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>

    <label style="color: black !important;">
        <p class="m-0">Localizacion del lugar</p>
    </label>

    <div id="mapParent">
        <div wire:ignore style="height: 180px;" id="map">

        </div>
    </div>


    <input type="text" wire:model="latitude" hidden id="latitud" value="">
    <input type="text" wire:model="longitude" hidden id="longitud" value="">

    @error('name')
        <div class="alert alert-danger" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    @error('description')
        <div class="alert alert-danger" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    @error('images')
        <div class="alert alert-danger" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    <div class="text-center">
        <button type="button" wire:click="createLugar"
            class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Aceptar</button>
    </div>

    <div wire:loading wire:target="createLugar" class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
