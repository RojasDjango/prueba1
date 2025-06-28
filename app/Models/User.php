<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Datospersonal;
use App\Models\Listarole;
use App\Models\Ejecutora;
use App\Models\Sector;
use App\Models\Provincia;
use App\Models\Departamento;
use App\Models\Actividad;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'DNI',
        'apellido_paterno',
        'apellido_materno',
    //     'namedireccion',
    //     'dondelaboras',
        'email',
        'celular',
    //     'distrito',
        'password',
    ];
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function datospersonals(){
        return $this->hasOne(Datospersonal::class);
    }
    //para los roles si tiene un nivel que muestre y sino que no muestra los permisos 
    public function ejecutora(){
        return $this->hasOne(Ejecutora::class);// relacion uno a uno
    }
    public function nivelejecutora(){
        return $this->ejecutora()->exists();//verifica si existe un registro relacionado
    }

}
