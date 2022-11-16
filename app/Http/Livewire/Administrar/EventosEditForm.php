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
    public $img1;
    public $img2;
    public $img3;
    public $img4;
    public $img5;
    public $img6;
    public $img7;
    public $img8;
    public $img9;
    public $img10;

    public $auxImage = 'https://cdn.pixabay.com/photo/2017/02/07/02/16/cloud-2044823_960_720.png';

    protected $listeners = [
        'updateValues' => 'updateValues',
        'setEditLatitude',
        'setEditLongitude',
    ];

    public function updatedImg1($value)
    {
        $url = $this->images['img1'];
        if ($url) {
            dd("esta imagen debe ser actualizada");
        } else {
            dd("esta imagen debe ser creada");
        }
    }

    public function updatedImg2($value)
    {
        $url = $this->images['img2'];
        if ($url) {
            dd("esta imagen debe ser actualizada");
        } else {
            dd("esta imagen debe ser creada");
        }
    }

    public function test()
    {
        dd($this->tempImages->img1);
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
            $this->images[$index] = $evento[$index];
        }
    }


    public function updatedTempImages($index, $key)
    {
        dd($index, $key);
    }

    public function deleteImages($index)
    {
        dd($index, $this->images[$index]);
    }


    public function render()
    {
        return view('livewire.administrar.eventos-edit-form');
    }
}
