<?php 
namespace App\Helpers;
 use Illuminate\Support\Facades\Route;

class MyFunc extends Func {
	
    public static function full_name($first_name,$last_name) {
        return $first_name . ', '. $last_name;   
    }

    public static function shownodata($data,$colspan)
    {
    	$currentPath= Route::getFacadeRoot()->current()->uri();
    	$arr_path=explode("/", $currentPath);
    	
    	$controller_name=str_plural($arr_path[1]);
    	
    	if($data->isEmpty()):
    		echo "<tr>
    				<td colspan='".$colspan."'>
    				<div class='callout callout-warning'><p>There is no Data in ".ucfirst($controller_name)."</p></div>
    				</td>
    			</tr>";
    	endif;
    }
}