<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\paises;

class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = customer::paginate(2);
        return view('clientes.clientes_mostrar', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pais = paises::all();
        return view('clientes.clientes_crear', compact($pais));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pais = paises::select('iso_moneda')->where('iso3', '=', $request->pais)->first;
        $moneda = $pais->iso_moneda;
        $datos = $request->validate([
            'DNI' =>['regex:/((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)/'],
            'name' =>['regex:/^[a-z]+$/i'],
            'telefono' =>['regex:/(\+34|0034|34)?[ -]*(6|7|8|9)[ -]*([0-9][ -]*){8}/'],
            'correo' =>['regex:#^(((([a-z\d][\.\-\+_]?)*)[a-z0-9])+)\@(((([a-z\d][\.\-_]?){0,62})[a-z\d])+)\.([a-z\d]{2,6})$#i'],
            'cuenta' =>['required'],
            'pais' =>['required'],
            $moneda =>['required'],
            'tipo' =>['required']
        ]);
        customer::insert($datos);
        $clientes = customer::paginate(2);
        return view('usuarios.usuarios_mostrar', compact('usuarios'));
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
        $moneda = paises::select('select iso_moneda from paises where nombre = " . $request->pais . "');
        $datos = $request->validate([
            'DNI' =>['regex:/((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)/'],
            'name' =>['regex:/^[a-z]+$/i'],
            'telefono' =>['regex:/(\+34|0034|34)?[ -]*(6|7|8|9)[ -]*([0-9][ -]*){8}/'],
            'correo' =>['regex:#^(((([a-z\d][\.\-\+_]?)*)[a-z0-9])+)\@(((([a-z\d][\.\-_]?){0,62})[a-z\d])+)\.([a-z\d]{2,6})$#i'],
            'cuenta' =>['required'],
            'pais' =>['required'],
            $moneda =>['required'],
            'tipo' =>['required']
        ]);
        customer::where('id', '=', $id)->update($datos);
        $clientes = customer::paginate(2);
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
        customer::find($id)->delete();
        $cliente = customer::paginate(2);
        return view('clientes.clientes_mostrar', compact('clientes'));
         
    }
}
