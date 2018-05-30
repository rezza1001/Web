<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class educations extends Model
{
    protected $table 	= 'educations';
    protected $fillable = [
     	'id','degree','employee','school_name','major','start_year','end_year'
    ];
}
