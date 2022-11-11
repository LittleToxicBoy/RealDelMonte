<div>
    <div class="card ">
        <div class="card-header pb-0 p-3 bg-red" style="background: #17202A; height: 50px !important;">
            <div class="d-flex justify-content-between">
                <h6 class="mb-2">Eventos</h6>
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
                </tbody>
            </table>
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
                        <label style="color: black !important;">
                            <p class="m-0">Nombre</p>
                        </label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Casa abandonada">
                        </div>

                        <label style="color: black !important;">
                            <p class="m-0">Descripcion</p>
                        </label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Descripcion">
                        </div>

                        <label style="color: black !important;">
                            <p class="m-0">Comienzo</p>
                        </label>
                        <div class="input-group mb-3">
                            <input type="date" class="form-control">
                        </div>

                        <label style="color: black !important;">
                            <p class="m-0">Termino</p>
                        </label>
                        <div class="input-group mb-3">
                            <input type="date" class="form-control">
                        </div>

                        <label style="color: black !important;">
                            <p class="m-0">Imagenes (Se necesitan 3 imagenes)</p>
                        </label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control">
                        </div>

                        <label style="color: black !important;">
                            <p class="m-0">Localizacion del lugar</p>
                        </label>

                        <div style="height: 180px;" id="map">

                        </div>


                        <input type="text" hidden id="latitud"  value="">
                        <input type="text" hidden id="longitud"  value="">

                        <div class="text-center">
                            <button type="button"
                                class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/administrar/mapa.js') }}"></script>
</div>
