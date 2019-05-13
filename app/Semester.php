<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
     protected $fillable = [
        'semester_name',
        'academic_year',
        'start_date',
        'end_date',
        'batch_id',
        'description',
        'user_id' 
            
    ];

    public function students(){
			return $this->hasManyThrough('App\Student', 'App\SemesterRegestration');
    }

    public function courses(){
            return $this->hasManyThrough('App\Course', 'App\CourseOffering');
    }

    public function batch(){
			return $this->belongsTo('App\Batch');
    }

    public function coursesOfferings(){
			return $this->hasMany('App\CourseOffering');
    }


}
