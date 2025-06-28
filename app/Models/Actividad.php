<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Evento;

class Actividad extends Model
{
    use HasFactory;
    protected $guarded =[

    ];

    protected $casts = [
        'facebook' => 'string',
        'youtube' => 'string',
        'tiktok' => 'string',
        'x' => 'string',
        'kick' => 'string',
        'evento_1' => 'string',
        'evento_2' => 'string',
        'evento_3' => 'string',
        'evento_4' => 'string',
        'evento_5' => 'string',
    ];
    // relacion de muchos a uno / actividads muchos a user datospersonales
    public function datospersonal(){
        return $this->belongsTo(Datospersonal::class,'datospersonal_id');
    }
    // relacion de muchos a uno / actividads muchos a evento uno
    // public function evento(){
    //     return $this->belongsTo(Evento::class);
    // }

    // Relación directa con User
    public function user()
    {
        return $this->belongsTo(User::class, 'datospersonal_id', 'id');
        // O si tienes un campo user_id directo en actividades:
        // return $this->belongsTo(User::class);
    }
}
