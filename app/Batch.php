<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
     protected $fillable = [
        'name',
        'start_year',
        'end_year'  ,
        'user_id'      
    ];

    public function students(){
    	return $this->hasMany('App\Student');
    }

    public function courseOfferings(){
    	return $this->hasMany('App\CourseOffering');
    }
}
