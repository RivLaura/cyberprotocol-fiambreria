<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'email',
    ];

    // Relación con la tabla de ventas
    public function ventas(): HasMany
    {
        return $this->hasMany(Venta::class);
    }

    // Método para obtener o crear el cliente "Consumidor Final"
    public static function consumidorFinal(): self
    {
        return self::firstOrCreate(
            ['documento' => '00000000'],
            [
                'nombre' => 'Consumidor',
                'apellido' => 'Final',
                'telefono' => null,
                'email' => null,
            ]
        );
    }
}