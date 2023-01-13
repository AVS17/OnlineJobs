<div class="p-10">
    <div class="mb-5">
        <h3 class="my-3 text-3xl font-bold text-gray-800">
            {{$vacante->title}}
        </h3>
    </div>
    <div class="p-4 my-10 md:grid md:grid-cols-2 bg-gray-50">
        <p class="my-3 text-sm font-bold text-gray-800 uppercase">Empresa:
            <span class="font-normal normal-case">{{$vacante->enterprise}}</span>
        </p>
        <p class="my-3 text-sm font-bold text-gray-800 uppercase">Último día para postularse:
            <span class="font-normal normal-case">{{$vacante->last_day->toFormattedDateString()}}</span>
        </p>
        <p class="my-3 text-sm font-bold text-gray-800 uppercase">Categoría:
            <span class="font-normal normal-case">{{$vacante->category->category}}</span>
        </p>
        <p class="my-3 text-sm font-bold text-gray-800 uppercase">Salario:
            <span class="font-normal normal-case">{{$vacante->salary->salary}}</span>
        </p>
    </div>
    <div class="gap-5 md:grid md:grid-cols-6">
        <div class="md:col-span-2">
            <img src="{{asset('storage/vacantes/'.$vacante->image)}}" alt="{{'Imagen vacante '.$vacante->title}}">
        </div>
        <div class="my-10 md:col-span-4 md:my-0">
            <h2 class="mb-5 text-2xl font-bold">Descripción del puesto</h2>
            <p>{{$vacante->description}}</p>
        </div>
    </div>
    @guest
        <div class="p-5 mt-5 text-center border border-dashed bg-gary-50">
            <p>
                ¿Deseas aplicar a esta vacante? <a href="{{route('register')}}" class="font-bold text-indigo-600">Obten una cuenta y aplica a esta y otras vacantes</a>
            </p>
        </div>
    @endguest
    @cannot('create', App\Models\Vacante::class)
        <livewire:postular-vacante :vacante="$vacante"/>
    @endcannot
</div>
