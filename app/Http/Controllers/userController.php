<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.usuarios_mostrar', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('usuarios.usuarios_crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'DNI' =>['regex:/((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)/'],
            'name' =>['regex:/^[a-z]+$/i'],
            'email' =>['email:rfc,dns'],
            'password' =>['required'],
            'telefono' =>['required'],
            'direccion' =>['required'],
            'fecha_alta' =>['required'],
            'tipo' =>['required']
        ]);
        User::insert($datos);
        $usuarios = User::all();
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
        $usuario = User::find($id);
        return view('usuarios.usuarios_modificar', compact('usuario'));
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
            'DNI' =>['regex:/((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)/'],
            'name' =>['regex:/^[a-z]+$/i'],
            'email' =>['email:rfc,dns'],
            'password' =>['required'],
            'telefono' =>['required'],
            'direccion' =>['required'],
            'fecha_alta' =>['required'],
            'tipo' =>['required']
        ]);
        User::insert($datos);
        $usuarios = User::all();
        return view('usuarios.usuarios_mostrar', compact('usuarios'));
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

    public function eliminarUsuario($id) {
        $usuario = User::find($id);
        
        return view('usuarios.usuarios_eliminar', compact('usuario'));
         
    }

    public function confirmarEliminarUsuario($id) {
        $usuarios = User::all();
        $usuario = User::find($id)->delete();
        return view('usuarios.usuarios_mostrar', compact('usuarios'));
         
    }
}
