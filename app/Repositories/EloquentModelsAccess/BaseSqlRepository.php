<?php 
/**
* @author hein-htet
*/

namespace App\Repositories\EloquentModelsAccess;

//Interfaces 
use App\Repositories\Contracts\CriteriaInterface;
use App\Repositories\Contracts\RepositoryInterface;

use App\Repositories\Criteria\Criteria;

// application import
use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

// access logic
abstract class BaseSqlRepository implements RepositoryInterface, CriteriaInterface
{

	// var for IOCcontainer
	private $app;

	// var for Eloquent Model and  
	// main idea for all other repo to call the function of it

	protected $model;



	protected $criteria;
	
	
	protected $skipCriteria=false;


	// two dependencies injection 
	function __construct(App $app,Collection $collection)
	{
			
			// IOC container to inject 
			$this->app=$app;

			// criteria is laravel object and array manulation collection for push into object
			$this->criteria=$collection;
			
			// reset the skipCriteria to false when call another retrieve method
			$this->resetScope();

			// to return the model object
			$this->makemodel();
	}

	//let the repository define the model
	abstract function model();
	


	// return BaseSqlRepository object from makemodel for the use in Repositories
	// $this->model=$model dependency injection
	public function makemodel()
	{
		$this->model=$this->app->make($this->model());
		
		if(!$this->model instanceof Model)
		{
			echo "Different class in makemodel of baseSqlrepo";
			exit; 
		}

		//return $this->model=$this;
	}
	


	///////////////////////////////////////////
	
	// retrieve access logic
						
	//first parameter to filter including the orm or not 
	//second parameter is to filter session is exit or not for 
	public function all($orm="",$condition=0,$sign="<",$columns=array("*"))
	{
		// with or without Eloquent ORM
		if(!empty($orm) && is_string($orm))
		{
			$model=$this->model->join('users', 'blogs.user_id', '=', 'users.id')->select('blogs.*',"users.name","users.email","users.delete_flag")->orderBy('blogs.id','DESC')->limit(5);

		}else
		{
			$model=$this->model->orderBy('id','DESC')->limit(5);
		}

		//for condition parameter 
		if(is_int($condition) && $condition!==0)
		{
			if($sign==">")
			{
				$model=$model->where("blogs.id",$sign,$condition)->orwhere("blogs.id","=",$condition);
			}else{
				$model=$model->where("blogs.id",$sign,$condition);
			}

		}
				
		// dd($model->get($columns));
		
		$this->applyCriteria();
		return $model->get($columns);

	}
	

	public function all_batches($course_id)
	{
		 //dd($course_id);
		$model=$this->model->join("courses","batches.course_id","=","courses.id")->where("batches.course_id",$course_id)->select("batches.*","courses.name")->orderBy('batches.id',"DESC");

		$this->applyCriteria();
		//dd($model->paginate(5));
		return $model->paginate(15);
		// $this->applyCriteria();

	}


	// public function find($id,$columns = array('*'))
	// {
	// 	// find somthing  delete_flag=1
	// 	return $this->model->find($id,$columns);
	// }
	public function orderby($order,$attribute="id")
	{
		return $this->model->orderBy($attribute, $order);
	}

	public function paginate($perPage = 15, $columns = array('*'))
	{
		return $this->model->paginate($perPage,$columns);
		
	}

	public function first($condition,$relation="")
	{
		$key=key($condition);

		if(!empty($relation))
		{
			$first_model=$this->model->where($key,$condition[$key])->with("course");
		}else
		{
			$first_model=$this->model->where($key,$condition[$key]);
		}

		return $first_model->first();
	}

	// ////////////////////////////////////////////////////////

	// data manpulation access logic 
	
	public function create(array $data)
	{
		return $this->model->create($data);
	}

	
	public function update(array $data,$id,$attribute="id")
	{
		return $this->model->where($attribute,"=",$id)->update($data);
	}

	// might be ambiguous ? not sure

	// public function softdelete($id)
	// {
	// 	return $this->model->where($attribute,"=",$id)->update(["delete_flag"=>1]);
	// }


	public function get_scroll()
	{

		return $this->model->get($columns);
	}



////////////////////////////////////////////////////////////////////// Criteria to use in retrieve


	// to reset the skipCriteria variable to false via skipCriteria() for find which use skipcriteria 

	public function resetScope()
	{
		$this->skipCriteria(false);
		return $this;
	}
	

	public function skipCriteria($status=true)
	{
		$this->skipCriteria=$status;
		return $this;
	}

	public function getCriteria()
	{
		return $this->criteria;
	}

	public function applyCriteria()
	{
				
		if($this->skipCriteria===true)
			return $this;

		foreach ($this->getCriteria() as $criteria) {
			# code...
			if($criteria instanceof Criteria)
			{
				$this->model = $criteria->apply($this->model, $this);
			}


		}

		//dd($criteria->apply());

		return $this;


	}

	 public function getByCriteria(Criteria $criteria) {
        $this->model = $criteria->apply($this->model, $this);
        return $this;
    }
 
    /**
     * @param Criteria $criteria
     * @return $this
     */
    public function pushCriteria(Criteria $criteria) {
        $this->criteria->push($criteria);
        return $this;
    }


}