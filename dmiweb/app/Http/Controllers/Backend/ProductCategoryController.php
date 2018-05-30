<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\MediaRequest;
use App\ProductCategory;

class ProductCategoryController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}
	/**
	 * Display a listing of Data.
	 **/
	public function index() {
		$productcategories = ProductCategory::latest('created_at')->paginate(20);
		return view('admin.productcategory.add', compact('productcategories'));
	}
	/**
	 * Create Data.
	 **/
	public function create() {
		return view('admin.productcategory.add');
	}
	/**
	 * Store Data.
	 **/
	public function store(ProductRequest $request) {
		$this->createPage($request);

		flash()->success('Your Category has been created!');

		return redirect()->back();
	}
	/**
	 * Edit Data.
	 **/
	public function edit(ProductCategory $productcategory) {
		return view('admin.productcategory.edit', compact('productcategory'));
	}
	/**
	 * Update Data.
	 **/
	public function update(ProductRequest $request, ProductCategory $productcategory) {
		$productcategory->update($request->all());

		flash()->success('Category has been updated!');

		return redirect()->back();
	}
	/**
	 * Delete Data.
	 **/
	public function destroy($request) {
		ProductCategory::find($request)->delete();
		return redirect()->back();
	}
	/**
	 * Delete Data.
	 **/
	private function createPage(ProductRequest $request) {
		
		$productcategory = ProductCategory::create($request->all());


		$image = $request->image_upload;
		if (!empty($image)) {
			$productcategory->addMedia($image)->withCustomProperties(['title' => $productcategory->title, 'caption' => $productcategory->title])->toMediaCollection('productcategorys');
		}
		return $productcategory;

	}
	/**
	 * STORE MEDIA
	 **/
	public function storemedia(MediaRequest $request, $id) {
		$productcategory  = ProductCategory::find($id);
		$image = $request->image_upload;
		if (!empty($image)) {
			$productcategory->addMedia($image)->withCustomProperties(['title' => $productcategory->title, 'caption' => $productcategory->title])->toMediaCollection('products');
		}
		return redirect()->back();
	}

}
