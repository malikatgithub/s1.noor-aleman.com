<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Subjects extends Model
{
    
    use SoftDeletes;

    protected $fillable = [
        'name', 'class_id', 'teacher_id', 'academic_years_id'
        
    ];

    protected $dates = ['deleted_at'];

    
    public function teacher()
    {
        return $this->hasOne('App\teacher');
    }
    
}
