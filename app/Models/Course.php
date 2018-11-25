<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Batch;
class Course extends Model
{
     protected $table = 'courses';
     protected $fillable = ['name'];

     public function batches()
     {
     	return $this->hasMany(Batch::class,'course_id'); 
     }
}
