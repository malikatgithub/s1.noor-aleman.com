<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'academic_years_id','name', 'dob', 'gender',  'relegion', 'blood', 'nationality','fa_name',
        'ma_name', 'fa_phone', 'address', 
        'reg_no', 'class_id', 'fees', 'std_note', 'pic',
        'reg_fees', 'bus_fees', 'fees_note', 'search','delete_pic',
    ];

    protected $dates = ['deleted_at'];
    


    public function class(){
        return $this->belongsTo('App\SchoolClass');
    }

    public function academic_years(){
        return $this->belongsTo('App\AcademicYear');
    }


    public function student_id(){
        return $this->hasMany('App\Fees');
    }




    /* for busPayment */ 
    public function students(){
        return $this->hasMany('App\BusPayment');
    }


}
