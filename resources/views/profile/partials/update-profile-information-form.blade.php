<section>
    <header>
        <h2 class="font-serif text-lg font-bold text-amber-950">
            Información del Perfil
        </h2>
        <p class="mt-1 text-xs font-sans font-bold tracking-wider text-amber-900/50 uppercase">
            Actualizá tu foto, nombre y correo electrónico.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-5" enctype="multipart/form-data">
        @csrf
        @method('patch')

        {{-- Foto de perfil --}}
        <div>
            <x-input-label value="Foto de perfil" />
            <div class="mt-2 flex items-center gap-5">
                <div class="shrink-0">
                    <div class="w-20 h-20 rounded-full bg-gradient-to-br from-amber-100 to-amber-50 border-2 border-amber-200 flex items-center justify-center overflow-hidden">
                        @if($user->profile_photo_url)
                        <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
                        @else
                        <span class="text-2xl font-serif font-bold text-amber-700">{{ Str::substr($user->name, 0, 1) }}</span>
                        @endif
                    </div>
                </div>
                <div class="flex-1">
                    <div class="relative">
                        <input
                            type="file"
                            id="profile_photo"
                            name="profile_photo"
                            accept="image/jpeg,image/png,image/webp"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-bold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100 file:cursor-pointer cursor-pointer border border-gray-300 rounded-xl px-3 py-2 focus:border-amber-500 focus:ring-amber-500"
                        >
                    </div>
                    <p class="mt-1 text-[10px] font-sans font-bold tracking-wider text-amber-900/50 uppercase">
                        JPG, PNG o WEBP. Max 2MB.
                    </p>
                    <x-input-error :messages="$errors->get('profile_photo')" class="mt-2" />
                </div>
            </div>
        </div>

        <div>
            <x-input-label for="name" value="Nombre" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" value="Correo electronico" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 p-4 bg-orange-100 border-l-4 border-orange-500 text-amber-950 text-sm font-semibold rounded-r-xl shadow-md flex items-center">
                    <svg class="w-5 h-5 mr-3 text-orange-600 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                        Tu dirección de correo no está verificada.
                        <button form="send-verification" class="underline font-bold hover:text-amber-800 transition ml-1 cursor-pointer">
                            Hacé clic acá para reenviar el correo de verificación.
                        </button>
                    </div>
                </div>

                @if (session('status') === 'verification-link-sent')
                    <div class="mt-3 p-4 bg-green-100 border-l-4 border-green-500 text-green-800 text-sm font-semibold rounded-r-xl shadow-md flex items-center">
                        <svg class="w-5 h-5 mr-3 text-green-600 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Se ha enviado un nuevo enlace de verificación a tu correo electrónico.
                    </div>
                @endif
            @endif
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-amber-100">
            <x-primary-button>Guardar</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="inline-flex items-center gap-1 text-sm font-semibold text-green-600"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Guardado.
                </p>
            @endif
        </div>
    </form>
</section>
