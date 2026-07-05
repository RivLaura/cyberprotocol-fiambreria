<?php

test('la pantalla de registro se puede renderizar', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('los nuevos usuarios pueden registrarse', function () {
    $response = $this->post('/register', [
        'name' => 'Usuario de Prueba',
        'email' => 'prueba@ejemplo.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('dashboard', absolute: false));
});
