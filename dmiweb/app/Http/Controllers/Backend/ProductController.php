<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;

use App\Http\Requests\MediaRequest;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\ProductCategory;
use App\ProductType;
use App\ProductColor;
use App\ProductYear;

class ProductController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}
	/**
	 * Display a listing of Data.
	 **/
	public function index() {
		$products = Product::latest('created_at')->paginate(20);
		return view('admin.product.index', compact('products'));
	}
	/**
	 * Create Data.
	 **/
	public function create() {
		$ProductCategories = ProductCategory::latest('created_at')->pluck('title','id');
		$ProductColors = ProductColor::latest('created_at')->pluck('title','id');
		$ProductYears = ProductYear::latest('created_at')->pluck('title','id');
		return view('admin.product.add',compact('ProductColors','ProductYears','ProductCategories'));
	}
	/**
	 * Store Data.
	 **/
	public function store(ProductRequest $request) {
		$this->createPage($request);

		flash()->success('Your product has been created!');

		return redirect()->back();
	}
	/**
	 * Edit Data.
	 **/
	public function edit(Product $product) {
		$ProductCategories = ProductCategory::latest('created_at')->pluck('title','id');
		$ProductColors = ProductColor::latest('created_at')->pluck('title','id');
		$ProductYears = ProductYear::latest('created_at')->pluck('title','id');
		return view('admin.product.edit',compact('product','ProductTypes','ProductColors','ProductYears','ProductCategories'));

	}
	/**
	 * Update Data.
	 **/
	public function update(ProductRequest $request, Product $product) {
		$product->update($request->all());
		//Sync Category
		$categoryList = $request->input('categoryList');
		if (count($categoryList)) {
			$this->syncCategories($product, $categoryList);
		}
		//Sync Color
		$colorList = $request->input('colorList');
		if (count($colorList)) {
			$this->syncColors($product, $colorList);
		}
		//Sync Year
		$yearList = $request->input('yearList');
		if (count($yearList)) {
			$this->syncYears($product, $yearList);
		}

		$product->update();

		flash()->success('Product has been updated!');

		return redirect()->back();
	}
	/**
	 * Delete Data.
	 **/
	public function destroy($request) {
		Product::find($request)->delete();
		return redirect()->back();
	}
	/**
	 * Delete Data.
	 **/
	private function createPage(ProductRequest $request) {
		$product = Product::create($request->all());

		$image = $request->image_upload;
		if (!empty($image)) {
			$product->addMedia($image)->withCustomProperties(['title' => $product->title, 'caption' => $product->title])->toMediaCollection('products');
		}
		//Sync Category
		$categoryList = $request->input('categoryList');
		if (count($categoryList)) {
			$this->syncCategories($product, $categoryList);
		}
		//Sync Color
		$colorList = $request->input('colorList');
		if (count($colorList)) {
			$this->syncColors($product, $colorList);
		}
		//Sync Year
		$yearList = $request->input('yearList');
		if (count($yearList)) {
			$this->syncYears($product, $yearList);
		}

		return $product;

	}
	/**
	 * SYNC CATEGORY 
	 **/
	private function syncCategories(Product $product, array $categories) {
		$product->categories()->sync($categories);
	}
	/**
	 * SYNC COLOR 
	 **/
	private function syncColors(Product $product, array $colors) {
		$product->colors()->sync($colors);
	}
	/**
	 * SYNC YEARS 
	 **/
	private function syncYears(Product $product, array $years) {
		$product->years()->sync($years);
	}
	/**
	 * STORE MEDIA
	 **/
	public function storemedia(MediaRequest $request, $id) {
		$product  = Product::find($id);
		$image = $request->image_upload;
		if (!empty($image)) {
			$product->addMedia($image)->withCustomProperties(['title' => $product->title, 'caption' => $product->title])->toMediaCollection('products');
		}
		return redirect()->back();
	}

}
