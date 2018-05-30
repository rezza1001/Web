<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class LocationCategory extends Model  {
	use Sluggable;
	use SluggableScopeHelpers;

	//slug
	public function sluggable() {
		return [
			'slug'    => [
				'source' => 'title'
			]
		];
	}
	protected $fillable = ['title', 'slug', 'description'];
	
	public function locations() {
		return $this->hasMany('App\Location');
	}

}
