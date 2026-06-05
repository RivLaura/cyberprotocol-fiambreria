<?php

use Livewire\Component;

new class extends Component
{
    public int $contador = 0;

    public function incrementar()
    {
        $this->contador++;
    }
};
?>

<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">
        Contador Livewire
    </h2>

    <p class="mb-4">
        Valor actual: {{ $contador }}
    </p>

    <button
        wire:click="incrementar"
        class="px-4 py-2 bg-blue-500 text-white rounded"
    >
        Incrementar
    </button>
</div>