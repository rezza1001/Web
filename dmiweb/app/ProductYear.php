<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ProductYear extends Model {
	protected $fillable = ['title', 'options'];

	public function products() {
		$products = $this->belongsToMany('App\Product')->latest();
		return $products;
	}

}
