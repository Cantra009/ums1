<?php

namespace App\Http\Controllers;

use App\CourseOffering;
use Illuminate\Http\Request;
use App\Semester;
use App\Course;
use App\Department;

class CourseOfferingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
            return view('course_offerings.create', compact('departments'))->with('semesters', $semesters);
        
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if(!empty($request->get('semester_id'))){
            $semester = $request->get('semester_id');
            $courses = Course::where('department_id', $request->get('department_id'))->orWhere('department_id', 0);
            return view('course_offerings.create', compact('departments', 'courses', 'semesters'))->with('semester', $semester);
        }else{ 
            
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CourseOffering  $courseOffering
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseOffering $courseOffering)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourseOffering  $courseOffering
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseOffering $courseOffering)
    {
        //
    }
}
