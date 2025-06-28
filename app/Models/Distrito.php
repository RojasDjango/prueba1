<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Provincia;
use App\Models\User;

class Distrito extends Model
{
    use HasFactory;
    protected $guarded =[

    ];
     // relacion de uno a muchos /  de distrito uno a usuarios muchos
    public function Users(){
        return $this->hasMany(User::class);
    }

    // relacion de muchos a uno / distrito muchos a provincia uno
    public function departamento(){
        return $this->belongsTo(Provincia::class);
    }
}
