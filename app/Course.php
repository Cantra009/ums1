<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
     protected $fillable = [
        'course_code',
        'course_name',
        'credit_hours',
        'course_fee',
        'prerequisite_id',
        'department_id',       
    ];

    public function department(){
    	return $this->belongsTo('App\Department');
    }

    public function semester(){
        return $this->belongsTo('App\Semester');
    }

    public function students(){
    	return $this->hasMany('App\Student');
    }

    public function prerequisite(){
    	return $this->belongsTo('App\Course' , 'prerequisite_id');
    }

    public function courseOfferings(){
            return $this->belongsToMany( 'App\CourseOffering', 'courses_course_offering', 'course_id', 'course_offering_id' );
    }

    public function instructorLoad(){
            return $this->belongsToMany( 'App\InstructorLoad', 'instructor_load_courses')->withPivot('section_id');
    }

 

    public function sections()
    {
        return $this->belongsToMany('App\Section', 'instructor_load_courses')->withPivot('instructor_load_id');
    }
}
