<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\CoursesRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Course;


class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $course;
    
    
    public function __construct(Course $course)
    {
     //   $this->authorize('courseauthorize',$course);
        $this->course=$course;  //  $this->authorize('role_policy',$course);

    }



    public function index()
    {
       $courses = $this->course->paginate(10); 
       return view('backend.courses.index',["courses"=>$courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.courses.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CoursesRequest $request)
    {
        $this->course->create($request->all());
        return redirect()->route('backend.course.index');
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
        
    }

    public function select($id,Request $request)
    {

        $request->session()->put('course_id',$id);
        
        if ($request->session()->has('course_id')) {
            return redirect()->route('backend.batch.index');
        }
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
}
