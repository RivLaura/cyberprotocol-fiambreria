<?php

use App\Models\User;

test('la pantalla de inicio de sesion se puede renderizar', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
});

test('los usuarios pueden autenticarse con la pantalla de inicio de sesion', function () {
    $user = User::factory()->create();

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('dashboard', absolute: false));
});

test('los usuarios no pueden autenticarse con contrasena invalida', function () {
    $user = User::factory()->create();

    $this->post('/login', [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest();
});

test('los usuarios pueden cerrar sesion', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/logout');

    $this->assertGuest();
    $response->assertRedirect('/');
});
