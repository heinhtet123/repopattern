<?php 

namespace App\ProviderInjection;
use Illuminate\Support\Facades\Config;
use App\Models\RolePermission;
/**
* 
*/
class Permission
{
	public $app;
	
	function __construct($app)
	{
		$this->app=$app;
	}

	 public function user()
    {
       return $this->app->auth->user();
       
    }

    public function isAdmin()
    {
        $rolename=$this->app->auth->user()->role->name;
        if($rolename=="admin")
        {
            return true;
        }
        return false;
    }


    public function isUser()
    {
        $rolename=$this->app->auth->user()->role->name;
        if($rolename=="student" || $rolename=="user")
        {
            return true;
        }
        return false;
    }


    public function RoleHaspermission()
    {
    	if($user=$this->user())
    	{
    		$config_permission=Config::get("rolespermission");
    		$url=\Request::route()->getName();

    		//dd(\Route::getCurrentRoute()->getActionName());
		

			if(strpos($url,".")!=false)
			{
				$arr=explode(".", $url);
				$currenturl["controller"]=$arr[count($arr)-2];
				$currenturl["method"]=$arr[count($arr)-1];
				
				$rolename=$this->user()->role->name;

				
				// dd($config_permission);
				
				return $this->user()->RoleHaspermission($currenturl,$config_permission);

			}else
			{

			}



    		
    		
    	}

    	 
    	
       
    }
    
    public function hasRole($requireAll=false)
    {

    	if($user=$this->user())
    	{
    	  return $user->hasRole($requireAll);
    	}

    	return false;
    }
    
}