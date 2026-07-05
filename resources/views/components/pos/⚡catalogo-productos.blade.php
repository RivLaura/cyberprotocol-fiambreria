<?php

use App\Models\Categoria;
use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component
{
    use WithPagination;

    public string $buscar = '';

    public string $categoria = '';

    public function updatedBuscar()
    {
        $this->resetPage();
    }

    public function updatedCategoria()
    {
        $this->resetPage();
    }

    public function limpiarBusqueda()
    {
        logger('Entró al método');

        $this->buscar = '';

        $this->categoria = '';

        $this->resetPage();
    }

    public function with()
    {
        return [

            'categorias' => Categoria::orderBy('nombre')->get(),

            'productos' => Producto::with('categoria')

                ->when($this->buscar, function ($query) {

                    $query->where('nombre', 'like', '%' . $this->buscar . '%');
                })

                ->when($this->categoria, function ($query) {

                    $query->where('categoria_id', $this->categoria);
                })

                ->orderBy('nombre')

                ->paginate(12),

        ];
    }
};

?>

<div>
    <div class="flex flex-wrap gap-3 mb-6">

        <button
            wire:click="$set('categoria', '')"
            class="px-5 py-2 rounded-full
        {{ $categoria == '' ? 'bg-amber-700 text-white' : 'border border-stone-300 bg-white' }}">

            Todos

        </button>

        @foreach($categorias as $cat)

        <button
            wire:click="$set('categoria', '{{ $cat->id }}')"
            class="px-5 py-2 rounded-full
            {{ $categoria == $cat->id ? 'bg-amber-700 text-white' : 'border border-stone-300 bg-white' }}">

            {{ $cat->nombre }}

        </button>

        @endforeach

    </div>

    <div class="mb-6">

        <div class="relative">

            <input
                type="text"
                wire:model.live.debounce.300ms="buscar"
                placeholder="🔍 Buscar productos..."
                class="w-full rounded-xl border border-stone-300 px-4 py-3 pr-12
                   focus:ring-amber-600 focus:border-amber-600">

            @if($buscar != '')

            <button
                wire:click="limpiarBusqueda"
                type="button"
                class="absolute right-4 top-1/2 -translate-y-1/2 text-stone-400 hover:text-red-600">

                ✕

            </button>

            @endif

        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

        @forelse($productos as $producto)

        <x-pos.producto-card
            :producto="$producto" />

        @empty

        <div class="col-span-full">

            <div class="rounded-xl border border-stone-300 bg-white p-8 text-center">

                <div class="text-5xl mb-4">
                    🔍
                </div>

                <h3 class="text-xl font-semibold text-stone-700">

                    No se encontraron productos

                </h3>

                <p class="mt-2 text-stone-500">

                    Probá con otra búsqueda o seleccioná otra categoría.

                </p>

            </div>

        </div>

        @endforelse

    </div>

    <div class="mt-8 flex justify-center">

        {{ $productos->links() }}

    </div>

</div>