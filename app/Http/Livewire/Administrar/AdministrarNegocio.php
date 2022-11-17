<?php

namespace App\Http\Livewire\Administrar;

use Livewire\Component;

class AdministrarNegocio extends Component
{
    public $id_negocio;
    public $tipo;

    public function render()
    {
        return view('livewire.administrar.administrar-negocio', [
            "id_negocio" => $this->id_negocio,
            "tipo" => $this->tipo,
        ]);
    }
}
