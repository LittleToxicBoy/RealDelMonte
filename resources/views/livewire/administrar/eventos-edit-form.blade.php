<div>
    <style>
        .image-upload>input {
            display: none;
        }
    </style>
    <div class="modal-body">
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
            <p class="m-0">Imagenes (10 imagenes maximo)</p>
        </label>
        <div class="row">
            @foreach ($images as $key => $image)
                <div class="col-4">
                    <div class="image-upload">
                        <label for="file-input">
                            <img class="img-thumbnail" src="{{ $image }}" />
                        </label>
                        <input wire:model="tempImages.'{{ $key }}'"
                            wire:change="updateImage('{{ $key }}')" id="file-input" type="file" />
                    </div>
                </div>
            @endforeach
        </div>

        <label style="color: black !important;">
            <p class="m-0">Localizacion del lugar</p>
        </label>

        <div id="mapEditParent">
            <div wire:ignore style="height: 180px;" id="mapEditModal">
            </div>

        </div>
        <input type="text" wire:model="latitude" hidden id="latitudEdit" value="">
        <input type="text" wire:model="longitude" hidden id="longitudEdit" value="">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn bg-gradient-primary">Editar</button>
        <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Cerrar</button>
    </div>
</div>
