<?php

namespace App\Livewire\Admin\Roles\Regional;

use App\Models\Ejecutora;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class RolregionalIndex extends Component
{
    //
    public $searchroles;
    protected $paginationTheme="bootstrap";

    
    public function updatingSearch(){
        $this->resetPage();
    }
    

    public function render()
    {
        $users = User::whereHas('ejecutora', function($query) {
            $query->where('nivel', '!=', 'Desarrollador')
                  ->where('nivel', '!=', 'Nacional'); // Excluye también ejecutoras con nivel Nacional
        })->where(function($query) {
            $query->where('DNI', 'like', '%'.$this->searchroles.'%')
                  ->orWhere('apellido_paterno', 'like', '%'.$this->searchroles.'%');
        })->paginate();
    
    
        
        return view('livewire.admin.roles.regional.rolregional-index',compact('users'));
    }
}
