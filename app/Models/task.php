<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellidos',
        'telefono',
        'descripcion',
        'correo',
        'direccion',
        'poblacion',
        'codigo_postal',
        'provincia',
        'estado_tarea',
        'fecha_inicio',
        'fecha_final',
        'anotacion_anterior',
        'anotacion_posterior',
        'customers_id',
        'users_id',
    ];
}
