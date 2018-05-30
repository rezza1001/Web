<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;

use App\Http\Requests\MediaRequest;
use App\Http\Requests\PageRequest;
use App\Page;

class PageController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}
	/**
	 * Display a listing of Data.
	 **/
	public function index() {
		$pages = Page::latest('created_at')->paginate(20);
		return view('admin.page.index', compact('pages'));
	}
	/**
	 * Create Data.
	 **/
	public function create() {
		return view('admin.page.add');
	}
	/**
	 * Store Data.
	 **/
	public function store(PageRequest $request) {
		$this->createPage($request);

		flash()->success('Your page has been created!');

		return redirect()->back();
	}
	/**
	 * Edit Data.
	 **/
	public function edit(Page $page) {
		return view('admin.page.edit', compact('page'));
	}
	/**
	 * Update Data.
	 **/
	public function update(PageRequest $request, Page $page) {
		$page->update($request->all());

		flash()->success('Page has been updated!');

		return redirect()->back();
	}
	/**
	 * Delete Data.
	 **/
	public function destroy($request) {
		Page::find($request)->delete();
		return redirect()->back();
	}
	/**
	 * Delete Data.
	 **/
	private function createPage(PageRequest $request) {
		$page = Page::create($request->all());

		$image = $request->image_upload;
		if (!empty($image)) {
			$page->addMedia($image)->withCustomProperties(['title' => $page->title, 'caption' => $page->title])->toMediaCollection('pages');
		}
		return $page;

	}
	public function storemedia(MediaRequest $request, $id) {
		$page  = Page::find($id);
		$image = $request->image_upload;
		if (!empty($image)) {
			$page->addMedia($image)->withCustomProperties(['title' => $page->title, 'caption' => $page->title])->toMediaCollection('pages');
		}
		return redirect()->back();
	}

}
