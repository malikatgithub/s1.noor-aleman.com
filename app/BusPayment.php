<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusPayment extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'bus_name', 'bus_type_id', 'fees', 'academic_year_id', 'reg_no', 'reg_no','bill_no','doc','fees_note','paid', 'amount', '_token', 'month', 'student_id'
    ];

    protected $dates = ['deleted_at'];

    


    public function student(){
        return $this->belongsTo('App\Student');
    }

   
    // Belongs
    public function academic_years(){
        return $this->belongsTo('App\AcademicYear');
    }

   
    
    
}
