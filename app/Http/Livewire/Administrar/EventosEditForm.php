<?php

namespace App\Http\Livewire\Administrar;

use Livewire\Component;
use Livewire\WithFileUploads;

class EventosEditForm extends Component
{
    use WithFileUploads;
    public $idEvento;
    public $name;
    public $description;
    public $dateStart;
    public $dateEnd;
    public $latitude;
    public $longitude;
    public $images = [];
    public $tempImages;
    public $newImage;
    protected $listeners = [
        'updateValues' => 'updateValues',
        'setEditLatitude',
        'setEditLongitude',
    ];

    public function test()
    {
        dd($this->newImage);
    }
    public function updatedNewImage()
    {
        $totalImages = count($this->images);
        $index = $totalImages + 1;
        $this->images[$index] = $this->newImage->temporaryUrl();
    }

    public function setEditLatitude($value)
    {
        if (!is_null($value)) {
            $this->latitude = $value;
        }
    }

    public function setEditLongitude($value)
    {
        if (!is_null($value)) {
            $this->longitude = $value;
        }
    }

    public function updateValues($evento)
    {
        $this->idEvento = $evento['idEvento'];
        $this->images = [];
        $this->name = $evento['nombre'];
        $this->description = $evento['descripcion'];
        $this->dateStart = $evento['fechaInicio'];
        $this->dateEnd = $evento['fechaTermino'];
        $this->latitude = $evento['latitud'];
        $this->longitude = $evento['longitud'];
        for ($i = 0; $i < 10; $i++) {
            $index = 'img' . $i + 1;
            if ($evento[$index] != null) {
                $this->images[$index] = $evento[$index];
            } else {
                $i = 10;
            }
        }
    }
    public function updateImage($key)
    {
        dd($this->tempImages[$key]);
    }
    public function render()
    {
        return view('livewire.administrar.eventos-edit-form');
    }
}
