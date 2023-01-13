<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Salary;
use Livewire\Component;

class FiltrarVacantes extends Component
{
    public $termino;
    public $categoria;
    public $salario;

    public function leerDatosFormulario()
    {
        $this->emit('terminosBusqueda',$this->termino,$this->categoria,$this->salario);
    }

    public function render()
    {   
        $salarios = Salary::all();
        $categorias = Category::all();
        return view('livewire.filtrar-vacantes',[
            'salarios' => $salarios,
            'categorias' => $categorias,
        ]);
    }
}
