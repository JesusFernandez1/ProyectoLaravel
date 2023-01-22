<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;

class customerController extends Controller
{
    public function verClientes() {
        $clientes = customer::all();
        return view('clientes.clientes_mostrar', compact('clientes'));
    }

    public function crearCliente(Request $request) {
        $clientes = customer::all();
        if ($_POST) {

            if ("condicion") {
                $cliente = new customer();
                $cliente->nombre = $request->nombre;
                $cliente->apellido = $request->apellido;
                $cliente->correo = $request->correo;
                $cliente->save();

                return view('clientes.clientes_mostrar', compact('clientes'));
            } else {
                return view('clientes.clientes_crear');
            }

        } else {
            return view('clientes.clientes_crear');
        }
    }

    public function modificarCliente($id) {
        $cliente = customer::find($id);
        if ($_POST) {

            if ("condition") {
                $clientes = customer::all();
                return view('clientes.clientes_mostrar', compact('clientes'));
            } else {
                return view('clientes.clientes_modificar', compact('cliente'));
            }
            
        } else {
            return view('clientes.clientes_modificar', compact('cliente'));
        }
    }

    public function eliminarCliente($id) {
        $cliente = customer::find($id);
        
        return view('clientes.clientes_eliminar', compact('cliente'));
         
    }

    public function confirmarEliminarCliente($id) {
        $clientes = customer::all();
        //borrar cliente
        return view('clientes.clientes_mostrar', compact('clientes'));
         
    }
}
