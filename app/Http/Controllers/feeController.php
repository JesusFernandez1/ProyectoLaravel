<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fee;
use App\Models\customer;
use App\Models\task;
use Carbon\Carbon;
use App\Mail\CuotaCreada;
use Illuminate\Support\Facades\Mail;
use PDF;

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
        $cliente = customer::where('id', $id)->first();
        return view('cuotas.cuotas_excepcional', compact('cliente'));
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
                    if (date("Y-m-d\TH", strtotime($value)) <= date("Y-m-d\TH", strtotime($fecha_emision))) {
                        $fail("La fecha de finalizacion no puede ser menor que la de creacion");
                    }
                }
            ],
            'notas' => ['required'],
            'customers_id' => ['required']
        ]);
        fee::insert($datos);
        Mail::to(customer::where('id', $request->customers_id)->first()->correo)->send(new CuotaCreada());
        $cliente = customer::where('id', $request->customers_id)->first()->nombre;
        $cuotas = fee::where('customers_id', $request->customers_id)->paginate(2);
        return view('cuotas.cuotas_mostrar', compact('cuotas', 'cliente'));
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
        return view('cuotas.cuotas_mostrar', compact('cuotas', 'cliente'));
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
        $fecha_emision = fee::where('id', $id)->first()->fecha_emision;
        $datos = $request->validate([
            'concepto' => ['required'],
            'fecha_emision' => [
                'required', 'date_format:Y-m-d\TH:i',
                function ($atribute, $value, $fail) use ($fecha_emision) {
                    if (date("Y-m-d\TH", strtotime($value)) != date("Y-m-d\TH", strtotime($fecha_emision))) {
                        $fail('La fecha de creación no se puede modificar.');
                    }
                }
            ],
            'importe' => ['required'],
            'pagada' => ['required'],
            'fecha_pago' => [
                'nullable', 'date_format:Y-m-d\TH:i',
                function ($atribute, $value, $fail) use ($fecha_emision) {
                    if (date("Y-m-d\TH", strtotime($value)) <= date("Y-m-d\TH", strtotime($fecha_emision))) {
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
        return view('cuotas.cuotas_mostrar', compact('cuotas', 'cliente'));
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
        fee::find($id)->delete();
        return redirect()->route('clientes.index');
    }

    public function verRemesaMensual()
    {
        $clientes = customer::paginate(2);
        return view('cuotas.cuotas_remesaMensual', compact('clientes'));
    }

    public function crearRemesaMensual(Request $request)
    {
        $cuota = [];
        $fecha = Carbon::now()->format("F/Y");
        $datos = $request->validate([
            'notas' => ['nullable'],
        ]);
        $clientes = customer::all();
        foreach ($clientes as $cliente) {
            $datos = [
                'concepto' => date("Y-m-d"),
                'fecha_emision' => Carbon::now()->format("Y-m-d\TH:i"),
                'importe' => $cliente->id,
                'pagada' => 'No',
                'fecha_pago' => null,
                'notas' => $request->notas,
                'customers_id' => $cliente->id,
            ];
            array_push($cuota, $datos);
            Mail::to(customer::where('id', $datos['customers_id'])->first()->correo)->send(new CuotaCreada());
        }
        fee::insert($cuota);
        return redirect()->route('clientes.index');
    }

    public function pagar()
    {
        return view("cuotas.cuotas_pagar");
    }

    public function crearPDF($id)
    {

        $cuota = fee::find($id);

        $vista = view('cuotas\pdf', compact('cuota'))->render();

        $pdf = new PDF();
        $pdf->SetTitle('Cuota #' . $cuota->id);
        $pdf->SetMargins(10, 10, 10);
        $pdf->AddPage();

        // Agrega el contenido de la vista al PDF
        $pdf->writeHTML($vista, true, false, true, false, '');
        $pdf->Output('Cuota_' . $cuota->id . '.pdf', 'I');
    }
}
