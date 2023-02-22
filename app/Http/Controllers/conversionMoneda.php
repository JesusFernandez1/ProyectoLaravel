<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AmrShawky\LaravelCurrency\Facade\Currency;

class conversionMoneda extends Controller
{
    public function convertir($valor)
    {
        $converted = Currency::convert()
        ->from($valor->moneda)
        ->to('EUR')
        ->amount($valor->importe)
        ->get();
        
    }
}
