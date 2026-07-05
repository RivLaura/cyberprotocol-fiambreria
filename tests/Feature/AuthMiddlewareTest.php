<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    public function test_invitado_es_redirigido_desde_dashboard(): void
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect('/login');
    }

    public function test_invitado_es_redirigido_desde_categorias(): void
    {
        $response = $this->get('/categorias');

        $response->assertRedirect('/login');
    }
}