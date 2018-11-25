<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;
use App\User;

class CoursePolicy
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

    public function courseauthorize()
    {

        $user=Auth::user()->role['name'];
        if($user=="admin"):
            return true;
        endif;
        
       
        
    }
}
