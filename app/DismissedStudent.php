<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DismissedStudent extends Model
{
     protected $fillable = [
        'student_id',
        'number_of_semester_completed',
        'reason',
        'user_id'       
    ];

    public function student(){
    	return $this->belongsTo('App\Student');
    }
}
