<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promociones extends Model
{
    use HasFactory;
    protected $primaryKey = 'idPromocion';
    protected $fillable = [
        'nombre',
        'descripcion', 
        'fechaInicio',
        'fechaFin', 
        'activo',
        'img1', 
        'idNegocio'
    ];
}
