<?php

namespace App\Http\Controllers;

use App\Course;
use App\Department;
use Illuminate\Http\Request;
use Auth;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $courses = Course::latest()->orderby('department_id')->paginate(15);
        return view('courses.index', compact('courses'))
        ->with('i', (request()->input('page', 1) -1 )*15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $departments = Department::all();
        return view('courses.create', compact('departments'))->with('courses', $courses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_code'   =>'required',
            'course_name'   =>'required',
            'credit_hours'  =>'required',
            'course_fee'    =>'required',
               
        ]);

        $course = new Course([

            'course_code'   => $request->get('course_code'),
            'course_name'   => $request->get('course_name'),
            'credit_hours'  => $request->get('credit_hours'),
            'course_fee'    => $request->get('course_fee'),  
            'prerequisite_id'  => $request->get('prerequisite_id'), 
            'department_id' => $request->get('department_id'), 
            'major'            => $request->get('major'),   
            'user_id'       => Auth::id(),
        ]);

       
        $course->save();
        return redirect()->route('courses.index')
                       ->with('success', 'new course created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'course_code'   =>'required',
            'course_name'   =>'required',
            'credit_hours'  =>'required',
            'course_fee'    =>'required',
               
        ]);

            
            $course->course_code   = $request->get('course_code');
            $course->course_name   = $request->get('course_name');
            $course->credit_hours  = $request->get('credit_hours');
            $course->course_fee    = $request->get('course_fee'); 
            $course->prerequisite_id  = $request->get('prerequisite_id'); 
            $course->department_id = $request->get('department_id');   
            $course->user_id       = Auth::id();

            $course->save();
            return redirect()->route('courses.index')
                      ->with('success', 'Course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')
                      ->with('success', 'Course deleted successfully');
    }
}
