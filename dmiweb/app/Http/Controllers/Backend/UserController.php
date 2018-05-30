<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;

use App\Http\Requests\MediaRequest;
use App\Http\Requests\UserRequest;
use App\Post;
use App\User;

use Spatie\Permission\Models\Role;

class UserController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}
	/**
	 * Display a listing of Data.
	 **/
	public function index() {
		$users = User::latest('created_at')->paginate(20);
		return view('admin.user.index', compact('users'));
	}
	/**
	 * Create Data.
	 **/
	public function create() {
		$roles     = Role::all();
		return view('admin.user.add', compact('roles'));
	}
	/**
	 * Store Data.
	 **/
	public function store(UserRequest $request) {
		$this->createCreator($request);

		flash()->success('Your user has been created!');

		return redirect()->back();
	}
	/**
	 * Edit Data.
	 **/
	public function edit(User $user) {
		$roles     = Role::all();
		return view('admin.user.edit', compact('user', 'roles'));
	}
	/**
	 * Update Data.
	 **/
	public function update(UserRequest $request, User $user) {
		$user->update($request->all());
		$user->syncRoles([$request->role]);
		$user->update();

		flash()->success('Your user has been updated!');

		return redirect()->back();
	}
	/**
	 * Delete Data.
	 **/
	public function destroy($request) {
		User::find($request)->delete();
		Post::where('user_id', $request)->delete();
		return redirect()->back();
	}
	/**
	 * Delete Data.
	 **/
	private function createCreator(UserRequest $request) {
		$user = User::create($request->all());

		$user->password = bcrypt($request->password);
		$user->assignRole($request->role);
		$user->update();
		$image = $request->image_upload;
		if (!empty($image)) {
			$user->addMedia($image)->toMediaCollection('thumbnail');
		}
		return $user;

	}
	public function storemedia(MediaRequest $request, $id) {
		$user  = User::find($id);
		$image = $request->image_upload;
		if (!empty($image)) {
			$user->addMedia($image)->toMediaCollection('thumbnail');
		}
		return redirect()->back();
	}

}
