<?php

namespace App\Livewire\Admin\Roles\Provincial;

use App\Models\Ejecutora;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class RolprovincialIndex extends Component
{
    use WithPagination;

    //
    public $searchroles;
    protected $paginationTheme="bootstrap";

    
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $users = User::whereHas('ejecutora', function($query) {
            $query->whereNotIn('nivel', ['Desarrollador', 'Nacional','Regional']); // Excluye ambos niveles
        })->where(function($query) {
            $query->where('DNI', 'like', '%'.$this->searchroles.'%')
                ->orWhere('apellido_paterno', 'like', '%'.$this->searchroles.'%');
        })->paginate();
        
        return view('livewire.admin.roles.provincial.rolprovincial-index',compact('users'));
    }
}
