<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|max:100',

            'precio' => 'required|numeric|gt:0',

            'stock' => 'required|integer|min:0',

            'categoria_id' => 'required|exists:categorias,id',

            'fecha_elaboracion' => 'required|date',

            'fecha_vencimiento' => 'required|date|after:fecha_elaboracion',
        ];
    }
}