<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/*
|--------------------------------------------------------------------------
| Caso de Prueba
|--------------------------------------------------------------------------
|
| El closure que proporcionas a tus funciones de prueba siempre está vinculado a una clase
| de caso de prueba PHPUnit específica. Por defecto, esa clase es "PHPUnit\Framework\TestCase".
| Por supuesto, puedes cambiarla usando la función "pest()" para vincular diferentes clases o traits.
|
*/

pest()->extend(TestCase::class)
    ->use(RefreshDatabase::class)
    ->in('Feature');

/*
|--------------------------------------------------------------------------
| Expectativas
|--------------------------------------------------------------------------
|
| Cuando escribes pruebas, a menudo necesitas verificar que los valores cumplan ciertas
| condiciones. La función "expect()" te da acceso a un conjunto de métodos de "expectativas"
| que puedes usar para afirmar diferentes cosas. Por supuesto, puedes extender la API de
| Expectativas en cualquier momento.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Funciones
|--------------------------------------------------------------------------
|
| Si bien Pest es muy potente de serie, es posible que tengas código de prueba específico
| de tu proyecto que no quieras repetir en cada archivo. Aquí también puedes exponer
| funciones auxiliares globales para reducir la cantidad de líneas de código en tus archivos de prueba.
|
*/

function something()
{
    // ..
}
