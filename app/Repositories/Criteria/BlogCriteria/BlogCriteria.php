<?php 

/**
* @author hein-htet
*/


namespace App\Repositories\Criteria\BlogCriteria;

use App\Repositories\Contracts\CriteriaInterface;
use App\Repositories\Contracts\RepositoryInterface as Repository;
use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Criteria\Criteria;
use Auth;

class BlogCriteria extends Criteria
{
	
	public function apply($model, Repository $repository)
    {
    	//constraint relationship; with('user',function($queries){$queries=$queries->where("users.delete_flag","=",0)});
    	
    	

        $query = $model->where('blogs.delete_flag', '=', 0)->where('users.delete_flag','=',0);
        
        //$query =$model->where("dele",">=",1);
        
        return $query;
    }
    


}