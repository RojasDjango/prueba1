<?php

namespace App\Livewire\Admin\Roles\Nacional;

use App\Models\Ejecutora;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class RolnacionalIndex extends Component
{
    use WithPagination;

    public $searchroles;
    protected $paginationTheme="bootstrap";

    
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        //se le quita el desarrollador
        $users = User::whereHas('ejecutora',function($query){//filtra solo los usuarios que tiene un registro en la tabla
            $query->where('nivel','!=','Desarrollador');//excluye ejecutoras con nivel desarrollador
        })->where(function($query){
            $query->where('DNI','like','%'.$this->searchroles.'%')
            ->orwhere('apellido_paterno','like','%'.$this->searchroles.'%');
        })->paginate();

        return view('livewire.admin.roles.nacional.rolnacional-index',compact('users'));
    }
}
