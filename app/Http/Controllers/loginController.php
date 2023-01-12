<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\Middleware\StartSession;

class loginController extends Controller {

    public function inicio() {
        return view('usuarios.login');
    }

    public function login() {

        if ("condicion") {
            return view('usuarios.usuarios_mostrar');
        } else {
            return view('usuarios.login');
        }
        
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        return view('usuarios.login');
    }

    public function verUsuarios() {
        return view('usuarios.usuarios_mostrar');
    }

    public function verCrearUsuario() {
        return view('usuarios.usuarios_crear');
    }

    public function crearUsuario() {

        //crea el usuario

        return view('usuarios.usuarios_mostrar');
    }

    public function verModificarUsuario($id) {
        return view('usuarios.usuarios_modificar, ["id => $id]');
    }

    public function modificarUsuario($id) {
        return view('usuarios.usuarios_mostrar');
    }

    public function verEliminarUsuario($id) {
        return view('usuarios.usuarios_eliminar, ["id => $id]');
    }

    public function comprobarBorrarUsuario($id) {
        
        if ("comprobar") {
            //borrarUsuario($id);
            return view('usuarios.usuarios_mostrar');
        }

    }

    function borrarUsuario($id) {
        
    }

    public function filtradoCredenciales() {
        
    }
}
