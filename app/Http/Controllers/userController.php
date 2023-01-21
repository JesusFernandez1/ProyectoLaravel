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

    public function verCrearUsuario() {
        return view('usuarios.usuarios_crear');
    }

    public function crearUsuario() {

        //crea el usuario

        return view('usuarios.usuarios_mostrar');
    }

    public function verModificarUsuario() {
        $usuarios = User::where('id', 1)->get();
        return view('usuarios.usuarios_modificar', compact('usuarios'));
    }

    public function modificarUsuario() {
        return view('usuarios.usuarios_mostrar');
    }

    public function verEliminarUsuario() {
        return view('usuarios.usuarios_eliminar, ["id => $id]');
    }

    public function comprobarBorrarUsuario() {
        
        if ("comprobar") {
            //borrarUsuario($id);
            return view('usuarios.usuarios_mostrar');
        } else {
            return view('usuarios.usuarios_eliminar');
        }

    }

    function borrarUsuario() {
        
    }
}
