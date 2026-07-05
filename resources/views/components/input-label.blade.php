@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-xs font-sans font-bold tracking-wider text-amber-900/50 uppercase']) }}>
    {{ $value ?? $slot }}
</label>
