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
        'consumidor_final',
    ];

    protected static function booted(): void
    {
        static::deleting(function (Cliente $cliente) {
            if ($cliente->consumidor_final) {
                throw new \LogicException('El cliente Consumidor Final no puede ser eliminado.');
            }
        });
    }

    public function ventas(): HasMany
    {
        return $this->hasMany(Venta::class);
    }
}
