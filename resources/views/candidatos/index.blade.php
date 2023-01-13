<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Candidatos Vacante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="my-6 text-xl font-extrabold text-center">
                        Candidatos Vacante {{$vacante->title}}
                    </h1>
                    <div class="p-5 md:justify-center md:flex">
                        <ul class="w-full divide-y divide-gray-200">
                            @forelse ($vacante->candidatos as $candidato)
                                <li class="flex items-center p-3">
                                    <div class="flex-1 ">
                                        <p class="text-xl font-medium text-gray-800">
                                            {{$candidato->user->name}}
                                        </p>
                                        <p class="text-sm text-gray-600">
                                            {{$candidato->user->email}}
                                        </p>
                                        <p class="text-sm font-medium text-gray-600">Día que se postulo:
                                            <span class="font-normal">{{$candidato->created_at->diffForHumans()}}</span>
                                        </p>
                                    </div>
                                    <div>
                                        <a href="{{asset('storage/cv/'.$candidato->cv   )}}" 
                                            target="_blank"
                                            rel="noreferrer noopener"
                                            class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                            Ver CV
                                        </a>
                                    </div>
                                </li>
                            @empty
                                <p class="p-3 text-sm text-center text-gray-600">No hay candidatos aún</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>