<?php

namespace App\Http\Livewire\Administrar;

use App\Http\Controllers\helpers\imageController;
use App\Models\Recorridos;
use Livewire\Component;
use Livewire\WithPagination;

class TableRecorrido extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $id_negocio;

    protected $listeners = [
        'refreshEventos' => '$refresh'
    ];

    public function editarRcorrido($recorrido)
    {
        $this->emit('setAccion', 'editar');
        $this->emit('setIdEdit', $recorrido);
        $this->dispatchBrowserEvent('addEditRecorrido');
    }

    public function agregarRecorrido()
    {
        $this->emit('setAccion', 'agregar');
        $this->emit('clear');
        $this->dispatchBrowserEvent('addEditRecorrido');
    }

    public function eliminarRecorrido($id)
    {
        $imageController  =  new imageController();
        $recorrido = Recorridos::where('idRecorrido', '=', $id)->first();
        for ($i = 0; $i < 10; $i++) {
            $a = $i + 1;
            $index = 'img' . $a;
            $actualImage = $recorrido[$index];
            if ($actualImage) {
                $imageController->deleteImageGcs($actualImage);
            }
        }
        $recorrido->delete();
        $this->emit('refreshEventos');
    }

    public function render()
    {
        $recorridos = Recorridos::where('idNegocio', $this->id_negocio)->paginate(5);
        return view('livewire.administrar.table-recorrido', [
            'recorridos' => $recorridos,
        ]);
    }
}
