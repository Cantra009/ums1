<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
     protected $fillable = [
        'full_name',
        'id_no',
        'dob',
        'gender',
        'phone',
        'parent_name',
        'parent_phone',
        'photo',
        'department_id',
        'shift',
        'section_id', 
        'batch_id', 
        'scholarship',
        'status'  ,   
    ];

     public function department(){

        return $this->belongsTo('App\Department');
    }


    public function batch(){
            return $this->belongsTo('App\Batch');
    }

    public function section(){
            return $this->belongsTo('App\Section');
    }

    

}
