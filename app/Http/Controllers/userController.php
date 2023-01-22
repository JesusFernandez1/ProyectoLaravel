<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\Middleware\StartSession;
use App\Models\User;

class userController extends Controller {

    public function verUsuarios() {
        $usuarios = User::all();
        return view('usuarios.usuarios_mostrar', compact('usuarios'));
    }

    public function crearUsuario(Request $request) {
        $usuarios = User::all();
        if ($_POST) {

            if ("condicion") {
                $usuario = new User();
                $usuario->name = $request->name;
                $usuario->email = $request->email;
                $usuario->pass = $request->pass;
                $usuario->save();

                return view('usuarios.usuarios_mostrar', compact('usuarios'));
            } else {
                return view('usuarios.usuarios_crear');
            }

        } else {
            return view('usuarios.usuarios_crear');
        }
    }

    public function modificarUsuario($id) {
        $usuario = User::find($id);
        if ($_POST) {

            if ("condition") {
                $usuarios = User::all();
                return view('usuarios.usuarios_mostrar', compact('usuarios'));
            } else {
                return view('usuarios.usuarios_modificar', compact('usuario'));
            }
            
        } else {
            return view('usuarios.usuarios_modificar', compact('usuario'));
        }
    }

    public function eliminarUsuario($id) {
        $usuario = User::find($id);
        
        return view('usuarios.usuarios_eliminar', compact('usuario'));
         
    }

    public function confirmarEliminarUsuario($id) {
        $usuarios = User::all();
        $usuario = User::find($id)->delete();
        return view('usuarios.usuarios_mostrar', compact('usuarios'));
         
    }
}
