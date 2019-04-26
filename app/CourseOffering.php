<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseOffering extends Model
{
    protected $fillable = [
        'course_code',
        'semester_id',
        'department_id',       
    ];

     public function department(){
    	return $this->belongsTo('App\Department');
    }

    public function semester(){
        return $this->belongsTo('App\Semester');
    }

     public function courses(){
			return $this->hasMany('App\Course');
    }
}
