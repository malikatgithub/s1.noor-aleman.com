<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bus extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'name', 'fees', 'academic_years_id', 'note'
        
    ];

    protected $dates = ['deleted_at'];

    
    public function students(){
        return $this->hasMany('App\Student');
    }

   
    // Belongs
    public function academic_years(){
        return $this->belongsTo('App\AcademicYear');
    }
    
    
}
