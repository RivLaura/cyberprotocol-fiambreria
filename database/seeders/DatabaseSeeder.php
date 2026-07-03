<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Esta función se encarga de ejecutar las semillas de la base de datos
     */
    public function run(): void
    {
        // usuario de prueba

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // seed de categorias
        
        $this->call([
            CategoriaSeeder::class,
        ]);

        // seed de Productos
        $this->call([
            ProductoSeeder::class,
        ]);

        // seed de Clientes
        $this->call([
            ClienteSeeder::class,
        ]);

        // seed de Consumidor Final (debe ir después de ClienteSeeder)
        $this->call([
            ConsumidorFinalSeeder::class,
        ]);
    }
}

