<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\task;
use App\Models\User;
use App\Models\customer;
use App\Models\provincias;


class taskController extends \Illuminate\Routing\Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tareas = task::paginate(2);
        return view('tareas.tareas_mostrar', compact('tareas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provincias = provincias::all();
        $empleados = User::all();
        $clientes = customer::all();
        return view('tareas.tareas_crear', compact('provincias', 'empleados', 'clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fecha_creacion = $request->fecha_creacion;
        $fecha_actual = date('Y-m-d:TH:i');
        $datos = $request->validate([
            'nombre' =>['regex:/^[a-z]+$/i'],
            'apellido' =>['regex:/^[a-z]+$/i'],
            'telefono' =>['regex:/(\+34|0034|34)?[ -]*(6|7|8|9)[ -]*([0-9][ -]*){8}/'],
            'descripcion' =>['required'],
            'correo' =>['regex:#^(((([a-z\d][\.\-\+_]?)*)[a-z0-9])+)\@(((([a-z\d][\.\-_]?){0,62})[a-z\d])+)\.([a-z\d]{2,6})$#i'],
            'direccion' =>['required'],
            'poblacion' =>['required'],
            'codigo_postal' =>['required'],
            'provincia' =>['required'],
            'estado_tarea' =>['required'],
            'fecha_creacion' =>['required', 'date_format: Y-m-d\TH:i',
            function ($atribute, $value, $fail) use ($fecha_actual) {
                if ($value != $fecha_actual) {
                    $fail("La fecha de creacion no se puede modificar");
                }
            }
        ],
            'fecha_final' =>['nullable', 'date_format: Y-m-d\TH:i',
            function ($atribute, $value, $fail) use ($fecha_creacion){
                if ($value <= $fecha_creacion) {
                    $fail("La fecha de finalizacion no puede ser menor que la de creacion");
                }
            }
        ],
            'anotacion_anterior' =>['required'],
            'anotacion_posterior' =>['required'],
            'users_id' =>['required'],
            'customers_id' =>['required']
            
        ]);
        task::insert($datos);
        $tareas = task::paginate(2);
        return view('tareas.tareas_mostrar', compact('tareas'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarea = task::find($id);
        return view('tareas.tareas_eliminar', compact('tarea'));
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
        $provincias = provincias::all();
        $empleados = User::all();
        $clientes = customer::all();
        return view('tareas.tareas_modificar', compact('tarea', 'provincias', 'empleados', 'clientes'));
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
        $datos = $request->validate([
            'nombre' =>['regex:/^[a-z]+$/i'],
            'apellido' =>['regex:/^[a-z]+$/i'],
            'telefono' =>['regex:/(\+34|0034|34)?[ -]*(6|7|8|9)[ -]*([0-9][ -]*){8}/'],
            'descripcion' =>['required'],
            'correo' =>['regex:#^(((([a-z\d][\.\-\+_]?)*)[a-z0-9])+)\@(((([a-z\d][\.\-_]?){0,62})[a-z\d])+)\.([a-z\d]{2,6})$#i'],
            'direccion' =>['required'],
            'poblacion' =>['required'],
            'codigo_postal' =>['required'],
            'estado_tarea' =>['required'],
            'fecha_creacion' =>['required', 'date_format: Y-m-d\TH:i'],
            function (){
                if ("fecha actual != request") {
                    //error
                }
            },
            'fecha_final' =>['required', 'date_format: Y-m-d\TH:i'],
            function (){
                if ("fecha final <= fecha actual") {
                    //error
                }
            },
            'anotacion_anterior' =>['required'],
            'anotacion_posterior' =>['required'],
            'customer_id' =>['required'],
            'user_id' =>['required']
        ]);
        task::where('id', '=', $id)->update($datos);
        $tareas = task::paginate(2);
        return view('tareas.tareas_mostrar', compact('tareas'));
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

    public function confirmarBorrarTarea($id) {
        $tarea = task::find($id)->delete();
        $tareas = task::paginate(2);
        return view('tareas.tareas_mostrar', compact('tareas'));
         
    }

    public function completarTarea(Request $request, $id) {
        
    }

    public function verInformacionDetallada() {

        $tareas = task::paginate(2);
        return view('tareas.tareas_verInformacionDetallada', compact('tareas'));
    }

    public function verTareasPendientes() {
        $tareas = task::where('estado_tarea', 'P')->get();
        return view('tareas.tareas_pendientes', compact('tareas'));
    }
}
