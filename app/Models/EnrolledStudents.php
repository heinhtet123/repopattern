<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Batch;
use App\Models\BatchEnrolledStudents;
class EnrolledStudents extends Model
{
    //
     protected $table = 'enrolled_students';
     protected $fillable = ['name','email','phone','address'];
     
     public function batch_enrolledstudents()
     {	
     	return $this->hasMany(BatchEnrolledStudents::class,"enrolledstudents_id");
     }


     public function batches(){
      return $this->belongsToMany(Batch::class,'batch_enrolledstudents','enrolledstudents_id','batch_id')->withPivot("status","student_bill","numbers_of_payment");

     	// return $this->belongsTo(Batch::class);
     }
}
