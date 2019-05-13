<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
     protected $fillable = [
        'receipt',
        'student_id',
        'semester_id',
        'type',
        'credit',
        'debit',
        'additional',
        'discount',
        'refund',
        'balance',
        'deduction',
        'payment_method',
        'bank_receip',
        'remark', 
        'user_id',     
    ];

    public function student(){
        return $this->belongsTo('App\Student');
    }

    public function semester(){
            return $this->belongsTo('App\Semester');
    }

    public function user(){
            return $this->belongsTo('App\User');
    }
}
