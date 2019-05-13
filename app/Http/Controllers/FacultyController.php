<?php

namespace App\Http\Controllers;

use App\Faculty;
use Illuminate\Http\Request;
use Auth;
class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties= Faculty::latest()->paginate(10);
        return view('faculties.index', compact('faculties'))
        ->with('i', (request()->input('page', 1) -1 )*15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faculties.create');
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
            'name'=>'required',
            'level'=>'required',
            

        ]);

        $faculty = new Faculty([

            'name' => $request->get('name'),
            'level' => $request->get('level'),  
            'description' => $request->get('description'),   
            'user_id' => Auth::id(),
        ]);

        //echo Auth::id();
        $faculty->save();
        return redirect()->route('faculties.index')
                       ->with('success', 'New faculty is created successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculty)
    {
        return view('faculties.detail', compact('faculty'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit(Faculty $faculty)
    {
        return view('faculties.edit', compact('faculty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faculty $faculty)
    {

          $request->validate([
        'name' => 'required',
        'level' => 'required',
        'description' => 'required', 
      ]);
      
      $faculty->name = $request->get('name');
      $faculty->level  = $request->get('level');
      $faculty->description  = $request->get('description');
      $faculty->user_id = Auth::id();
      $faculty->save();
      return redirect()->route('faculties.index')
                      ->with('success', 'Faculty updated successfully');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faculty $faculty)
    {
         $faculty->delete();
        return redirect()->route('faculties.index')->with('success', 'Faculty deleted successfully');
    }
}
