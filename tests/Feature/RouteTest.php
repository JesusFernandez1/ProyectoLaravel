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

    public function test_forgot()
    {
        $response = $this->get('/forgot-password');
        $response->assertStatus(200);
        $response->assertViewIs('auth.forgot-password');
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
        $user = User::where('tipo', 'Admin')->first();
        $response = $this->actingAs($user)
            ->get('/tareas/8/edit');
        $response->assertStatus(200);
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
        $user = User::where('tipo', 'Admin')->first();
        $response = $this->actingAs($user)
            ->get('/tareas/tareas_asignarOperario/9');
        $response->assertStatus(200);
    }

    // public function test_tarea_eliminada()
    // {
    //     $user = User::where('tipo', 'Admin')->first();
    //     $response = $this->actingAs($user)
    //         ->get('/tareas/tareas_eliminada/3');
    //     $response->assertStatus(200);
    // }

    public function test_tarea_completada()
    {
        $user = User::where('tipo', 'Operario')->first();
        $response = $this->actingAs($user)
            ->get('tareas/tareas_completar/9');
        $response->assertStatus(200);
    }

    public function test_cliente_crear()
    {
        $empleado = User::where('tipo', 'Admin')->first();

        $response = $this->actingAs($empleado)
            ->get('/clientes/create');

        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }

        $response->assertViewIs('clientes.clientes_crear');
    }
    
    public function test_cliente_modificar()
    {
        $user = User::where('tipo', 'Admin')->first();
        $response = $this->actingAs($user)
            ->get('/clientes/10/edit');
        $response->assertStatus(200);
    }
    
    public function test_cuota_modificar()
    {
        $user = User::where('tipo', 'Admin')->first();
        $response = $this->actingAs($user)
            ->get('/cuotas/32/edit');
        $response->assertStatus(200);
    }

    public function test_cuota_excepcional()
    {
        $user = User::where('tipo', 'Admin')->first();
        $response = $this->actingAs($user)
            ->get('/cuotas/cuotas_excepcional/10');
        $response->assertStatus(200);
    }

    public function test_cuota_remesaMensual()
    {
        $empleado = User::where('tipo', 'Admin')->first();

        $response = $this->actingAs($empleado)
            ->get('/cuotas/cuotas_remesaMensual');

        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }

        $response->assertViewIs('cuotas.cuotas_remesaMensual');
    }

    public function test_cuota_remesaCreada()
    {
        $empleado = User::where('tipo', 'Admin')->first();

        $response = $this->actingAs($empleado)
            ->get('/cuotas/cuotas_remesaCreada');

        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }

        $response->assertViewIs('cuotas.cuotas_remesaCreada');
    }

    public function test_cuota_eliminar()
    {
        $user = User::where('tipo', 'Admin')->first();
        $response = $this->actingAs($user)
            ->get('/cuotas/cuotas_eliminar/32');
        $response->assertStatus(200);
    }

}
