<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;

use App\Http\Requests\MediaRequest;
use App\Http\Requests\LocationRequest;
use App\Quiz;

class QuizController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}
	/**
	 * Display a listing of Data.
	 **/
	public function index() {
		$locations = Quiz::latest('created_at')->paginate(20);
		return view('admin.location.index', compact('locations'));
	}
	/**
	 * Create Data.
	 **/
	public function create() {
		return view('admin.location.add');
	}
	/**
	 * Store Data.
	 **/
	public function store(LocationRequest $request) {
		$this->createPage($request);

		flash()->success('Your location has been created!');

		return redirect()->back();
	}
	/**
	 * Edit Data.
	 **/
	public function edit(Quiz $location) {
		return view('admin.location.edit', compact('location'));
	}
	/**
	 * Update Data.
	 **/
	public function update(LocationRequest $request, Quiz $page) {
		$page->update($request->all());

		flash()->success('Quiz has been updated!');

		return redirect()->back();
	}
	/**
	 * Delete Data.
	 **/
	public function destroy($request) {
		Quiz::find($request)->delete();
		return redirect()->back();
	}
	/**
	 * Delete Data.
	 **/
	private function createPage(LocationRequest $request) {
		$page = Quiz::create($request->all());

		$image = $request->image_upload;
		if (!empty($image)) {
			$page->addMedia($image)->withCustomProperties(['title' => $page->title, 'caption' => $page->title])->toMediaCollection('locations');
		}
		return $page;

	}
	public function storemedia(MediaRequest $request, $id) {
		$page  = Quiz::find($id);
		$image = $request->image_upload;
		if (!empty($image)) {
			$page->addMedia($image)->withCustomProperties(['title' => $page->title, 'caption' => $page->title])->toMediaCollection('locations');
		}
		return redirect()->back();
	}

}
