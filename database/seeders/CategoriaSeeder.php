<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Ejecuta las semillas de la base de datos.
     */
    public function run(): void
    {
        $categorias = [
            'Fiambres',
            'Quesos',
            'Embutidos',
            'Bebidas',
        ];

        foreach ($categorias as $nombre) {
            Categoria::firstOrCreate(
                ['nombre' => $nombre],
                ['descripcion' => null],
            );
        }
    }
}