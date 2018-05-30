<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Option extends Model 
{
  protected $fillable = ['title','value','status'];

}
