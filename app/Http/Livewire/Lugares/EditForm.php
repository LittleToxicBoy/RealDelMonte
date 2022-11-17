<?php

namespace App\Http\Livewire\Lugares;

use Livewire\Component;
use App\Models\Lugares;
use App\Http\Controllers\helpers\imageController;
use Livewire\WithFileUploads;

class EditForm extends Component
{
    use WithFileUploads;
    public $id_lugar;
    public $images = [];
    public $name;
    public $description;
    public $latitude;
    public $longitude;
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
        'updateLugarData' => 'updateLugarData',
        'setEditLatitude' => 'setEditLatitude',
        'setEditLongitude' => 'setEditLongitude',
    ];

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

    public function updateLugarData($lugar){
        $this->id_lugar = $lugar['id'];
        $this->latitude = $lugar['latitud'];
        $this->longitude = $lugar['longitud'];
        $this->name = $lugar['nombre'];
        $this->description = $lugar['descripcion'];
        for ($i = 0; $i < 10; $i++) {
            $index = 'img' . $i + 1;
            $this->images[$index] = $lugar[$index];
        }
    }

    public function createUpdateImage($image, $index, $key)
    {
        $imageController  =  new imageController();
        $url = $this->images[$index];
        if ($url && $url != '' && $url !=null) {
            $imageController->updateImageGcs($url, $image);
            $this->dispatchBrowserEvent("alert", [
                "type" => "success",
                "message" => "Imagen actualizada correctamente"
            ]);
        } else {
            $nameAlt = strtolower(strtr($this->name, " ", "_"));
            $folder = $nameAlt . '-' . $this->latitude . '-' . $this->longitude;
            $imageName = $nameAlt . '-' . $key;
            $url = $imageController->uploadImageGcs($image, $imageName, 'realdelmonte/lugares/' . $folder);
            $index = 'img' . $key + 1;
            $this->images[$index] = $url;
            $evento = Lugares::find($this->id_lugar);
            $evento->$index = $url;
            $evento->save();
            $this->dispatchBrowserEvent("alert", [
                "type" => "success",
                "message" => "Imagen creada correctamente"
            ]);
        }
    }
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

    public function deleteImages($index)
    {
        if ($index == 'img1') {
            $this->dispatchBrowserEvent("alert", [
                "type" => "warning",
                "message" => "Esta imagen no puede ser eliminada"
            ]);
        } else {
            $imagen = $this->images[$index];
            $imageController  =  new imageController();
            $imageController->deleteImageGcs($imagen);
            $this->images[$index] = null;
            $lugar = Lugares::find($this->id_lugar);
            $lugar->$index = null;
            $lugar->save();
            $this->dispatchBrowserEvent("alert", [
                "type" => "warning",
                "message" => "Imagen eliminada correctamente"
            ]);
        }
    }

    public function updateInformation()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);
        $lugar = Lugares::find($this->id_lugar);
        $lugar->nombre = $this->name;
        $lugar->descripcion = $this->description;
        $lugar->latitud = $this->latitude;
        $lugar->longitud = $this->longitude;
        $lugar->save();
        $this->emit('refreshLugares');
        $this->dispatchBrowserEvent('closeEditModal');
        $this->dispatchBrowserEvent("alert", [
            "type" => "success",
            "message" => "Informacion actualizada correctamente"
        ]);
    }

    public function render()
    {
        return view('livewire.lugares.edit-form');
    }
}
