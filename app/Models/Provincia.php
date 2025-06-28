<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Departamento;

class Provincia extends Model
{
    use HasFactory;
    
    protected $guarded =[

    ];
     // relacion de uno a muchos /  de provincias uno a usuarios muchos
    public function Users(){
        return $this->hasMany(User::class);
    }

    // relacion de muchos a uno / provincias muchos a departamento uno
    public function departamento(){
        return $this->belongsTo(Departamento::class);
    }


}