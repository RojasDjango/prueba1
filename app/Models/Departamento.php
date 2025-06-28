<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Evento;
use App\Models\User;

class Departamento extends Model
{
    use HasFactory;
    
    protected $guarded =[

    ];
    


     // relacion de uno a muchos /  de departamento uno a usuarios muchos
    public function Users(){
        return $this->hasMany(User::class);
    }
    // relacion de uno a muchos /  de departamento uno a eventos muchos
    public function Eventos(){
        return $this->hasMany(Evento::class);
    }
    // relacion de uno a muchos /  de departamento uno a provincias muchos
    public function provincias(){
        return $this->hasMany(Provincia::class);
    }
}
