<?php

namespace App\Http\Controllers;

use App\Student;
use Auth;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keyword=  \Request::get('table_search');
        
        $students = Student::where('full_name', 'like', '%'.$keyword.'%' )->orWhere('id_no', 'like', '%'.$keyword.'%')->paginate(20);
        return view('students.index', compact('students'))
        ->with('i', (request()->input('page', 1) -1 )*15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
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
            'full_name'      => 'required',
            'id_no'          => 'required',
            'dob'            => 'required',
            'gender'         => 'required',
            'parent_name'    => 'required',
            'parent_phone'   => 'required',
            'photo'          => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'department_id'  => 'required',
            'shift'          => 'required',
            'section_id'     => 'required', 
            'batch_id'       => 'required', 

            
        ]);

        

       
        $fileName = $this->getFileName($request->photo, $request->get('id_no'));
        $request->photo->move(base_path('public/storage/photos'), $fileName);
        
        if($request->get('scholarship') ==='1'){
            $scholarship = '1';
        }else
        $scholarship = '0';
        $student = new Student([

            'full_name'     => $request->get('full_name'),
            'id_no'         => $request->get('id_no'),  
            'gender'        => $request->get('gender'),  
            'parent_name'   => $request->get('parent_name'),  
            'parent_phone'  => $request->get('parent_phone'),  
            'photo'         => $fileName,
            'shift'         => $request->get('shift'),
            'department_id' => $request->get('department_id'),  
            'batch_id'      => $request->get('batch_id'),  
            'section_id'    => $request->get('section_id'), 
            'dob'    => $request->get('dob'), 
            'phone'    => $request->get('phone'),  
            'scholarship'   => $scholarship,  
            
            'user_id'       => Auth::id(),

            
        ]);

        $student->save();
        return redirect()->route('students.index')
                       ->with('success', 'New student is created successfully');

    }


    protected function getFileName($file, $id_no)
    {
        return  $id_no. '.' . $file->extension();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('students.detail', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')
                       ->with('success', 'Student is deleted successfully');
    }
}
