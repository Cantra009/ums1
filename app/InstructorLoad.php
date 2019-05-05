<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstructorLoad extends Model
{
    protected $fillable = [
        'semester_id',
        'instructor_id',
        'user_id',
    ];


 	public function instructor(){
    	return $this->belongsTo('App\Instructor');
    }
    public function semester(){
    	return $this->belongsTo('App\Semester');
    }

    public function courses(){
			return $this->belongsToMany( 'App\Course', 'instructor_load_courses')->withPivot('section_id');

    }

    public function sections(){
			return $this->belongsToMany( 'App\Section', 'instructor_load_courses')->withPivot('course_id');

    }




    
}
