<?php

namespace App\Http\Livewire;

use App\Models\Salary;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class EditarVacante extends Component
{
    //id es un palabra reservada de livewire
    public $vacante_id;
    public $title;
    public $salary;
    public $category;
    public $enterprise;
    public $last_day;
    public $description;
    public $image;
    public $image_new;

    //importar clase de subida de archivos
    use WithFileUploads;

    protected $rules = [
        'title' => 'required|string',
        'salary' => 'required',
        'category' => 'required',
        'enterprise' => 'required',
        'last_day' => 'required',
        'description' => 'required',
        'image_new' => 'nullable|image|max:1024',
    ];

    public function mount(Vacante $vacante){
        $this->vacante_id = $vacante->id; 
        $this->title = $vacante->title;
        $this->salary = $vacante->salary_id;
        $this->category = $vacante->category_id;
        $this->enterprise = $vacante->enterprise;
        $this->last_day = Carbon::parse($vacante->last_day)->format('Y-m-d');
        $this->description = $vacante->description;
        $this->image = $vacante->image;
    }

    public function editarVacante()
    {
        //Validar campos
        $datos = $this->validate();
        //Encontrar la vacante a editar (objeto ORM)
        $vacante = Vacante::find($this->vacante_id);
        //Hay una imagen nueva ??
        if($this->image_new){
            //Se guarda la imagen y se obtiene la ruta
            $image = $this->image_new->store('public/vacantes');
            //Cortamos la ruta de la imagen para almacenar unicamente el nombre de la imagen
            // en el arreglo de datos
            $datos['image'] = str_replace('public/vacantes/','',$image);
            //Eliminamos imagen vieja
            Storage::delete('public/vacantes/'.$vacante->image);
        }
        //Asignar los valores 
        $vacante->title = $datos['title'];
        $vacante->salary_id = $datos['salary'];
        $vacante->category_id = $datos['category'];
        $vacante->enterprise = $datos['enterprise'];
        $vacante->last_day = $datos['last_day'];
        $vacante->description = $datos['description'];
        // Condicional ternario
        $vacante->image = $datos['image'] ?? $vacante->image;
        //Guardar la vacante 
        $vacante->save();
        //redireccionar
        //mensaje
        session()->flash('mensaje','La vacante se actualizó correctamente');
        return redirect()->route('vacantes.index');

    }

    public function render()
    {
        //Consulta base de datos
        $salarios = Salary::all();
        $categorias = Category::all();
        return view('livewire.editar-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
