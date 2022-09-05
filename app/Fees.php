<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fees extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'academic_years_id','reg_no','class_id', 'bill_no', 'date', 'doc','fees_note',
        'fees_types_id', 'amount', 'discount', 'paid','paid_method',
        'created_by', 'deleted_by', 'updated_by', 'student_id',
        
    ];

    protected $dates = ['deleted_at'];


    public function fees_types(){
        return $this->belongsTo('App\FeesTypes');
    }

    public function class_id(){
        return $this->hasMany('App\SchoolClass');
    }


    public function student_id(){
        return $this->belongsTo('App\Student');
    }



}


