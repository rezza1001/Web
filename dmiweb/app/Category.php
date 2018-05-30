<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class Category extends Model implements HasMedia, HasMediaConversions {
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
	protected $fillable = ['title', 'parent_id', 'slug', 'color', 'excerpt', 'keyword'];

	public function registerMediaConversions() {
		$this->addMediaConversion('small')->crop(Manipulations::CROP_CENTER, 200, 200)->performOnCollections('posts');
		$this->addMediaConversion('medium')->crop(Manipulations::CROP_CENTER, 800, 600)->performOnCollections('posts');
		$this->addMediaConversion('large')->crop(Manipulations::CROP_CENTER, 1280, 450)->performOnCollections('posts');
	}
	public function posts() {
		$post = $this->belongsToMany('App\Post')->latest();
		return $post;
	}

}
