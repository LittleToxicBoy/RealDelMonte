<?php

namespace App\Http\Livewire\Administrar;

use App\Models\Negocios;
use Livewire\Component;

class AdministrarNegocio extends Component
{
    public $id_negocio;
    public $latitud;
    public $longitud;
    public $tipo, $nombre, $descripcion, $horario;
    protected $listeners = [
        'setEditLatitude',
        'setEditLongitude',
    ];

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
