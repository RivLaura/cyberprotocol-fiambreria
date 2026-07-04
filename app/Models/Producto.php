<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;


class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen',
        'precio',
        'stock',
        'stock_minimo',
        'fecha_elaboracion',
        'fecha_vencimiento',
        'categoria_id',
    ];

    protected $appends = ['imagen_url'];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function getImagenUrlAttribute(): ?string
    {
        if ($this->imagen && Storage::disk('public')->exists($this->imagen)) {
            return asset('storage/' . $this->imagen);
        }

        return match ($this->categoria?->nombre) {
            'Bebidas'   => asset('images/bebidas.png'),
            'Embutidos' => asset('images/embutidos.png'),
            'Fiambres'  => asset('images/fiambres.png'),
            'Quesos'    => asset('images/quesos.png'),
            default     => null
        };
    }
}
