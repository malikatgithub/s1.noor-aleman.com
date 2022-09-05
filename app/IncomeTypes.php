<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IncomeTypes extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'amount', 'income_note', 
        
    ];

    protected $dates = ['deleted_at'];

}
