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
            <p class="m-0">Imagenes (10 imagenes maximo) </p>
        </label>
        @if ($images)
            <div class="row">

                <div class="col-4">
                    <label for="input1">
                        <img src="@if ($images['img1'] && $images['img1'] != '' && $images['img1'] != null) {{ $images['img1'] }} @else {{ $auxImage }} @endif"
                            alt="" class="img-thumbnail">
                    </label>
                    <input wire:model="img1" type="file" hidden id="input1">
                    <button wire:click.prevent="deleteImages('img1')" style="width:100%;"
                        class="btn bg-danger">Eliminar</button>
                </div>

                <div class="col-4">
                    <label for="input2">
                        <img src="@if ($images['img2'] && $images['img2'] != '' && $images['img2'] != null) {{ $images['img2'] }} @else {{ $auxImage }} @endif"
                            alt="" class="img-thumbnail">
                    </label>
                    <input wire:model="img2" type="file" hidden id="input2">
                    <button wire:click.prevent="deleteImages('img2')" style="width:100%;"
                        class="btn bg-danger">Eliminar</button>
                </div>

                <div class="col-4">
                    <label for="input3">
                        <img src="@if ($images['img3'] && $images['img3'] != '' && $images['img3'] != null) {{ $images['img3'] }} @else {{ $auxImage }} @endif"
                            alt="" class="img-thumbnail">
                    </label>
                    <input wire:model="img3" type="file" hidden id="input3">
                    <button wire:click.prevent="deleteImages('img3')" style="width:100%;"
                        class="btn bg-danger">Eliminar</button>
                </div>

                <div class="col-4">
                    <label for="input4">
                        <img src="@if ($images['img4'] && $images['img4'] != '' && $images['img4'] != null) {{ $images['img4'] }} @else {{ $auxImage }} @endif"
                            alt="" class="img-thumbnail">
                    </label>
                    <input wire:model="img4" type="file" hidden id="input4">
                    <button wire:click.prevent="deleteImages('img4')" style="width:100%;"
                        class="btn bg-danger">Eliminar</button>
                </div>

                <div class="col-4">
                    <label for="input5">
                        <img src="@if ($images['img5'] && $images['img5'] != '' && $images['img5'] != null) {{ $images['img5'] }} @else {{ $auxImage }} @endif"
                            alt="" class="img-thumbnail">
                    </label>
                    <input wire:model="img5" type="file" hidden id="input5">
                    <button wire:click.prevent="deleteImages('img5')" style="width:100%;"
                        class="btn bg-danger">Eliminar</button>
                </div>

                <div class="col-4">
                    <label for="input6">
                        <img src="@if ($images['img6'] && $images['img6'] != '' && $images['img6'] != null) {{ $images['img6'] }} @else {{ $auxImage }} @endif"
                            alt="" class="img-thumbnail">
                    </label>
                    <input wire:model="img6" type="file" hidden id="input6">
                    <button wire:click.prevent="deleteImages('img6')" style="width:100%;"
                        class="btn bg-danger">Eliminar</button>
                </div>

                <div class="col-4">
                    <label for="input7">
                        <img src="@if ($images['img7'] && $images['img7'] != '' && $images['img7'] != null) {{ $images['img7'] }} @else {{ $auxImage }} @endif"
                            alt="" class="img-thumbnail">
                    </label>
                    <input wire:model="img7" type="file" hidden id="input7">
                    <button wire:click.prevent="deleteImages('img7')" style="width:100%;"
                        class="btn bg-danger">Eliminar</button>
                </div>

                <div class="col-4">
                    <label for="input2">
                        <img src="@if ($images['img8'] && $images['img8'] != '' && $images['img8'] != null) {{ $images['img8'] }} @else {{ $auxImage }} @endif"
                            alt="" class="img-thumbnail">
                    </label>
                    <input wire:model="img8" type="file" hidden id="input8">
                    <button wire:click.prevent="deleteImages('img8')" style="width:100%;"
                        class="btn bg-danger">Eliminar</button>
                </div>

                <div class="col-4">
                    <label for="input9">
                        <img src="@if ($images['img9'] && $images['img9'] != '' && $images['img9'] != null) {{ $images['img9'] }} @else {{ $auxImage }} @endif"
                            alt="" class="img-thumbnail">
                    </label>
                    <input wire:model="img9" type="file" hidden id="input9">
                    <button wire:click.prevent="deleteImages('img9')" style="width:100%;"
                        class="btn bg-danger">Eliminar</button>
                </div>

                <div class="col-4">
                    <label for="input10">
                        <img src="@if ($images['img10'] && $images['img10'] != '' && $images['img10'] != null) {{ $images['img10'] }} @else {{ $auxImage }} @endif"
                            alt="" class="img-thumbnail">
                    </label>
                    <input wire:model="img10" type="file" hidden id="input10">
                    <button wire:click.prevent="deleteImages('img10')" style="width:100%;"
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
        <button type="button" wire:click="updateInformation" class="btn bg-gradient-primary">Editar</button>
        <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Cerrar</button>
    </div>
</div>
