<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class feesController extends Controller {
    
    public function verCrearcuota() {
        return view('cuotas.cuotas_crear');
    }

    public function crearcuota() {

        //crea el cuota

        return view('cuotas.cuotas_mostrar');
    }

    public function verModificarcuota($id) {
        return view('cuotas.cuotas_modificar, ["id => $id]');
    }

    public function modificarcuota($id) {
        return view('cuotas.cuotas_mostrar');
    }

    public function verEliminarcuota($id) {
        return view('cuotas.cuotas_eliminar, ["id => $id]');
    }

    public function comprobarBorrarcuota($id) {
        
        if ("comprobar") {
            //borrarcuota($id);
            return view('cuotas.cuotas_mostrar');
        } else {
            return view('cuotas.cuotas_eliminar');
        }

    }

    function borrarcuota($id) {
        
    }

    public function filtradoCredenciales() {
        
    }
}
