<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Editar categoría
        </h2>
    </x-slot>

    <div class="p-6">
        <p><strong>ID:</strong> {{ $categoria->id }}</p>
        <p><strong>Nombre:</strong> {{ $categoria->nombre }}</p>
        <p><strong>Descripción:</strong> {{ $categoria->descripcion }}</p>
    </div>
</x-app-layout>