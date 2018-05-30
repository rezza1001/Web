<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class ProductCategory extends Model implements HasMedia, HasMediaConversions {
	use Sluggable;
	use SluggableScopeHelpers;
	use HasMediaTrait;

	//slug
	public function sluggable() {
		return [
			'slug'    => [
				'source' => 'title'
			]
		];
	}
	protected $fillable = ['title', 'slug', 'keyword', 'description'];
	

	public function registerMediaConversions() {
		$this->addMediaConversion('small')
		     ->crop(Manipulations::CROP_CENTER, 300, 200)
			 ->format(Manipulations::FORMAT_PNG)
			->performOnCollections('products');

		$this->addMediaConversion('medium')
		     ->crop(Manipulations::CROP_CENTER, 600, 400)
			->format(Manipulations::FORMAT_PNG)
			->performOnCollections('products');
	}
	
	public function products() {
		$products = $this->belongsToMany('App\Product')->latest();
		return $products;
	}

}
