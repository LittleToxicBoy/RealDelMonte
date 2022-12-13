<?php

namespace App\Http\Livewire\Promociones;

use App\Http\Controllers\helpers\imageController;
use App\Models\Negocios;
use App\Models\Promociones;
use Livewire\Component;
use Livewire\WithPagination;

class Tabla extends Component
{
    use WithPagination;
    public $id_negocio;
    public $searchTerm = "";
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'refreshEventos' => '$refresh'
    ];

    public function agregar($id)
    {
        $this->emit('setId', $id);
        $this->dispatchBrowserEvent('openAddPromoModal');
    }

    public function eliminar($id)
    {
        $imageController  =  new imageController();
        $eliminar = Promociones::find($id);
        $imageController->deleteImageGcs($eliminar->img1);
        $eliminar->delete();
        $this->emit('refreshEventos');
        $this->dispatchBrowserEvent("alert", [
            "type" => "success",
            "message" => "Eliminado correctamente"
        ]);
    }

    public function render()
    {
        $search = '%' . $this->searchTerm . '%';
        $negocio = Negocios::where('idNegocio', $this->id_negocio)->first();
        $promociones = Promociones::where('idNegocio', $this->id_negocio)
            ->where(function ($query) use ($search) {
                $query->where('nombre', 'like', $search)
                    ->orWhere('descripcion', 'like', $search)
                    ->orWhere('fechaInicio', 'like', $search)
                    ->orWhere('fechaFin', 'like', $search);
            })
            ->paginate(5);
        return view('livewire.promociones.tabla', [
            'negocio' => $negocio,
            'promociones' => $promociones,
        ]);
    }
}
