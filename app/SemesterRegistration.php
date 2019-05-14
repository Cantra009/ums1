<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SemesterRegistration extends Model
{
    protected $fillable = [
        'semester_id',
        'course_offering_id',
        'student_id',
        'user_id'  ,
        'status'      
    ];

    public function semester(){
    	return $this->belongsTo('App\Semester');
    }

    public function student(){
    	return $this->belongsTo('App\Student');
    }

    public function courseOffering(){
    	return $this->belongsTo('App\CourseOffering');
    }

    public function courses()
    {
        return $this->belongsToMany( 'App\Course', 'semester_registration_courses', 'semester_registration_id', 'course_id' );
    }

    public function dropedCourses(){
        return $this->hasMany('App\DropedCourse');
    }

}
