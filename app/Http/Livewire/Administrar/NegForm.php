<?php

namespace App\Http\Livewire\Administrar;

use Livewire\Component;
use Livewire\WithFileUploads;

class NegForm extends Component
{
    use WithFileUploads;
    public $nombre;
    public $descripcion;
    public $horario;
    public $tipo;
    public $imagenes = [];
    public $latitud;
    public $longitud;

    public function submit()
    {
        foreach ($this->imagenes as $imagen) {
            $imagen->store('photos');
        }

        dd($this->nombre, $this->descripcion, $this->horario, $this->tipo, $this->imagenes, $this->latitud, $this->longitud);
    }

    public function render()
    {
        return view('livewire.administrar.neg-form');
    }
}
