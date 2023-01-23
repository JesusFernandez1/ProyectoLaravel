<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;

class customerrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = customer::all();
        return view('clientes.clientes_mostrar', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.clientes_crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = new customer();
                $cliente->nombre = $request->nombre;
                $cliente->apellido = $request->apellido;
                $cliente->correo = $request->correo;
                $cliente->save();
                $clientes = customer::all();
                return view('clientes.clientes_mostrar', compact('clientes'));
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
        $cliente = customer::find($id);
        return view('clientes.clientes_modificar', compact('cliente'));
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
        $cliente = customer::find($id);
        //haces cosas
        $clientes = customer::all();
        return view('clientes.clientes_mostrar', compact('clientes'));
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

    public function eliminarCliente($id) {
        $cliente = customer::find($id);
        
        return view('clientes.clientes_eliminar', compact('cliente'));
         
    }

    public function confirmarEliminarCliente($id) {
        $clientes = customer::all();
        //borrar cliente
        return view('clientes.clientes_mostrar', compact('clientes'));
         
    }
}
