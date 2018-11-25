<?php

namespace App\Repositories;
/**
* 
*/

use App\Repositories\EloquentModelsAccess\BaseSqlRepository as BaseRepo;
use Illuminate\Container\Container as App;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Repositories\TraitComponent\BatchComponentTrait as BatchTrait;


class BatchRepository extends BaseRepo
{
	use BatchTrait;

	public function model()
	{
		return "App\Models\Batch";
	}

	public function getAll($course_id)
	{
		$this->applyCriteria();
		return $this->all_batches((int)$course_id);
	}

	/**
	* @param 
	* @return paginate data
	*/
	public function batchPaginate($perpage,$sort="desc",$sort_name="id",$course_id)
	{
		$this->applyCriteria();
		return $this->orderby($sort,$sort_name)->where("course_id",$course_id)->paginate($perpage);
	}

	/**
	* @param array data
	* @return status success or not
	*/
	public function batchCreate(Request $request)
	{
		$data=$request->all();
		$course_id=(int)$request->session()->get("course_id");
		$startmonth=str_replace('/', '-', $data["start_month"]);
		$endmonth=str_replace('/', '-', $data["end_month"]);

		$data["start_month"]=date("Y-m-d",strtotime($startmonth));
		$data["end_month"]=date("Y-m-d",strtotime($endmonth));
		
		$data['course_id']=$course_id;
		$data['delete_flag']=0;
		$data['enrollment_flag']=1;
		$data["total_months"]=$this->monthsDiff($startmonth,$endmonth);
		
		$create=$this->create($data);

		return $create;
	}


	public function batch_edit($id)
	{
		$relationship="course";
		//return $this->where("id",$id)->first();
		$this->applyCriteria();
		return $this->first(["id"=>$id],$relationship);
	}


	public function batchUpdate($id,Request $request)
	{
		$data=json_decode($request->input("data"));
		
		$datas=["enrollment_flag"=>$data[0]->enrollment_flag];
		
		$return=['success'=>$this->update($datas,$id),"condition"=>$data[0]->condition];
		
		return $return;
	}

}