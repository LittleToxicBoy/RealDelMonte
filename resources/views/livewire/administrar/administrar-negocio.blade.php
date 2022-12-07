<div>
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne" style="background: #4A235A !important; border-radius: 10px"
                wire:ignore>
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                    aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                    <h6 class="m-0">Datos generales</h6 class="m-0">
                </button>
            </h2>

            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                data-bs-parent="#accordionExample">
                <div id="mapEditParent">
                    <div wire:ignore style="height: 180px;" id="mapEditModal">
                    </div>

                </div>

                <form wire:submit.prevent="actualizarInfo">
                    <label>
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
                    <label>
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
                            <label>
                                <p class="m-0">Horario</p>
                            </label>
                            <div class="input-group mb-3">
                                <input type="text" wire:model="horario" class="form-control"
                                    placeholder="Descripcion">
                            </div>
                        </div>
                        <div>
                            <label>
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
                    <div style="display: none;">
                        <label>
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
                    <label style="color: black !important;">
                        <p class="m-0">Imagenes (10 imagenes maximo) </p>
                    </label>
                    @if ($images)
                        <div class="gridImg">
                            @for ($i = 1; $i < 11; $i++)
                                @php
                                    $auxIndex = 'img' . $i;
                                    $auxUp = ucfirst($auxIndex);
                                @endphp
                                <div style="margin-bottom:10px;margin-top:10px; width: 100%;" class="col-4">
                                    <div class="image-div">
                                        <label class="img-label" for="input'{{ $i }}'">
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
                                            id="input'{{ $i }}'">
                                        <button wire:click.prevent="deleteImages('{{ $auxIndex }}')"
                                            class="btn-deletesAd"><i class="ni ni-fat-remove"></i></button>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    @endif
                    @error('imagenes')
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror

                    <div class="d-flex gap-3">
                        <div>
                            <div class="input-group mb-3">
                                <input type="text" wire:model="latitud" id="latitude" class="form-control"
                                    placeholder="" hidden>
                            </div>
                        </div>
                        <div>
                            <div class="input-group mb-3">
                                <input type="text" wire:model="longitud" id="longitude" class="form-control"
                                    placeholder="" hidden>
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

                    <button type="submit" class="btn bg-gradient-primary">Aceptar</button>
                </form>
            </div>
        </div>
    </div>
    <div class="">
        <h3 class="text-center mt-4 mb-4" style="color: white;">Administrar</h3>
        <div>
            @if ($tipo == 'restaurante')
                @livewire('administrar.table-restaurant', [
                    'id_negocio' => $id_negocio,
                    'tipo' => $tipo,
                ])
            @endif

            @if ($tipo == 'showroom')
                @livewire('administrar.table-negocios-sr', [
                    'id_negocio' => $id_negocio,
                ])
            @endif

            @if ($tipo == 'hotel')
                @livewire('administrar.table-hotel', [
                    'id_negocio' => $id_negocio,
                    'tipo' => $tipo,
                ])
            @endif

            @if ($tipo == 'recorrido')
                @livewire('administrar.table-recorrido', [
                    'id_negocio' => $id_negocio,
                ])
            @endif
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/administrar/negociosEdit.js') }}"></script>
</div>
