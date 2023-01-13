<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Mis Vacantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if (session()->has('mensaje'))
                <div class="p-2 my-3 text-sm font-extrabold text-green-600 uppercase bg-green-100 border border-green-600">
                    {{session('mensaje')}}
                </div>
            @endif
            <livewire:mostrar-vacantes />
        </div>
    </div>
</x-app-layout>