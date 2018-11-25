<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Blog extends Model
{
    //
    protected $table = 'blogs';
    
    protected $fillable = ['description','user_id','course_id','batch_id','delete_flag'];
    
    
    public function user()
	{
		 return $this->belongsTo(User::class);
	}
}
