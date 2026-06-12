<x-app-layout>
    <div class="max-w-2xl mx-auto py-10">

        <h1 class="text-2xl font-bold mb-6 text-gray-800">
            Registrar Categoría
        </h1>

        <form method="POST" action="{{ route('categorias.store') }}" class="space-y-6">
            @csrf

            <!-- Nombre -->
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Nombre
                </label>

                <input
                    type="text"
                    name="nombre"
                    value="{{ old('nombre') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500
                    @error('nombre') border-red-500 @enderror"
                >

                @error('nombre')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Descripción -->
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Descripción
                </label>

                <textarea
                    name="descripcion"
                    rows="4"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500
                    @error('descripcion') border-red-500 @enderror"
                >{{ old('descripcion') }}</textarea>

                @error('descripcion')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botón -->
            <div class="flex justify-end">
                <button
                    type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-md shadow"
                >
                    Guardar Categoría
                </button>
            </div>

        </form>
    </div>
</x-app-layout>