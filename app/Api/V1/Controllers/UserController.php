<?php
/**
* 
*/
namespace App\Api\V1\Controllers;

use App\Http\Controllers\Controller;
use App\User; 
use Dingo\Api\Routing\Helpers;
use App\Api\V1\Transformer\UserTransformer;
use Illuminate\Http\Request;


/**
 * @Resource("Users", uri="/users")
 */

class UserController extends Controller
{
	use Helpers;
	
	

	// public function index()
	// {
	// 	$user=User::all();
	// 	return $this->response->collection($user, new UserTransformer);
	// }


	/**
	* Show all users
 	*
 	* Get a JSON representation of all the registered users.
 	*
 	* @Get("users")
 	*/
 	
	public function index()
	{
		$users=User::paginate(2);

		if($users->isEmpty()):
			throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException("No Data is there");	
		endif;

		return $this->response->paginator($users, new UserTransformer);
	}
	
	
	public function show($id)
	{
		 $user=User::find($id);

		 if(is_null($user)):
		 	return $this->response->error('User Not Found', 404);	 
			// throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException("User Not Found");	
		 endif;

		 return $this->response->item($user, new UserTransformer);
	}

	public function search(Request $request)
	{
		$name=$request->input("name");

		if(!is_null($name) || !empty($name)){
			
			$user=User::where("name","LIKE",'%'.$name.'%')->orderBy("name");
		}

		
		return $this->response->item($user->get(), new UserTransformer);

	}

	public function delete()
	{
		
	}

}