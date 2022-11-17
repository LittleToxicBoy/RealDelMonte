<div>
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne" style="background: #4A235A !important; border-radius: 10px">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <h6 class="m-0">Datos generales</h6 class="m-0">
                </button>
            </h2>

            <div id="map" class="map"></div>

            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                data-bs-parent="#accordionExample">

                <label >
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
                <label >
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
                        <label >
                            <p class="m-0">Horario</p>
                        </label>
                        <div class="input-group mb-3">
                            <input type="text" wire:model="horario" class="form-control" placeholder="Descripcion">
                        </div>
                    </div>
                    <div>
                        <label >
                            <p class="m-0">Tipo</p>
                        </label>
                        <div class="input-group mb-3">
                            <select class="form-control" wire:model="tipo" name="" id="btnOptionTipoNegocio">
                                <option value="" selected>Seleccione tipo de negocio</option>
                                <option value="tienda">Tienda</option>
                                <option value="restaurante">Restaurante</option>
                                <option value="recorrido">Recorrido</option>
                                <option value="hotel">hotel</option>
                                <option value="wc">wc</option>
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
                    <label >
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
            </div>
        </div>
        <div class="accordion-item mt-4">
            <h2 class="accordion-header" id="headingThree" style="background: #4A235A !important; border-radius: 10px">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <h6>Negocios datos</h6>
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div>
                        @if ($tipo == 'restaurante' || $tipo == 'showroom')
                            <div class="card ">
                                <div class="card-header pb-0 p-3 bg-red"
                                    style="background: #17202A; height: 50px !important;">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-2">Restaurante Menu</h6>
                                        <button type="button" id="openModal" class="btn btn-success btnHeaderT"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal">+</button>
                                    </div>
                                </div>
    
                                <!-- <div class="map" id="map"></div> -->
                                <div class="table-responsive">
                                    <table class="table align-items-center ">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Nombre</th>
                                                <th class="text-center">Descripcion</th>
                                                <th class="text-center">Precio</th>
                                                <th class="text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
    
                                            <tr>
                                                <td>
                                                    <div class="text-center">
                                                        <h6 class="text-sm mb-0"></h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td">
                                                        <div class="celdaAsignado">
                                                            <h6 class="text-sm mb-0 "></h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td">
                                                        <div class="celdaAsignado">
                                                            <h6 class="text-sm mb-0 "></h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center gap-2">
                                                        <button wire:click="" class="btn btn-info m-0"><i
                                                                class="ni ni-settings"></i></button>
                                                        <button wire:click="" class="btn btn-danger m-0">X</button>
                                                    </div>
                                                </td>
                                            </tr>
    
                                        </tbody>
                                    </table>
                                </div>
                                {{-- <div class="d-flex align-items-center justify-content-center">
                            {{ $negocios->links() }}
                        </div> --}}
                            </div>
                        @endif
    
                        @if ($tipo == 'Habitacion' || $tipo == 'showroom')
                            <div class="card ">
                                <div class="card-header pb-0 p-3 bg-red"
                                    style="background: #17202A; height: 50px !important;">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-2">Hospedaje</h6>
                                        <button type="button" id="openModal" class="btn btn-success btnHeaderT"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal">+</button>
                                    </div>
                                </div>
    
                                <!-- <div class="map" id="map"></div> -->
                                <div class="table-responsive">
                                    <table class="table align-items-center ">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Nombre</th>
                                                <th class="text-center">Descripcion</th>
                                                <th class="text-center">Precio</th>
                                                <th class="text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
    
                                            <tr>
                                                <td>
                                                    <div class="text-center">
                                                        <h6 class="text-sm mb-0"></h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td">
                                                        <div class="celdaAsignado">
                                                            <h6 class="text-sm mb-0 "></h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td">
                                                        <div class="celdaAsignado">
                                                            <h6 class="text-sm mb-0 "></h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center gap-2">
                                                        <button wire:click="" class="btn btn-info m-0"><i
                                                                class="ni ni-settings"></i></button>
                                                        <button wire:click="" class="btn btn-danger m-0">X</button>
                                                    </div>
                                                </td>
                                            </tr>
    
                                        </tbody>
                                    </table>
                                </div>
                                {{-- <div class="d-flex align-items-center justify-content-center">
                            {{ $negocios->links() }}
                        </div> --}}
                            </div>
                        @endif
    
                        @if ($tipo == 'recorrido')
                            <div class="card ">
                                <div class="card-header pb-0 p-3 bg-red"
                                    style="background: #17202A; height: 50px !important;">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-2">Recorridos</h6>
                                        <button type="button" id="openModal" class="btn btn-success btnHeaderT"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal">+</button>
                                    </div>
                                </div>
    
                                <!-- <div class="map" id="map"></div> -->
                                <div class="table-responsive">
                                    <table class="table align-items-center ">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Nombre</th>
                                                <th class="text-center">Descripcion</th>
                                                <th class="text-center">Precio</th>
                                                <th class="text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
    
                                            <tr>
                                                <td>
                                                    <div class="text-center">
                                                        <h6 class="text-sm mb-0"></h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td">
                                                        <div class="celdaAsignado">
                                                            <h6 class="text-sm mb-0 "></h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td">
                                                        <div class="celdaAsignado">
                                                            <h6 class="text-sm mb-0 "></h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center gap-2">
                                                        <button wire:click="" class="btn btn-info m-0"><i
                                                                class="ni ni-settings"></i></button>
                                                        <button wire:click="" class="btn btn-danger m-0">X</button>
                                                    </div>
                                                </td>
                                            </tr>
    
                                        </tbody>
                                    </table>
                                </div>
                                {{-- <div class="d-flex align-items-center justify-content-center">
                            {{ $negocios->links() }}
                        </div> --}}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
