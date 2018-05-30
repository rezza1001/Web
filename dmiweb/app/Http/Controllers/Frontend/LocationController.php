<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Frontend\Controller;

use App\Location;
use App\LocationCategory;
use Response;
use URL;

class LocationController extends Controller {

	/**
	 * INDEX
	 */
	public function index() {
		$categories = LocationCategory::latest('created_at')->limit(5)->get();
		return view('app.location.location', compact('categories'));
	}
	/**
	 * VIEW
	 */
	public function view($slug) {
		$categories = LocationCategory::latest('created_at')->limit(5)->get();
		$category = LocationCategory::findBySlug($slug);
		$locations = Location::where('location_category_id',$category->id)->get()->toArray();
		$locations = $this->mapLocation($locations);
		$locations = collect($locations)->toJson();
		return view('app.location.view', compact('categories','category','locations'));
	}
	public function location() {
		$locations = Location::latest('created_at')->get()->toArray();
		$locations = $this->mapLocation($locations);
		return Response::json($locations);
	}

	private function mapLocation($locations)
	{
		$locations = array_map(function($loc) {
				$category = LocationCategory::find($loc['location_category_id']);
			    return array(
			        'lon' => $loc['longitude'],
			        'lat' => $loc['latitude'],
			        'html'=> '<div class="address-box"><h4>'.$category->title.'</h4><h5>'.$loc['title'].'</h5>'.'<div class="address-content">'.$loc['address'].'</div></div>',
			        'zoom' => 15,
			        'title' => $loc['title'],
			        'icon' => URL::to('/').'/images/pointer.png',
			    );
			}, $locations);
		return $locations;
	}
}
