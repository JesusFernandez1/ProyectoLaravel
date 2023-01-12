<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tareasController extends Controller {

    public function verTareas() {
        return view('tareas.tareas_mostrar');
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        return view('usuarios.login');
    }

    public function verTareasCrear() {
        //crea el Tarea

        return view('tareas.tareas_crear');
    }

    public function verTareasModificar($id) {
        return view('tareas.tareas_modificar, ["id => $id]');
    }

    public function verTareasEliminar($id) {
        return view('tareas.tareas_eliminar, ["id => $id]');
    }

    public function verTareasPendientes($id) {
        return view('tareas.tareas_pendientes');
    }

    public function verCompletarTarea($id) {
        return view('tareas.tareas_completar, ["id => $id]');
    }

    public function crearTarea($id) {

        if ("condicion") {
            return view('tareas.tareas_crear');
        } else {
            return view('tareas.tareas_mostrar');
        }
    }

    public function modificarTarea($id) {

        if ("condicion") {
            return view('tareas.tareas_modificar');
        } else {
            return view('tareas.tareas_mostrar');
        }
    }

    public function completarTarea($id) {
        if ("condicion") {
            return view('tareas.tareas_completar');
        } else {
            return view('tareas.tareas_mostrar');
        }
    }

    public function comprobarBorrarTarea($id) {
        
        if ("comprobar") {
            return view('tareas.tareas_eliminar, ["id => $id]');
        } else {
            //borrarTarea($id);
            return view('tareas.tareas_mostrar');
        }

    }

    function borrarTarea($id) {
        
    }
}
