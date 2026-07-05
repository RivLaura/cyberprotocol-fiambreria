<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center bg-gradient-to-r from-amber-800 to-amber-950 p-6 rounded-xl shadow-lg gap-4">
            <div>
                <h2 class="font-serif text-2xl text-amber-50 leading-tight tracking-wide">
                    {{ __('Editar Cliente') }}
                </h2>
                <p class="text-amber-200/70 text-xs mt-1">Modifica los datos del cliente #{{ $cliente->id }}.</p>
            </div>
            <a href="{{ route('clientes.index') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-5 py-2.5 bg-white/10 hover:bg-white/20 text-amber-50 text-sm font-bold rounded-lg border border-amber-400/30 shadow-md hover:shadow-amber-500/10 transform hover:-translate-y-0.5 transition-all duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                {{ __('Volver al listado') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-amber-50/40 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden rounded-2xl border border-amber-100 shadow-md p-8">
                <form method="POST" action="{{ route('clientes.update', $cliente->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <x-input-label for="nombre" value="Nombre" />
                        <x-text-input id="nombre" name="nombre" type="text" class="block mt-1 w-full" :value="old('nombre', $cliente->nombre)" required />
                        <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="apellido" value="Apellido" />
                        <x-text-input id="apellido" name="apellido" type="text" class="block mt-1 w-full" :value="old('apellido', $cliente->apellido)" required />
                        <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="telefono" value="Teléfono" />
                        <x-text-input id="telefono" name="telefono" type="text" class="block mt-1 w-full" :value="old('telefono', $cliente->telefono)" />
                        <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                    </div>

                    <div class="mb-6">
                        <x-input-label for="email" value="Correo electrónico" />
                        <x-text-input id="email" name="email" type="email" class="block mt-1 w-full" :value="old('email', $cliente->email)" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="flex justify-end gap-3 pt-4 border-t border-amber-100">
                        <a href="{{ route('clientes.index') }}" class="inline-flex items-center px-5 py-2.5 bg-white hover:bg-gray-50 text-gray-700 text-sm font-bold rounded-xl border border-gray-200 shadow-sm transform hover:-translate-y-0.5 transition-all duration-200">
                            Cancelar
                        </a>
                        <button type="submit" class="inline-flex items-center px-5 py-2.5 bg-amber-600 hover:bg-amber-500 text-white text-sm font-bold rounded-xl shadow-md hover:shadow-amber-500/20 transform hover:-translate-y-0.5 transition-all duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                            </svg>
                            Actualizar Cliente
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
