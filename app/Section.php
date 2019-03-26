<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'section_name',
        'shift',
        'department_id',
        'batch_id'    
    ];
}
