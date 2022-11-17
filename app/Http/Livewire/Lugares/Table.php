<?php

namespace App\Http\Livewire\Lugares;

use Livewire\Component;
use App\Models\Lugares;
use Livewire\WithPagination;
use App\Http\Controllers\helpers\imageController;

class Table extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm = '';
    public $selectedId;
    protected $listeners = [
        "refreshLugares" => '$refresh',
    ];

    public function openEditModal($lugar)
    {
        $this->emit('updateLugarData', $lugar);
        $this->dispatchBrowserEvent('openEditModal');
    }

    public function openDeleteModal($id)
    {
        $this->selectedId = $id;
        $this->dispatchBrowserEvent('openDeleteModal');
    }

    public function deleteLugar(){
        $imageController  =  new imageController();
        if($this->selectedId){
            $lugar = Lugares::find($this->selectedId);
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



    public function render()
    {
        $search = '%' . $this->searchTerm . '%';
        $lugares = Lugares::where('idPueblo', 1)
            ->where(function ($query) use ($search) {
                $query->where('nombre', 'like', $search)
                    ->orWhere('descripcion', 'like', $search);
            })
            ->orderBy('id', 'desc')
            ->paginate(5);


        return view('livewire.lugares.table', [
            'lugares' => $lugares
        ]);
    }
}
