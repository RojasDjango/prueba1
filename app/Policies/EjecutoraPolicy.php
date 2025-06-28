<?php

namespace App\Policies;

use App\Models\Ejecutora;
use App\Models\User;

class EjecutoraPolicy
{
    /**
     * Create a new policy instance.
     */
    public function author(User $user, Ejecutora $ejecutora){
        if($user->id == $ejecutora->user_id){
            return true;
        }else{
            return false;
        }
    }

    public function __construct()
    {
        //
        
    }
}
