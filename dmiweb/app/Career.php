<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Spatie\Image\Manipulations;

class Career extends Model implements HasMedia, HasMediaConversions
{
  use Sluggable;
  use SluggableScopeHelpers;
  use HasMediaTrait;

  //slug
  public function sluggable(){
      return [
          'slug' => [
              'source' => 'title'
          ]
      ];
  }

  protected $fillable = ['title','slug','position','description'];



  public function registerMediaConversions() {
    $this->addMediaConversion('small')
         ->setManipulations(['w' => 250, 'h' => 250, 'fit' => 'crop', 'fm' => 'png'])
      ->format(Manipulations::FORMAT_PNG)
      ->performOnCollections('careers');

    $this->addMediaConversion('large')
         ->setManipulations(['w' => 1280, 'h' => 450, 'fit' => 'crop', 'fm' => 'png'])
      ->format(Manipulations::FORMAT_PNG)
      ->performOnCollections('careers');
  }

}
