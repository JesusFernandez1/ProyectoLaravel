<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fees;

class feesController extends Controller {
    
    public function verCuotas() {
        $cuotas = fees::all();
        return view('cuotas.cuotas_mostrar', compact('cuotas'));
    }

    public function crearCuota(Request $request) {

        $cuotas = fees::all();
        if ($_POST) {

            if ("condicion") {
                $cuota = new fees();
                $cuota->concepto = $request->concepto;
                $cuota->fecha_emision = $request->fecha_emision;
                $cuota->importe = $request->importe;
                $cuota->save();

                return view('cuotas.cuotas_mostrar', compact('cuotas'));
            } else {
                return view('cuotas.cuotas_crear');
            }
        } else {
            return view('cuotas.cuotas_crear');
        }
    }

    public function corregirCuota($id) {

        $cuota = fees::find($id);
        if ($_POST) {
            if ("condition") {
                //modificacion
                $cuotas = fees::all();
                return view('cuotas.cuotas_mostrar', compact('cuotas'));
            } else {
                return view('cuotas.cuotas_corregir', compact('cuota'));
            }
            
        } else {
            return view('cuotas.cuotas_corregir', compact('cuota'));
        }
    }

    public function eliminarCuota($id) {
        $cuota = fees::find($id);
        
        return view('cuotas.cuotas_eliminar', compact('cuota'));
         
    }

    public function confirmarEliminarCuota($id) {
        $cuota = fees::find($id)->delete();
        $cuota->save();
        $cuotas = fees::all();
        return view('cuotas.cuotas_mostrar', compact('cuotas'));
         
    }
}