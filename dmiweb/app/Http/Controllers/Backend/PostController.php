<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;

use Alaouy\Youtube\Youtube;
use App\Category;
use App\Comment;

use App\Http\Requests\MediaRequest;
use App\Http\Requests\PostRequest;
use App\Post;
use Auth;
use DB;
use Request;
use Response;

class PostController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}
	/**
	 * Display a listing of Data.
	 **/
	public function index() {
		$posts = Post::latest('created_at')->paginate(1000);
		return view('admin.post.index', compact('posts', 'filter'));
	}
	/**
	 * SEARCH POST
	 **/
	public function search() {
		$filter = 'draft-desc';
		$search = \Request::get('search');//<-- we use global request to get the param of URI
		$posts  = Post::where('title', 'LIKE', '%'.$search.'%')->latest('created_at')->paginate(20);
		return view('admin.post.index', compact('posts', 'filter'));
	}
	/**
	 * CREATE POST VIEW
	 **/
	public function create() {
		$categories   = Category::latest('created_at')->pluck('title','id');
		return view('admin.post.add', compact('categories'));
	}
	/**
	 * Store Data.
	 **/
	public function store(PostRequest $request) {
		$post = $this->createPost($request);
		if ($post) {
			flash() ->success('Your post has been created!');
			return redirect('backend/post/'.$post->id.'/edit');
		}
		flash()->warning('Youtube Not Found!');
		return redirect()->back();
	}
	/**
	 * Edit Data.
	 **/
	public function edit(Post $post) {
		
		$categories   = Category::latest('created_at')->pluck('title','id');
		return view('admin.post.edit', compact('post', 'categories'));
	}
	/**
	 * Update Data.
	 **/
	public function update(PostRequest $request, Post $post) {
		$post->update($request->all());
		if (empty($request->featured)) {
			$post->featured = NULL;
			$post->update();
		}

		$title       = str_replace("|", "-", $post->title);
		$post->title = $title;
		$post->update();

		if (!is_null($post->video_id)) {
			$youtube = $this->youtube($post->video_id);
			if ($youtube) {
				if (count($post->getMedia()) == 0) {
					$this->checkYoutubeImage($post, $youtube);			
				}
			}
		}

		$categoryList = $request->input('categoryList');
		if (count($categoryList)) {
			$this->syncCategories($post, $categoryList);
		}

		$post->update();

		flash()->success("Your post has been update! ");
		return redirect()->back();
	}
	/**
	 * DELETE DATA
	 **/
	public function destroy($request) {
		Post::find($request)->delete();
		flash()->warning('Your post has been delete!');
		return redirect()->back();
	}
	/**
	 * SYNC CATEGORY 
	 **/
	private function syncCategories(Post $post, array $categories) {
		$post->categories()->sync($categories);
	}

	/**
	 * CHECK YOUTUBE IMAGES API
	 **/
	private function checkYoutubeImage($post,$youtube) {
		if (isset($youtube->snippet->thumbnails->maxres->url) == true) {
			$image = $youtube->snippet->thumbnails->maxres->url;
			$media = $post->addMediaFromUrl($image)->withCustomProperties(['title' => $post->title, 'caption' => $post->title])->toMediaCollection('posts');

		}else{
			$imagestandard = $youtube->snippet->thumbnails->standard->url;
			$media         = $post->addMediaFromUrl($imagestandard)->withCustomProperties(['title' => $post->title, 'caption' => $post->title])->toMediaCollection('posts');
		}
	}

	/**
	 * CREATE POST
	 **/

	private function createPost(PostRequest $request) {
		$post = Auth::user()->posts()->create($request->all());

		$title         = str_replace("|", "-", $post->title);
		$post->title   = $title;
		$post->update();
		
		$categoryList = $request->input('categoryList');
		if (count($categoryList)) {
			$this->syncCategories($post, $categoryList);
		}

		if (!is_null($post->video_id)) {
			$youtube = $this->youtube($post->video_id);
			if ($youtube) {
				$tags = $request->tags;
				$post->tag($youtube->snippet->tags);// attach the tag
				$post->tag([$tags]);// attach the tag
				$this->checkYoutubeImage($post, $youtube);	
				return $post;
			}
			return false;
		}

		$image = $request->image_upload;
		if (!empty($image)) {
			$post->addMedia($image)->withCustomProperties(['title' => $request->caption, 'caption' => $request->caption])->toMediaCollection('posts');
		}

		return $post;

	}

	/**
	 * STORE MEDIA POST
	 **/

	public function storemedia(MediaRequest $request, $id) {
		$post = Post::find($id);
		$image = $request->image_upload;
		if (!empty($image)) {
			$media = $post->addMedia($image)->withCustomProperties(['title' => $request->title, 'caption' => $request->caption])->toMediaCollection('posts');
		}

		return redirect()->back();
	}

	/**
	 * GET YOUTUBE DATA
	 **/

	private function youtube($ytid) {

		$key      = env('YOUTUBE_KEY');
		$youtube  = new Youtube($key);
		$youtubes = $youtube->getVideoInfo($ytid);
		return $youtubes;
	}


}
