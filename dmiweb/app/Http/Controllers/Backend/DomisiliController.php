<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;
use App\Http\Requests\DomisiliRequest;
use App\Domisili;

class DomisiliController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}
	/**
	 * Display a listing of Data.
	 **/
	public function index() {
		$domisilis = Domisili::latest('created_at')->paginate(20);
		return view('admin.domisili.index', compact('domisilis'));
	}
	/**
	 * Create Data.
	 **/
	public function create() {
		return view('admin.domisili.add');
	}
	/**
	 * Store Data.
	 **/
	public function store(DomisiliRequest $request) {
		$this->createDomisili($request);

		flash()->success('Domisili has been created!');

		return redirect()->back();
	}
	/**
	 * Edit Data.
	 **/
	public function edit(Domisili $domisili) {
		
		return view('admin.domisili.edit', compact('domisili'));
	}
	/**
	 * Update Data.
	 **/
	public function update(DomisiliRequest $request, Domisili $domisili) {
		$domisili->update($request->all());

		flash()->success('Domisili has been updated!');

		return redirect()->back();
	}
	/**
	 * Delete Data.
	 **/
	public function destroy($request) {
		Domisili::find($request)->delete();
		return redirect()->back();
	}
	/**
	 * Delete Data.
	 **/
	private function createDomisili(DomisiliRequest $request) {
		
		$domisili = Domisili::create($request->all());

		return $domisili;

	}

}
