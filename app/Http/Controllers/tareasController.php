<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tareasController extends Controller {

    public function verTareas() {
        return view('tareas.tareas_mostrar');
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

    public function verCompletar($id) {
        return view('tareas.tareas_completar, ["id => $id]');
    }

    public function modificarTarea($id) {
        return view('tareas.tareas_mostrar');
    }

    public function comprobarBorrarTarea($id) {
        
        if ("comprobar") {
            //borrarTarea($id);
            return view('tareas.tareas_mostrar');
        } else {
            return view('tareas.tareas_eliminar, ["id => $id]');
        }

    }

    function borrarTarea($id) {
        
    }
}
