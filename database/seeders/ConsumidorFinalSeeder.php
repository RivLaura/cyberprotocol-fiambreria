<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ConsumidorFinalSeeder extends Seeder
{
    public function run(): void
    {
        Cliente::withoutEvents(function () {
            Cliente::updateOrCreate(
                ['consumidor_final' => true],
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
