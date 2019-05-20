<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Campus;
use Illuminate\Http\Request;
use Auth;
class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms= Classroom::latest()->paginate(15);
        return view('classrooms.index', compact('classrooms'))
        ->with('i', (request()->input('page', 1) -1 )*15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $campuses= Campus::all();

        return view('classrooms.create', compact('campuses'));
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
            'room_label'    => 'required',
            'dimensions'    => 'required',
            'campus_id'     => 'required',

        ]);

        $classroom = new Classroom([

            'room_label'   => $request->get('room_label'),
            'dimensions'   => $request->get('dimensions'),  
            'campus_id'    => $request->get('campus_id'),  
            'user_id'        => Auth::id(),
        ]);

        $classroom->save();
        return redirect()->route('classrooms.index')
                       ->with('success', 'New classroom is created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        return view('classrooms.detail', compact('classroom'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroom $classroom)
    {
        return view('classrooms.edit', compact('classroom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classroom $classroom)
    {
        

        $classroom->room_label      = $request->get('room_label');
        $classroom->dimensions      = $request->get('dimensions');
        $classroom->campus_id       = $request->get('campus_id');
       
        $classroom->user_id        = Auth::id();
        $classroom->save();
        return redirect()->route('classrooms.index')
                    ->with('success', 'Classroom updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom)
    {
        $classroom->delete();
        return redirect()->route('classrooms.index')
                    ->with('success', 'Classroom deleted successfully');
    }
}
