<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;

use App\Category;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\MediaRequest;

class CategoryController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}
	public function index() {
		$categories   = Category::latest('created_at')->get();
		return view('admin.category.add', compact('categories'));
	}
	public function store(CategoryRequest $request) {
		$category = Category::create($request->all());
		$image    = $request->image_upload;
		if (!is_null($image)) {
			$category->addMedia($image)->withCustomProperties(['title' => $category->title, 'caption' => $category->title])->toMediaCollection('posts');
		}
		flash()->success('Your post has been created!');
		return redirect('/backend/categories/');
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function view($slug) {
		$category = Category::findBySlug($slug);
		$articles = $category->articles()->latest('published_at')->published()->paginate(10);
		return view('app.article.loop', compact('articles', 'category'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Category $category) {
		$countmedia = $category->getMedia()->count();
		if ($countmedia != 0) {
			$mediaItems = $category->getMedia();
			$model      = $mediaItems[0]->model_type;
			$media_id   = $mediaItems[0]->id;
		}
		$categoryList = Category::latest('created_at')->get();
		return view('admin.category.edit', compact('category', 'categoryList', 'media_id'));
	}

	public function storemedia(MediaRequest $request, $id) {
		$category = Category::find($id);
		$image    = $request->image_upload;
		$title    = $request->title;
		$caption  = $request->caption;
		if (!empty($image)) {
			$category->addMedia($image)->withCustomProperties(['title' => $title, 'caption' => $caption])->toMediaCollection('posts');
		}
		return redirect()->back();
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(CategoryRequest $request, Category $category) {
		$category->update($request->all());

		flash()->success('Category has been updated!');

		return redirect('/backend/categories/');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($request) {
		Category::find($request)->delete();
		return redirect('/backend/categories/');
	}
}
