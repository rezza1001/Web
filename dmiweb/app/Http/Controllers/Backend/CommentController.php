<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;

use App\Comment;
use Request;
use Response;

class CommentController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}
	/**
	 * Display a listing of Data.
	 **/
	public function index() {
		$comments = Comment::latest('created_at')->paginate(20);
		return view('admin.post.comment', compact('comments'));
	}
	/**
	 * Delete Data.
	 **/
	public function destroy($request) {
		Comment::find($request)->delete();
		return redirect()->back();
	}

	public function deleteSelected() {
		if (Request::ajax()) {
			$itemId = $_POST['itemId'];
			$dataID = explode(",", $itemId);
			Comment::whereIn('id', $dataID)->delete();
			return Response::json($dataID);
		}
	}
	/**
 * Delete Data.
 **/

}
