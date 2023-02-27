<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\User;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_home()
    {
        $response = $this->get('/');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_login()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
    }

    public function test_tarea()
    {
        $empleado = User::where('tipo', 'Admin')->first();

        $response = $this->actingAs($empleado)
            ->get('/tareas');

        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }

        $response->assertViewIs('tareas.tareas_mostrar');
        $response->assertViewHas('tareas');
    }

    public function test_tarea_crear()
    {
        $empleado = User::where('tipo', 'Admin')->first();

        $response = $this->actingAs($empleado)
            ->get('/tareas/create');

        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }

        $response->assertViewIs('tareas.tareas_crear');
    }

    public function test_tarea_modificar()
    {
        $empleado = User::where('tipo', 'Admin')->first();

        $response = $this->actingAs($empleado)
            ->get('/tareas/3/edit');

        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }

        $response->assertViewIs('tareas.tareas_modificar');
        $response->assertViewHas('tareas');
    }

    public function test_crearIncidencia()
    {
        $response = $this->get('/clientes/clientes_crearIncidencia');
        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }
        $response->assertViewIs('clientes.clientes_crearIncidencia');
    }

    public function test_tarea_pendiente()
    {
        $empleado = User::where('tipo', 'Admin')->first();

        $response = $this->actingAs($empleado)
            ->get('tareas/tareas_pendientes');

        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }

        $response->assertViewIs('tareas.tareas_pendientes');
        $response->assertViewHas('tareas');
    }

    public function test_tarea_noAsignada()
    {
        $empleado = User::where('tipo', 'Admin')->first();

        $response = $this->actingAs($empleado)
            ->get('tareas/tareas_mostrarNoAsignadas');

        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }

        $response->assertViewIs('tareas.tareas_mostrarNoAsignadas');
        $response->assertViewHas('tareas');
    }

    public function test_tarea_verInformacion()
    {
        $empleado = User::where('tipo', 'Admin')->first();

        $response = $this->actingAs($empleado)
            ->get('tareas/tareas_verInformacionDetallada');

        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }

        $response->assertViewIs('tareas.tareas_verInformacionDetallada');
        $response->assertViewHas('tareas');
    }

    public function test_tarea_asignarOperario()
    {
        $empleado = User::where('tipo', 'Admin')->first();

        $response = $this->actingAs($empleado)
            ->get('tareas/tareas_asignarOperario/4');

        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }

        $response->assertViewIs('tareas.tareas_asignarOperario');
        $response->assertViewHas('tareas');
    }

}
