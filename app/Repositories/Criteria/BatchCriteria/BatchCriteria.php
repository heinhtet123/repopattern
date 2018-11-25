<?php 
namespace App\Repositories\Criteria\BatchCriteria;

use App\Repositories\Contracts\CriteriaInterface;
use App\Repositories\Contracts\RepositoryInterface as Repository;
use App\Repositories\Criteria\Criteria;

class BatchCriteria extends Criteria
{

	public function apply($model, Repository $repository)
    {
    	//constraint relationship; with('user',function($queries){$queries=$queries->where("users.delete_flag","=",0)});
        $query = $model->where('batches.delete_flag', '=', 0);   
        return $query;
    }

}