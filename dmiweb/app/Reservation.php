<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model 
{

  protected $fillable = ['user_id','product_id','domisili_id','name','email','phone','address','qty'];


	public function product() {
		return $this->belongsTo('App\Product');
	}

	public function domisili() {
		return $this->belongsTo('App\Domisili');
	}

	public function user() {
		return $this->belongsTo('App\User');
	}
}
