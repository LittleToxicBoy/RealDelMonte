<?php

namespace App\Http\Livewire\Administrar;

use App\Http\Controllers\helpers\imageController;
use App\Models\Hospedaje;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormHospedaje extends Component
{
    use WithFileUploads;
    public $imagesa = [];
    public $nombre, $precio, $descripcion, $imagenes = [], $id_negocio, $accion, $idEdit, $id_hospedaje;
    //edit
    public $img1a;
    public $img2a;
    public $img3a;
    public $img4a;
    public $img5a;
    public $img6a;
    public $img7a;
    public $img8a;
    public $img9a;
    public $img10a;
    public $auxImage = 'https://cdn.pixabay.com/photo/2017/02/07/02/16/cloud-2044823_960_720.png';

    protected $listeners = [
        'setAccion',
        'setIdEdit',
    ];

    protected $rules = [
        'nombre' => 'required',
        'precio' => 'required',
        'descripcion' => 'required',
        'imagenes' => 'required',
    ];

    public function cambioimagen($value, $index){
        dd($value, $index);
    }

    public function updatedImg1a($value)
    {
        $this->createUpdateImageSS($value, 'img1', 0);
    }

    public function updatedImg2a($value)
    {
        $this->createUpdateImage($value, 'img2', 1);
    }

    public function updatedImg3a($value)
    {
        $this->createUpdateImage($value, 'img3', 2);
    }

    public function updatedImg4a($value)
    {
        $this->createUpdateImage($value, 'img4', 3);
    }

    public function updatedImg5a($value)
    {
        $this->createUpdateImage($value, 'img5', 4);
    }

    public function updatedImg6a($value)
    {
        $this->createUpdateImage($value, 'img6', 5);
    }

    public function updatedImg7a($value)
    {
        $this->createUpdateImage($value, 'img7', 6);
    }

    public function updatedImg8a($value)
    {
        $this->createUpdateImage($value, 'img8', 7);
    }

    public function updatedImg9a($value)
    {
        $this->createUpdateImage($value, 'img9', 8);
    }

    public function updatedImg10a($value)
    {
        $this->createUpdateImageSS($value, 'img10', 9);
    }

    public function createUpdateImageSS($image, $index, $key)
    {
        $imageController  =  new imageController();
        $url = $this->imagesa[$index]['url'];
        if ($url && $url != '' && $url != null) {
            $imageController->updateImageGcs($url, $image);
            $this->imagesa[$index]['tempUrl'] = $image->temporaryUrl();

            $this->dispatchBrowserEvent("alert", [
                "type" => "success",
                "message" => "Imagen actualizada correctamente"
            ]);
        } else {
            $nameAlt = strtolower(strtr($this->nombre, " ", "_"));
            $folder = $nameAlt . '-Hospedaje';
            $imageName = $nameAlt . '-' . $key;
            $url = $imageController->uploadImageGcs($image, $imageName, 'realdelmonte/negocios/hospedaje/' . $folder);
            $a = $key + 1;
            $index = 'img' . $a;
            $this->imagesa[$index] = [
                'url' => $url,
                'tempUrl' => $url
            ];
            $negocio = Hospedaje::find($this->id_hospedaje);
            $negocio->$index = $url;
            $negocio->save();
            $this->dispatchBrowserEvent("alert", [
                "type" => "success",
                "message" => "Imagen creada correctamente"
            ]);
        }
    }

    public function setAccion($value)
    {
        if (!is_null($value)) {
            $this->accion = $value;
        }
    }
    public function setIdEdit($value)
    {
        if (!is_null($value)) {
            $this->id_hospedaje = $value['idHospedaje'];
            $this->nombre = $value['nombreHabitacion'];
            $this->precio = $value['precio'];
            $this->descripcion = $value['descripcion'];
            for ($i = 0; $i < 10; $i++) {
                $a = $i + 1;
                $index = 'img' . $a;
                $this->imagesa[$index] = [
                    'url' => $value[$index],
                    'tempUrl' => $value[$index]
                ];
            }
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
            $imagen = $this->imagesa[$index]['url'];
            if ($imagen) {
                $imageController  =  new imageController();
                $imageController->deleteImageGcs($imagen);
                $this->imagesa[$index]['url'] = null;
                $this->imagesa[$index]['tempUrl'] = null;

                $evento = Hospedaje::find($this->id_hospedaje);
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

    public function agregarhabitacion()
    {
        $this->validate();

        $imageController  =  new imageController();
        $nameAlt = strtolower(strtr($this->nombre, " ", "_"));
        $folder = $nameAlt . '-Hospedaje';
        $eventData = [
            'nombreHabitacion' => $this->nombre,
            'precio' => $this->precio,
            'descripcion' => $this->descripcion,
            'idNegocio' => $this->id_negocio,
        ];
        foreach ($this->imagenes as $key => $image) {
            $imageName = $nameAlt . '-' . $key;
            $url = $imageController->uploadImageGcs($image, $imageName, 'realdelmonte/negocios/' . $folder);
            $a = $key + 1;
            $index = 'img' . $a;
            $eventData[$index] = $url;
        }

        Hospedaje::create($eventData);
        $this->emit('refreshEventos');
        $this->dispatchBrowserEvent('closeAddHotel');
    }

    public function clear()
    {
        $this->nombre = '';
        $this->precio = '';
        $this->descripcion = '';
        unset($this->imagenes);
        $this->imagenes = array();
    }

    public function render()
    {
        return view('livewire.administrar.form-hospedaje');
    }
}
