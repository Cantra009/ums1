<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DropedCourse extends Model
{
    protected $fillable = [
        'semester_registration_id',
        'user_id'        
    ];

    public function semesterRegistration(){
    	return $this.belongsTo('App\SemesterRegistration');
    }

    public function user(){
    	return $this.belongsTo('App\User');
    }

    public function courses()
    {
        return $this->belongsToMany( 'App\Course', 'droped_courses_courses', 'droped_course_id', 'course_id' );
    }
}
