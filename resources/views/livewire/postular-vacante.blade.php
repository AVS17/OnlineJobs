<div class="flex flex-col items-center justify-center p-5 mt-10 bg-gray-100">
    <h3 class="my-4 text-2xl font-bold text-center">
        Postularme a esta vacante
    </h3>
    @if (session()->has('mensaje'))
    <div class="text-green-600 text-sm uppercase bg-green-100 border border-green-600 font.bold p-2 my-5">
        {{session('mensaje')}}
    </div>
    @else
    <form wire:submit.prevent="postularme" class="mt-5 w-96">
        <div class="mb-4">
            <x-input-label for="cv" :value="__('Curriculum o Hoja de Vida (PDF)')" />
            <x-text-input wire:model="cv" id="cv" class="block w-full mt-1" type="file" accept=".pdf" />
        </div>
        <x-input-error :messages="$errors->get('cv')" class="mt-2" />
        <x-primary-button class="my-5">
            {{ __('Postularme') }}
        </x-primary-button>
    </form>
    @endif
</div>