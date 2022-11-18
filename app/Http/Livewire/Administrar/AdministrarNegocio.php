<?php

namespace App\Http\Livewire\Administrar;

use App\Models\Negocios;
use Livewire\Component;

class AdministrarNegocio extends Component
{
    protected $listeners = [
        'setEditLatitude',
        'setEditLongitude',
    ];

    public $id_negocio;
    public $latitud;
    public $longitud;
    public $tipo, $nombre, $descripcion, $horario;

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

    public function render()
    {
        $this->llenarVar();
        return view('livewire.administrar.administrar-negocio', [
            "tipo" => $this->tipo,
        ]);
    }

    public function actualizarInfo(){

    }

    public function llenarVar(){
        $negocio = Negocios::find($this->id_negocio);
        $this->nombre = $negocio->nombre;
        $this->descripcion = $negocio->descripcion;
        $this->horario = $negocio->horarioDes;
        $this->tipo = $negocio->tipo;
        $this->latitud = $negocio->latitud;
        $this->longitud = $negocio->longitud;
    }

    public function test(){
        dd($this->nombre, $this->tipo, $this->descripcion, $this->horario, $this->latitud, $this->longitud);
    }
}
