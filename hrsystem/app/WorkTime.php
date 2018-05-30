<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkTime extends Model
{
    protected $table 	= 'work_time';
    protected $fillable = [
     	'id','work_start','work_end', 'note','max_late','exp_at'
}
