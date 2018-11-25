<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Groups;
use App\Models\Batch;
use App\Models\BatchEnrolledStudents;
use App\User;
use Illuminate\Support\Facades\Auth;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Groups::with("users")->get();
        return view("backend.groups.index")->with("users",$data);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.groups.register");
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

    public function getBatch(Request $request)
    {
        if($request->ajax())
        {
            if(\Permission::isAdmin())
            {
                $batches=Batch::select("id","batch_name","course_id")->get();   
                $batches=$batches->load("course");

            }else if(\Permission::isUser())
            {
                $login_id=Auth::user()->id;
                $enrolled_batch=BatchEnrolledStudents::select("batch_id")->where("enrolledstudents_id",$login_id)->where("status",2)->orwhere("status",1)->get()->toArray();
                
                
                $batches=Batch::select("id","batch_name","course_id")->whereIn("id",$enrolled_batch)->get();

                $batches=$batches->load("course");
            }

            return response()->json($batches);
            exit();
        }
        
    }


    public function getGroups(Request $request)
    {
        if($request->ajax())
        {
            $batch_id=$request->input("batch_id");
            $data=Groups::where("batch_id",$batch_id)->get();
            return response()->json($data);
            exit();
        }
    }

    public function getStudents(Request $request)
    {
        if ($request->ajax()) {
            # code...
            $batch_id=$request->input("batch_id");
            $tag=$request->input("tag");
            $data=BatchEnrolledStudents::select("enrolledstudents_id")->where("batch_id",$batch_id)->whereNotIn('status', [0])->get();
            
            $data=User::select("id","name")->where('name','LIKE','%'.$tag.'%')->whereIn('id',$data)->get();

            return response()->json($data);
            exit();
        }
    }



}
