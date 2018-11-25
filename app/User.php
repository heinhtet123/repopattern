<?php

namespace App;


use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Models\Role;
use App\Models\Blog;
use App\Models\Batch;
use App\ProviderInjection\Traits\PermissionUserTrait;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword,PermissionUserTrait;

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email','delete_flag',"role_id"];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['remember_token'];
    

    // eager loaded automatically
   // protected $with=["role"];


    public function role()
    {
        return $this->belongsTo(Role::class,"role_id");
    }

    public function blog()
    {
        return $this->hasMany(Blog::class,"user_id");
    }

    public function batches(){
        return $this->belongsToMany(Batch::class,'batch_enrolledstudents','enrolledstudents_id','batch_id')->withPivot("student_bill","numbers_of_payment","status");
    }

}
