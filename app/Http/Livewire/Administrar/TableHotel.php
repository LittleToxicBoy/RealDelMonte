<?php

namespace App\Http\Livewire\Administrar;

use App\Models\Hospedaje;
use Livewire\Component;
use Livewire\WithPagination;

class TableHotel extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $id_negocio;
    protected $listeners = [
        'refreshEventos' => '$refresh'
    ];

    public function agregarH(){
        $this->emit('setAccion', 'agregar');
        $this->dispatchBrowserEvent('openAddHotel');
    }

    public function editarH($id){
        $this->emit('setAccion', 'editar');
        $this->emit('setIdEdit', $id);
        $this->dispatchBrowserEvent('openAddHotel');
    }

    public function eliminarH($id){
        $habitacion = Hospedaje::where('idHospedaje', '=', $id)->first();
        $habitacion->delete();
        $this->emit('refreshEventos');
    }

    public function render()
    {
        $habitaciones = Hospedaje::where('idNegocio', $this->id_negocio)->paginate(5);
        return view('livewire.administrar.table-hotel', [
            'habitaciones' => $habitaciones,
        ]);
    }
}
