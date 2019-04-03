<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = [
        'room_label',
        'dimensions',
        'campus_id'       
    ];

    public function campus(){
    	return $this->belongsTo('App\Campus');
    }

    public function sections(){
    	return $this->hasMany('App\Section');
    }

    
}
