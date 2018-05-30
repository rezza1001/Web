<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;

use App\Career;

use App\Http\Requests\CareerRequest;
use App\Http\Requests\MediaRequest;

class CareerController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}
	/**
	 * Display a listing of Data.
	 **/
	public function index() {
		$careers = Career::latest('created_at')->paginate(20);
		return view('admin.career.index', compact('careers'));
	}
	/**
	 * Create Data.
	 **/
	public function create() {
		return view('admin.career.add');
	}
	/**
	 * Store Data.
	 **/
	public function store(CareerRequest $request) {
		$this->createCareer($request);

		flash()->success('Your career has been created!');

		return redirect()->back();
	}
	/**
	 * Edit Data.
	 **/
	public function edit(Career $career) {
		return view('admin.career.edit', compact('career'));
	}
	/**
	 * Update Data.
	 **/
	public function update(CareerRequest $request, Career $career) {
		$career->update($request->all());

		flash()->success('Your career has been updated!');

		return redirect()->back();
	}
	/**
	 * Delete Data.
	 **/
	public function destroy($request) {
		Career::find($request)->delete();

		flash()->warning('Your career has been deleted!');

		return redirect()->back();
	}
	/**
	 * Delete Data.
	 **/
	private function createCareer(CareerRequest $request) {
		$career = Career::create($request->all());

		$image = $request->image_upload;
		if (!empty($image)) {
			$media = $career->addMedia($image)->withCustomProperties(['title' => $request->title, 'caption' => $request->caption])->toMediaCollection('career');
		}
		return $career;

	}
	public function storemedia(MediaRequest $request, $id) {
		$career = Career::find($id);
		$image  = $request->image_upload;
		if (!empty($image)) {
			$media = $career->addMedia($image)->withCustomProperties(['title' => $request->title, 'caption' => $request->caption])->toMediaCollection('career');
		}
		return redirect()->back();
	}

}
