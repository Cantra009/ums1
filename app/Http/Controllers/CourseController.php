<?php

namespace App\Http\Controllers;

use App\Course;
use App\Department;
use Illuminate\Http\Request;
use Auth;
use Excel;
use Datatable;
use DB;
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


    function import(Request $request)
    {
     $this->validate($request, [
      'select_file'  => 'required|mimes:xls,xlsx'
     ]);

     $path = $request->file('select_file')->getRealPath();

     $data = Excel::load($path)->get();

     if($data->count() > 0)
     {
      foreach($data->toArray() as $key => $value)
      {
       foreach($value as $row)
       {
        $insert_data[] = array(
         'course_name'  => $row['course_name'],
         'course_code'   => $row['course_code'],
         'credit_hours'   => $row['credit_hours'],
         'course_fee'    => $row['course_fee'],
         'prerequist_id'  => $row['prerequist_id'],
         'department_id'   => $row['department_id']
        );
       }
      }

      if(!empty($insert_data))
      {
       DB::table('courses')->insert($insert_data);
      }
     }
     return redirect()->route('courses.index')
                       ->with('success', 'new course created successfully');
    }

    function excel()
    {
     $courses_data = DB::table('courses')->get()->toArray();
     $courses_array[] = array('Course Name', 'Course Code', 'Credit Hours', 'Course Fee', 'Prerequist','Department');
     foreach($courses_data as $course)
     {
      $courses_array[] = array(
       'Course Name'  => $course->course_name,
       'Course Code'   => $course->course_code,
       'Credit Hours'    => $course->credit_hours,
       'Course Fee'  => $course->PostalCode,
       'Prerequist'   => $course->Country,
       'Department'   => $course->Country
      );
     }
     Excel::create('Customer Data', function($excel) use ($customer_array){
      $excel->setTitle('Customer Data');
      $excel->sheet('Customer Data', function($sheet) use ($customer_array){
       $sheet->fromArray($customer_array, null, 'A1', false, false);
      });
     })->download('xlsx');
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
        return view('courses.detail', compact('course'));
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
