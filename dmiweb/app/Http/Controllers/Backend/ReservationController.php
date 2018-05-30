<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;

use App\Http\Requests\MediaRequest;
use App\Reservation;

class ReservationController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}
	/**
	 * Display a listing of Data.
	 **/
	public function index() {
		$reservations = Reservation::latest('created_at')->paginate(20);
		return view('admin.reservation.index', compact('reservations'));
	}
	/**
	 * Display a  Data.
	 **/
	public function show($reservation) {
		$reservation = Reservation::find($reservation);
		return view('admin.reservation.show', compact('reservation'));
	}
	/**
	 * Delete Data.
	 **/
	public function destroy($request) {
		Reservation::find($request)->delete();
		return redirect()->back();
	}

}
