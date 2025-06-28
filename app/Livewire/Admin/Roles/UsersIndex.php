<?php

namespace App\Livewire\Admin\Roles;

use App\Models\Ejecutora;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component
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
        

        $users = User::whereHas('ejecutora')  // Solo usuarios que tienen registro en ejecutoras
        ->where(function($query) {
            $query->where('DNI', 'like', '%' . $this->searchroles . '%')
                ->orWhere('apellido_paterno', 'like', '%' . $this->searchroles . '%');
        })
        ->paginate();

        return view('livewire.admin.roles.users-index',compact('users'));
    }
}
