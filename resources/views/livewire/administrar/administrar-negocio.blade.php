<div>
    <div class="card ">
        <div class="card-header pb-0 p-3 bg-red" style="background: #17202A; height: 50px !important;">
            <div class="d-flex justify-content-between">
                <h6 class="mb-2">Hospedaje</h6>
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
                                <button wire:click=""
                                    class="btn btn-danger m-0">X</button>
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
    
</div>
