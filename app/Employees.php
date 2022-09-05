<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Employees extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'academic_years_id','name',  'gender',   'phone', 'id_card','join_date',
         'note', 'address', 'salary'
        
    ];


    public function expenses()
    {
        return $this->hasMany('App\Expenses');
    }

    
}



            
