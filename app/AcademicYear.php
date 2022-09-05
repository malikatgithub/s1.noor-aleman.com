<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicYear extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'start_date', 'end_date','status',
    ];

    protected $dates = ['deleted_at'];

    public function academic_year(){
        return $this->hasMany('App\Student');
    }

    public function academic_year_class(){
        return $this->hasMany('App\SchoolClass');
    }


    public function academic_year_exam(){
        return $this->hasMany('App\Exams');
    }

    public function Calender(){
        return $this->hasMany('App\Calender');
    }
}
