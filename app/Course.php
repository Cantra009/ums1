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

    
}
