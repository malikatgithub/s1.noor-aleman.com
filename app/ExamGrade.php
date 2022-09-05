<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExamGrade extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'academic_years_id','class_id', 'exam_id', 'subject_id', 'grade', 'std_id','total_grade',
        
    ];

    protected $dates = ['deleted_at'];
}


