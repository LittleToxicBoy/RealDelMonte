<?php

namespace App\Http\Livewire\Administrar;

use App\Models\Negocios as ModelsNegocios;
use Livewire\Component;
use Livewire\WithPagination;

class Negocios extends Component
{
    use WithPagination;
    public $actualId;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'refreshEventos' => '$refresh'
    ];
    
    public function render()
    {
        $negocios = ModelsNegocios::where('idPueblo', 1)->paginate(5);
        return view('livewire.administrar.negocios', [
            'negocios' => $negocios
        ]);
    }
}
