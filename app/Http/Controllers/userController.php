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

            if ("condition") {
                $usuario = new User();
                $usuario->name = $request->name;
                $usuario->email = $request->email;
                $usuario->pass = $request->pass;
                $usuario->save();

                return view('usuarios.usuarios_mostrar');
            } else {
                return view('usuarios.usuarios_modificar');
            }

            
        } else {
            return view('usuarios.usuarios_mostrar', compact('usuarios'));
        }
    }

    public function modificarUsuario($id) {
        $usuarios = User::all();
        $usuario = User::where('id', 1)->get();
        if ($_POST) {

            return view('usuarios.usuarios_mostrar', compact('usuarios'));
        } else {
            return view('usuarios.usuarios_modificar', compact('usuario'));
        }
    }

    public function eliminarUsuario() {
        return view('usuarios.usuarios_eliminar, ["id => $id]');
    }
}
