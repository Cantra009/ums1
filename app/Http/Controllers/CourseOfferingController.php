<?php

namespace App\Http\Controllers;

use App\CourseOffering;
use Illuminate\Http\Request;
use App\Semester;
use App\Course;
use App\Batch;
use App\Department;
use Auth;


class CourseOfferingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $courseOfferings = CourseOffering::latest()->with('courses')->orderBy('batch_id')->paginate(15);
        return view('course_offerings.index', compact('courseOfferings'))
        ->with('i', (request()->input('page', 1) -1 )*15);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
            $semesters = Semester::all();
            $departments = Department::all();
            $batches = Batch::all();
            return view('course_offerings.create', compact('departments'))->with('semesters', $semesters)->with('batches', $batches);
        
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo $request->get('status');
       if($request->get('status') === 'selection'){
            $data = [
            'semester_id' => $request->get('semester_id'),
            'batch_id' => $request->get('batch_id'),
            'department_id' => $request->get('department_id'),
            'due_date' => $request->get('due_date'),
            'end_date' => $request->get('end_date')
            ];
            $courses = Course::where(['department_id' => $request->get('department_id')])->orWhere(['department_id' => 0])->get();
            
            return view('course_offerings.submit', compact('data'))->with('courses', $courses);
        }
        elseif($request->get('status') === 'submit')
        { 
           
            $valueSet = $request->get('valueset');
            $courses = explode(',', $valueSet);
            

            $courseOffering = new CourseOffering([

                'semester_id' => $request->get('semester_id'),
                'batch_id' => $request->get('batch_id'),
                'department_id' => $request->get('department_id'),
                'due_date' => $request->get('due_date'),
                'end_date' => $request->get('end_date'),
                'user_id'       => Auth::id(),
            ]);
            $courseOffering->save();
            $courseOffering->courses()->attach($courses);
            
            return redirect()->route('course_offerings.index')
                     ->with('success', 'new course  offering created successfully');
        }  

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourseOffering  $courseOffering
     * @return \Illuminate\Http\Response
     */
    public function show(CourseOffering $courseOffering)
    {
        $courses = $courseOffering->courses;
        return view('course_offerings.detail', compact('courseOffering'))->with('courses', $courses);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CourseOffering  $courseOffering
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseOffering $courseOffering)
    {
         $courses = Course::where(['department_id' => $courseOffering->department_id])->orWhere(['department_id' => 0])->get();
        
            return view('course_offerings.edit', compact('courseOffering'))->with('courses', $courses);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourseOffering  $courseOffering
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseOffering $courseOffering)
    {
        $request->validate([
            'valueset'=>'required',
           

        ]);


        $oldCourses = $courseOffering->courses;
        $courseOffering->department_id = $request->get('department_id');
        $courseOffering->batch_id  = $request->get('batch_id');
        $courseOffering->semester_id  = $request->get('semester_id');
        $courseOffering->due_date  = $request->get('due_date');
        $courseOffering->end_date  = $request->get('end_date');

        $courseOffering->user_id = Auth::id();
        $valueSet = $request->get('valueset');
        $courses = explode(',', $valueSet);

        $courseOffering->courses()->detach($oldCourses);
        $courseOffering->save();
        $courseOffering->courses()->attach($courses);
        return redirect()->route('course_offerings.index')
                      ->with('success', 'Course Offering updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourseOffering  $courseOffering
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseOffering $courseOffering)
    {
        $courseOffering->delete();
        return redirect()->route('course_offerings.index')
                      ->with('success', 'Course deleted successfully');
    }
}
