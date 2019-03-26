<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'department_name',
        'department_code',
        'faculty_id'    
    ];

    public function faculty(){
    	return $this->belongsTo('App\Faculty');
    }
}
