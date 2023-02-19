<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\CuotaCreadaNotification;

class fee extends Model
{
    use HasFactory;
    protected $fillable = [
        'concepto',
        'fecha_emision',
        'importe',
        'pagada',
        'fecha_pago',
        'notas',
        'customers_id',
    ];
    public $timestamps = false;
    protected $dates = ['fecha_emision', 'fecha_pago'];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($cuota) {
            $cuota->user->notify(new CuotaCreadaNotification($cuota));
        });
    }
}
