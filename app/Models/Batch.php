<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use Carbon\Carbon;
use App\User;
class Batch extends Model
{
    

    protected $table = 'batches';
    protected $fillable=["batch_name","course_id","delete_flag","total_months","fees","enrollment_flag",'type','period',"start_month","end_month"];

    public function course()
	{
		return $this->belongsTo(Course::class);
	}
		
	

	public function users(){
		return $this->belongsToMany(User::class,'batch_enrolledstudents','batch_id','enrolledstudents_id')->withPivot("student_bill","numbers_of_payment","status");
	}
	
	public function getStartMonthAttribute($value)
	{
      return Carbon::parse($value)->format('d/m/Y');
	}

	public function getEndMonthAttribute($value)
	{
		return Carbon::parse($value)->format('d/m/Y');
	}

}