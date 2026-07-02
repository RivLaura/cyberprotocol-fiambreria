<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ConsumidorFinalSeeder extends Seeder
{
    public function run(): void
    {
        // Crear el cliente "Consumidor Final" si no existe
        Cliente::withoutEvents(function () {
            // Usar firstOrCreate para evitar duplicados
            Cliente::firstOrCreate(
                ['documento' => '00000000'],
                [
                    'nombre' => 'Consumidor',
                    'apellido' => 'Final',
                    'telefono' => null,
                    'email' => null,
                ]
            );
        });
    }
}