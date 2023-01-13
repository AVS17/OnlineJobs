<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Crear Vacante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="my-6 text-xl font-extrabold text-center">
                        Publicar Vacante
                    </h1>
                    <div class="p-5 md:justify-center md:flex">
                        <livewire:crear-vacante />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>