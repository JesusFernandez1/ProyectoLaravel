<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fee;
use App\Models\customer;

class feeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function agregar($id){
        $cliente = customer::where('id', '=', $id);
        $nombre = $cliente->nombre;
        $cuotas = fee::where('customers_id', '=', $id);
        return view('cuotas.cuotas_mostrar', compact('cuotas', 'nombre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        $fecha_actual = date('Y-m-d\TH:i');
        $datos = $request->validate([
            'concepto' =>['required'],
            'fecha_emision' =>['required', 'date_format: Y-m-d\TH:i',
            function ($atribute, $value, $fail) use ($fecha_actual) {
                if ($value != $fecha_actual) {
                    $fail("La fecha de creacion no se puede modificar");
                }
            }
        ],
            'importe' =>['required'],
            'pagada' =>['required'],
            'fecha_pago' =>['nullable', 'date_format: Y-m-d\TH:i',
            function ($atribute, $value, $fail) use ($fecha_creacion){
                if ($value <= $fecha_creacion) {
                    $fail("La fecha de finalizacion no puede ser menor que la de creacion");
                }
            }
        ],
            'nota' =>['required'],
            'tasks_id' =>['required']
        ]);
        fee::insert($datos);
        $cuotas = fee::paginate(2);
        return view('cuotas.cuotas_mostrar', compact('cuotas'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cuotas = fee::where('id', '=', $id);
        return view('cuotas.cuotas_mostrar', compact('cuotas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cuota = fee::find($id);
        return view('cuotas.cuotas_corregir', compact('cuota'));
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
        $fecha_creacion = $request->fecha_creacion;
        $fecha_actual = date('Y-m-d\TH:i');
        $datos = $request->validate([
            'concepto' =>['required'],
            'fecha_emision' =>['required', 'date_format: Y-m-d\TH:i',
            function ($atribute, $value, $fail) use ($fecha_actual) {
                if ($value != $fecha_actual) {
                    $fail("La fecha de creacion no se puede modificar");
                }
            }
        ],
            'importe' =>['required'],
            'pagada' =>['required'],
            'fecha_pago' =>['nullable', 'date_format: Y-m-d\TH:i',
            function ($atribute, $value, $fail) use ($fecha_creacion){
                if ($value <= $fecha_creacion) {
                    $fail("La fecha de finalizacion no puede ser menor que la de creacion");
                }
            }
        ],
            'nota' =>['required'],
            'tasks_id' =>['required']
        ]);
        customer::insert($datos);
        $clientes = customer::paginate(2);
        return view('cuotas.cuotas_mostrar', compact('cuotas'));
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

    public function confirmarEliminarCuota($id) {
        $cuota = fee::find($id)->delete();
        $cuota->save();
        $cuotas = fee::all();
        return view('cuotas.cuotas_mostrar', compact('cuotas'));
         
    }
}
