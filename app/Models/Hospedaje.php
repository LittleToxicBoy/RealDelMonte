<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospedaje extends Model
{
    use HasFactory;
    protected $primaryKey = 'idHospedaje';
    protected $fillable = [
        'nombreHabitacion',
        'precio',
        'descripcion',
        'img1',
        'img2',
        'img3',
        'img4',
        'img5',
        'img6',
        'img7',
        'img8',
        'img9',
        'img10',
        'idNegocio',
    ];
}
