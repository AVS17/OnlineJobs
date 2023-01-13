<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;
    //Para que se le pueda dar formato a los campos de fecha
    protected $dates = ['last_day'];

    protected $fillable = [
        'title',
        'salary_id',
        'category_id',
        'enterprise',
        'last_day',
        'description',
        'image',
        'user_id'
    ];

    //Relaciones para poder mostrar campos foraneos 
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function salary()
    {
        return $this->belongsTo(Salary::class);
    }

    public function candidatos()
    {
        return $this->hasMany(Candidato::class)->orderBy('created_at','DESC');
    }

    public function reclutador()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
