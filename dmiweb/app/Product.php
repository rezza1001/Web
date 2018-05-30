<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class Product extends Model implements HasMedia, HasMediaConversions {
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

	protected $fillable = ['title', 'slug', 'keyword', 'price','qty', 'summary', 'description'];

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
	// Category Relations
	public function categories() {
		return $this->belongsToMany('App\ProductCategory')->withTimestamps();
	}
	public function getCategoryListAttribute() {
		return $this->categories->pluck('id')->all();
	}
	// Color Relations
	public function colors() {
		return $this->belongsToMany('App\ProductColor')->withTimestamps();
	}
	public function getColorListAttribute() {
		return $this->colors->pluck('id')->all();
	}
	// Year Relations
	public function years() {
		return $this->belongsToMany('App\ProductYear')->withTimestamps();
	}
	public function getYearListAttribute() {
		return $this->years->pluck('id')->all();
	}
	public function getTypeListAttribute() {
		return $this->types->pluck('id')->all();
	}

}
