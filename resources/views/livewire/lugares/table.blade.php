<div>
    <div class="card ">
        <div class="card-header pb-0 p-3 bg-red" style="background: #17202A; height: 50px !important;">
            <div class="d-flex justify-content-between">
                <h6 class="mb-2">Lugares</h6>
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
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lugares as $lugar)
                        <tr>
                            <td class="w-30">
                                <div class="d-flex px-2 py-1 align-items-center justify-conten-center">
                                    <div style="display: flex; justify-content: center; width: -webkit-fill-available">
                                        <img src="{{ $lugar->img1 }}" height="80px" width="80px" alt="Country flag">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <h6 class="text-sm mb-0">{{ $lugar->nombre }}</h6>
                                </div>
                            </td>
                            <td>
                                <div class="celdaAsignado">
                                    <h6 class="text-sm mb-0">{{ $lugar->descripcion }}</h6>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <button wire:click="openEditModal({{ $lugar }})"
                                        class="btn openEditModal btn-info m-0"><i class="ni ni-settings"></i></button>
                                    <button wire:click="openDeleteModal({{ $lugar->id }})"
                                        class="btn btn-danger m-0"><i class="ni ni-fat-delete"></i></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex align-items-center justify-content-center">
                {{ $lugares->links() }}
            </div>
        </div>
    </div>

    {{-- ! Modales section --}}

    <div style="margin-left: 17.125rem;">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: #17202A !important;" id="exampleModalLabel">Nuevo Lugar
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @livewire('lugares.create-form')
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ! Modal Eliminar --}}

    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modal-notification"
        aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" style="color:black;" id="modal-title-notification">Eliminar Lugar</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="py-3 text-center">
                        <i class="ni ni-bell-55 ni-3x" style="color:cadetblue;"></i>
                        <h4 class="text-gradient text-danger mt-4">Esta seguro de eliminar este lugar?</h4>
                        <p style="color:darkgrey;">Las acciones no podran ser canceladas.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="deleteLugar" class="btn bg-gradient-danger">Eliminar</button>
                    <button type="button" class="btn btn-link bg-gradient-secondary ml-auto"
                        data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    {{-- ! Modal Editar --}}

    <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modal-default"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" style="color:black !important;" id="modal-title-default">Editar Lugar
                    </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                @livewire('lugares.edit-form')
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/administrar/mapa.js') }}"></script>
</div>
