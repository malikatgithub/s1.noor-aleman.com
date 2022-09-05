<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exams extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name','class_id', 'start_date', 'end_date', 'total_grade', 'exam_note','start_date', 'end_date','academic_years_id',
        
    ];

    protected $dates = ['deleted_at'];

    public function class(){
        return $this->belongsTo('App\SchoolClass');
    }


    public function academic_years(){
        return $this->belongsTo('App\AcademicYear');
    }
}
