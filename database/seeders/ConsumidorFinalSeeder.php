<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ConsumidorFinalSeeder extends Seeder
{
    public function run(): void
    {
        Cliente::updateOrCreate(
            [
                'nombre' => 'Consumidor',
                'apellido' => 'Final',
            ],
            [
                'telefono' => null,
                'email' => null,
                'consumidor_final' => true,
            ]
        );
    }
}