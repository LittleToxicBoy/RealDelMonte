<?php

namespace App\Http\Livewire\Administrar;

use App\Models\Restaurantes;
use Livewire\Component;
use Livewire\WithPagination;

class TableRestaurant extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $id_negocio;
    public $tipo;
    protected $listeners = [
        'refreshEventos' => '$refresh'
    ];

    public function agregarRestauranteMenu($menu){
        $this->emit('setAccion', 'editar');
        $this->emit('setIdEdit', $menu);
        $this->dispatchBrowserEvent('addEditR');
    }

    public function agregarRest(){
        $this->emit('setAccion', 'agregar');
        $this->emit('clear');
        $this->dispatchBrowserEvent('addEditR');
    }

    public function eliminarResta($id){
        $habitacion = Restaurantes::where('idRestaurante', '=', $id)->first();
        $habitacion->delete();
        $this->emit('refreshEventos');
    }

    public function render()
    {
        $menus = Restaurantes::where('idNegocio', $this->id_negocio)->paginate(5);
        return view('livewire.administrar.table-restaurant', [
            'menus' => $menus, 
        ]);
    }
}
