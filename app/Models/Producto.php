<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Categoria;


class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'stock_minimo',
        'fecha_elaboracion',
        'fecha_vencimiento',
        'categoria_id',
    ];

    /**
     * Un producto pertenece a una categoría.
     */
  public function categoria(): BelongsTo
{
    return $this->belongsTo(Categoria::class);
}
}