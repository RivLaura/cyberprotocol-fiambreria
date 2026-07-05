<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductoResource extends JsonResource
{
    /**
     * Transforma el recurso en un array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,

            'categoria' => [
                'id' => $this->categoria->id,
                'nombre' => $this->categoria->nombre,
            ],

            'precio' => $this->precio,
            'stock' => $this->stock,
            'stock_minimo' => $this->stock_minimo,

            'fecha_elaboracion' => $this->fecha_elaboracion,
            'fecha_vencimiento' => $this->fecha_vencimiento,

            'descripcion' => $this->descripcion,

            'imagen' => $this->imagen
                ? asset('storage/' . $this->imagen)
                : null,
        ];
    }
}
