<form role="form text-left"  wire:submit.prevent="submit">
    <label style="color: black !important;">
        <p class="m-0">Nombre</p>
    </label>
    <div class="input-group mb-3">
        <input type="text" wire:model="nombre" class="form-control" placeholder="Casa abandonada">
    </div>

    <label style="color: black !important;">
        <p class="m-0">Descripcion</p>
    </label>
    <div class="input-group mb-3">
        <input type="text" wire:model="descripcion" class="form-control" placeholder="Descripcion">
    </div>

    <div class="gridAjuste2">
        <div>
            <label style="color: black !important;">
                <p class="m-0">Horario</p>
            </label>
            <div class="input-group mb-3">
                <input type="text" wire:model="horario" class="form-control" placeholder="Descripcion">
            </div>
        </div>
        <div>
            <label style="color: black !important;">
                <p class="m-0">Tipo</p>
            </label>
            <div class="input-group mb-3">
                <select class="form-control" wire:model="tipo" name="" id="">
                    <option value="">Seleccione tipo de negocio</option>
                    <option value="">Tienda</option>
                    <option value=""></option>
                </select>
            </div>
        </div>
    </div>
    <div>
        <label style="color: black !important;">
            <p class="m-0">Imagenes</p>
        </label>
        <div class="input-group mb-3">
            <input type="file" wire:model="imagenes" class="form-control" multiple>
        </div>
    </div>


    <div class="d-flex gap-3">
        <div>
            <div class="input-group mb-3">
                <input type="text" wire:model="latitud" id="latitud" class="form-control" placeholder="" readonly hidden>
            </div>
        </div>
        <div>
            <div class="input-group mb-3">
                <input type="text" wire:model="longitud" id="longitud" class="form-control" placeholder="" readonly hidden>
            </div>
        </div>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Aceptar</button>
    </div>
</form>