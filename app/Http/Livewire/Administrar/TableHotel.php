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

    public function agregarH(){
        $this->dispatchBrowserEvent('openAddHotel');
    }

    public function render()
    {
        $habitaciones = Hospedaje::where('idNegocio', $this->id_negocio)->paginate(5);
        return view('livewire.administrar.table-hotel', [
            'habitaciones' => $habitaciones,
        ]);
    }
}
