<?php

namespace App\Http\Livewire\Administrar;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Controllers\helpers\imageController;
use App\Models\Eventos;

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
        $this->createUpdateImage($value, 'img1', 0);
    }

    public function updatedImg2($value)
    {
        $this->createUpdateImage($value, 'img2', 1);
    }

    public function updatedImg3($value)
    {
        $this->createUpdateImage($value, 'img3', 2);
    }

    public function updatedImg4($value)
    {
        $this->createUpdateImage($value, 'img4', 3);
    }

    public function updatedImg5($value)
    {
        $this->createUpdateImage($value, 'img5', 4);
    }

    public function updatedImg6($value)
    {
        $this->createUpdateImage($value, 'img6', 5);
    }

    public function updatedImg7($value)
    {
        $this->createUpdateImage($value, 'img7', 6);
    }

    public function updatedImg8($value)
    {
        $this->createUpdateImage($value, 'img8', 7);
    }

    public function updatedImg9($value)
    {
        $this->createUpdateImage($value, 'img9', 8);
    }

    public function updatedImg10($value)
    {
        $this->createUpdateImage($value, 'img10', 9);
    }


    public function createUpdateImage($image, $index, $key)
    {
        $imageController  =  new imageController();
        $url = $this->images[$index]['url'];
        if ($url && $url != '' && $url != null) {
            $imageController->updateImageGcs($url, $image);
            $this->images[$index]['tempUrl'] = $image->temporaryUrl();

            $this->dispatchBrowserEvent("alert", [
                "type" => "success",
                "message" => "Imagen actualizada correctamente"
            ]);
        } else {
            $nameAlt = strtolower(strtr($this->name, " ", "_"));
            $folder = $nameAlt . '-' . $this->dateStart;
            $imageName = $nameAlt . '-' . $key;
            $url = $imageController->uploadImageGcs($image, $imageName, 'realdelmonte/eventos/' . $folder);
            $a = $key + 1;
            $index = 'img' . $a;
            $this->images[$index] = [
                'url' => $url,
                'tempUrl' => $url
            ];
            $evento = Eventos::find($this->idEvento);
            $evento->$index = $url;
            $evento->save();
            $this->dispatchBrowserEvent("alert", [
                "type" => "success",
                "message" => "Imagen creada correctamente"
            ]);
        }
    }

    public function updateInformation()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'dateStart' => 'required',
            'dateEnd' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);
        $event = Eventos::find($this->idEvento);
        $event->nombre = $this->name;
        $event->descripcion = $this->description;
        $event->fechaInicio = $this->dateStart;
        $event->fechaTermino = $this->dateEnd;
        $event->latitud = $this->latitude;
        $event->longitud = $this->longitude;
        $event->save();
        $this->emit('refreshEventos');
        $this->dispatchBrowserEvent('closeEditModal');
        $this->dispatchBrowserEvent("alert", [
            "type" => "success",
            "message" => "Informacion actualizada correctamente"
        ]);
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



    public function deleteImages($index)
    {
        if ($index == 'img1') {
            $this->dispatchBrowserEvent("alert", [
                "type" => "warning",
                "message" => "Esta imagen no puede ser eliminada"
            ]);
        } else {
            $imagen = $this->images[$index]['url'];
            if ($imagen) {
                $imageController  =  new imageController();
                $imageController->deleteImageGcs($imagen);
                $this->images[$index]['url'] = null;
                $this->images[$index]['tempUrl'] = null;
                $evento = Eventos::find($this->idEvento);
                $evento->$index = null;
                $evento->save();
                $this->dispatchBrowserEvent("alert", [
                    "type" => "warning",
                    "message" => "Imagen eliminada correctamente"
                ]);
            } else {
                $this->dispatchBrowserEvent("alert", [
                    "type" => "warning",
                    "message" => "Esta imagen no puede ser eliminada"
                ]);
            }
        }
    }


    public function render()
    {
        return view('livewire.administrar.eventos-edit-form');
    }
}
