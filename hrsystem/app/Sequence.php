<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sequence extends Model
{
	public $timestamps = false;
    protected $table 	= 'sequence';
    protected $fillable = [
     'id', 'code','sqno'
    ];
}
