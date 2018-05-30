<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;
use App\Http\Requests\ProductRequest;
use App\ProductColor;

class ProductColorController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}
	/**
	 * Display a listing of Data.
	 **/
	public function index() {
		$productcolors = ProductColor::latest('created_at')->paginate(20);
		return view('admin.productcolor.add', compact('productcolors'));
	}
	/**
	 * Create Data.
	 **/
	public function create() {
		return view('admin.productcolor.add');
	}
	/**
	 * Store Data.
	 **/
	public function store(ProductRequest $request) {
		$this->createProduct($request);

		flash()->success('Product Color has been created!');

		return redirect()->back();
	}
	/**
	 * Edit Data.
	 **/
	public function edit(ProductColor $productcolor) {
		return view('admin.productcolor.edit', compact('productcolor'));
	}
	/**
	 * Update Data.
	 **/
	public function update(ProductRequest $request, ProductColor $productcolor) {
		$productcolor->update($request->all());

		flash()->success('Product Color has been updated!');

		return redirect()->back();
	}
	/**
	 * Delete Data.
	 **/
	public function destroy($request) {
		ProductColor::find($request)->delete();
		return redirect()->back();
	}
	/**
	 * Delete Data.
	 **/
	private function createProduct(ProductRequest $request) {
		
		$productcolor = ProductColor::create($request->all());

		return $productcolor;

	}

}
