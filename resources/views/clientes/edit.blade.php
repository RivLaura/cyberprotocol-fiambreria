<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Cliente
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-8">

                <form method="POST" action="{{ route('clientes.update', $cliente->id) }}">

                    @csrf
                    @method('PUT')

                    <div class="mb-4">

                        <x-input-label for="nombre" value="Nombre" />

                        <x-text-input
                            id="nombre"
                            name="nombre"
                            type="text"
                            class="block mt-1 w-full"
                            :value="old('nombre', $cliente->nombre)"
                            required />

                        <x-input-error :messages="$errors->get('nombre')" class="mt-2" />

                    </div>

                    <div class="mb-4">

                        <x-input-label for="apellido" value="Apellido" />

                        <x-text-input
                            id="apellido"
                            name="apellido"
                            type="text"
                            class="block mt-1 w-full"
                            :value="old('apellido', $cliente->apellido)"
                            required />

                        <x-input-error :messages="$errors->get('apellido')" class="mt-2" />

                    </div>

                    <div class="mb-4">

                        <x-input-label for="telefono" value="Teléfono" />

                        <x-text-input
                            id="telefono"
                            name="telefono"
                            type="text"
                            class="block mt-1 w-full"
                            :value="old('telefono', $cliente->telefono)" />

                        <x-input-error :messages="$errors->get('telefono')" class="mt-2" />

                    </div>

                    <div class="mb-6">

                        <x-input-label for="email" value="Correo electrónico" />

                        <x-text-input
                            id="email"
                            name="email"
                            type="email"
                            class="block mt-1 w-full"
                            :value="old('email', $cliente->email)" />

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    </div>

                    <div class="flex justify-end gap-3">

                        <a
                            href="{{ route('clientes.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">

                            Cancelar

                        </a>

                        <x-primary-button>

                            Actualizar Cliente

                        </x-primary-button>

                    </div>

                </form>

            </div>
        </div>
    </div>

</x-app-layout>