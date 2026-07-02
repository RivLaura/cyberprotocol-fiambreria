<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Venta extends Model
{
    use HasFactory;

    protected $table = 'ventas';

    /**
     * Atributos asignables en masa
     */
    protected $fillable = [
        'cliente_id',
        'total',
    ];

    /**
     * Relación: una venta pertenece a un cliente
     */
    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    /**
     * Relación: una venta tiene muchos detalles
     */
    public function detalle_ventas(): HasMany
    {
        return $this->hasMany(DetalleVenta::class);
    }
}