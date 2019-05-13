<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'department_name',
        'department_code',
        'faculty_id'  ,
        'user_id'   
    ];

    public function faculty(){
    	return $this->belongsTo('App\Faculty');
    }

    public function instructors(){
    	return $this->hasMany('App\Instructor');
    }

     public function sections(){
    	return $this->hasMany('App\Section');
    }

    public function courseOfferings(){
        return $this->hasMany('App\CourseOffering');
    }
}
