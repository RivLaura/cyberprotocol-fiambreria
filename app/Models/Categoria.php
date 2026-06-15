<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use HasFactory;

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
