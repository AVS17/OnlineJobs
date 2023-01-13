<form action="" class="space-y-5 md:w-1/2" wire:submit.prevent='crearVacante'>
    <!-- titulo -->
    <div>
        <x-input-label for="title" :value="__('Titulo de Vacante')" />
        <x-text-input wire:model="title" id="title" class="block w-full mt-1" type="text" :value="old('title')"
            placeholder="Titulo de Vacante" />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>

    <!-- Salario -->
    <div>
        <x-input-label for="salary" :value="__('Salario Mensual')" />
        <select wire:model="salary" id="salary"
            class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            <option value="">-- Seleccione --</option>
            @foreach ($salarios as $salario)
            <option value="{{$salario->id}}">{{$salario->salary}}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('salary')" class="mt-2" />
    </div>

    <!-- Ctaegoria -->
    <div>
        <x-input-label for="category" :value="__('Categoría')" />
        <select wire:model="category" id="category"
            class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            <option value="">-- Seleccione --</option>
            @foreach ($categorias as $categoria)
            <option value="{{$categoria->id}}">{{$categoria->category}}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('category')" class="mt-2" />
    </div>

    <!-- empresa -->
    <div>
        <x-input-label for="enterprise" :value="__('Empresa')" />
        <x-text-input wire:model="enterprise" id="enterprise" class="block w-full mt-1" type="text"
            :value="old('enterprise')" placeholder="Empresa: ej. Netflix, Uber, Shopify." />
        <x-input-error :messages="$errors->get('enterprise')" class="mt-2" />
    </div>

    <!-- ultimo dia para postularse -->
    <div>
        <x-input-label for="last_day" :value="__('Ultimo día para postularse')" />
        <x-text-input wire:model="last_day" id="last_day" class="block w-full mt-1" type="date"
            :value="old('last_day')" />
        <x-input-error :messages="$errors->get('last_day')" class="mt-2" />
    </div>

    <!-- Descripción del puesto -->
    <div>
        <x-input-label for="description" :value="__('Descripción del puesto')" />
        <textarea wire:model="description" id="description" placeholder="Descripción general del puesto, experiencia."
            class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 h-72"></textarea>
        <x-input-error :messages="$errors->get('last_day')" class="mt-2" />
    </div>

    <!-- Imagen -->
    <div>
        <x-input-label for="image" :value="__('Imagen')" />
        <x-text-input wire:model="image" id="image" class="block w-full mt-1" type="file" accept="image/*" />
        <div class="my-5 w-60">
            @if ($image)
            Imagen:
            <img src="{{$image->temporaryUrl()}}">
            @endif
        </div>
        <x-input-error :messages="$errors->get('image')" class="mt-2" />
    </div>

    <x-primary-button>
        {{ __('Crear Vacante') }}
    </x-primary-button>

</form>