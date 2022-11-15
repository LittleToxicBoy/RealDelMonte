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


        <div class="row">
            <div class="col-8">
                <label style="color: black !important;">
                    <p class="m-0">Imagenes (10 imagenes maximo) </p>
                </label>
            </div>
            <div class="col-4">
                @if (count($images) < 10)
                    <div class="image-upload">
                        <label for="file-input2">
                            <a style="width:100%;margin-left:5px;margin-right:5px" class="btn bg-success"><i
                                    class="ni ni-fat-add"></i></a>
                        </label>
                        <input wire:model.defer="newImage"  id="file-input2" type="file" />
                    </div>
                @endif
            </div>
        </div>
        <div wire:loading wire:target="newImage" class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
          </div>
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
        <button type="button" wire:click="test" class="btn bg-gradient-primary">Editar</button>
        <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Cerrar</button>
    </div>
</div>
