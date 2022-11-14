<?php

namespace App\Http\Livewire\Administrar;

use Livewire\Component;
use App\Models\Eventos;
use Livewire\WithPagination;

class TableEventos extends Component
{
    use WithPagination;
    public $actualId;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'refreshEventos' => '$refresh'
    ];

    public function openDeleteModal($id_evento)
    {
        $this->actualId = $id_evento;
        $this->dispatchBrowserEvent('openDeleteModal');
    }

    public function deleteEvento()
    {
        try {
            $evento = Eventos::find($this->actualId)->delete();
            if ($evento) {
                $this->dispatchBrowserEvent('closeDeleteModal');
                $this->emit('refreshEventos');
            } else {
                dd('Error al eliminar el evento');
            }
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function openEditModal($evento)
    {
        $this->emit('updateValues', $evento);
        $this->dispatchBrowserEvent('openEditModal');
    }


    public function render()
    {
        $eventos = Eventos::where('idPueblo', 1)->paginate(5);
        return view('livewire.administrar.table-eventos', [
            'eventos' => $eventos,
        ]);
    }
}
