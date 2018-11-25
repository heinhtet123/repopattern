<?php
namespace App\Repositories;

use App\Models\Batch;
use App\Models\Course;
use Illuminate\Http\Request;
use App\User;
use App\Models\BatchesUsers;
use App\Repositories\TraitComponent\EnrolledStudentsComponentTrait as EnrolledStudentsTrait;
use Illuminate\Support\Facades\Mail;
use App\Models\Attendence;

/**
*  this class is just only use repository not use basesqlrepository!!!
*/


class EnrolledStudentsRepository 
{
	use EnrolledStudentsTrait;

	public function indexdata($perpage=15,$batch_id){

		
		$enrolledstudents=User::join('batch_enrolledstudents','users.id','=','batch_enrolledstudents.enrolledstudents_id')->where("batch_enrolledstudents.batch_id",$batch_id)->select('users.name',"users.phone","users.email","users.id","batch_enrolledstudents.batch_id","batch_enrolledstudents.student_bill","batch_enrolledstudents.numbers_of_payment","batch_enrolledstudents.status")->paginate($perpage);
		
		return $enrolledstudents;
	}

	public function batch($id)
	{
		$batch=Batch::where('id',$id)->select("fees","batch_name")->first();
		return $batch;
	}
	public function toundo(Request $request)
	{
		$user = User::find($request->input("id"));
		$batches=$user->batches()->where('enrolledstudents_id',$request->input("id"))->where('batch_id',$request->input("batch_id"))->get()->first();

		$batches->pivot->status=0;
		$batches->pivot->student_bill=0;
		$undo=$batches->pivot->save();
		
		if($undo)
		{
		$undo=Attendence::where("batch_id",$request->input("batch_id"))->where("user_id",$request->input("id"))->delete();
		}

		return $undo;
		exit();
	}

	// 
	public function updatepayment(Request $request)
	{
		$password=$this->randomPassword();
		$hash_pswd = \Hash::make($password);
		$batch=Batch::select("fees")->find($request->input("batch_id"));
		$user = User::find($request->input("id"));
		$batches=$user->batches()->where('enrolledstudents_id',$request->input("id"))->where('batch_id',$request->input("batch_id"))->get()->first();
		$dbpassword=User::where('id',$request->input("id"))->select("password")->first();


		if(empty($dbpassword->password))
		{
			$updated=User::where('id',$request->input("id"))->update(['password'=>$hash_pswd]);

			$response=["updated"=>$updated];


			if($batches->pivot->status==0)
			{
				Mail::send('emails.test',['email' => $request->input("email"),"password"=>$password], function($message) {
				  $message->to('heinhtetstarfall@gmail.com')->subject('Students Portal');
				  });
			}

		}else
		{

			if($batches->pivot->status==0)
			{
				$batches->pivot->status=(int) $request->input('updatestatus');
			}

			$response=["updated"=>false];
		}

		$batches->pivot->student_bill=$request->input('student_bill');

		if($batch->fees <= $request->input("student_bill"))
		{
			$batches->pivot->status=2;
			$batches->pivot->student_bill=$batch->fees;
		}

		$check=$batches->pivot->save();
		
		if($check)
		{

			$timetable=$this->generate_timetable_date($request->input('start_month'),$request->input("end_month"),$request->input("type"));
			// generate time table

			foreach ($timetable as  $value) {
				Attendence::create(['user_id' =>$request->input('id'),"batch_id"=>$request->input('batch_id'),"attendence_date"=>$value,"status"=>0]);
			}	
		}

		


		return $response;
	}





	public function allbatches($course_id)
	{
		$batches=Batch::where("course_id",$course_id)->select("id","batch_name",'start_month',"end_month","type","fees","delete_flag")->get();
		return $batches;
	}
	
	public function course()
	{
		$courses=Course::select("name","id")->get();
		return $courses;
	}

}