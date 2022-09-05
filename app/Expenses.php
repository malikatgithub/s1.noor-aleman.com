<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expenses extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'exp_no','date','expense_owner', 'amount', 'expense_note',
        'created_by', 'deleted_by', 'updated_by', 'academic_years_id', 'teacher_id', 'employee_id'
        
    ];

    protected $dates = ['deleted_at'];


    public function teacher()
    {
        return $this->belongsTo('App\Teachers');
    }

    public function employee()
    {
        return $this->belongsTo('App\Employees');
    }

}
