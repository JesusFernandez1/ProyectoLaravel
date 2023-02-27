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
    // Crear un usuario
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => bcrypt('password'),
    ]);

    // // Iniciar sesión como el usuario
    // $response = $this->post('/login', [
    //     'email' => 'test@example.com',
    //     'password' => 'password',
    // ]);

    // Comprobar que se redirecciona correctamente después del inicio de sesión
    // $response->assertRedirect('/');

    // Comprobar que el usuario está autenticado
    $this->assertAuthenticatedAs($user);

    // Comprobar que la ruta /dashboard está protegida y que se puede acceder después de iniciar sesión
    $response = $this->get('/');
    $response->assertStatus(302);
}
}
