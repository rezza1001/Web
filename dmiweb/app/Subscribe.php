<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model 
{

  protected $fillable = ['email','message'];

}
