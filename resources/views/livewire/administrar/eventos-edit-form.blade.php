<div>
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
                @for ($i = 1; $i < 11; $i++)
                    @php
                        $auxIndex = 'img' . $i;
                        $auxUp = ucfirst($auxIndex);
                    @endphp
                    <div style="margin-bottom:10px;margin-top:10px;" class="col-4">
                        <div class="image-div">
                            <label class="img-label" for="input'{{ $i }}'">
                                <img
                                    src="@if ($images[$auxIndex]['tempUrl'] && $images[$auxIndex]['tempUrl'] != '' && $images[$auxIndex]['tempUrl'] != null) {{ $images[$auxIndex]['tempUrl'] }} @else {{ $auxImage }} @endif">
                                <div class="overlay">
                                    <a class="icon" title="Upload Image">
                                        <i class="ni ni-image"></i>
                                    </a>
                                </div>
                            </label>
                            <input wire:model="{{ $auxIndex }}" type="file" hidden
                                id="input'{{ $i }}'">
                            <button wire:click.prevent="deleteImages('{{ $auxIndex }}')" class="btn-delete"><i
                                    class="ni ni-fat-remove"></i></button>
                        </div>
                    </div>
                @endfor
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
        <button type="button" wire:click="updateInformation" class="btn bg-gradient-primary">Editar</button>
        <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Cerrar</button>
    </div>
</div>
