<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'gender',
        'type',
        'phone',
        'title',
        'qualification',
        'department_id'       
    ];

    public function department(){
        return $this->belongsTo('App\Department');
    }
}
