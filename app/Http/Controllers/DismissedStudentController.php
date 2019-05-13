<?php

namespace App\Http\Controllers;

use App\DismissedStudent;
use App\Student;
use Illuminate\Http\Request;
use DB;
use Auth;

class DismissedStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $dissmissedStudents = DismissedStudent::latest()->paginate(15);
        return view('dismissed_students.index', compact('dissmissedStudents'))
        ->with('i', (request()->input('page', 1) -1 )*15);
        
        
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
        {

            $keyword=  Input::get('table_search');
            echo $keyword;

            //$student = Student::where('full_name', '"%' . $keyword . '%"')->orWhere('id_no', 'like', '"%' . $keyword . '%"')->first();
        echo $student;
        //return View::make('dismissed_students.index')->with('student', $student);
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $keyword=  \Request::get('student_id');
        
        $student = Student::find($keyword);
        
        
        return view('dismissed_students.create', compact('student'));
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
            'reason'      => 'required',
            'number_of_semester_completed'          => 'required',

          
        ]);
        $student_id = $request->get('student_id');
        

        $student =Student::find($student_id);
        $student->user_id        = Auth::id();
        $student->status = '0';

        echo $student;
        $student->save();

        $dismissedStudent = new DismissedStudent([

            'student_id'   => $request->get('student_id'),
            'reason'   => $request->get('reason'),  
            'number_of_semester_completed'      => $request->get('number_of_semester_completed'),   
            'user_id'         => Auth::id(),
        ]);
        
        echo $dismissedStudent;
        $dismissedStudent->save();
        return redirect()->route('dismissed_students.index')
                      ->with('success', 'Student dismissed successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DismissedStudent  $dismissedStudent
     * @return \Illuminate\Http\Response
     */
    public function show(DismissedStudent $dismissedStudent)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DismissedStudent  $dismissedStudent
     * @return \Illuminate\Http\Response
     */
    public function edit(DismissedStudent $dismissedStudent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DismissedStudent  $dismissedStudent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DismissedStudent $dismissedStudent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DismissedStudent  $dismissedStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy(DismissedStudent $dismissedStudent)
    {
        //
    }
}
