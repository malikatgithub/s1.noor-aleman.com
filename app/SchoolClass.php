<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolClass extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'name', 'capacity', 'class_note', 'academic_years_id'
        
    ];

    protected $dates = ['deleted_at'];

    
    public function students(){
        return $this->hasMany('App\Student');
    }

    public function exams(){
        return $this->hasMany('App\Exams');
    }
    

    public function fees_types(){
        return $this->hasMany('App\FeesTypes');
    }
 


    // Belongs
    public function academic_years(){
        return $this->belongsTo('App\AcademicYear');
    }
    
    
}
