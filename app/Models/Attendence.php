<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\User;
class Attendence extends Model
{
    //
    protected $table = 'attendences';
    protected $fillable=["user_id","batch_id","status","attendence_date"];

    public function getAttendenceDateAttribute($value)
	{
      return Carbon::parse($value)->format('d/m/y');
	}

	public function user()
	{
		  return $this->belongsTo(User::class);
	}
}
