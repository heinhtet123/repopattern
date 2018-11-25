<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\StudentsRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;


class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        // $class=Config::get("rolespermission.testing")[0];
        
        // $rolepermission=new $class();
        // dd($rolepermission->all());
        
        $students = Student::paginate(10);
        return view('backend.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.students.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StudentsRequest|StudentsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    //post request of register 
    public function store(StudentsRequest $request)
    {
        $stu = new Student();
        //var_dump($request->all());die;
        $stu->create($request->all());
        
        return redirect()->route('backend.student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //details
    public function show($id)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $student = Student::findOrFail($id);

        return view('backend.students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StudentsRequest|StudentsRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    //post request of edit
    public function update(StudentsRequest $request, $id)
    {
        $student = Student::findOrFail($id);

        $student->update($request->all());

        return redirect()->route('backend.student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     * @internal param Student $student
     * @internal param int $id
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        $student->delete();

        return redirect()->route('backend.student.index');
    }
}
