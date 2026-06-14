@props(['status'])

@if ($status)
    <!-- Contenedor animado tipo banner con bordes redondeados y sombra suave -->
    <x-auth-session-status class="mb-4" status="Acceso Restringido: Su sesión ha expirado por inactividad. Por favor, vuelva a introducir sus credenciales para ingresar al panel." />
        
        <!-- Icono de advertencia/información (SVG) -->
        <div class="shrink-0 text-red-700 pt-0.5">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
        </div>

        <!-- Contenido del mensaje -->
        <div class="flex-1">
            <p class="font-sans text-sm font-semibold text-red-950 leading-relaxed">
                {{ $status }}
            </p>
        </div>
        
    </div>
@endif
