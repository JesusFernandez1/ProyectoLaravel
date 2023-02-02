<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fee;

class feeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuotas = fee::all();
        return view('cuotas.cuotas_mostrar', compact('cuotas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cuotas.cuotas_crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                $cuota = new fee();
                $cuota->concepto = $request->concepto;
                $cuota->fecha_emision = $request->fecha_emision;
                $cuota->importe = $request->importe;
                $cuota->save();

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
        $cuota = fee::find($id);
                $cuota->concepto = $request->concepto;
                $cuota->fecha_emision = $request->fecha_emision;
                $cuota->importe = $request->importe;
                $cuota->save();
                $cuotas = fee::all();
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
