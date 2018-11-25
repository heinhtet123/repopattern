<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Gallery;
use App\User;
class Groups extends Model
{
    //
	 protected $table = 'groups';
     protected $fillable = ['group_name','batch_id','status'];
     
     public function galleries()
     {
     	return $this->hasMany(Gallery::class, 'group_id');
     }

     public function users()
     {
     	return $this->belongsToMany(User::class,'user_group','group_id','user_id')->withPivot("status");

     	 // return $this->belongsToMany(Batch::class,'batch_enrolledstudents','enrolledstudents_id','batch_id')->withPivot("status","student_bill","numbers_of_payment");
     }
}
