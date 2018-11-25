<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\EnrolledStudents;
use App\Repositories\EnrolledStudentsRepository;
class EnrolledStudentsController extends Controller
{
    private $enrolledstudents;
    
    public function __construct(EnrolledStudentsRepository $enrolledstudents)
    {
        $this->enrolledstudents=$enrolledstudents;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view("backend.enrolledstudent.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        //return response($request->input("page"));
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
    public function update(Request $request, $id)
    {
        //
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


    /**
     * Reponse the data of angularjs $http for enrolled students for the class
     *
     * @param  Request $request object
     * @return \Illuminate\Http\Response with json format for all the enrolled students ,
     */
    public function indexdata(Request $request)
    {
        if($request->ajax())
        {
            $perpage=(int) $request->input('perpage');
            $batch_id=(int)$request->input('batch_id');
            $data=$this->enrolledstudents->indexdata($perpage,$batch_id);

            return response($data);
            exit();
        }
    }

    public function batch(Request $request)
    {
        if($request->ajax())
        {
            $id=(int) $request->input('batchid');
            $data=$this->enrolledstudents->batch($id);
            return response($data);
            exit();
        }
       
    }

    public function allbatches(Request $request)
    {
        if($request->ajax())
        {
            $data=$this->enrolledstudents->allbatches((int) $request->input('batchid'));
            return response($data);
            exit();
        }
    }

    public function courses(Request $request)
    {   
        if($request->ajax())
        {
             $courses=$this->enrolledstudents->course();
             return response($courses);
             exit();
        }
       
    }

    public function updatepayment(Request $request){
        
        if($request->ajax()){

            if(!empty($request->input("undo")) && $request->input("undo")!=false)
            {
                $undo=$this->enrolledstudents->toundo($request);
                $updated=["undo"=>$undo];
            }else
            {
                 $updated=$this->enrolledstudents->updatepayment($request);
            }


            return response($updated);
            exit();
        }
    }

}
