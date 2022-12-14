<div class="">
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
                <h6 class="mb-2">Lugares</h6>
                <button type="button" id="openModal" class="btn btn-success btnHeaderT" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">+</button>
            </div>
        </div>
        <!-- <div class="map" id="map"></div> -->
        <div class="table-responsive">
            <table class="table align-items-center ">
                <thead>
                    <tr>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Descripcion</th>
                        <th class="text-center">Horario</th>
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
                                    <div class="celdaAsignado">
                                        <h6 class="text-sm mb-0 ">{{ $negocio->horarioDes }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <h6 class="text-sm mb-0">{{ $negocio->tipo }}</h6>
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
                                    <a href="{{ route('negociosAdministrar', ['idNegocio' => $negocio->idNegocio, 'tipo' => $negocio->tipo]) }}"
                                        class="btn btn-info m-0"><i class="ni ni-settings"></i></a>

                                    @if ($negocio->tipo != 'showroom')
                                        <a href="{{ route('negociosPromociones', ['negocio' => $negocio->idNegocio]) }}"
                                            class="btn btn-success m-0"><i class="fas fa-list-alt"></i></a>
                                    @endif

                                    <button wire:click="asignarId({{ $negocio }}, 'eliminar')"
                                        class="btn btn-danger m-0">X</button </div>
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


    <!-- Modal -->
    <div style="margin-left: 17.125rem;">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: #17202A !important;" id="exampleModalLabel">Agregar Lugar
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            style="color: red !important;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="mapParent"></div>

                        <livewire:administrar.neg-form />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal ELIMINAR -->
    <div style="margin-left: 17.125rem;">
        <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: #17202A !important;" id="exampleModalLabel">Eliminar
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            style="color: red !important;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center" style="color: #17202A !important;">Deseas eliminar este negocio?</h5>
                        <p class="text-center" style="color: #17202A !important;">Una vez realizado no se podra
                            revertir
                        </p>

                        <div class="d-flex justify-content-center">
                            <button wire:click="eliminar" class="btn btn-warning">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal EDITAR -->
    <div style="margin-left: 17.125rem;">
        <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: #17202A !important;" id="exampleModalLabel">Administrar
                            Negocio
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            style="color: red !important;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        <h6 style="color: #17202A !important;">Editar informacion del negocio</h6>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">

                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        <h6 style="color: #17202A !important;">Añadir </h6>
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Promociones --}}
    <div style="margin-left: 17.125rem;">
        <div class="modal fade" id="modalPromociones" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: #17202A !important;" id="exampleModalLabel">Promociones
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            style="color: red !important;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{-- <h3 class="text-black" style="color: #17202A !important;">{{ var_dump($idNegocio) }}</h3> --}}
                    <div class="modal-body">
                        @livewire('promociones.tabla', [
                            'negocio' => $idNegocio,
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- SCRIPTS --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/administrar/mapa.js') }}"></script>
    <script>
        $(document).on('change', '#btnOptionTipoNegocio', function() {
            if ($(this).val() == 'restaurante') {
                $('#derivadoNegocio').show();
            } else {
                $('#derivadoNegocio').hide();
            }
        })

        window.addEventListener('openDeleteModal', event => {
            $('#modalEliminar').modal('show');
        })
        window.addEventListener('closeDeleteModal', event => {
            $('#modalEliminar').modal('hide');
        })

        window.addEventListener('openAdmModal', event => {
            $('#modalEditar').modal('show');
        })
        window.addEventListener('closeAdmModal', event => {
            $('#modalEditar').modal('hide');
        })

        window.addEventListener('openPromoModal', event => {
            $('#modalPromociones').modal('show');
        })
        window.addEventListener('closePromoModal', event => {
            $('#modalPromociones').modal('hide');
        })
    </script>
</div>
