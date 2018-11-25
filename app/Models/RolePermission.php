<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

class RolePermission extends Model
{
    //
    protected $table="role_permissions";
	protected $fillable=["role_id","controller","method","status"];
	

    // public function role(){
    // 	return $this->belongsTo(Role::class,"role_id");
    // }
}
