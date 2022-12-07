<?php

namespace App\Http\Livewire\Administrar;

use App\Http\Controllers\helpers\imageController;
use App\Models\Hospedaje;
use Livewire\Component;
use Livewire\WithPagination;

class TableHotel extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm = "";
    public $id_negocio;
    protected $listeners = [
        'refreshEventos' => '$refresh'
    ];

    public function agregarH()
    {
        $this->emit('setAccion', 'agregar');
        $this->dispatchBrowserEvent('openAddHotel');
    }

    public function editarH($id)
    {
        $this->emit('setAccion', 'editar');
        $this->emit('setIdEdit', $id);
        $this->dispatchBrowserEvent('openAddHotel');
    }

    public function eliminarH($id)
    {
        $imageController  =  new imageController();
        $habitacion = Hospedaje::where('idHospedaje', '=', $id)->first();
        for ($i = 0; $i < 10; $i++) {
            $a = $i + 1;
            $index = 'img' . $a;
            $actualImage = $habitacion[$index];
            if ($actualImage) {
                $imageController->deleteImageGcs($actualImage);
            }
        }
        $habitacion->delete();
        $this->emit('refreshEventos');
    }

    public function render()
    {
        $search = '%' . $this->searchTerm . '%';
        $habitaciones = Hospedaje::where('idNegocio', $this->id_negocio)
            ->where(function ($query) use ($search) {
                $query->where('nombreHabitacion', 'like', $search)
                    ->orWhere('descripcion', 'like', $search)
                    ->orWhere('precio', 'like', $search);
            })
            ->paginate(5);
        return view('livewire.administrar.table-hotel', [
            'habitaciones' => $habitaciones,
        ]);
    }
}
