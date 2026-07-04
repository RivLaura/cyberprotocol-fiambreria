<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-5 py-2.5 bg-red-600 hover:bg-red-500 text-white text-sm font-bold rounded-xl shadow-sm hover:shadow-red-500/20 transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2']) }}>
    {{ $slot }}
</button>
