<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Sector extends Model
{
    use HasFactory;
    
    protected $guarded =[

    ];
     // relacion de uno a muchos /  de sector uno a usuarios muchos
    public function Users(){
        return $this->hasMany(User::class);
    }
    public function datospersonals(){
        return $this->hasMany(Datospersonal::class);
    }
}
