<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Eventos;
use Livewire\WithFileUploads;
use App\Http\Controllers\helpers\imageController;

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
    public $latitud;
    protected $listeners = [
        'getLatitudeForInput',
        'getLongitudeForInput',
    ];
    //
    public function getLatitudeForInput($value)
    {
        if (!is_null($value))
            $this->latitude = $value;
    }
    public function getLongitudeForInput($value)
    {
        if (!is_null($value))
            $this->longitude = $value;
    }
    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'dateStart' => 'required',
        'dateEnd' => 'required',
        'images' => 'required',
        'latitude' => 'required',
        'longitude' => 'required',
    ];

    public function createEvento()
    {
        $this->validate();
        $imageController  =  new imageController();
        $nameAlt = strtolower(strtr($this->name, " ", "_"));
        $folder = $nameAlt . '-' . $this->dateStart;
        $eventData = [
            'nombre' => $this->name,
            'descripcion' => $this->description,
            'fechaInicio' => $this->dateStart,
            'fechaTermino' => $this->dateEnd,
            'latitud' => $this->latitude,
            'longitud' => $this->longitude,
            'idPueblo' => 1,
        ];
        foreach ($this->images as $key => $image) {
            $imageName = $nameAlt . '-' . $key;
            $url = $imageController->uploadImageGcs($image, $imageName, 'realdelmonte/eventos/' . $folder);
            $index = 'img' . $key + 1;
            $eventData[$index] = $url;
        }
        Eventos::create($eventData);
        $this->cleanVars();
        $this->emit('refreshEventos');
        $this->dispatchBrowserEvent('closeModal');
    }

    protected function cleanVars(){
        $this->name = '';
        $this->description = '';
        $this->dateStart = '';
        $this->dateEnd = '';
        $this->images = [];
        $this->latitude = '';
        $this->longitude = '';
    }

    public function render()
    {
        return view('livewire.eventos-form');
    }
}
