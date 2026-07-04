<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center bg-gradient-to-r from-amber-800 to-amber-950 p-6 rounded-xl shadow-lg gap-4">
            <div>
                <h2 class="font-serif text-2xl text-amber-50 leading-tight tracking-wide">
                    {{ __('Mi Perfil') }}
                </h2>
                <p class="text-amber-200/70 text-xs mt-1">Administra tu informacion personal y seguridad.</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-amber-50/40 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white overflow-hidden rounded-2xl border border-amber-100 shadow-md">
                <div class="p-6 sm:p-8">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="bg-white overflow-hidden rounded-2xl border border-amber-100 shadow-md">
                <div class="p-6 sm:p-8">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="bg-white overflow-hidden rounded-2xl border border-red-100 shadow-md">
                <div class="p-6 sm:p-8">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
