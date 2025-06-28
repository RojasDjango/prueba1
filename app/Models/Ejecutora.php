<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Ejecutora extends Model
{
    use HasFactory;

    
    
    // protected $guarded =[

    // ];
    protected $fillable = [
        'DNI',
        'name',
        'user_id',
        'nivel',
        'created_by',
        
    ];

    protected static function boot()
    {
        parent::boot();
    
        static::creating(function ($model) {
            if (Auth::check()) {
                $model->created_by = Auth::id();
            }
        });
    }
    
    //relacion uno a uno / usuar uno a datospersonales uno
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Relación con el usuario creador
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    
  
}
