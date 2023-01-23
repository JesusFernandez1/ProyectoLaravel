<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\task;

class taskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tareas = task::all();
        return view('tareas.tareas_mostrar', compact('tareas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tareas.tareas_crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            if ("condition") {
                $tarea = new task();
                $tarea->nombre = $request->nombre;
                $tarea->apellido = $request->apellido;
                $tarea->correo = $request->correo;
                $tarea->save();
                $tareas = task::all();
                return view('tareas.tareas_mostrar', compact('tareas'));
            } else {
                return view('tareas.tareas_crear');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarea = task::find($id);
        return view('tareas.tareas_modificar', compact('tarea'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tarea = task::find($id);
        if ("condition") {
                $tarea->nombre = $request->nombre;
                $tarea->apellido = $request->apellido;
                $tarea->correo = $request->correo; //todos los datos
                $tarea->save();
                return view('tareas.tareas_mostrar', compact('tareas'));
            } else {
                return view('tareas.tareas_modificar', compact('tarea'));
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function borrarTarea($id) {
        
        $tarea = task::find($id);
        
        return view('tareas.tareas_eliminar', compact('tarea'));
    }

    public function confirmarEliminarTarea($id) {
        $tarea = task::find($id)->delete();
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
