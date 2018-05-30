<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;
use App\Http\Requests\ProductRequest;
use App\ProductYear;

class ProductYearController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}
	/**
	 * Display a listing of Data.
	 **/
	public function index() {
		$productyears = ProductYear::latest('created_at')->paginate(20);
		return view('admin.productyear.add', compact('productyears'));
	}
	/**
	 * Create Data.
	 **/
	public function create() {
		return view('admin.productyear.add');
	}
	/**
	 * Store Data.
	 **/
	public function store(ProductRequest $request) {
		$this->createProduct($request);

		flash()->success('Product Year has been created!');

		return redirect()->back();
	}
	/**
	 * Edit Data.
	 **/
	public function edit(ProductYear $productyear) {
		return view('admin.productyear.edit', compact('productyear'));
	}
	/**
	 * Update Data.
	 **/
	public function update(ProductRequest $request, ProductYear $productyear) {
		$productyear->update($request->all());

		flash()->success('Product Year has been updated!');

		return redirect()->back();
	}
	/**
	 * Delete Data.
	 **/
	public function destroy($request) {
		ProductYear::find($request)->delete();
		return redirect()->back();
	}
	/**
	 * Delete Data.
	 **/
	private function createProduct(ProductRequest $request) {
		
		$productyear = ProductYear::create($request->all());

		return $productyear;

	}

}
