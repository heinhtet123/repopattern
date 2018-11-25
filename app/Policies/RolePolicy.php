<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */

    public function __construct()
    {
        //
    }

    public function role_policy()
    {
        //ADMIN CAN ONLY ACCESS THIS CONTROLLER 
        $user=(int)Auth::user()->role['id'];
        if($user==1)
        {
            return true;
        }
        
        return false;
        
    }

    

}
