<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class MostrarVacantes extends Component
{
    //Funciones que estan a la escucha de algun evento, ya sea en la vista o template
    protected $listeners = [
        'eliminarVacante'
    ];

    // public function prueba($vacante_id)
    // {
    //     dd($vacante_id);
    // }
    
    public function eliminarVacante(Vacante $vacante)
    {   
        //Eliminamos imagen
        if( $vacante->image) {
            Storage::delete('public/vacantes/' . $vacante->image);
        }
        //se elimina vacante 
        $vacante->delete();
    }

    public function render()
    {
        $vacantes = Vacante::where('user_id',auth()->user()->id)->paginate(8);
        return view('livewire.mostrar-vacantes',[
            'vacantes' => $vacantes,
        ]);
    }
}
