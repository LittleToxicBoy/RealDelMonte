<?php

namespace App\Http\Livewire\Administrar;

use App\Http\Controllers\helpers\imageController;
use App\Models\Hospedaje;
use App\Models\Negocios as ModelsNegocios;
use App\Models\Recorridos;
use App\Models\Restaurantes;
use Livewire\Component;
use Livewire\WithPagination;

class Negocios extends Component
{
    use WithPagination;
    public $actualId;
    public $idNegocio, $negocioActivo;
    public $searchTerm = "";
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'refreshEventos' => '$refresh'
    ];
    ///EL id_negocio es el objeto en si, solo que al prinicipio unicamente traeria la variable del id, pero se cambio

    public function asignarId($idNegocio, $tipo)
    {
        $this->idNegocio = $idNegocio;
        if ($tipo == 'eliminar') {
            $this->dispatchBrowserEvent('openDeleteModal');
        }
        if ($tipo == 'editar') {
            $this->dispatchBrowserEvent('openAdmModal');
        }
        if ($tipo == 'promociones') {
            $this->dispatchBrowserEvent('openPromoModal');
        }
    }

    public function cambiarEstado($id){
        $negocio = ModelsNegocios::find($id);
        if($negocio->activo == 'si'){
            $negocio->activo = 'no';
        }else{
            $negocio->activo = 'si';
        }
        $negocio->save();
        $this->dispatchBrowserEvent("alert", [
            "type" => "success",
            "message" => "Estado cambiado"
        ]);
    }

    public function eliminar()
    {
        $imageController  =  new imageController();
        // dd($this->idNegocio);
        if ($this->idNegocio['tipo'] == 'tienda' || $this->idNegocio['tipo'] == 'servicios' || $this->idNegocio['tipo'] == 'transporte') {
            $delete = ModelsNegocios::where('idNegocio', $this->idNegocio['idNegocio'])->first();
            // find($this->idNegocio['idNegocio']);
            for ($i = 0; $i < 10; $i++) {
                $a = $i + 1;
                $index = 'img' . $a;
                $actualImage = $delete[$index];
                if ($actualImage) {
                    $imageController->deleteImageGcs($actualImage);
                }
            }
            $delete->delete();
            $this->dispatchBrowserEvent("alert", [
                "type" => "success",
                "message" => "Eliminado correctamente"
            ]);
        }

        if ($this->idNegocio['tipo'] == 'restaurante' || $this->idNegocio['tipo'] == 'showroom') {
            $deleteD = Restaurantes::where('idNegocio', $this->idNegocio['idNegocio'])->get();
            foreach ($deleteD as $key => $dl) {
                for ($i = 0; $i < 10; $i++) {
                    $a = $i + 1;
                    $index = 'img' . $a;
                    $actualImage = $dl[$index];
                    if ($actualImage) {
                        $imageController->deleteImageGcs($actualImage);
                    }
                }
                $dl->delete();
            }
            $delete = ModelsNegocios::find($this->idNegocio['idNegocio']);
            for ($i = 0; $i < 10; $i++) {
                $a = $i + 1;
                $index = 'img' . $a;
                $actualImage = $delete[$index];
                if ($actualImage) {
                    $imageController->deleteImageGcs($actualImage);
                }
            }
            $delete->delete();
            $this->dispatchBrowserEvent("alert", [
                "type" => "success",
                "message" => "Eliminado correctamente"
            ]);
        }

        if ($this->idNegocio['tipo'] == 'hotel') {
            $deleteD = Hospedaje::where('idNegocio', $this->idNegocio['idNegocio'])->get();
            foreach ($deleteD as $key => $dl) {
                for ($i = 0; $i < 10; $i++) {
                    $a = $i + 1;
                    $index = 'img' . $a;
                    $actualImage = $dl[$index];
                    if ($actualImage) {
                        $imageController->deleteImageGcs($actualImage);
                    }
                }
                $dl->delete();
            }
            $delete = ModelsNegocios::find($this->idNegocio['idNegocio']);
            for ($i = 0; $i < 10; $i++) {
                $a = $i + 1;
                $index = 'img' . $a;
                $actualImage = $delete[$index];
                if ($actualImage) {
                    $imageController->deleteImageGcs($actualImage);
                }
            }
            $delete->delete();
            $this->dispatchBrowserEvent("alert", [
                "type" => "success",
                "message" => "Eliminado correctamente"
            ]);
        }

        if ($this->idNegocio['tipo'] == 'recorrido') {
            $deleteD = Recorridos::where('idNegocio', $this->idNegocio['idNegocio'])->get();
            foreach ($deleteD as $key => $dl) {
                for ($i = 0; $i < 10; $i++) {
                    $a = $i + 1;
                    $index = 'img' . $a;
                    $actualImage = $dl[$index];
                    if ($actualImage) {
                        $imageController->deleteImageGcs($actualImage);
                    }
                }
                $dl->delete();
            }
            $delete = ModelsNegocios::find($this->idNegocio['idNegocio']);
            for ($i = 0; $i < 10; $i++) {
                $a = $i + 1;
                $index = 'img' . $a;
                $actualImage = $delete[$index];
                if ($actualImage) {
                    $imageController->deleteImageGcs($actualImage);
                }
            }
            $delete->delete();
            $this->dispatchBrowserEvent("alert", [
                "type" => "success",
                "message" => "Eliminado correctamente"
            ]);
        }

        $this->dispatchBrowserEvent('closeDeleteModal');
        $this->emit('refreshEventos');
    }

    public function render()
    {
        $search = '%' . $this->searchTerm . '%';
        $negocios = ModelsNegocios::where('idPueblo', 1)
            ->where(function ($query) use ($search) {
                $query->where('nombre', 'like', $search)
                    ->orWhere('descripcion', 'like', $search)
                    ->orWhere('tipo', 'like', $search);
            })
            ->where('srActivo', 'no')
            ->paginate(5);
        return view('livewire.administrar.negocios', [
            'negocios' => $negocios
        ]);
    }
}
