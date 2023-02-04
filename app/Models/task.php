<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'descripcion',
        'correo',
        'direccion',
        'poblacion',
        'codigo_postal',
        'provincia',
        'estado_tarea',
        'fecha_creacion',
        'fecha_final',
        'anotacion_anterior',
        'anotacion_posterior',
        'users_id',
        'customers_id',
    ];
    public $timestamps = false;
}
