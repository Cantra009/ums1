<?php

namespace App\Http\Controllers;

use App\Campus;
use Illuminate\Http\Request;
use Auth;
class CampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campuses = Campus::latest()->paginate(5);
        return view('campuses.index', compact('campuses'))
        ->with('i', (request()->input('page', 1) -1 )*15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('campuses.create');
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
            'address'=>'required'

        ]);

        $campus = new Campus([

            'name' => $request->get('name'),
            'address' => $request->get('address'),   
            'user_id' => Auth::id(),
        ]);

        echo Auth::id();
        Campus::create($request->all());
        return redirect()->route('campuses.index')
                       ->with('success', 'new campus created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function show(Campus $campus)
    {
        return view('campuses.detail', compact('campus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function edit(Campus $campus)
    {
        return view('campuses.edit', compact('campus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campus $campus)
    {
        $request->validate([
        'name' => 'required',
        'address' => 'required'
      ]);
      
      $campus->name = $request->get('name');
      $campus->address  = $request->get('address');
      $campus->user_id = Auth::id();
      $campus->save();
      return redirect()->route('campuses.index')
                      ->with('success', 'Campus updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campus $campus)
    {
        $campus->delete();
        return redirect()->route('campuses.index')
                        ->with('success', 'Campus siswa deleted successfully');
    }
}
