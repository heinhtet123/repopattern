<?php

namespace App\Policies;
use App\User;
use App\Models\Blog;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;

class BlogPolicy
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


    public function create()
    {
        $user=Auth::user();
        $user=(int)User::find($user->id)->role['id'];
     
        if($user==1)
        {
            return true;

        }else if($user==2)
        {
            return true;
        }
             
    }


    public function destroy()
    {
        return false;
      //  return $user->id===$blog->student_id;
    }
}
