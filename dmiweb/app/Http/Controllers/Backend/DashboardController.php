<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;

use App\Post;
use App\User;
use Auth;

class DashboardController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}
	public function index() {
		return view('admin.dashboard', compact('subscribes'));
	}
}
