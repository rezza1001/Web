<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absent extends Model
{
    protected $table 	= 'absent_header';
    public $timestamps = false;
    protected $fillable = [
     	'id','work_date','work_day', 'work_month','work_year','work_time','status','note'
    ];

  
}
