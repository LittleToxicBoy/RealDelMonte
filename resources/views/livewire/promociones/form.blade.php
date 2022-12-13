<div>
    {{ $id_promo }}
    <form wire:submit.prevent="agregarNegocioShowroom">
        <label style="color: black !important;">
            <p class="m-0">Nombre</p>
        </label>
        <div class="input-group mb-3">
            <input type="text" wire:model="nombre" class="form-control" placeholder="Casa abandonada">
        </div>
        @error('nombre')
            <div class="alert alert-danger" role="alert">
                <strong>{{ $message }}</strong>
            </div>
        @enderror

        <label style="color: black !important;">
            <p class="m-0">Descripcion</p>
        </label>
        <div class="input-group mb-3">
            <input type="text" wire:model="descripcion" class="form-control" placeholder="2 x 4 ">
        </div>
        @error('descripcion')
            <div class="alert alert-danger" role="alert">
                <strong>{{ $message }}</strong>
            </div>
        @enderror

        <div class="grid2Columns">
            <div>
                <label style="color: black !important;">
                    <p class="m-0">Fecha Inicio</p>
                </label>
                <div class="input-group mb-3">
                    <input type="date" wire:model="inicio" class="form-control" placeholder="Casa abandonada">
                </div>
                @error('inicio')
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>

            <div>
                <label style="color: black !important;">
                    <p class="m-0">Fecha Termino</p>
                </label>
                <div class="input-group mb-3">
                    <input type="date" wire:model="termino" class="form-control" placeholder="Casa abandonada">
                </div>
                @error('termino')
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>
        </div>

        <div>
            <label style="color: black !important;">
                <p class="m-0">Activa (si/no)</p>
            </label>
            <div class="input-group mb-3">
                <select class="form-control" wire:model="activo" name="" id="">
                    <option value="">Seleccione una opcion</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
            </div>
        </div>
        @error('activo')
            <div class="alert alert-danger" role="alert">
                <strong>{{ $message }}</strong>
            </div>
        @enderror

        {{-- Imagen --}}
        @if ($id_promo != 0)
            <div class="d-flex justify-content-center">
                <img src="{{ $urlAux }}" alt="" height="150px" width="150px">
            </div>
        @endif
        <div>
            <label style="color: black !important;">
                <p class="m-0">Imagen</p>
            </label>
            <div class="d-flex">
                <div class="input-group mb-3">
                    <input type="file" wire:model="img" class="form-control">
                </div>
                <div wire:loading wire:target="img" class="spinner-border text-warning" role="status">
                    <span class="visually-hidden">Cargando...</span>
                </div>
            </div>
        </div>
        @error('img')
            <div class="alert alert-danger" role="alert">
                <strong>{{ $message }}</strong>
            </div>
        @enderror


        <button type="submit" class="btn bg-gradient-primary" style="width: 100%">@if ($id_promo == 0)
            Agregar
        @else
            Editar
        @endif</button>
    </form>
</div>
