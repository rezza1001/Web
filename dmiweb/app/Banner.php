<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class Banner extends Model implements HasMedia, HasMediaConversions {
	use HasMediaTrait;

	protected $fillable = ['title', 'subtitle', 'url'];

	public function registerMediaConversions() {
		$this->addMediaConversion('small')
		     ->crop(Manipulations::CROP_CENTER, 300, 200)
			->performOnCollections('banners');

		$this->addMediaConversion('medium')
		     ->crop(Manipulations::CROP_CENTER, 1280, 600)
			->performOnCollections('banners');
	}

}
