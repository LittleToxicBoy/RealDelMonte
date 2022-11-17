<?php

namespace App\Http\Livewire\Administrar;

use Livewire\Component;
use App\Models\Eventos;
use Livewire\WithPagination;
use App\Http\Controllers\helpers\imageController;

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
        $imageController  =  new imageController();
        if($this->actualId){
            $lugar = Eventos::find($this->actualId);
            for($i = 0; $i < 10; $i++){
                $a= $i+1;
                $index = 'img'.$a;
                $actualImage = $lugar[$index];
                if($actualImage){
                    $imageController->deleteImageGcs($actualImage);
                }
            }
            $lugar->delete();
            $this->dispatchBrowserEvent('closeDeleteModal');
            $this->emit('refreshLugares');
            $this->dispatchBrowserEvent("alert", [
                "type" => "success",
                "message" => "Lugar eliminado correctamente"
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
