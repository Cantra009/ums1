<?php

namespace App\Http\Controllers;

use App\Batch;
use Illuminate\Http\Request;
use Auth;
class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $batches = Batch::latest()->paginate(10);
        return view('batches.index', compact('batches'))
        ->with('i', (request()->input('page', 1) -1 )*15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('batches.create');
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
            'start_year'=>'required',
            'end_year'=>'required'

        ]);

        $batch = new Batch([

            'name' => $request->get('name'),
            'start_year' => $request->get('start_year'),  
            'end_year' => $request->get('end_year'),   
            'user_id' => Auth::id(),
        ]);

        echo Auth::id();
        Batch::create($request->all());
        return redirect()->route('batches.index')
                       ->with('success', 'new batch created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function show(Batch $batch)
    {
        return view('batches.detail', compact('batch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function edit(Batch $batch)
    {
         return view('batches.edit', compact('batch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Batch $batch)
    {
        
        $request->validate([
        'name'=>'required',
        'start_year'=>'required',
        'end_year'=>'required'
      ]);
      
      $batch->name = $request->get('name');
      $batch->start_year  = $request->get('start_year');
      $batch->end_year  = $request->get('end_year');
      $batch->user_id = Auth::id();
      $batch->save();
      return redirect()->route('batches.index')
                      ->with('success', 'batch updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Batch $batch)
    {
        $batch->delete();
        return redirect()->route('batches.index')
                        ->with('success', 'batch siswa deleted successfully');
    }
}
