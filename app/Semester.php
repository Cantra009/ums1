<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
     protected $fillable = [
        'semester_name',
        'academic_year',
        'start_date',
        'end_date',
        'description',
            
    ];
}
