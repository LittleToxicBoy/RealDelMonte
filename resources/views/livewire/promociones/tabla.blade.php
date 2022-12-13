<div class="text-black">
    @if ($negocio != null)
        <h4 class="text-white text-center mt-2 mb-2">{{ $negocio->nombre }} - Promociones</h4>

        <div class="card ">
            <div class="form-group p-4 pb-0 m-0">
                <div class="input-group input-group-alternative mb-4">
                    <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                    <input wire:model="searchTerm" class="form-control form-control-alternative" placeholder="Search"
                        type="text">
                </div>
            </div>
            <div class="card-header pb-0 p-3 bg-red" style="background: #17202A; height: 60px !important;">
                <div class="d-flex justify-content-between">
                    <h6 class="mb-2">Promociones</h6>
                    <button type="button" wire:click="agregar(0)" class="btn btn-success btnHeaderT"
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
                            <th class="text-center">Inicio</th>
                            <th class="text-center">Termino</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($promociones as $promocion)
                            <tr>
                                <td>
                                    <div class="text-center">
                                        <h6 class="text-sm mb-0">{{ $promocion->nombre }}</h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="td">
                                        <div class="celdaAsignado">
                                            <h6 class="text-sm mb-0 ">{{ $promocion->descripcion }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div class="text-center">
                                            <h6 class="text-sm mb-0 ">{{ $promocion->fechaInicio }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <h6 class="text-sm mb-0">{{ $promocion->fechaFin }}</h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <button wire:click="agregar({{ $promocion->idPromocion }})" class="btn btn-info m-0"><i class="ni ni-settings"></i></button>
                                        <button wire:click="eliminar({{ $promocion->idPromocion }})" class="btn btn-danger m-0">X</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <div class="d-flex align-items-center justify-content-center">
                {{ $promociones->links() }}
            </div>
        </div>

        <!-- Modal -->
        <div style="margin-left: 17.125rem;">
            <div class="modal fade" id="modalAgregarPromocion" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" style="color: #17202A !important;" id="exampleModalLabel">Agregar
                                nueva Promocion
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                style="color: red !important;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @livewire('promociones.form', [
                                'id_negocio' => $id_negocio,
                            ])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <script>
        window.addEventListener('openAddPromoModal', event => {
            $('#modalAgregarPromocion').modal('show');
        })
        window.addEventListener('closeAddPromoModal', event => {
            $('#modalAgregarPromocion').modal('hide');
        })
    </script>
</div>
