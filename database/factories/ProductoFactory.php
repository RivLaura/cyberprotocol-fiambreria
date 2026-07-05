<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoriaId = $this->attributes['categoria_id']
            ?? \App\Models\Categoria::inRandomOrder()->value('id');

        $categoria = \App\Models\Categoria::find($categoriaId);

        $productos = [

            'Fiambres' => [
                'Jamón Cocido',
                'Jamón Crudo',
                'Paleta Cocida',
                'Mortadela',
                'Bondiola',
                'Pechuga de Pavo',
                'Lomo Cocido',
                'Lomo Ahumado',
            ],

            'Quesos' => [
                'Queso Cremoso',
                'Queso Tybo',
                'Queso Provolone',
                'Queso Pategrás',
                'Queso Azul',
                'Muzzarella',
                'Ricota',
                'Queso Sardo',
            ],

            'Embutidos' => [
                'Salame',
                'Salamín',
                'Longaniza',
                'Chorizo Colorado',
                'Cantimpalo',
                'Fuet',
            ],

            'Bebidas' => [
                'Agua Mineral',
                'Gaseosa Cola',
                'Gaseosa Lima Limón',
                'Agua Saborizada',
                'Jugo de Naranja',
                'Cerveza Rubia',
            ],

        ];

        return [

            'nombre' => fake()->randomElement(
                $productos[$categoria->nombre]
            ),

            'descripcion' => fake()->randomElement([
                'Producto fresco.',
                'Excelente calidad.',
                'Ideal para picadas.',
                'Conservar refrigerado.',
                'Producto seleccionado.',
            ]),

            'precio' => fake()->randomFloat(2, 1000, 15000),

            'stock' => match ($categoria->nombre) {

                'Bebidas' => fake()->numberBetween(10, 80),

                default => fake()->numberBetween(5000, 50000),
            },

            'stock_minimo' => match ($categoria->nombre) {

                'Bebidas' => 5,

                default => 1000, // 1 kg

            },

            'fecha_elaboracion' => fake()->dateTimeBetween('-20 days', 'now'),

            'fecha_vencimiento' => fake()->dateTimeBetween('+15 days', '+8 months'),

            'categoria_id' => $categoria->id,

        ];
    }
}
