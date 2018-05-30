<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
	protected $table 	= 'employees';
    protected $fillable = [
     'user', 'name','gender','address', 'phone','alt_phone', 'phone','dob','npwp','organization','pob','email','no_id'
    ];


}
