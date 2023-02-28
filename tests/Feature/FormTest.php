<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FormTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_cliente_store()
    {
        $empleado = User::where('tipo', 'Admin')->first();

        $response = $this->actingAs($empleado)
            ->post('clientes',[
                'DNI' => '44232168V',
                'nombre' => 'Cris',
                'telefono' => '693353545',
                'correo' => 'cris@gmail.com',
                'cuenta' => 'espatata',
                'pais' => 'ESP',
                'moneda' => 'EUR',
                'importe_mensual' => '5'
            ]);
    
        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }
    
        $response->assertViewIs('clientes.clientes_mostrar');
    }
}
