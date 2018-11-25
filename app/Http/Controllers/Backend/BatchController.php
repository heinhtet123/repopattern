<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\BatchRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\BatchRepository;
use App\Repositories\Criteria\BatchCriteria\BatchCriteria;
use App\Models\Course;
use App\Models\Batch;
use Session;
use Carbon\Carbon;
use App\User;
class BatchController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $batch;

    public function __construct(BatchRepository $batch)
    {
        $this->batch=$batch;

    }


    public function index(Request $request,Route $route)
    {
        if(!$request->session()->has('course_id')):
             return redirect()->route('backend.course.index');
        endif;

        $this->batch->pushCriteria(new BatchCriteria());
        $batches=$this->batch->getAll((int)$request->session()->get('course_id'));
       
        $course_name=Course::where("id",(int)$request->session()->get('course_id'))->select("name")->first()->name;
        

        return view("backend.batches.index")->with("batches",$batches)->with("coursename",$course_name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(!$request->session()->has('course_id')):
             return redirect()->route('backend.course.index');
        endif;

        return view("backend.batches.register");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BatchRequest $request)
    {
        if(!$request->session()->has('course_id')):
             return redirect()->route('backend.course.index');
        endif;
       
        $create=$this->batch->batchCreate($request);
        

        if(!$create):
             return redirect()->route('backend.batch.index');
        else:
             Session::flash('flash_message', 'Batch '.$create->batch_name.' successfully added!');
             return redirect()->route('backend.batch.index');
        endif;
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
        // $batch=Batch::with('users')->find(2);
        // dd(User::find(1)->batches()->save($batch,['status'=>1]));
        
        $batch_info=$this->batch->batch_edit($id);
        $courses=Course::get();
        
        
        return view("backend.batches.edit")->with("batch_info",$batch_info)->with("courses",$courses);
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

    public function indexdata(Request $request)
    {
        $this->batch->pushCriteria(new BatchCriteria());
        $course_id=(int)$request->session()->get("course_id");

        $data=$this->batch->batchPaginate((int)$request->input("perpage"),$request->input("sort"),$request->input("sortname"),$course_id);
        return response()->json($data);
        exit();
    }

    /**
    * @param int id , Request payload
    * @return data
    */
    public function closeenroll(Request $request,$id)
    {
       // $data=json_decode($request->input('data'));
        $data=$this->batch->batchUpdate($id,$request);
        return response()->json($data);
        exit();
    }



}