<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illiminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    /**
     * Relación futura con productos. 
     * Una categoría puede tener muchos productos.
     */
    public function productos(): HasMany
    {
        return $this->hasMany(Producto::class);
    }
}