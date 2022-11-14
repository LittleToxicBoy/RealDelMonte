<div class="">
    <div class="card ">
        <div class="card-header pb-0 p-3 bg-red" style="background: #17202A; height: 50px !important;">
            <div class="d-flex justify-content-between">
                <h6 class="mb-2">Lugares</h6>
                <button type="button" class="btn btn-success btnHeaderT" data-bs-toggle="modal" data-bs-target="#exampleModal">+</button>
            </div>
        </div>
        <!-- <div class="map" id="map"></div> -->
        <div class="table-responsive">
            <table class="table align-items-center ">
                <thead>
                    <tr>
                        <th class="text-center">Imagen</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Direccion</th>
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
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: #17202A !important;" id="exampleModalLabel">Agregar Lugar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="map" id="map"></div>
                        <form role="form text-left">
                            <label style="color: black !important;"><p class="m-0">Nombre</p></label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Casa abandonada" >
                            </div>

                            <label style="color: black !important;"><p class="m-0">Descripcion</p></label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Descripcion">
                            </div>

                            <div class="text-center">
                                <button type="button" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Aceptar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/administrar/lugaresMapa.js') }}"></script>
</div>
