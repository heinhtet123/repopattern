<?php 
/**
* @author hein-htet
*/

namespace App\Repositories;


use App\Repositories\EloquentModelsAccess\BaseSqlRepository as BaseRepo;
use Illuminate\Container\Container as App;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;


// business logic
class BlogRepository extends BaseRepo
{	
	
	
	// to define  what model because of abstract method in basesqlrepository
	
	public function model()
	{
		return "App\Models\Blog";
	}

	public function getAll(Request $request,$columns=array("*"))
	{
		
		$id=0;
		$this->applyCriteria();
		$collection = $this->all("user");
		
		if(!$collection->isEmpty()):
			$first_id=$collection[0]->id+1;
		else:
			$first_id=0;
			$last_id=0;
		endif;

		
		foreach ($collection as $key => $value) {
			# code...
			$last_id=$value->id;
		}

		$request->session()->put('condition',(int)$last_id);
		$request->session()->put('newpost_condition',(int)$first_id);
		

		return $collection;
	}


	public function getScroll(Request $request,$columns=array("*"))
	{
	
		$this->applyCriteria();
		$collection = $this->all("user",(int)$request->session()->get('condition'));

		foreach ($collection as $key => $value) {
			# code...
			$id=$value->id;
		}
		

		if(isset($id))
		{
			$request->session()->put('condition',(int)$id);
		}

		return $collection;


		// //dd($collection);
		// foreach($collection as $each)
		// {
		// 	dd($each->id);
		// }
		//dd(property_exists($this, "all"));
		
		//return $this->model->all();		
	}

	public function updateNewPost(Request $request,$columns=array("*"))
	{
		$this->applyCriteria();
		$collection=$this->all("user",(int)$request->session()->get('newpost_condition'),">");
		if(!empty($collection))
		{
			$post_id=$request->session()->get('newpost_condition')+1;
			$request->session()->put('newpost_condition',$post_id);
			return $collection;
		}
	}

	public function getNewPost(Request $request,$columns=array("*"))
	{
		$this->applyCriteria();
		$collection=$this->all("user",(int)$request->session()->get('newpost_condition'),">");

		// if(count($collection)!==0)
		// {
		// 	$request->session()->put('newpost_condition',(int)$collection[0]->id); 
		// }

		return $collection;
	}


	public function find()
	{

	}

	public function create(array $data)
	{

		Blog::create($data);
	}

}