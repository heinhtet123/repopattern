<?php 

/**
* @author hein-htet
*/

namespace App\Repositories\Contracts;


interface RepositoryInterface
{
	
	//
	public function all($orm="",$condition=0,$columns=array("*"));
	
	public function all_batches($course_id);
	//
	public function create(array $data);

	//
	public function paginate($perPage = 15, $columns = array('*'));

	//
	public function update(array $data,$id);

	public function orderby($order,$attribute="id");
	//
	// public function softdelete($id);

	//
	// public function find($id,$columns = array('*'));


}