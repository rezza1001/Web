<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class WorkDay extends Model
{
	public $timestamps = false;
    protected $table 	= 'work_day';
    protected $fillable = [
     	'id','day_of_week','note',
    ];
}
