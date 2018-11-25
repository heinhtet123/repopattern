<?php 

namespace App\Repositories;
/**
* 
*/
use App\Models\Attendence;
use Illuminate\Http\Request;
use App\Repositories\TraitComponent\EnrolledStudentsComponentTrait as EnrolledStudentsTrait;
use App\Repositories\TraitComponent\AttendenceComponentTrait;
use App\Models\Batch;
use App\User;

class AttendenceRepository
{
	 use EnrolledStudentsTrait;
	 use AttendenceComponentTrait;

	 public function getMonthdate($batch_id,$first_day,$last_day)
	 {

	 	// $batch=Batch::where("id",$batch_id)->select("start_month","type")->first();
	 	// $timetable=$this->generate_timetable_date($batch->start_month,$batch->start_month,$batch->type,1);

	 	$timetable=Attendence::where("batch_id",$batch_id)->where("attendence_date",">=",$first_day)->where("attendence_date","<=",$last_day)->get();
	 	
	 	return $timetable;
	 }


	 public function update(Request $request){
	 	 $id=(int) $request->input("id");
	 	 $status=$request->input("checked");
	 	 $data=["status"=>$status];
	 	 
	 	 $attendences = Attendence::findOrFail($id);
         return $attendences->update($data);
	 }

	 public function getuniquedatetime($first_day,$last_day)
	 {
	 	$timetable=Attendence::where("attendence_date",">=",$first_day)->where("attendence_date","<=",$last_day)->select("attendence_date")->groupBy("attendence_date")->get();
	 	return $timetable;
	 }

	 function getStartAndEndMonth($month)
	 {
	 	$timestamp    = strtotime($month);
	 	$first_day = date('Y-m-01', $timestamp);
	 	$last_day= date("Y-m-t",$timestamp);
	 	$months=["first_day"=>$first_day,"last_day"=>$last_day];
	 	return $months;
	 }


	 public function getmonth($batch_id)
	 {
	 	$month=array();
	 	$count=0;
	 	$batch=Batch::where("id",$batch_id)->select("start_month","end_month")->first();

	 	$timetable=$this->generate_timetable_date($batch->start_month,$batch->end_month,"months");
	 	//$timetable=["empty"=>true];
	 	
	 	return $timetable;
	 }

	 public function students_list($batch_id)
	 {
	 	 $container=array();
	 	 $count=0;
	 	 $students=Attendence::where("batch_id",$batch_id)->select("user_id")->groupBy("user_id")->get();

	 	 foreach ($students as  $value) {
	 	 	# code...
	 	 	$container[$count]=$value->user_id;
	 	 	$count++;
	 	 }

	 	 $users=User::select("id","name","email")->whereIn('id',$container)->paginate();

	 	 
	 	 return $users;
	 }
	
}
