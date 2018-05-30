<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{

	public static $SUPERUSER = '1'; 
	public static $ADMIN 	 = '2'; 
	public static $EMPLOYEE  = '2'; 

	protected $table = 'user_role';
    protected $fillable = [
     'id', 'user','role',
    ];
}
