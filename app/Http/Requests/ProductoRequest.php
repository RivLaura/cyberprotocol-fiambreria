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

            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'precio.required' => 'El precio es obligatorio.',
            'precio.gt' => 'El precio debe ser mayor a cero.',
            'stock.required' => 'El stock es obligatorio.',
            'stock.min' => 'El stock no puede ser negativo.',
            'categoria_id.required' => 'Debe seleccionar una categoría.',
            'fecha_elaboracion.required' => 'Debe ingresar la fecha de elaboración.',
            'fecha_vencimiento.after' => 'La fecha de vencimiento debe ser posterior a la elaboración.',
            'imagen.image' => 'El archivo debe ser una imagen.',
            'imagen.mimes' => 'La imagen debe ser JPG, PNG o WEBP.',
            'imagen.max' => 'La imagen no puede superar los 2 MB.',
        ];
    }
}
