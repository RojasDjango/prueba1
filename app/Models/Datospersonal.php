<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Listarole;
use App\Models\Ejecutora;
use App\Models\Sector;
use App\Models\Provincia;
use App\Models\Departamento;
use App\Models\Actividad;
use App\Models\Distrito;

class Datospersonal extends Model
{
    
    use HasFactory;
    protected $guarded =[
        // 'user_id'=>'required',
        // 'distrito'=>'required',
        // 'namedireccion'=>'required',
        // 'listarole_id'=>'required',
        // 'departamento_id'=>'required',
        // 'ejecutora_id'=>'required',
        // 'provincia_id'=>'required',
        // 'sector_id'=>'required'
    ];
    protected $fillable =[
        'user_id',
        
        'departamento_id',
        'provincia_id',
        'distrito_id',
        'namedireccion',
        'facebook',
        'tiktok',
        'youtube',
        'x',
        'kick',
        'sector_id',
        'ejecutora_id',
        
    ];
    //relacion uno a uno / usuar uno a datospersonales uno
    public function user() {
        return $this->belongsTo(User::class);
    }
     // relacion de muchos a uno / user muchos a listarole uno
     public function listarole(){
        return $this->belongsTo(Listarole::class);
    }
    // relacion de muchos a uno / user muchos a ejecutora uno
    public function ejecutora(){
        return $this->belongsTo(Ejecutora::class);
    }
    // relacion de muchos a uno / user muchos a sector uno
    public function sector(){
        return $this->belongsTo(Sector::class);
    }
    // relacion de muchos a uno / user muchos a distrito uno
    public function distrito(){
        return $this->belongsTo(Distrito::class);
    }
    // relacion de muchos a uno / user muchos a provincia uno
    public function provincia(){
        return $this->belongsTo(Provincia::class);
    }
    // relacion de muchos a uno / user muchos a departamento uno
    public function departamento(){
        return $this->belongsTo(Departamento::class);
    }
    // relacion de uno a muchos /  de user uno a actividad muchos
    public function actividads(){
        return $this->hasMany(Actividad::class,'datospersonal_id');
    }
}
