<?php

namespace App\Http\Controllers;

use App\Semester;
use Illuminate\Http\Request;
use Auth;
class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semesters= Semester::latest()->paginate(15);
        return view('semesters.index', compact('semesters'))
        ->with('i', (request()->input('page', 1) -1 )*15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('semesters.create');
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
            'semester_name' => 'required',
            'academic_year' => 'required',
            'start_date'    => 'required',
            'end_date'      => 'required',
            
        ]);

         $semester = new Semester([

            'semester_name'   => $request->get('semester_name'),
            'academic_year'   => $request->get('academic_year'),  
            'start_date'      => $request->get('start_date'),  
            'end_date'        => $request->get('end_date'),  
            'batch_id'        => $request->get('batch_id'),
            'description'     => $request->get('description'),  
            'user_id'         => Auth::id(),
        ]);

        $semester->save();
        return redirect()->route('semesters.index')
                       ->with('success', 'New Semester is created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function show(Semester $semester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function edit(Semester $semester)
    {
        return view('semesters.edit', compact('semester'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Semester $semester)
    {
        $request->validate([
            'semester_name' => 'required',
            'academic_year' => 'required',
            'start_date'    => 'required',
            'end_date'      => 'required',
            
        ]);

        $semester->semester_name  = $request->get('semester_name');
        $semester->academic_year  = $request->get('academic_year');
        $semester->start_date     = $request->get('start_date');
        $semester->end_date       = $request->get('end_date');
        $semester->description    = $request->get('description'); 

            
        $semester->user_id        = Auth::id();
        $semester->save();
        return redirect()->route('semesters.index')
                      ->with('success', 'Semester updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function destroy(Semester $semester)
    {
        $semester->delete();
        return redirect()->route('semesters.index')
                      ->with('success', 'Semester deleted successfully');
    }
}
