<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;

use App\Http\Requests\MediaRequest;
use App\Http\Requests\BannerRequest;
use App\Banner;

class BannerController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}
	/**
	 * Display a listing of Data.
	 **/
	public function index() {
		$banners = Banner::latest('created_at')->paginate(20);
		return view('admin.banner.index', compact('banners'));
	}
	/**
	 * Create Data.
	 **/
	public function create() {
		return view('admin.banner.add');
	}
	/**
	 * Store Data.
	 **/
	public function store(BannerRequest $request) {
		$this->createBanner($request);

		flash()->success('Your banner has been created!');

		return redirect()->back();
	}
	/**
	 * Edit Data.
	 **/
	public function edit(Banner $banner) {
		return view('admin.banner.edit', compact('banner'));
	}
	/**
	 * Update Data.
	 **/
	public function update(BannerRequest $request, Banner $banner) {
		$banner->update($request->all());

		flash()->success('Banner has been updated!');

		return redirect()->back();
	}
	/**
	 * Delete Data.
	 **/
	public function destroy($request) {
		Banner::find($request)->delete();
		return redirect()->back();
	}
	/**
	 * Delete Data.
	 **/
	private function createBanner(BannerRequest $request) {
		$banner = Banner::create($request->all());

		$image = $request->image_upload;
		if (!empty($image)) {
			$banner->addMedia($image)->withCustomProperties(['title' => $banner->title, 'caption' => $banner->title])->toMediaCollection('banners');
		}
		return $banner;

	}
	public function storemedia(MediaRequest $request, $id) {
		$banner  = Banner::find($id);
		$image = $request->image_upload;
		if (!empty($image)) {
			$banner->addMedia($image)->withCustomProperties(['title' => $banner->title, 'caption' => $banner->title])->toMediaCollection('banners');
		}
		return redirect()->back();
	}

}
