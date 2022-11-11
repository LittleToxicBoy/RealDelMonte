<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Evento;
use Livewire\WithFileUploads;

class EventosForm extends Component
{
    use WithFileUploads;
    public $name;
    public $description;
    public $dateStart;
    public $dateEnd;
    public $images = [];
    public $latitude;
    public $longitude;

    public function createEvento(){

        foreach($this->images as $image){
            $image->store('images');
        }
        $imagenes = $this->images;
        dd($imagenes);

    }

    public function render()
    {
        return view('livewire.eventos-form');
    }
}
