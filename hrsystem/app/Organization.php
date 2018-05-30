<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $table 	= 'organizations';
    public $timestamps = false;
    protected $fillable = [
     	'id','name','description', 'level','parent',
    ];
}
