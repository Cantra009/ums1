<?php

namespace App\Http\Controllers;

use App\IntstructorLoad;
use Illuminate\Http\Request;
use App\Semester;
use App\Section;
use App\Instructor;
use App\InstructorLoad;
use App\CourseOffering  ;
use App\Course;
use Auth;
use DB;

class InstructorLoadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructorLoads = InstructorLoad::latest()->with('courses')->with('sections')->paginate(15);
        return view('instructor_loads.index', compact('instructorLoads'))
        ->with('i', (request()->input('page', 1) -1 )*15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semesters = Semester::all();

        $instructors = Instructor::all();
        
        return view('instructor_loads.create', compact('instructors'))->with('semesters', $semesters);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         if($request->get('status') === 'selection'){
            $data = [
            'semester_id' => $request->get('semester_id'),
            'instructor_id' => $request->get('instructor_id'),
            ];
            $courseOffering = CourseOffering::where(['semester_id' => $request->get('semester_id')])->with('courses')->first();
            $courses = $courseOffering->courses;
           

            $sections = Section::select('sections.id', 'sections.section_name')->leftJoin('batches','batches.id', '=', 'sections.batch_id')->where('batches.end_year', '>=', date('Y'))->get();

            
            return view('instructor_loads.submit', compact('data'))->with('courses', $courses)->with('sections', $sections);
        }
        elseif($request->get('status') === 'submit')
        { 
           
            $valueSet = $request->get('valueset');
            $coursesPerSections = explode(',', $valueSet);
            
            
            $instructorLoad = new InstructorLoad([

                'semester_id' => $request->get('semester_id'),
                'instructor_id' => $request->get('instructor_id'),
                'user_id'       => Auth::id(),
            ]);
           $instructorLoad->save();
            foreach ($coursesPerSections as $key => $value) {
                $course_ids = explode(':', $value);
                

                DB::table('instructor_load_courses')->insert([
                    'course_id' => $course_ids[0],
                    'section_id' => $course_ids[1],
                    'instructor_load_id' => $instructorLoad->id,
                ]);

                
               
            }
          
            return redirect()->route('instructor_loads.index')
                     ->with('success', 'Courses assigned to instructor successfully');
        }  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IntstructorLoad  $intstructorLoad
     * @return \Illuminate\Http\Response
     */
    public function show(InstructorLoad $instructorLoad)
    {
        return view('instructor_loads.detail', compact('instructorLoad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IntstructorLoad  $intstructorLoad
     * @return \Illuminate\Http\Response
     */
    public function edit(InstructorLoad $instructorLoad)
    {
        return view('instructor_loads.edit', compact('instructorLoad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IntstructorLoad  $intstructorLoad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InstructorLoad $intstructorLoad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InstructorLoad  $intstructorLoad
     * @return \Illuminate\Http\Response
     */
    public function destroy(InstructorLoad $instructorLoad)
    {
       
        DB::table('instructor_load_courses')->where('instructor_load_id', $instructorLoad->id)->delete();
        echo $instructorLoad->id;
        $instructorLoad->delete();
        return redirect()->route('instructor_loads.index')
                     ->with('success', 'Instructor Load deleted successfully');
    }
}
