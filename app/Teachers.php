<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Teachers extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'academic_years_id','name','qualification', 'dob', 'gender',  'email', 'phone', 'id_card','join_date',
        'pic', 'teacher_note', 'address', 'delete_pic', 'salary'
        
    ];

    protected $dates = ['deleted_at'];
    

    public function class(){
        return $this->belongsTo('App\SchoolClass');
    }
    

}



            
