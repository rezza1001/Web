<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Frontend\Controller;
use App\Http\Requests\MediaRequest;
use App\Http\Requests\PostRequest;

use App\User;
use App\Post;
use App\Category;
use Auth;

use Request;
use Response;

class PostController extends Controller {

	/**
	 * Post/Article
	 */
	public function index() {
		$posts = Post::latest('published_at')->simplePaginate(12);
		return view('app.post.index', compact('posts'));
	}
	public function view($slug) {
		$post = Post::findBySlug($slug);
		return view('app.post.view', compact('post'));
	}

}
