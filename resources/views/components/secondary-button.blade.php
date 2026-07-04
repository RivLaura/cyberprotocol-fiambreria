<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-5 py-2.5 bg-white hover:bg-gray-50 text-gray-700 text-sm font-bold rounded-xl border border-gray-200 shadow-sm transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2']) }}>
    {{ $slot }}
</button>
