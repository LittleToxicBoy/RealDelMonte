<?php

namespace App\Http\Livewire\Administrar;

use Livewire\Component;
use App\Models\Eventos;
use Livewire\WithPagination;

class TableEventos extends Component
{
    use WithPagination;
    public $actualId;
    public $searchTerm = "";
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
                $this->dispatchBrowserEvent("alert", [
                    "type" => "success",
                    "message" => "Evento eliminado correctamente"
                ]);
            } else {
                $this->dispatchBrowserEvent("alert", [
                    "type" => "warning",
                    "message" => "Error al crear el evento"
                ]);
            }
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent("alert", [
                "type" => "warning",
                "message" => "Error al crear el evento"
            ]);
        }
    }

    public function openEditModal($evento)
    {
        $this->emit('updateValues', $evento);
        $this->dispatchBrowserEvent('openEditModal');
    }


    public function render()
    {
        $search = '%'.$this->searchTerm.'%';
        $eventos = Eventos::where('idPueblo', 1)
        ->where(function($query) use ($search){
            $query->where('nombre', 'like', $search)
            ->orWhere('descripcion', 'like', $search)
            ->orWhere('fechaInicio', 'like', $search)
            ->orWhere('fechaTermino', 'like', $search);
        })
        ->orderBy('fechaInicio', 'desc')
        ->orderBy('fechaTermino','desc')
        ->paginate(5);
        return view('livewire.administrar.table-eventos', [
            'eventos' => $eventos,
        ]);
    }
}
