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
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        $this->get('/login')->assertSee('Login');
        $credentials = [
            "email" => $user->email,
            "password" => $user->password
        ];

        $response = $this->post('/login', $credentials);
        $response->assertRedirect('/');
        $this->assertCredentials($credentials);
    }
}
