<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->tipo == 'Admin') {
            $usuarios = User::paginate(2);
            return view('usuarios.usuarios_mostrar', compact('usuarios'));
        } else {
            $usuarios = User::where('id', Auth::user()->id)->paginate(2);
            return view('usuarios.usuarios_mostrar', compact('usuarios'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (Auth::user()->tipo == 'Admin') {
            return view('usuarios.usuarios_crear');
        } else {
            return view('base');
        }
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
            'DNI' => ['regex:/((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)/'],
            'name' => ['regex:/^[a-z]+$/i'],
            'email' => ['regex:#^(((([a-z\d][\.\-\+_]?)*)[a-z0-9])+)\@(((([a-z\d][\.\-_]?){0,62})[a-z\d])+)\.([a-z\d]{2,6})$#i'],
            'password' => ['required'],
            'telefono' => ['regex:/(\+34|0034|34)?[ -]*(6|7|8|9)[ -]*([0-9][ -]*){8}/'],
            'direccion' => ['required'],
            'fecha_alta' => [
                'required', 'date_format:Y-m-d\TH:i',
                function ($atribute, $value, $fail) {
                    if (date("Y-m-d\TH", strtotime($value)) != date("Y-m-d\TH")) {
                        $fail('La fecha de creación no se puede modificar.');
                    }
                }
            ],
            'tipo' => ['required']
        ]);
        $datos['password'] = Hash::make($request->password);
        User::insert($datos);
        $usuarios = User::paginate(2);
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
        if (Auth::user()->tipo == 'Admin') {
            $usuario = User::find($id);
            return view('usuarios.usuarios_eliminar', compact('usuario'));
        } else {
            return view('base');
        }
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
        $fecha_creacion = User::where('id', $id)->first()->fecha_alta;
        $datos = $request->validate([
            'DNI' => ['regex:/((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)/'],
            'name' => ['regex:/^[a-z]+$/i'],
            'email' => ['regex:#^(((([a-z\d][\.\-\+_]?)*)[a-z0-9])+)\@(((([a-z\d][\.\-_]?){0,62})[a-z\d])+)\.([a-z\d]{2,6})$#i'],
            'telefono' => ['regex:/(\+34|0034|34)?[ -]*(6|7|8|9)[ -]*([0-9][ -]*){8}/'],
            'direccion' => ['required'],
            'fecha_alta' => [
                'required', 'date_format:Y-m-d\TH:i',
                function ($atribute, $value, $fail) use($fecha_creacion) {
                    if (date("Y-m-d\TH", strtotime($value)) != date("Y-m-d\TH", strtotime($fecha_creacion))) {
                        $fail('La fecha de creación no se puede modificar.');
                    }
                }
            ],
            'tipo' => ['required']
        ]);
        User::where('id', $id)->update($datos);
        $usuarios = User::paginate(2);
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

    public function confirmarEliminarUsuario($id)
    {
        User::find($id)->delete();
        $usuarios = User::paginate(2);
        return view('usuarios.usuarios_mostrar', compact('usuarios'));
    }
}
