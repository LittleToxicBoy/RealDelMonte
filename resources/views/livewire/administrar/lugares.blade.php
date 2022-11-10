<div class="">
    <div class="card ">
        <div class="card-header pb-0 p-3 bg-red" style="background: #17202A; height: 50px !important;">
            <div class="d-flex justify-content-between">
                <h6 class="mb-2">Lugares</h6>
                <button type="button" class="btn btn-success btnHeaderT" data-bs-toggle="modal" data-bs-target="#exampleModal">+</button>
            </div>
        </div>
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
                    <tr>
                        <td class="w-30">
                            <div class="d-flex px-2 py-1 align-items-center justify-conten-center">
                                <div style="display: flex; justify-content: center; width: -webkit-fill-available">
                                    <img src="https://i.pinimg.com/236x/f8/ec/7a/f8ec7af110cc2af730f9ff294b8df70f.jpg" height="80px" width="80px" alt="Country flag">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <h6 class="text-sm mb-0">Estatua mamona de cobre</h6>
                            </div>
                        </td>
                        <td>
                            <div class="td">
                                <div class="celdaAsignado">
                                    <h6 class="text-sm mb-0 ">Calle san geronimo con cruzada la casa de las margaritas</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn btn-info m-0"><i class="ni ni-settings"></i></button>
                                <button class="btn btn-danger m-0">X</button>
                            </div>
                        </td>
                    </tr>

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
                        <form enctype="multipart/form-data" method="POST" action="{{ route('uploadImage') }}">
                            @csrf
                            <input type="file" name="imagen" id="imagen">

                            <button type="submit" class="btn btn-success">succes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/administrar/lugaresMapa.js') }}"></script>
</div>