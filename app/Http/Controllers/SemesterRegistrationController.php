<?php

namespace App\Http\Controllers;

use App\SemesterRegistration;
use Illuminate\Http\Request;
use App\Student;
use App\Semester;
use App\CourseOffering;
use App\Payment;
use Auth;
class SemesterRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $semesterRegistrations = SemesterRegistration::latest()->paginate(15);
        return view('semester_registration.index', compact('semesterRegistrations'))
        ->with('i', (request()->input('page', 1) -1 )*15);
        
        
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
        $semester = Semester::where('batch_id', $student->batch_id)->where('end_date' , '>=', date('Y-m-d'))->first();
        
       $courseOffering = CourseOffering::where('semester_id', $semester['id'])->where('department_id', $student->department_id)->with('courses')->first();
       $courses = $courseOffering->courses;
        
        return view('semester_registration.create', compact('student'))->with('semester', $semester)->with('courseOffering', $courseOffering);
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
            'courses' => 'required',
            
            
        ]);
         $courses = explode(',', $request->get('courses'));
         foreach( $courses as $course)
            if ($course !== '')
                $courseIds[] = $course;
            
        if($request->get('status')){
            $status = 'Late';
            $penalty = 5.0;
            $remark = 'penalty is credited';
        }else
        {
            $status = null;
            $penalty = 0.0; 
            $remark = null;
        }

        if($request->get('droped_course_fee') !=='')
        {
            $deduction = $request->get('droped_course_fee');
        } 
        else
        {
            $deduction = 0.0;
        }
        $credit = $request->get('fee');

        // check if record exists
        $semesterRegistration = SemesterRegistration::where('student_id',  $request->get('student_id'))->where('course_offering_id', $request->get('course_offering_id'))->get();

        //check previous balance
        $payment = Payment::where('student_id', $request->get('student_id'))->orderBy('id', 'DESC')->first();
        if($payment != null)
            $oldBalance = $payment->balance;
        else 
            $oldBalance = 0;
        $currentBalance = ($oldBalance + $credit + $penalty)-$deduction;
        if($semesterRegistration->isEmpty())
        {
            $semesterRegistration = new SemesterRegistration([

                'student_id'   => $request->get('student_id'),
                'semester_id'   => $request->get('semester_id'), 
                'course_offering_id'  => $request->get('course_offering_id'),
                'status'            => $status,
                'user_id'         => Auth::id(),
            ]);
        
            $payment = new Payment([
                'receipt'           =>0,
                'student_id'        => $request->get('student_id'),
                'semester_id'       =>$request->get('semester_id'),
                'type'              =>'tuition fee',
                'credit'            =>$credit ,
                'debit'             =>0.0,
                'deduction'         =>$deduction,
                'additional'        =>$penalty,
                'discount'          =>0.0,
                'refund'            =>0.0,
                'balance'           =>$currentBalance,
                'payment_method'    =>'Automatic',
                'bank_receip'       =>null,
                'remark'            =>$remark, 
                'user_id'         => Auth::id(),
            ]);

            echo $payment;
            $semesterRegistration->save();
            $payment->save();
            return redirect()->route('semester_registration.index')
                        ->with('success', 'Student registered');
        }
        else{
            return redirect()->route('semester_registration.index')
                        ->with('warning', 'Record allready exist');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SemesterRegistration  $semesterRegistration
     * @return \Illuminate\Http\Response
     */
    public function show(SemesterRegistration $semesterRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SemesterRegistration  $semesterRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit(SemesterRegistration $semesterRegistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SemesterRegistration  $semesterRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SemesterRegistration $semesterRegistration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SemesterRegistration  $semesterRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy(SemesterRegistration $semesterRegistration)
    {
        //
    }
}
