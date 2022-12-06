<?php

namespace App\Http\Livewire\Administrar;

use App\Models\Negocios;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Controllers\helpers\imageController;
use Livewire\WithPagination;

class AdministrarNegocio extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $id_negocio;
    public $latitud;
    public $longitud;
    public $tipo, $nombre, $descripcion, $horario;
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
        'setEditLatitude',
        'setEditLongitude',
    ];

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'nombre' => 'required|min:3',
        'descripcion' => 'required|min:10',
        'horario' => 'required',
        'tipo' => 'required',
        'latitud' => 'required',
        'longitud' => 'required',
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
            $nameAlt = strtolower(strtr($this->nombre, " ", "_"));
            $folder = $nameAlt . '-' . $this->id_negocio;
            $imageName = $nameAlt . '-' . $key;
            $url = $imageController->uploadImageGcs($image, $imageName, 'realdelmonte/negocios/' . $folder);
            $a = $key + 1;
            $index = 'img' . $a;
            $this->images[$index] = [
                'url' => $url,
                'tempUrl' => $url
            ];
            $negocio = Negocios::find($this->id_negocio);
            $negocio->$index = $url;
            $negocio->save();
            $this->dispatchBrowserEvent("alert", [
                "type" => "success",
                "message" => "Imagen creada correctamente"
            ]);
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
                $evento = Negocios::find($this->id_negocio);
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

    public function setEditLatitude($value)
    {
        if (!is_null($value)) {
            $this->latitud = $value;
        }
    }

    public function setEditLongitude($value)
    {
        if (!is_null($value)) {
            $this->longitud = $value;
        }
    }
    public function actualizarInfo(){
        $this->validate();
        
        $negocio = Negocios::find($this->id_negocio);
        $negocio->nombre = $this->nombre;
        $negocio->latitud = $this->latitud;
        $negocio->longitud = $this->longitud;
        $negocio->horarioDes = $this->horario;
        $negocio->tipo = $this->tipo;
        $negocio->descripcion = $this->descripcion;
        $negocio->save();
        $this->dispatchBrowserEvent("alert", [
            "type" => "success",
            "message" => "Informacion actualizada correctamente"
        ]);
    }

    public function test(){

    }

    public function mount(){
        $negocio = Negocios::find($this->id_negocio);
        $this->nombre = $negocio->nombre;
        $this->descripcion = $negocio->descripcion;
        $this->horario = $negocio->horarioDes;
        $this->tipo = $negocio->tipo;
        $this->latitud = $negocio->latitud;
        $this->longitud = $negocio->longitud;
        
        for ($i = 0; $i < 10; $i++) {
            $a = $i + 1;
            $index = 'img' . $a;
            $this->images[$index] = [
                'url' => $negocio[$index],
                'tempUrl' => $negocio[$index]
            ];
        }
        $this->dispatchBrowserEvent('loadMap',[
            'lat' => $this->latitud,
            'lng' => $this->longitud,
        ]);
    }

    public function render()
    {
        return view('livewire.administrar.administrar-negocio');
    }
}
