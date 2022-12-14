<div class="mt-4">
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
                <h6 class="mb-2">Negocios en el Showroom</h6>
                <button wire:click.prevent='agregarNegocio' type="button" id="openModal"
                    class="btn btn-success btnHeaderT">+</button>
            </div>
        </div>
        <!-- <div class="map" id="map"></div> -->
        <div class="table-responsive">
            <table class="table align-items-center ">
                <thead>
                    <tr>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Descripcion</th>
                        <th class="text-center">Tipo</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($negocios as $negocio)
                        <tr>
                            <td>
                                <div class="text-center">
                                    <h6 class="text-sm mb-0">{{ $negocio->nombre }}</h6>
                                </div>
                            </td>
                            <td>
                                <div class="td">
                                    <div class="celdaAsignado">
                                        <h6 class="text-sm mb-0 ">{{ $negocio->descripcion }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="td">
                                    <div class="">
                                        <h6 class="text-sm mb-0 ">{{ $negocio->tipo }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <select class="form-control" wire:change="cambiarEstado({{ $negocio->idNegocio }})" name="">
                                        <option value="si" @if ($negocio->activo == 'si') selected @endif>Si</option>
                                        <option value="no" @if ($negocio->activo == 'no') selected @endif>No</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <button wire:click="editarNegocio({{ $negocio }})" class="btn btn-info m-0"><i
                                            class="ni ni-settings"></i></button>

                                    <a href="{{ route('negociosPromociones', ['negocio' => $negocio->idNegocio]) }}"
                                        class="btn btn-success m-0"><i class="fas fa-list-alt"></i></a>

                                    <button wire:click="eliminarNegocio({{ $negocio->idNegocio }})"
                                        class="btn btn-danger m-0">X</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex align-items-center justify-content-center">
            {{ $negocios->links() }}
        </div>
    </div>

    <div class="modal fade" id="modalAgregarNegocioShowroom" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: #17202A !important;">Agregar nuevo
                        negocio
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @livewire('administrar.form-negocios-showroom', [
                        'id_negocio' => $id_negocio,
                    ])
                </div>
            </div>
        </div>
    </div>
</div>
