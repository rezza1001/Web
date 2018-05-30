<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;

use App\Http\Requests\MediaRequest;
use App\Http\Requests\LocationCategoryRequest;
use App\LocationCategory;

class LocationCategoryController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}
	/**
	 * Display a listing of Data.
	 **/
	public function index() {
		$locations = LocationCategory::latest('created_at')->paginate(20);
		return view('admin.locationcategory.index', compact('locations'));
	}
	/**
	 * Create Data.
	 **/
	public function create() {
		return view('admin.locationcategory.add');
	}
	/**
	 * Store Data.
	 **/
	public function store(LocationCategoryRequest $request) {
		$this->createLocation($request);

		flash()->success('Your locationcategory has been created!');

		return redirect()->back();
	}
	/**
	 * Edit Data.
	 **/
	public function edit(LocationCategory $locationcategory) {
		return view('admin.locationcategory.edit', compact('locationcategory'));
	}
	/**
	 * Update Data.
	 **/
	public function update(LocationCategoryRequest $request, LocationCategory $locationcategory) {
		$locationcategory->update($request->all());

		flash()->success('LocationCategory has been updated!');

		return redirect()->back();
	}
	/**
	 * Delete Data.
	 **/
	public function destroy($request) {
		LocationCategory::find($request)->delete();
		return redirect()->back();
	}
	/**
	 * Delete Data.
	 **/
	private function createLocation(LocationCategoryRequest $request) {
		$locationcategory = LocationCategory::create($request->all());

		$image = $request->image_upload;
		if (!empty($image)) {
			$locationcategory->addMedia($image)->withCustomProperties(['title' => $locationcategory->title, 'caption' => $locationcategory->title])->toMediaCollection('locations');
		}
		return $locationcategory;

	}
	public function storemedia(MediaRequest $request, $id) {
		$locationcategory  = LocationCategory::find($id);
		$image = $request->image_upload;
		if (!empty($image)) {
			$locationcategory->addMedia($image)->withCustomProperties(['title' => $locationcategory->title, 'caption' => $locationcategory->title])->toMediaCollection('locations');
		}
		return redirect()->back();
	}

}
