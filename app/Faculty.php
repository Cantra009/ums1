<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
     protected $fillable = [
        'name',
        'level',
        'description',
        'user_id'        
    ];

    public function departments(){
    	return $this->hasMany('App\Department');
    }
}
