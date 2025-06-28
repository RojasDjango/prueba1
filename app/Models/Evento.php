<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Departamento;
use App\Models\Provincia;
use App\Models\Actividad;

class Evento extends Model
{
    use HasFactory;
    
    protected $guarded =[

    ];
    protected $fillable =[
        'name',
        
        'departamento_id',
        'provincia_id',
        'fecha',
        'detalle',
        'codigo_evento',
        
        
    ];
     // relacion de mucho a uno /  de departamento uno a evento muchos
    public function departamento(){
        return $this->belongsTo(Departamento::class);
    }
     // relacion de muchos a uno /  de provincias uno a evento muchos
     public function provincia(){
        return $this->belongsTo(Provincia::class);
    }
     // relacion de uno a muchos /  de evento uno a actividad muchos
     public function actividads(){
        return $this->hasMany(Actividad::class);
    }
}
