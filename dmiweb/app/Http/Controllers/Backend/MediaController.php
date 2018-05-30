<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;
use App\Http\Requests\MediaRequest;

use DB;
use Redirect;
use Request;
use Response;

use Spatie\Medialibrary\Media;

class MediaController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}
	/**
	 * Display a listing of Data.
	 **/
	public function index() {
		$medias = Media::latest('created_at')->where('model_type', 'App\Album')->paginate(20);

		return view('admin.media.index', compact('medias'));
	}
	/**
	 * Create Data.
	 **/
	public function create() {
		$media     = new Media;
		$uploadurl = "store-media-media";

		return view('admin.media.add', compact('uploadurl', 'media'));
	}
	/**
	 * Store Data.
	 **/
	public function store(AlbumRequest $request) {
		$album = Album::find(1);
		$image = $request->image_upload;

		if (!empty($image)) {
			$album->addMedia($image)->withCustomProperties(['title' => $request->title, 'caption' => $request->caption])->toMediaCollection('thumbnail');
		}

		flash()->success('Your media has been created!');

		return redirect()->back();
	}
	/**
	 * Edit Data.
	 **/
	public function edit($media) {
		$media     = Media::find($media);
		$uploadurl = "store-media-media/$media->id";

		return view('admin.media.edit', compact('media', 'uploadurl'));
	}
	/**
	 * Update Data.
	 **/
	public function update(MediaRequest $request, $media) {
		$media = Media::find($media);

		$media->update();
		return redirect()->back();
	}
	/**
	 * Delete Data.
	 **/

	public function destroy() {
		if (Request::ajax()) {
			$data_id = $_POST['data_id'];
			$media = Media::find($data_id);
			$media->delete();
			return Response::json($data_id);
		}
	}
	public function removeMedia() {
		if (Request::ajax()) {
			$media_id   = $_POST['media_id'];
			$indexmedia = Media::find($media_id);
			$indexmedia->delete();
			return Response::json($media_id);
		}
	}
	public function delete() {
		if (Request::ajax()) {
			$data_id    = $_POST['media_id'];
			$media      = DB::table('media_post')->where('id', $data_id)->delete();
			$indexmedia = Media::find($data_id);
			$indexmedia->delete();
			return Response::json($data_id);
		}
	}

	/**
	 * Media Library.
	 **/

	public function storemedia(MediaRequest $request, $id) {
		$media = Media::find($id);

		$image = $request->image_upload;

		if (!empty($image)) {
			$media->addMedia($image)->withCustomProperties(['title' => $request->title, 'caption' => $request->caption])->toMediaCollection('thumbnail');
		}

		flash()->success('Your image has been updated!');

		return redirect()->back();
	}

	public function storepost() {
		if (Request::ajax()) {
			$post_id   = $_POST['post_id'];
			$media_id  = $_POST['media_id'];
			$array     = explode(",", $media_id);
			$arrlength = count($array);
			$date      = \Carbon\Carbon::now();
			for ($x = 0; $x < $arrlength; $x++) {
				DB::table('media_post')->insert(['media_id' => $array[$x], 'post_id' => $post_id, "created_at" => $date, "updated_at" => $date]);
			}
			$dataID = DB::table('media_post')->latest('created_at')->limit($arrlength)->get()->toArray();
			return Response::json($dataID);
		}
	}
	public function uploadimage() {
		if (Request::ajax()) {

			$postID  = $_POST['post_id'];
			$caption = $_POST['caption'];
			$title   = $_POST['title'];
			$image   = $_POST['image'];

			$album = Album::find(1);
			$date  = \Carbon\Carbon::now();
			$media = $album->addMediaFromBase64($image)->withCustomProperties(['title' => $title, 'caption' => $caption])->toMediaCollection('thumbnail');

			DB::table('media_post')->insert(['media_id' => $media->id, 'post_id' => $postID, "created_at" => $date, "updated_at" => $date]);
			$data = DB::table('media_post')->latest('created_at')->first();
			$arr  = array(
				'id'       => $data->id,
				'media_id' => $media->id,
				'post_id'  => $postID,
				'image'    => $image,
			);
			return Response::json($arr);
		}
	}

}
