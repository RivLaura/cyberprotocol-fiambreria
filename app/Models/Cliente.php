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

    protected $appends = ['nombre_completo'];

    public function getNombreCompletoAttribute(): string
    {
        return trim($this->nombre . ' ' . $this->apellido);
    }

    // Relación con la tabla de ventas
    public function ventas(): HasMany
    {
        return $this->hasMany(Venta::class);
    }

}
