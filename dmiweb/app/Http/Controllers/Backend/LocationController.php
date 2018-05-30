<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;

use App\Http\Requests\MediaRequest;
use App\Http\Requests\LocationRequest;
use App\Location;
use App\LocationCategory;

class LocationController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}
	/**
	 * Display a listing of Data.
	 **/
	public function index() {
		$locations = Location::latest('created_at')->paginate(20);
		return view('admin.location.index', compact('locations'));
	}
	/**
	 * Create Data.
	 **/
	public function create() {
		$categories = LocationCategory::latest('created_at')->pluck('title','id');
		return view('admin.location.add',compact('categories'));
	}
	/**
	 * Store Data.
	 **/
	public function store(LocationRequest $request) {
		$this->createLocation($request);

		flash()->success('Your location has been created!');

		return redirect()->back();
	}
	/**
	 * Edit Data.
	 **/
	public function edit(Location $location) {
		$categories = LocationCategory::latest('created_at')->pluck('title','id');
		return view('admin.location.edit', compact('location','categories'));
	}
	/**
	 * Update Data.
	 **/
	public function update(LocationRequest $request, Location $location) {
		$location->update($request->all());

		flash()->success('Location has been updated!');

		return redirect()->back();
	}
	/**
	 * Delete Data.
	 **/
	public function destroy($request) {
		Location::find($request)->delete();
		return redirect()->back();
	}
	/**
	 * Delete Data.
	 **/
	private function createLocation(LocationRequest $request) {
		$location = Location::create($request->all());

		$image = $request->image_upload;
		if (!empty($image)) {
			$location->addMedia($image)->withCustomProperties(['title' => $location->title, 'caption' => $location->title])->toMediaCollection('locations');
		}
		return $location;

	}
	public function storemedia(MediaRequest $request, $id) {
		$location  = Location::find($id);
		$image = $request->image_upload;
		if (!empty($image)) {
			$location->addMedia($image)->withCustomProperties(['title' => $location->title, 'caption' => $location->title])->toMediaCollection('locations');
		}
		return redirect()->back();
	}

}
