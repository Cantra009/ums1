<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $fillable = [
        'name',
        'address'       
    ];
    
    public function classrooms(){
    	return $this->hasMany('App\Classroom');
    }

     
}
