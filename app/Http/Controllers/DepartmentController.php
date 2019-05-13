<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use App\Faculty;
use Auth;
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::latest()->paginate(15);
        return view('departments.index', compact('departments'))
        ->with('i', (request()->input('page', 1) -1 )*15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties= Faculty::all();

        return view('departments.create', compact('faculties'));
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
            'department_name'=>'required',
            'department_code'=>'required',
             'faculty_id'=>'required',

        ]);

        $department = new Department([

            'department_name' => $request->get('department_name'),
            'department_code' => $request->get('department_code'),  
            'faculty_id' => $request->get('faculty_id'),   
            'user_id' => Auth::id(),
        ]);

        //echo Auth::id();
        $department->save($request->all());
        return redirect()->route('departments.index')
                       ->with('success', 'new department created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        return view('departments.detail', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'department_name'=>'required',
            'department_code'=>'required',
             'faculty_id'=>'required',

        ]);



      $department->department_name = $request->get('department_name');
      $department->department_code  = $request->get('department_code');
      $department->faculty_id  = $request->get('faculty_id');

      $department->user_id = Auth::id();
      $department->save();
      return redirect()->route('departments.index')
                      ->with('success', 'Department updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();
      return redirect()->route('departments.index')
                      ->with('success', 'Department updated successfully');
    }
}
