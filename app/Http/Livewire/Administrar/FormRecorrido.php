<?php

namespace App\Http\Livewire\Administrar;

use App\Http\Controllers\helpers\imageController;
use App\Models\Recorridos;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormRecorrido extends Component
{

    use WithFileUploads;
    public $accion, $nombre, $costo, $duracion, $id_negocio, $id_recorrido;

    public $images = [];
    public $imagenes = [];
    public $img1, $img2, $img3, $img4, $img5, $img6, $img7, $img8, $img9, $img10;
    public $auxImage = 'https://cdn.pixabay.com/photo/2017/02/07/02/16/cloud-2044823_960_720.png';

    protected $listeners = [
        'setAccion',
        'setIdEdit',
        'clear',
    ];

    protected $rules = [
        'nombre' => 'required',
        'costo' => 'required',
        'duracion' => 'required',
        'imagenes' => 'required',
    ];

    public function setAccion($value)
    {
        if (!is_null($value)) {
            $this->accion = $value;
        }
    }
    public function setIdEdit($value)
    {
        if (!is_null($value)) {
            $this->id_recorrido = $value['idRecorrido'];
            $this->nombre = $value['nombre'];
            $this->costo = $value['costo'];
            $this->duracion = $value['duracion'];

            for ($i = 0; $i < 10; $i++) {
                $a = $i + 1;
                $index = 'img' . $a;
                $this->images[$index] = [
                    'url' => $value[$index],
                    'tempUrl' => $value[$index]
                ];
            }
        }
    }

    public function clear(){
        $this->nombre = '';
        $this->costo = '';
        $this->duracion = '';
        $this->imagenes = [];
    }

    public function agregarRecorrido()
    {
        $this->validate();

        $imageController  =  new imageController();
        $nameAlt = strtolower(strtr($this->nombre, " ", "_"));
        $folder = $nameAlt . '-Hospedaje';
        $eventData = [
            'nombre' => $this->nombre,
            'costo' => $this->costo,
            'duracion' => $this->duracion,
            'idNegocio' => $this->id_negocio,
        ];
        foreach ($this->imagenes as $key => $image) {
            $imageName = $nameAlt . '-' . $key;
            $url = $imageController->uploadImageGcs($image, $imageName, 'realdelmonte/negocios/recorridos' . $folder);
            $a = $key + 1;
            $index = 'img' . $a;
            $eventData[$index] = $url;
        }

        Recorridos::create($eventData);
        $this->emit('refreshEventos');
        $this->clear();
        $this->dispatchBrowserEvent('closeEditRecorrido');
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
            $url = $imageController->uploadImageGcs($image, $imageName, 'realdelmonte/negocios/Recorridos' . $folder);
            $a = $key + 1;
            $index = 'img' . $a;
            $this->images[$index] = [
                'url' => $url,
                'tempUrl' => $url
            ];
            $negocio =  Recorridos::find($this->id_recorrido);
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
                $evento = Recorridos::find($this->id_recorrido);
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

    public function editarRecorrido(){
        $this->validate([
            'nombre' => 'required',
            'costo' => 'required',
            'duracion' => 'required',
        ]);

        $recorrido = Recorridos::find($this->id_recorrido);
        $recorrido->nombre = $this->nombre;
        $recorrido->costo = $this->costo;
        $recorrido->duracion = $this->duracion;
        $recorrido->save();
        $this->emit('refreshEventos');
        $this->dispatchBrowserEvent('closeEditRecorrido');
        $this->dispatchBrowserEvent("alert", [
            "type" => "success",
            "message" => "Actualizado"
        ]);
    }

    public function render()
    {
        return view('livewire.administrar.form-recorrido');
    }
}
