<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Salary;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{
    //atributos
    public $title;
    public $salary;
    public $category;
    public $enterprise;
    public $last_day;
    public $description;
    public $image;

    use WithFileUploads;

    protected $rules = [
        'title' => 'required|string',
        'salary' => 'required',
        'category' => 'required',
        'enterprise' => 'required',
        'last_day' => 'required',
        'description' => 'required',
        'image' => 'required|image|max:1024'
    ];
    
    public function crearVacante()
    {
        //Validar
        $datos = $this->validate();
        //Almacenar la imagen
        $image = $this->image->store('public/vacantes');
        $datos['image'] = str_replace('public/vacantes/','',$image);
        //dd($nameImge);
        //Crear la vacante
        //Como no se tiene acceso al requets se utiliza en arreglo de forma asociativa 
        Vacante::create([
            'title' => $datos['title'],
            'salary_id' => $datos['salary'],
            'category_id' => $datos['category'],
            'enterprise' => $datos['enterprise'],
            'last_day' => $datos['last_day'],
            'description' => $datos['description'],
            'image' => $datos['image'],
            'user_id' => auth()->user()->id,
        ]);
        // Crear mensaje
        session()->flash('mensaje','La vacante se publicó correctamente');
        //Redireccionar al usuario
        return redirect()->route('vacantes.index');
    }

    public function render()
    {
        //Consulta base de datos
        $salarios = Salary::all();
        $categorias = Category::all();
        return view('livewire.crear-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias,
        ]);
    }
}
