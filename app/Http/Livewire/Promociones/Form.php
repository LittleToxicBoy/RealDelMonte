<?php

namespace App\Http\Livewire\Promociones;

use App\Http\Controllers\helpers\imageController;
use App\Models\Promociones;
use Livewire\Component;
use Livewire\WithFileUploads;
use Ramsey\Uuid\Rfc4122\NilUuid;

class Form extends Component
{
    use WithFileUploads;

    public $id_negocio, $id_promo;
    public $nombre, $descripcion, $inicio, $termino, $activo, $img, $urlAux;

    protected $listeners = [
        'setId'
    ];

    protected $rules = [
        'nombre' => 'required',
        'descripcion' => 'required',
        'inicio' => 'required',
        'termino' => 'required',
        'activo' => 'required',
        'img' => 'required',
    ];

    public function setId($value)
    {
        $this->id_promo = $value;
        $this->clear();
        if ($value != 0) {
            $promo = Promociones::find($this->id_promo);
            $this->nombre = $promo->nombre;
            $this->descripcion = $promo->descripcion;
            $this->inicio = $promo->fechaInicio;
            $this->termino = $promo->fechaFin;
            $this->activo = $promo->activo;
            $this->urlAux = $promo->img1;
        }
    }

    public function agregarNegocioShowroom()
    {
        if ($this->id_promo == 0) {
            $this->validate();
            $eventData = [
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'fechaInicio' => $this->inicio,
                'fechaFin' => $this->termino,
                'activo' => $this->activo,
                'idNegocio' => $this->id_negocio,
            ];
            $url = $this->createImg($this->img);
            $eventData['img1'] = $url;

            Promociones::create($eventData);

            $this->emit('refreshEventos');
            $this->dispatchBrowserEvent('closeAddPromoModal');
            $this->clear();
            $this->dispatchBrowserEvent("alert", [
                "type" => "success",
                "message" => "Agregado correctamente"
            ]);
        } else {
            $this->validate([
                'nombre' => 'required',
                'descripcion' => 'required',
                'inicio' => 'required',
                'termino' => 'required',
                'activo' => 'required',
            ]);

            $edit = Promociones::find($this->id_promo);
            $edit->nombre = $this->nombre;
            $edit->descripcion = $this->descripcion;
            $edit->fechaInicio = $this->inicio;
            $edit->fechaFin = $this->termino;
            $edit->activo = $this->activo;
            if ($this->img != null || $this->img != '') {
                $imageController  =  new imageController();
                $imageController->updateImageGcs($edit->img1, $this->img);
                $urlNueva = $this->img->temporaryUrl();
                $this->urlAux = $urlNueva;
            }
            $edit->save();

            $this->emit('refreshEventos');
            $this->dispatchBrowserEvent('closeAddPromoModal');
            $this->clear();
            $this->dispatchBrowserEvent("alert", [
                "type" => "success",
                "message" => "Informacion actualizada correctamente"
            ]);
        }
    }

    public function clear()
    {
        $this->nombre = '';
        $this->descripcion = '';
        $this->inicio = null;
        $this->termino = '';
        $this->activo = "";
        $this->img = null;
    }

    public function createImg($image)
    {
        $imageController  =  new imageController();
        $nameAlt = strtolower(strtr($this->nombre, " ", "_"));
        $folder = $nameAlt . '-Promociones';

        $imageName = $nameAlt . '-' . '1';
        $url = $imageController->uploadImageGcs($image, $imageName, 'realdelmonte/Promociones/' . $folder);
        return $url;
    }

    public function render()
    {
        return view('livewire.promociones.form');
    }
}
