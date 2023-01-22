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

            $numero = 0;

            if ($numero>1) {
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
        $usuarios = User::all();
        $usuario = User::find($id);
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
