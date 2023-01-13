<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    //Habilitar subida de archivos
    use WithFileUploads;
    public $cv;
    public $vacante;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];
    
    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }

    public function postularme()
    {
        //Validar
        $datos = $this->validate();
        //Almacenar cv
        $cv = $this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/','',$cv);
        //Crear el candidato a la vacante
        //gracias a la relacion no se especifica cual es la vacante
        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv'],
        ]);
        //
        //Crear notificación y enviar email
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id,$this->vacante->title,auth()->user()->id));
        //Mostrando al usuario mensaje de Ok
        session()->flash('mensaje','Se envio correctamente tu información, mucha suerte!');
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
