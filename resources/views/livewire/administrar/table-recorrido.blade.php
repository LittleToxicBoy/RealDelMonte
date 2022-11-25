<div>
    <div class="card ">
        <div class="card-header pb-0 p-3 bg-red" style="background: #17202A; height: 50px !important;">
            <div class="d-flex justify-content-between">
                <h6 class="mb-2">Restaurante</h6>

                <button wire:click.prevent='agregarRecorrido()' type="button" id="openModal"
                    class="btn btn-success btnHeaderT">+</button>
            </div>
        </div>

        <!-- <div class="map" id="map"></div> -->
        <div class="table-responsive">
            <table class="table align-items-center ">
                <thead>
                    <tr>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Costo</th>
                        <th class="text-center">Duracion</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recorridos as $recorrido)
                        <tr>
                            <td>
                                <div class="text-center">
                                    <h6 class="text-sm mb-0">{{ $recorrido->nombre }}</h6>
                                </div>
                            </td>
                            <td>
                                <div class="td">
                                    <div class="celdaAsignado" style="display: flex; justify-content: center;">
                                        <h6 class="text-sm mb-0">{{ $recorrido->costo }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="td">
                                    <div class="celdaAsignado">
                                        <h6 class="text-sm mb-0">{{ $recorrido->duracion }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <button wire:click="editarRcorrido({{ $recorrido }})"
                                        class="btn btn-info m-0"><i class="ni ni-settings"></i></button>
                                    <button wire:click="eliminarRecorrido({{ $recorrido->idRecorrido }})"
                                        class="btn btn-danger m-0">X</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex align-items-center justify-content-center">
            {{ $recorridos->links() }}
        </div>
    </div>


    <div class="modal fade" id="mdlAddEditRecorridos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: #17202A !important;">Agregar Recorrido
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @livewire('administrar.form-recorrido', [
                        'id_negocio' => $id_negocio,
                    ])
                </div>
            </div>
        </div>
    </div>

</div>
