<?php

namespace App\Http\Livewire\Administrar;

use App\Http\Controllers\helpers\imageController;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Negocios;

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
    //variables para los restaurantes
    public $imagenesDerivado = [];

    protected $listeners = [
        'getLatitudeForInput',
        'getLongitudeForInput',
    ];
    public function getLatitudeForInput($value)
    {
        if (!is_null($value))
            $this->latitud = $value;
    }
    public function getLongitudeForInput($value)
    {
        if (!is_null($value))
            $this->longitud = $value;
    }

    protected $rules = [
        'nombre' => 'required',
        'descripcion' => 'required',
        'horario' => 'required',
        'tipo' => 'required',
        'latitud' => 'required',
        'longitud' => 'required',
    ];

    public function submit()
    {
        $this->validate();

        $imageController  =  new imageController();
        $nameAlt = strtolower(strtr($this->nombre, " ", "_"));
        $folder = $nameAlt . '-' . $this->tipo;
        $eventData = [
            'nombre' => $this->nombre,
            'latitud' => $this->latitud,
            'longitud' => $this->longitud,
            'horarioDes'=> $this->horario,
            'tipo' => $this->tipo,
            'descripcion' => $this->descripcion,
        ];
        foreach ($this->imagenes as $key => $image) {
            $imageName = $nameAlt . '-' . $key;
            $url = $imageController->uploadImageGcs($image, $imageName, 'realdelmonte/negocios/' . $folder);
            $a = $key + 1;
            $index = 'img' . $a;
            $eventData[$index] = $url;
        }

        $nuevoNegocio = Negocios::create($eventData);
        
        // dd($this->nombre, $this->descripcion, $this->horario, $this->tipo, $this->imagenes, $this->latitud, $this->longitud, $this->imagenesDerivado);
    }

    public function render()
    {
        return view('livewire.administrar.neg-form', [
            'tipo'=> $this->tipo,
        ]);
    }
}
