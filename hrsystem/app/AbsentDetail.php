<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbsentDetail extends Model
{
    protected $table 	= 'absent_detail';
    // public $timestamps  = false;
    protected $fillable = [
     	'id','employee','check_in', 'check_out','status','note','absent_header',
    ];
}
