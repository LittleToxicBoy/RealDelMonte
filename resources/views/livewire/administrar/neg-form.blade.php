<form role="form text-left" wire:submit.prevent="submit">
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <h6 class="m-0" style="color: black !important;">Datos generales</h6 class="m-0">
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                data-bs-parent="#accordionExample">

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
                    <input type="text" wire:model="descripcion" class="form-control" placeholder="Descripcion">
                </div>
                @error('descripcion')
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
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
                            <select class="form-control" wire:model="tipo" name="" id="btnOptionTipoNegocio">
                                <option value="" selected>Seleccione tipo de negocio</option>
                                <option value="tienda">Tienda</option>
                                <option value="showroom">showroom</option>
                                <option value="restaurante">Restaurante</option>
                                <option value="recorrido">Recorrido</option>
                                <option value="hotel">hotel</option>
                                <option value="servicios">Servicios</option>
                                <option value="transporte">Transporte</option>
                            </select>
                        </div>
                    </div>
                </div>
                @error('horario')
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                @error('tipo')
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
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

                <div class="d-flex gap-3">
                    <div>
                        <div class="input-group mb-3">
                            <input type="text" wire:model="latitud" id="latitud" class="form-control"
                                placeholder="" readonly hidden>
                        </div>
                    </div>
                    <div>
                        <div class="input-group mb-3">
                            <input type="text" wire:model="longitud" id="longitud" class="form-control"
                                placeholder="" readonly hidden>
                        </div>
                    </div>
                </div>
                @error('latitud')
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                @error('longitud')
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror

                @if ($tipo == 'restaurante')
                    <label style="color: black !important;">
                        <p class="m-0" id="nombreDerivado">Imagenes menu del restaurante</p>
                    </label>
                    <div class="d-flex">
                        <div class="input-group mb-3">
                            <input type="file" wire:model="imagenesDerivado" class="form-control" multiple>
                        </div>
                        <div wire:loading wire:target="imagenesDerivado" class="spinner-border text-warning"
                            role="status">
                            <span class="visually-hidden">Cargando...</span>
                        </div>
                    </div>
                    @error('imagenesDerivado')
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                @endif
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Aceptar</button>

</form>
