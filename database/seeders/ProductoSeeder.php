<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        $fiambres = Categoria::where('nombre', 'Fiambres')->first();
        $quesos = Categoria::where('nombre', 'Quesos')->first();
        $embutidos = Categoria::where('nombre', 'Embutidos')->first();
        $bebidas = Categoria::where('nombre', 'Bebidas')->first();

        $productos = [

            // ==========================
            // FIAMBRES
            // ==========================

            [
                'categoria_id' => $fiambres->id,
                'nombre' => 'Jamón Cocido',
                'precio' => 18000,
                'stock' => 25000,
                'stock_minimo' => 1000,
            ],
            [
                'categoria_id' => $fiambres->id,
                'nombre' => 'Jamón Crudo',
                'precio' => 26000,
                'stock' => 18000,
                'stock_minimo' => 1000,
            ],
            [
                'categoria_id' => $fiambres->id,
                'nombre' => 'Mortadela',
                'precio' => 11000,
                'stock' => 20000,
                'stock_minimo' => 1000,
            ],
            [
                'categoria_id' => $fiambres->id,
                'nombre' => 'Bondiola',
                'precio' => 24000,
                'stock' => 12000,
                'stock_minimo' => 1000,
            ],
            [
                'categoria_id' => $fiambres->id,
                'nombre' => 'Paleta Cocida',
                'precio' => 14500,
                'stock' => 22000,
                'stock_minimo' => 1000,
            ],

            // ==========================
            // QUESOS
            // ==========================

            [
                'categoria_id' => $quesos->id,
                'nombre' => 'Queso Cremoso',
                'precio' => 12500,
                'stock' => 18000,
                'stock_minimo' => 1000,
            ],
            [
                'categoria_id' => $quesos->id,
                'nombre' => 'Queso Tybo',
                'precio' => 17000,
                'stock' => 16000,
                'stock_minimo' => 1000,
            ],
            [
                'categoria_id' => $quesos->id,
                'nombre' => 'Queso Provolone',
                'precio' => 22000,
                'stock' => 9000,
                'stock_minimo' => 1000,
            ],
            [
                'categoria_id' => $quesos->id,
                'nombre' => 'Queso Azul',
                'precio' => 24000,
                'stock' => 6000,
                'stock_minimo' => 1000,
            ],
            [
                'categoria_id' => $quesos->id,
                'nombre' => 'Muzzarella',
                'precio' => 14000,
                'stock' => 25000,
                'stock_minimo' => 1000,
            ],

            // ==========================
            // EMBUTIDOS
            // ==========================

            [
                'categoria_id' => $embutidos->id,
                'nombre' => 'Salame',
                'precio' => 23000,
                'stock' => 12000,
                'stock_minimo' => 1000,
            ],
            [
                'categoria_id' => $embutidos->id,
                'nombre' => 'Salamín',
                'precio' => 21000,
                'stock' => 8000,
                'stock_minimo' => 1000,
            ],
            [
                'categoria_id' => $embutidos->id,
                'nombre' => 'Longaniza',
                'precio' => 17000,
                'stock' => 15000,
                'stock_minimo' => 1000,
            ],
            [
                'categoria_id' => $embutidos->id,
                'nombre' => 'Fuet',
                'precio' => 26000,
                'stock' => 7000,
                'stock_minimo' => 1000,
            ],

            // ==========================
            // BEBIDAS
            // ==========================

            [
                'categoria_id' => $bebidas->id,
                'nombre' => 'Agua Mineral',
                'precio' => 1800,
                'stock' => 48,
                'stock_minimo' => 5,
            ],
            [
                'categoria_id' => $bebidas->id,
                'nombre' => 'Gaseosa Cola',
                'precio' => 3200,
                'stock' => 36,
                'stock_minimo' => 5,
            ],
            [
                'categoria_id' => $bebidas->id,
                'nombre' => 'Gaseosa Lima Limón',
                'precio' => 3200,
                'stock' => 30,
                'stock_minimo' => 5,
            ],
            [
                'categoria_id' => $bebidas->id,
                'nombre' => 'Agua Saborizada',
                'precio' => 2400,
                'stock' => 24,
                'stock_minimo' => 5,
            ],
            [
                'categoria_id' => $bebidas->id,
                'nombre' => 'Jugo de Naranja',
                'precio' => 2900,
                'stock' => 20,
                'stock_minimo' => 5,
            ],
            [
                'categoria_id' => $bebidas->id,
                'nombre' => 'Cerveza Rubia',
                'precio' => 3500,
                'stock' => 40,
                'stock_minimo' => 5,
            ],

        ];

        foreach ($productos as $producto) {

            Producto::firstOrCreate(
                ['nombre' => $producto['nombre']],
                [
                    'descripcion' => 'Producto disponible para la venta.',
                    'precio' => $producto['precio'],
                    'stock' => $producto['stock'],
                    'stock_minimo' => $producto['stock_minimo'],
                    'fecha_elaboracion' => now()->subDays(rand(1, 20)),
                    'fecha_vencimiento' => now()->addMonths(rand(1, 6)),
                    'categoria_id' => $producto['categoria_id'],
                ],
            );
        }
    }
}