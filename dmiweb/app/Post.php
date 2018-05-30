<?php

namespace App;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class Post extends Model implements HasMediaConversions {
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

	protected $fillable = ['creator_id', 'serie_id', 'title', 'slug', 'keyword', 'type', 'video_id', 'fokus',
		'summary', 'description', 'featured', 'published_at', 'published', 'ticker', 'topnews'];

	public function registerMediaConversions() {
		$this->addMediaConversion('small')->crop(Manipulations::CROP_CENTER, 200, 200)->performOnCollections('posts');
		$this->addMediaConversion('medium')->crop(Manipulations::CROP_CENTER, 800, 600)->performOnCollections('posts');
		$this->addMediaConversion('large')->crop(Manipulations::CROP_CENTER, 1280, 450)->performOnCollections('posts');
	}

	public function comments() {
		return $this->hasMany('App\Comment');
	}

	public function scopePublished($query) {
		$query->where('published_at', '<=', Carbon::now());
	}

	public function scopeUnpublished($query) {
		$query->where('published_at', '>', Carbon::now());
	}

	public function setPublishedAtAttribute($date) {
		$this->attributes['published_at'] = Carbon::parse($date);
	}
	public function getPublishedAtAttribute($date) {
		return Carbon::parse($date)->format('Y-m-d h:i A');
	}

	public function user() {
		return $this->belongsTo('App\User');
	}

	public function categories() {
		return $this->belongsToMany('App\Category')->withTimestamps();
	}

	public function getCategoryListAttribute() {
		return $this->categories->pluck('id')->all();
	}

}
