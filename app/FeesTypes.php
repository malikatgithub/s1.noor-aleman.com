<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FeesTypes extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'amount', 'fees_note', 'class_id','fees_class','academic_years_id','date'
        
    ];

    protected $dates = ['deleted_at'];


    public function fees_types(){
        return $this->hasMany('App\Fees');
    }

    public function class_id(){
        return $this->belongsTo('App\SchoolClass');
    }

}
