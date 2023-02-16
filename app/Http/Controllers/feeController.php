<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fee;
use App\Models\customer;
use App\Models\task;

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

    public function agregar($id)
    {
        $cliente = customer::where('id', '=', $id)->first();
        $tareas = task::where('users_id', '!=', null)->get();
        return view('cuotas.cuotas_excepcional', compact('cliente', 'tareas'));
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
        $fecha_emision = $request->fecha_emision;
        $datos = $request->validate([
            'concepto' => ['required'],
            'fecha_emision' => [
                'required', 'date_format:Y-m-d\TH:i',
                function ($atribute, $value, $fail) {
                    if (date("Y-m-d\TH", strtotime($value)) != date("Y-m-d\TH")) {
                        $fail('La fecha de creación no se puede modificar.');
                    }
                }
            ],
            'importe' => ['required'],
            'pagada' => ['required'],
            'fecha_pago' => [
                'nullable', 'date_format:Y-m-d\TH:i',
                function ($atribute, $value, $fail) use ($fecha_emision) {
                    if ($value <= $fecha_emision) {
                        $fail("La fecha de finalizacion no puede ser menor que la de creacion");
                    }
                }
            ],
            'notas' => ['required']
        ]);
        $datos['customers_id'] = $request->customers_id;
        fee::insert($datos);
        $cuotas = fee::where('id', $request->customers_id);
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
        $cliente = customer::where('id', $id)->first()->nombre;
        $cuotas = fee::where('customers_id', $id)->paginate(2);
        return view('cuotas.cuotas_mostrar', compact('cuotas','cliente'));
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
        $clientes = customer::all();
        return view('cuotas.cuotas_corregir', compact('cuota', 'clientes'));
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
        $fecha_emision = $request->fecha_emision;
        $datos = $request->validate([
            'concepto' => ['required'],
            'fecha_emision' => [
                'required', 'date_format:Y-m-d\TH:i',
                function ($atribute, $value, $fail) {
                    if (date("Y-m-d\TH", strtotime($value)) != date("Y-m-d\TH")) {
                        $fail('La fecha de creación no se puede modificar.');
                    }
                }
            ],
            'importe' => ['required'],
            'pagada' => ['required'],
            'fecha_pago' => [
                'nullable', 'date_format:Y-m-d\TH:i',
                function ($atribute, $value, $fail) use ($fecha_emision) {
                    if ($value <= $fecha_emision) {
                        $fail("La fecha de finalizacion no puede ser menor que la de creacion");
                    }
                }
            ],
            'notas' => ['required'],
            'customers_id' => ['required']
        ]);
        fee::where('id', $id)->update($datos);
        $cliente = customer::where('id', $request->customers_id)->first()->nombre;
        $cuotas = fee::where('customers_id', $request->customers_id)->paginate(2);
        return view('cuotas.cuotas_mostrar', compact('cuotas','cliente'));
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

    public function mostrarEliminar($id)
    {
        $cuota = fee::find($id);
        return view('cuotas.cuotas_eliminar', compact('cuota'));
    }

    public function confirmarEliminarCuota($id)
    {
        $cuota = fee::find($id)->delete();
        $clientes = customer::paginate(2);
        return view('clientes.clientes_mostrar', compact('clientes'));
    }
}
