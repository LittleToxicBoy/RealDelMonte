<?php

namespace App\Http\Livewire\Lugares;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Controllers\helpers\imageController;
use App\Models\Lugares;

class CreateForm extends Component
{
    use WithFileUploads;
    public $name;
    public $description;
    public $images = [];
    public $latitude;
    public $longitude;
    protected $listeners = [
        'getLatitudeForInput',
        'getLongitudeForInput',
    ];

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
    protected function cleanVars()
    {
        $this->name = '';
        $this->description = '';
        $this->images = [];
        $this->latitude = '';
        $this->longitude = '';
    }
    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'images' => 'required',
        'latitude' => 'required',
        'longitude' => 'required',
    ];

    public function createLugar()
    {
        $this->validate();
        $imageController  =  new imageController();
        $nameAlt = strtolower(strtr($this->name, " ", "_"));
        $folder = $nameAlt . '-' . $this->latitude . '-' . $this->longitude;
        $lugarData = [
            'nombre' => $this->name,
            'descripcion' => $this->description,
            'latitud' => $this->latitude,
            'longitud' => $this->longitude,
            'idPueblo' => 1,
        ];
        foreach ($this->images as $key => $image) {
            $imageName = $nameAlt . '-' . $key;
            $url = $imageController->uploadImageGcs($image, $imageName, 'realdelmonte/lugares/' . $folder);
            $index = 'img' . $key + 1;
            $lugarData[$index] = $url;
        }
        Lugares::create($lugarData);
        $this->cleanVars();
        $this->emit('refreshLugares');
        $this->dispatchBrowserEvent('closeModal');
        $this->dispatchBrowserEvent("alert", [
            "type" => "success",
            "message" => "Lugar creado correctamente"
        ]);
    }

    public function render()
    {
        return view('livewire.lugares.create-form');
    }
}
