<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasMedia, HasMediaConversions {
	use Notifiable;
	use HasRoles;
	use Sluggable;
	use SluggableScopeHelpers;
	use HasMediaTrait;

	//slug
	public function sluggable() {
		return [
			'slug'    => [
				'source' => 'name'
			]
		];
	}

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'fullname', 'slug', 'email', 'password', 'gender', 'phone', 'age', 'address', 'twitter', 'instagram', 'facebook', 'google', 'linkedin',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function registerMediaConversions() {
		$this->addMediaConversion('small')->crop(Manipulations::CROP_CENTER, 250, 250)->performOnCollections('user');
		$this->addMediaConversion('large')->crop(Manipulations::CROP_CENTER, 400, 600)->performOnCollections('user');
	}
	public function posts() {
		return $this->hasMany('App\Post');
	}
}
