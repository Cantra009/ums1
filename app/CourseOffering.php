<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseOffering extends Model
{
    protected $fillable = [
        'course_code',
        'semester_id',
        'department_id',
        'batch_id',  
        'user_id',  
        'due_date',
        'end_date',       
    ];

     public function department(){
    	return $this->belongsTo('App\Department');
    }

     public function batch(){
    	return $this->belongsTo('App\Batch');
    }
    public function semester(){
        return $this->belongsTo('App\Semester');
    }

     public function courses(){
			return $this->belongsToMany( 'App\Course', 'courses_course_offering', 'course_offering_id', 'course_id' );

    }
}
