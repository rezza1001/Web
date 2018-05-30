<?php

use App\Category;
use App\Option;
use App\Page;
use App\Post;
use App\Subscribe;
use App\Location;
use App\User;
use Carbon\Carbon;
use Conner\Tagging\Model\Tag;
use Spatie\Medialibrary\Media;


function subscribed() {
	if (Auth::check()) {
		$email = Auth::user()->email;
		if (Subscribe::where('email', '=', $email)->where('status', '=', 1)->exists()) {
			return false;
		}
		return true;
	}
	return true;
}
function getLocation(){
	$locations = Location::latest('created_at')->get();
	return $locations;
}
function limitWord($str, $limit) {
	$word = Str::words($str, $limit, '...');
	return $word;
}

function humandate($date) {
	$date = Carbon::parse($date)->diffForHumans();
	return $date;
}

function formatdate($date) {
	$date = Carbon::parse($date)->format('d/m/y');
	return $date;
}

function formatdateday($date) {
	$date = Carbon::parse($date)->format('d/m/y');
	return $date;
}
function page() {
	$page = Page::latest('created_at')->get();
	return $page;
}

function category() {
	$categories = Category::latest('created_at')->where('parent_id', null)->get();
	return $categories;
}

function categorywidget($slug) {
	$categories = Category::findBySlug($slug);
	return $categories;
}

function getOption($title) {

	$option = Option::where('title', $title)->first();
	if ($option) {
		return $option->value;
	}
	return false;
}

function getAllMedia($limit) {
	$medias = Media::latest('created_at')->limit(20)->get();
	return $medias;
}

/**
 *  Upload Route For Backend
 */
function uploadRoute() {
	//2 -> get model
	//3 -> get ID
	$url = 'store-media-'.currentUrl(2).'/'.currentUrl(3);
	return $url;
}
/**
 *  Get Current Url
 */
function currentUrl($number) {
	$currentpage = Request::segment($number);
	return $currentpage;
}

// function getInstagram($intagramId){
// 	 $client = new \GuzzleHttp\Client;
// 	 $url = sprintf('https://www.instagram.com/%s/media',$intagramId);
//      $response = $client->get($url);
//      $items = json_decode((string) $response->getBody(), true)['items'];
//      $items = array_slice($items, 0, 9);
// 	return $intagramId;
// }