<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\paises;
use App\Models\task;
use App\Models\provincias;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        $paises = paises::all();
        return view('clientes.clientes_crear', compact('paises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->pais != null) {
            $pais = paises::select('iso_moneda')->where('iso3', '=', $request->pais)->first();
            $moneda = $pais->iso_moneda;
        }

        $datos = $request->validate([
            'DNI' => ['regex:/((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)/'],
            'nombre' => ['regex:/^[a-z]+$/i'],
            'telefono' => ['regex:/(\+34|0034|34)?[ -]*(6|7|8|9)[ -]*([0-9][ -]*){8}/'],
            'correo' => ['regex:#^(((([a-z\d][\.\-\+_]?)*)[a-z0-9])+)\@(((([a-z\d][\.\-_]?){0,62})[a-z\d])+)\.([a-z\d]{2,6})$#i'],
            'cuenta' => ['required'],
            'pais' => ['required'],
            'importe_mensual' => ['required']
        ]);
        $datos['moneda'] = $moneda;
        customer::insert($datos);
        $clientes = customer::paginate(2);
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
        $cliente = customer::find($id);
        return view('clientes.clientes_eliminar', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paises = paises::all();
        $cliente = customer::find($id);
        return view('clientes.clientes_modificar', compact('cliente', 'paises'));
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
        $pais = paises::select('iso_moneda')->where('iso3', '=', $request->pais)->first();
        $moneda = $pais->iso_moneda;
        $datos = $request->validate([
            'DNI' => ['regex:/((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)/'],
            'nombre' => ['regex:/^[a-z]+$/i'],
            'telefono' => ['regex:/(\+34|0034|34)?[ -]*(6|7|8|9)[ -]*([0-9][ -]*){8}/'],
            'correo' => ['regex:#^(((([a-z\d][\.\-\+_]?)*)[a-z0-9])+)\@(((([a-z\d][\.\-_]?){0,62})[a-z\d])+)\.([a-z\d]{2,6})$#i'],
            'cuenta' => ['required'],
            'pais' => ['required'],
            'importe_mensual' => ['required']
        ]);
        $datos['moneda'] = $moneda;
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

    public function confirmarEliminarCliente($id)
    {
        customer::find($id)->delete();
        $clientes = customer::paginate(2);
        return view('clientes.clientes_mostrar', compact('clientes'));
    }

    public function nuevaIncidencia()
    {
        $provincias = provincias::all();
        return view('clientes.clientes_crearIncidencia', compact('provincias'));
    }

    public function crearIncidencia(Request $request)
    {
        // $storedDNI = User::find($request->DNI)->dni;
        // $storedTelefono = User::find($request->telefono)->telefono;

        $storedDNI = $request->DNI;
        $storedTelefono = $request->telefonoUser;
        $fecha_creacion = $request->fecha_creacion;

        $request->validate([
            'DNI' => ['regex:/((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)/',
                function ($atribute, $value, $fail) use ($storedTelefono){
                    if (!customer::select('DNI')->where('DNI', $value)->where('telefono', $storedTelefono)->first()) {
                        
                        $fail('El DNI o telefono introducido no coincide con ningun usuario.');
                    }
                }
            ]
        ]);

        $datos = $request->validate([
            'nombre' => ['regex:/^[a-z]+$/i'],
            'apellido' => ['regex:/^[a-z]+$/i'],
            'telefono' => ['regex:/(\+34|0034|34)?[ -]*(6|7|8|9)[ -]*([0-9][ -]*){8}/'],
            'descripcion' => ['required'],
            'correo' => ['regex:#^(((([a-z\d][\.\-\+_]?)*)[a-z0-9])+)\@(((([a-z\d][\.\-_]?){0,62})[a-z\d])+)\.([a-z\d]{2,6})$#i'],
            'direccion' => ['required'],
            'poblacion' => ['required'],
            'codigo_postal' => ['required'],
            'provincia' => ['required'],
            'estado_tarea' => ['required'],
            'fecha_creacion' => [
                'required', 'date_format:Y-m-d\TH:i',
                function ($atribute, $value, $fail) {
                    if (date("Y-m-d\TH", strtotime($value)) != date("Y-m-d\TH")) {
                        $fail('La fecha de creación no se puede modificar.');
                    }
                }
            ],
            'fecha_final' => [
                'nullable', 'date_format:Y-m-d\TH:i',
                function ($atribute, $value, $fail) use ($fecha_creacion) {
                    if (date("Y-m-d\TH", strtotime($value)) <= date("Y-m-d\TH", strtotime($fecha_creacion))) {
                        $fail('La fecha de creación no se puede modificar.');
                    }
                }
            ],
            'anotacion_anterior' => ['nullable'],
            'anotacion_posterior' => ['nullable']
        ]);
        $idcliente = customer::select('id')->where('DNI', $storedDNI)->first()->id;
        $datos['customers_id'] = $idcliente;
        $datos['users_id'] = null;
        task::insert($datos);
        return view('base');
    }
}
