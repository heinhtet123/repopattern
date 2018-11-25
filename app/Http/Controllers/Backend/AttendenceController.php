<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\AttendenceRepository;



class AttendenceController extends Controller
{

    private $attendence;
    
    public function __construct(AttendenceRepository $attendence)
    {
        $this->attendence=$attendence;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
           
            $users=$this->attendence->students_list(1);
            
            return view("backend.attendence.index")->with("users",$users);
       
    }

    public function userdata(Request $request)
    {
        if($request->ajax())
        {
           $batch_id=(int) $request->input("batch_id");
           $users=$this->attendence->students_list($batch_id); 
           return $users;
           exit();
        }
    }

    public function indexdata(Request $request)
    {
         if($request->ajax())
        {
            $batch_id=(int) $request->input("batch_id");
            $month=$request->input("month");
            $months=$this->attendence->getStartAndEndMonth($month);
        

            $batches=$this->attendence->getMonthdate($batch_id,$months["first_day"],$months["last_day"]);
            return response()->json($batches);
            exit();
        }
    }

    public function timetable_date(Request $request)
    {
        if($request->ajax())
        {
            $month=$request->input("month");
            $months=$this->attendence->getStartAndEndMonth($month);

            $uni_date=$this->attendence->getuniquedatetime($months["first_day"],$months["last_day"]);
            return response()->json($uni_date);
            exit();
        }   
    }

    public function month(Request $request)
    {

        if($request->ajax()){
            $batch_id=(int) $request->input("batch_id");
            $months=$this->attendence->getmonth($batch_id);
            return response()->json($months);
        }
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        if($request->ajax()){
             $response["success"]=$this->attendence->update($request);
             return response()->json($response);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
