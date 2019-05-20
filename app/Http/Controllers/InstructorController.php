<?php

namespace App\Http\Controllers;

use App\Instructor;
use Illuminate\Http\Request;
use App\Department;
use Auth;
class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructors = Instructor::latest()->paginate(15);
        return view('instructors.index', compact('instructors'))
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
        return view('instructors.create', compact('departments'));
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
            'full_name'  => 'required',
            'email'      => 'required',
            'gender'     => 'required',
            'type'       => 'required',
            'phone'      => 'required',
            'title'      => 'required',
            'qualification' => 'required',
            'department_id'  => 'required',

        ]);

        $instructor = new Instructor([

            'full_name' => $request->get('full_name'),
            'email' => $request->get('email'),  
            'gender' => $request->get('gender'), 
            'type' => $request->get('type'),
            'phone' => $request->get('phone'),  
            'title' => $request->get('title'),     
            'qualification' => $request->get('qualification'),
            'department_id' => $request->get('department_id'),  
            
            'user_id' => Auth::id(),
        ]);

        //echo Auth::id();
        $instructor->save();
        return redirect()->route('instructors.index')
                       ->with('success', 'new instructor created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function show(Instructor $instructor)
    {
        return view('instructors.detail', compact('instructor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function edit(Instructor $instructor)
    {
        return view('instructors.edit', compact('instructor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instructor $instructor)
    {
        $request->validate([
            'full_name'  => 'required',
            'email'      => 'required',
            'gender'     => 'required',
            'type'       => 'required',
            'phone'      => 'required',
            'title'      => 'required',
            'qualification' => 'required',
            'department_id'  => 'required',

        ]);

            $instructor->full_name      = $request->get('full_name');
            $instructor->email          = $request->get('email');
            $instructor->gender         = $request->get('gender');
            $instructor->type           = $request->get('type');
            $instructor->phone          = $request->get('phone'); 
            $instructor->title          = $request->get('title');    
            $instructor->qualification  = $request->get('qualification');
            $instructor->department_id  = $request->get('department_id');
            
            $instructor->user_id        = Auth::id();
            $instructor->save();
            return redirect()->route('instructors.index')
                      ->with('success', 'Instructor updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instructor $instructor)
    {
        $instructor->delete();

        return redirect()->route('instructors.index')
                      ->with('success', 'Instructor deleted successfully');
    }
}
