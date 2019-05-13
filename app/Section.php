<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'section_name',
        'shift',
        'department_id',
        'batch_id',
        'classroom_id',
        'user_id'     
    ];

    public function department(){

    	return $this->belongsTo('App\Department');
    }


    public function batch(){
			return $this->belongsTo('App\Batch');
    }

    public function classroom(){
			return $this->belongsTo('App\Classroom');
    }

    public function students(){
			return $this->hasMany('App\Student');
    }


    public function instructorLoad(){
            return $this->belongsToMany( 'App\InstructorLoad', 'instructor_load_courses')->withPivot('course_id');
    }

    public function courses(){
            return $this->belongsToMany( 'App\Course', 'instructor_load_courses')->withPivot('instructor_load_id');
    }

  

}



