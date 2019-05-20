<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;
use App\Department;
use App\Classroom;
use App\Batch;
use Auth;
class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections= Section::latest()->paginate(15);
        return view('sections.index', compact('sections'))
        ->with('i', (request()->input('page', 1) -1 )*15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $batches  = Batch::all();
        $classrooms = Classroom::all();
        return view('sections.create', compact('classrooms'), compact('departments'))->with('batches', $batches);
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
            'section_name'  => 'required',
            'shift'         => 'required',
            'department_id' => 'required',
            'batch_id'      => 'required',
            
        ]);

        $section = new Section([

            'section_name'   => $request->get('section_name'),
            'shift'          => $request->get('shift'),  
            'department_id'  => $request->get('department_id'),  
            'batch_id'          => $request->get('batch_id'),  
            'classroom_id'  => $request->get('classroom_id'),  
            'user_id'        => Auth::id(),
        ]);

        $section->save($request->all());
        return redirect()->route('sections.index')
                       ->with('success', 'New Section is created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        return view('sections.detail', compact('section'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
         return view('sections.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
         $request->validate([
            'section_name'  => 'required',
            'shift'         => 'required',
            'department_id' => 'required',
            'batch_id'      => 'required',
            

        ]);

            $section->section_name      = $request->get('section_name');
            $section->shift             = $request->get('shift');
            $section->department_id     = $request->get('department_id');
            $section->batch_id          = $request->get('batch_id');
            $section->classroom_id      = $request->get('classroom_id'); 

            
            $section->user_id        = Auth::id();
            $section->save();
            return redirect()->route('sections.index')
                      ->with('success', 'Section updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        $section->delete();
            return redirect()->route('sections.index')
                      ->with('success', 'Section deleted successfully');
    }
}
