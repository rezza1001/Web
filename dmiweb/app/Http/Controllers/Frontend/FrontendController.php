<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Frontend\Controller;
use App\Category;
use App\Post;
use App\Product;
use App\ProductCategory;
use App\Banner;
use Auth;

use DB;
use Request;
use Response;

class FrontendController extends Controller {

	/**
	 * Homepage
	 */
	public function index() {
		$banners = Banner::latest('created_at')->limit(5)->get();
		$products = ProductCategory::latest('created_at')->limit(4)->get();
		$posts = Post::latest('created_at')->limit(3)->get();
		return view('app.page.home',compact('banners','products','posts'));
	}
	/**
	 * Search
	 */
	public function search() {
		$categories = Category::latest('created_at')->get();
		$search     = \Request::get('search');//<-- we use global request to get the param of URI
		$posts      = Post::where('title', 'LIKE', '%'.$search.'%')->orWhere('description', 'LIKE', '%'.$search.'%')->latest('published_at')->published()->where('published', 1)->simplePaginate(12);
		$title      = $search;
		return view('app.post.search', compact('posts', 'title', 'categories'));
	}
}
