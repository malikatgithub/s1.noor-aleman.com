<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Calender extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'academic_years_id','event', 'start_date', 'end_date', 'event_note',
        
    ];

    protected $dates = ['deleted_at'];


    public function academic_years(){
        return $this->belongsTo('App\AcademicYear');
    }


    
}
