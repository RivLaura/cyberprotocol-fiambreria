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
        return [
            'nombre' => fake()->words(2, true),

            'descripcion' => fake()->sentence(),

            'precio' => fake()->randomFloat(2, 100, 10000),

            'stock' => fake()->numberBetween(0, 100),

            'stock_minimo' => 5,

            'fecha_elaboracion' => fake()->date(),

            'fecha_vencimiento' => fake()->dateTimeBetween('+1 day', '+1 year'),

            'categoria_id' => \App\Models\Categoria::inRandomOrder()->first()->id,
        ];
    }
}
