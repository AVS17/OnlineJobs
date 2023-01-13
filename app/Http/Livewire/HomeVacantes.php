<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class HomeVacantes extends Component
{
    public $termino;
    public $categoria;
    public $salario;

    //eventos a la escucha 
    protected $listeners = ['terminosBusqueda' => 'buscar'];

    public function buscar($termino, $categoria, $salario)
    {
        $this->termino = $termino;
        $this->categoria = $categoria;
        $this->salario = $salario;
    }

    public function render()
    {
        //Consulta a DB
        //$vacantes = Vacante::all();
        //Consulta avanzada de varios terminos 
        $vacantes = Vacante::when($this->termino,function($query){
            $query->where('title','LIKE',"%" .$this->termino ."%");
        })
        ->when($this->termino,function($query){
            $query->orWhere('enterprise','LIKE',"%" .$this->termino ."%");
        })
        ->when($this->categoria,function($query){
            $query->where('category_id',$this->categoria);
        })
        ->when($this->salario,function($query){
            $query->where('salary_id',$this->salario);
        })
        ->paginate(20);

        return view('livewire.home-vacantes',[
            'vacantes' => $vacantes,
        ]);
    }
}
