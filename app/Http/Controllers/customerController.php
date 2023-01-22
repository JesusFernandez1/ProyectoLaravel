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

            $numero = 0;

            if ($numero>1) {
                $cliente = new customer();
                $cliente->name = $request->name;
                $cliente->email = $request->email;
                $cliente->pass = $request->pass;
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
        $clientes = customer::all();
        $cliente = customer::find($id);
        if ($_POST) {

            return view('clientes.clientes_mostrar', compact('clientes'));
        } else {
            return view('clientes.clientes_modificar', compact('cliente'));
        }
    }

    public function eliminarCliente($id) {
        $clientes = customer::all();
        $cliente = customer::find($id);
        if ($_POST) {

            return view('clientes.clientes_mostrar', compact('clientes'));
        } else {
            return view('clientes.clientes_modificar', compact('cliente'));
        }
    }
}
