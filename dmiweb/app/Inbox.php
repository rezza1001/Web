<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Inbox extends Model 
{

  protected $fillable = ['name','email','phone','option','subject','message'];

}
