<?php

namespace App\Http\Livewire\Administrar;

use App\Models\Hospedaje;
use App\Models\Negocios as ModelsNegocios;
use App\Models\Restaurantes;
use Livewire\Component;
use Livewire\WithPagination;

class Negocios extends Component
{
    use WithPagination;
    public $actualId;
    public $idNegocio;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'refreshEventos' => '$refresh'
    ];

    public function asignarId($idNegocio, $tipo)
    {
        $this->idNegocio = $idNegocio;
        if ($tipo == 'eliminar') {
            $this->dispatchBrowserEvent('openDeleteModal');
        }
        if($tipo == 'editar'){
            $this->dispatchBrowserEvent('openAdmModal');
        }
    }

    public function eliminar()
    {
        // dd($this->idNegocio);
        if ($this->idNegocio['tipo'] == 'tienda' || $this->idNegocio['tipo'] == 'wc') {
            $delete = ModelsNegocios::find($this->idNegocio['idNegocio']);
            $delete->delete();
        }

        if ($this->idNegocio['tipo'] == 'restaurante') {
            $deleteD = Restaurantes::where('idNegocio', $this->idNegocio['idNegocio'])->delete();
            $delete = ModelsNegocios::find($this->idNegocio['idNegocio']);
            $delete->delete();
        }
        if ($this->idNegocio['tipo'] == 'hotel') {
            $deleteD = Hospedaje::where('idNegocio', $this->idNegocio['idNegocio'])->delete();
            $delete = ModelsNegocios::find($this->idNegocio['idNegocio']);
            $delete->delete();
        }

        $this->dispatchBrowserEvent('closeDeleteModal');
        $this->emit('refreshEventos');
    }

    public function render()
    {
        $negocios = ModelsNegocios::where('idPueblo', 1)->paginate(5);
        return view('livewire.administrar.negocios', [
            'negocios' => $negocios
        ]);
    }
}
