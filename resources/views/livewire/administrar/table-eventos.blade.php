<div>
    <div class="card ">
        <div class="card-header pb-0 p-3 bg-red" style="background: #17202A; height: 50px !important;">
            <div class="d-flex justify-content-between">
                <h6 class="mb-2">Eventos</h6>
                <div class="form-group">
                    <div class="input-group input-group-alternative mb-4">
                        <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                        <input wire:model="searchTerm" class="form-control form-control-alternative" placeholder="Search"
                            type="text">
                    </div>
                </div>
                <button type="button" class="btn btn-success btnHeaderT" id="openModal" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">+</button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table align-items-center ">
                <thead>
                    <tr>
                        <th class="text-center">Imagen</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Descripcion</th>
                        <th class="text-center">Fecha inicio</th>
                        <th class="text-center">Fecha de fin</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventos as $evento)
                        <tr>
                            <td class="w-30">
                                <div class="d-flex px-2 py-1 align-items-center justify-conten-center">
                                    <div style="display: flex; justify-content: center; width: -webkit-fill-available">
                                        <img src="{{ $evento->img1 }}" height="80px" width="80px" alt="Country flag">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <h6 class="text-sm mb-0">{{ $evento->nombre }}</h6>
                                </div>
                            </td>
                            <td>
                                <div class="celdaAsignado">
                                    <h6 class="text-sm mb-0">{{ $evento->descripcion }}</h6>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <h6 class="text-sm mb-0">{{ $evento->fechaInicio }}</h6>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <h6 class="text-sm mb-0">{{ $evento->fechaTermino }}</h6>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <button wire:click="openEditModal({{ $evento }})"
                                        class="btn openEditModal btn-info m-0"><i class="ni ni-settings"></i></button>
                                    <button wire:click="openDeleteModal({{ $evento->idEvento }})"
                                        class="btn btn-danger m-0"><i class="ni ni-fat-delete"></i></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex align-items-center justify-content-center">
                {{ $eventos->links() }}
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div style="margin-left: 17.125rem;">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: #17202A !important;" id="exampleModalLabel">Nuevo Evento
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @livewire('eventos-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--- Modal -->
    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modal-notification"
        aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" style="color:black;" id="modal-title-notification">Eliminar Evento</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div wire:loading.delay wire:target="deleteEvento" style="width:100%;">
                        <div class="text-center">
                            <div class="spinner-border text-primary" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </div>
                    <div wire:loading.remove wire:target="deleteEvento">
                        <div class="py-3 text-center">
                            <i class="ni ni-bell-55 ni-3x" style="color:cadetblue;"></i>
                            <h4 class="text-gradient text-danger mt-4">Esta seguro de eliminar este evento?</h4>
                            <p style="color:darkgrey;">Las acciones no podran ser canceladas.</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div wire:loading.remove wire:target="deleteEvento">
                        <button type="button" wire:click="deleteEvento"
                            class="btn bg-gradient-danger">Eliminar</button>
                        <button type="button" class="btn btn-link bg-gradient-secondary ml-auto"
                            data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modal-default"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" style="color:black !important;" id="modal-title-default">Editar Evento
                    </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                @livewire('administrar.eventos-edit-form')
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/administrar/mapa.js') }}"></script>
</div>
