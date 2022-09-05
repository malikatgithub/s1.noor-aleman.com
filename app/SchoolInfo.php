<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SchoolInfo extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name_arabic', 'name_english', 'logo',
    ];

    protected $dates = ['deleted_at'];

}

