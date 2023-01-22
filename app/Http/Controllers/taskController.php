<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\task;

class taskController extends Controller {

    public function verTareas() {
        $tareas = task::all();
        return view('tareas.tareas_mostrar', compact('tareas'));
    }

    public function crearTarea(Request $request) {

        $tareas = task::all();
        if ($_POST) {

            if ("condition") {
                $tarea = new task();
                $tarea->nombre = $request->nombre;
                $tarea->apellido = $request->apellido;
                $tarea->correo = $request->correo;
                $tarea->save();

                return view('tareas.tareas_mostrar');
            } else {
                return view('tareas.tareas_modificar');
            }
        } else {
            return view('tareas.tareas_crear');
        }
    }

    public function modificarTarea(Request $request, $id) {

        $tareas = task::all();
        $tarea = task::find($id);
        if ($_POST) {
            if ("condition") {
                $tarea->nombre = $request->nombre;
                $tarea->apellido = $request->apellido;
                $tarea->correo = $request->correo; //todos los datos
                $tarea->save();
                return view('tareas.tareas_mostrar', compact('tareas'));
            } else {
                return view('tareas.tareas_modificar', compact('tarea'));
            }
        } else {
            return view('tareas.tareas_modificar', compact('tarea'));
        }
    }

     public function borrarTarea($id) {
        
        $tarea = task::find($id);
        
        return view('tareas.tareas_eliminar', compact('tarea'));
    }

    public function confirmarEliminarTarea($id) {
        $tarea = task::find($id);
        $tarea->delete();
        $tarea->save();
        $tareas = task::all();
        return view('tareas.tareas_mostrar', compact('tareas'));
         
    }

    public function completarTarea(Request $request, $id) {
        $tareas = task::all();
        $tarea = task::find($id);
        if ($_POST) {
            $tarea->estado_tarea = $request->estado_tarea;
            $tarea->save();
            return view('tareas.tareas_mostrar', compact('tareas'));
        } else {
            return view('tareas.tareas_modificar', compact('tarea'));
        }
    }

    public function verTareasCompletas() {
        $tareas = task::all();
        return view('tareas.tareas_mostrar_completa', compact('tareas'));
    }

    public function verTareasPendientes() {
        $tareas = task::where('estado_tarea', 'P')->get();
        return view('tareas.tareas_mostrar_pendientes', compact('tareas'));
    }
}
