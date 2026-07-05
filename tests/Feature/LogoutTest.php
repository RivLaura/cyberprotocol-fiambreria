<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_usuario_puede_cerrar_sesion_exitosamente(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('/logout');

        $response->assertRedirect('/');

        $this->assertGuest();
    }

    public function test_la_sesion_se_destruye_despues_de_cerrar_sesion(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post('/logout');

        $this->assertGuest();
    }

    public function test_las_rutas_autenticadas_son_inaccesibles_despues_de_cerrar_sesion(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post('/logout');

        $response = $this->get('/dashboard');

        $response->assertRedirect('/login');
    }
}