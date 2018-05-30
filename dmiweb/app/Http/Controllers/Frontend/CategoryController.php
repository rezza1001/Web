<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Frontend\Controller;

use App\Category;

class CategoryController extends Controller {
	/**
	 * Category
	 */
	public function category($slug) {
		$category = Category::findBySlug($slug);
		if ($category) {
			$latest      = $category->posts()->latest('published_at')->where('published', 1)->simplePaginate(4);
			$headlines = $category->posts()->latest('published_at')->where('published', 1)->where('featured', 1)->limit(4)->get();
			if($category->slug == 'videos'){
				return view('app.post.videos', compact('latest', 'category','headlines'));
			}
			if(is_null($category->parent_id)){
				return view('app.post.category', compact('latest', 'category','headlines'));
			}else{
				return view('app.post.subcategory', compact('latest', 'category','headlines'));
			}
		}
		return redirect('/');
	}
	public function subcategory($slug, $subcategory) {
		$category = Category::findBySlug($slug);
		if ($category) {
			$category = $category->parents()->where('slug',$subcategory)->first();
			if(!$category){
				$category = Category::findBySlug($slug);
				$headlines = $category->posts()->latest('published_at')->where('type',$subcategory)->where('published', 1)->where('featured', 1)->limit(4)->get();
				$latest      = $category->posts()->latest('published_at')->where('type',$subcategory)->where('published', 1)->simplePaginate(4);
			}else{
				$headlines = $category->posts()->latest('published_at')->where('published', 1)->where('featured', 1)->limit(4)->get();
				$latest      = $category->posts()->latest('published_at')->where('published', 1)->simplePaginate(4);
			}
			return view('app.post.subcategory', compact('latest', 'category','headlines'));
		}
		return redirect('/');
	}
	public function allcategory() {
		$categories = Category::latest('created_at')->paginate(12);
		return view('app.post.all-category', compact('categories'));
	}
}
