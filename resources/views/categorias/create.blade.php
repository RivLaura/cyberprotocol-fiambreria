<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-gradient-to-r from-amber-800 to-amber-950 p-6 rounded-xl shadow-lg">
            <div>
                <h2 class="font-serif text-2xl text-amber-50 leading-tight tracking-wide">
                    {{ __('Nueva categoría') }}
                </h2>
                <p class="text-amber-200/70 text-xs mt-1">Introduce los datos para incorporar una nueva categoria</p>
            </div>
            <!-- Botón Volver al Listado -->
            <a href="{{ route('categorias.index') }}" class="inline-flex items-center px-4 py-2 bg-amber-900/40 hover:bg-amber-900/60 text-amber-200 text-xs font-semibold rounded-lg border border-amber-700/50 transition-colors">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Volver al listado
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-amber-50/40 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
           <!-- Contenedor del Formulario con estilo moderno y limpio -->
            <div class="bg-white overflow-hidden rounded-2xl border border-amber-100 shadow-md p-8">
                
                <!-- Tu formulario conectado a la ruta de almacenamiento de tu equipo -->
                <form action="{{ route('categorias.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Campo: Nombre de la Categoría -->
                    <div>
                        <label for="nombre" class="block text-sm font-serif font-bold text-amber-950 tracking-wide">
                            Nombre de la Categoría <span class="text-red-500">*</span>
                        </label>
                        <p class="text-gray-400 text-[11px] mb-2">Ejemplo: Quesos Suizo, Fiambres Ahumados, Productos congelados.</p>
                        <input 
                            type="text" 
                            name="nombre" 
                            id="nombre" 
                            required 
                            maxlength="100"
                            placeholder="Escribe el nombre de la categoría..."
                            class="w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50 text-gray-800 text-sm p-3 transition-all placeholder-gray-400/70"
                        >
                    </div>

                    <!-- Campo: Descripción de la Categoría -->
                    <div>
                        <label for="descripcion" class="block text-sm font-serif font-bold text-amber-950 tracking-wide mb-2">
                            Descripción de la categoría <span class="text-gray-400 text-xs">(opcional)</span>
                        </label>
                        <textarea 
                            name="descripcion" 
                            id="descripcion" 
                            rows="4" 
                            placeholder="Detalla las características especiales, procedencia o notas de cata de esta categoría..."
                            class="w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50 text-gray-800 text-sm p-3 transition-all placeholder-gray-400/70"
                        ></textarea>
                    </div>

                    <!-- Separador Estético -->
                    <div class="border-t border-gray-100 pt-6 flex flex-col sm:flex-row sm:justify-end space-y-3 sm:space-y-0 sm:space-x-3">
                        
                        <!-- Botón Cancelar -->
                        <a href="{{ route('categorias.index') }}" class="w-full sm:w-auto text-center px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-xl transition-colors">
                            Cancelar
                        </a>

                        <!-- Botón Guardar Categoría -->
                        <button type="submit" class="w-full sm:w-auto px-6 py-2.5 bg-gradient-to-r from-amber-600 to-amber-700 hover:from-amber-500 hover:to-amber-600 text-white text-sm font-bold rounded-xl shadow-md hover:shadow-amber-600/10 transform hover:-translate-y-0.5 transition-all">
                            Registrar categoría
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>