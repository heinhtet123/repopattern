<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use App\Models\Role;
use App\Models\RolePermission;

class RolesPermissionController extends Controller
{
    
    public function index()
    {
    	return view("backend.roles.index");
    }

    public function indexdata(Request $request)
    {
    	if($request->ajax())
    	{
		 	$config=array_keys(Config::get("rolespermission"));
    		
    		return response()->json($config);
            exit();
    	}

    }

    public function getRoles(Request $request)
    {	
    	if($request->ajax())
    	{
    		$roles=Role::select("name","id")->get();
    		return response()->json($roles);
            exit();
    	}
    }

    public function getMethodsPermission(Request $request)
    {
    	if($request->ajax())
    	{
  			$controller=$request->input("controller");
    		$rolespermission=RolePermission::where("controller",$controller)->get();
    		return response()->json($rolespermission);
    		exit();
    	}

    }
    
    public function changeMethodPermission(Request $request,$id){
    	if($request->ajax())
    	{
    		$data=["status"=>!(boolean) $request->input("status")];

    		$status=RolePermission::where("id",$id)->update($data);

    		return response()->json(['success'=>$status]);
    	}
    }

    public function getMethods(Request $request)
    {
    	if($request->ajax())
    	{	

    		$controller=$request->input("controller");
    		
		 	$config=Config::get("rolespermission");

		 	$methods=$config[$controller];
		 	$length_methods=count($methods);
		 	

		 	$roles=Role::select("name","id")->get();

		 	foreach ($roles as $role) {

		 		for($i=0;$i<$length_methods;$i++){

		 			$data=["role_id"=>$role->id,"controller"=>$controller,"method"=>$methods[$i]];


		 			RolePermission::firstOrCreate($data);
		 		}
		 	}


    		return response()->json($methods);
            exit();
    	}
    }




}
