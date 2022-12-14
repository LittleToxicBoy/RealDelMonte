<div>
    @if ($accion == 'agregar')
        <form wire:submit.prevent="agregarNegocioShowroom">
            <label style="color: black !important;">
                <p class="m-0">Nombre</p>
            </label>
            <div class="input-group mb-3">
                <input type="text" wire:model="nombre" class="form-control" placeholder="Casa abandonada">
            </div>
            @error('nombre')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror

            <label style="color: black !important;">
                <p class="m-0">Descripcion</p>
            </label>
            <div class="input-group mb-3">
                <input type="text" wire:model="descripcion" class="form-control" placeholder="Casa abandonada">
            </div>
            @error('descripcion')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror

            <div>
                <label style="color: black !important;">
                    <p class="m-0">Tipo de negocio</p>
                </label>
                <div class="input-group mb-3">
                    <select class="form-control" wire:model="tipo" name="" id="btnOptionTipoNegocio">
                        <option value="" selected>Seleccione tipo de negocio</option>
                        <option value="tienda">Tienda</option>
                        <option value="restaurante">Restaurante</option>
                        <option value="servicios">Servicios</option>
                    </select>
                </div>
            </div>

            <div>
                <label style="color: black !important;">
                    <p class="m-0">Imagenes</p>
                </label>
                <div class="d-flex">
                    <div class="input-group mb-3">
                        <input type="file" wire:model="imagenes" class="form-control" multiple>
                    </div>
                    <div wire:loading wire:target="imagenes" class="spinner-border text-warning" role="status">
                        <span class="visually-hidden">Cargando...</span>
                    </div>
                </div>
            </div>
            @error('imagenes')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror


            <button type="submit" class="btn bg-gradient-primary">Agregar</button>
            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cancelar</button>
        </form>
    @endif

    @if ($accion == 'editar')
        <form wire:submit.prevent="editarNegocio">
            <label style="color: black !important;">
                <p class="m-0">Nombre</p>
            </label>
            <div class="input-group mb-3">
                <input type="text" wire:model="nombre" class="form-control" placeholder="Casa abandonada">
            </div>
            @error('nombre')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror

            <label style="color: black !important;">
                <p class="m-0">Descripcion</p>
            </label>
            <div class="input-group mb-3">
                <input type="text" wire:model="descripcion" class="form-control" placeholder="Casa abandonada">
            </div>
            @error('descripcion')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror

            <div>
                <label style="color: black !important;">
                    <p class="m-0">Tipo de negocio</p>
                </label>
                <div class="input-group mb-3">
                    <select class="form-control" wire:model="tipo" name="" id="btnOptionTipoNegocio">
                        <option value="" selected>Seleccione tipo de negocio</option>
                        <option value="tienda">Tienda</option>
                        <option value="restaurante">Restaurante</option>
                        <option value="servicios">Servicios</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn bg-gradient-primary">Agregar</button>
            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cancelar</button>
        </form>

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
                            <label class="img-label" for="inputNegocioSr'{{ $i }}'">
                                <img
                                    src="@if ($images[$auxIndex]['tempUrl'] &&
                                        $images[$auxIndex]['tempUrl'] != '' &&
                                        $images[$auxIndex]['tempUrl'] != null) {{ $images[$auxIndex]['tempUrl'] }} @else {{ $auxImage }} @endif">
                                <div class="overlay">
                                    <a class="icon" title="Upload Image">
                                        <i class="ni ni-image"></i>
                                    </a>
                                </div>
                            </label>
                            <input wire:model="{{ $auxIndex }}" type="file" hidden
                                id="inputNegocioSr'{{ $i }}'">
                            <button wire:click.prevent="deleteImages('{{ $auxIndex }}')" class="btn-delete"><i
                                    class="ni ni-fat-remove"></i></button>
                        </div>
                    </div>
                @endfor
            </div>
        @endif
    @endif
</div>
