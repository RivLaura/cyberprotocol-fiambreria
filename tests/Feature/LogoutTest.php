<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_logout_successfully(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('/logout');

        $response->assertRedirect('/');

        $this->assertGuest();
    }

    public function test_session_is_destroyed_after_logout(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post('/logout');

        $this->assertGuest();
    }

    public function test_authenticated_routes_are_inaccessible_after_logout(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post('/logout');

        $response = $this->get('/dashboard');

        $response->assertRedirect('/login');
    }
}