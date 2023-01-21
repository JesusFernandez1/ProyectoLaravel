<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class feesController extends Controller
{
    public function verCrearcliente() {
        return view('clientes.clientes_crear');
    }

    public function crearcliente() {

        //crea el cliente

        return view('clientes.clientes_mostrar');
    }

    public function verModificarcliente($id) {
        return view('clientes.clientes_modificar, ["id => $id]');
    }

    public function modificarcliente($id) {
        return view('clientes.clientes_mostrar');
    }

    public function verEliminarcliente($id) {
        return view('clientes.clientes_eliminar, ["id => $id]');
    }

    public function comprobarBorrarcliente($id) {
        
        if ("comprobar") {
            //borrarcliente($id);
            return view('clientes.clientes_mostrar');
        } else {
            return view('clientes.clientes_eliminar');
        }

    }

    function borrarcliente($id) {
        
    }

    public function filtradoCredenciales() {
        
    }
}
