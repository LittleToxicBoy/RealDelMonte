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
            <p class="m-0">Imagenes (10 imagenes maximo) </p>
        </label>
        @if ($images)
            <div class="row">

                <div class="col-4">
                    <label for="input1">
                        <img src="@if ($images['img1']) {{ $images['img1'] }} @else {{ $auxImage }} @endif"
                            alt="" class="img-thumbnail">
                    </label>
                    <input wire:model="img1" type="file" hidden id="input1">
                    <button wire:click.prevent="deleteImages('img1')" style="width:100%;"
                        class="btn bg-danger">Eliminar</button>
                </div>

                <div class="col-4">
                    <label for="input2">
                        <img src="@if ($images['img2']) {{ $images['img2'] }} @else {{ $auxImage }} @endif"
                            alt="" class="img-thumbnail">
                    </label>
                    <input wire:model="img2" type="file" hidden id="input2">
                    <button wire:click.prevent="deleteImages('img2')" style="width:100%;"
                        class="btn bg-danger">Eliminar</button>
                </div>

            </div>
        @endif
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
        <button type="button" wire:click="test" class="btn bg-gradient-primary">Editar</button>
        <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Cerrar</button>
    </div>
</div>
