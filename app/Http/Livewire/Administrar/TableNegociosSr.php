<?php

namespace App\Http\Livewire\Administrar;

use App\Http\Controllers\helpers\imageController;
use App\Models\Negocios;
use Livewire\Component;
use Livewire\WithPagination;

class TableNegociosSr extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'refreshEventos' => '$refresh'
    ];
    public $searchTerm = "";
    public $id_negocio;

    public function agregarNegocio(){
        $this->emit('clear');
        $this->emit('setAccion', 'agregar');
        $this->dispatchBrowserEvent('addNegSr');
    }

    public function editarNegocio($value){
        $this->emit('setAccion', 'editar');
        $this->emit('setIdEditSR', $value);
        $this->dispatchBrowserEvent('addNegSr');
    }

    public function eliminarNegocio($id){
        $imageController  =  new imageController();
        $restaurante = Negocios::find($id);
        for ($i = 0; $i < 10; $i++) {
            $a = $i + 1;
            $index = 'img' . $a;
            $actualImage = $restaurante[$index];
            if ($actualImage) {
                $imageController->deleteImageGcs($actualImage);
            }
        }
        $restaurante->delete();
        $this->emit('refreshEventos');
        $this->dispatchBrowserEvent("alert", [
            "type" => "success",
            "message" => "Eliminado correctamente"
        ]);
    }

    public function render()
    {
        $search = '%' . $this->searchTerm . '%';
        $negocios = Negocios::where('srActivo', 'si')
            ->where('id_negocio_fk', $this->id_negocio)
            ->where(function ($query) use ($search) {
                $query->where('nombre', 'like', $search)
                    ->orWhere('descripcion', 'like', $search)
                    ->orWhere('tipo', 'like', $search);
            })
            ->paginate(5);

        return view('livewire.administrar.table-negocios-sr', [
            'negocios' => $negocios,
        ]);
    }
}
