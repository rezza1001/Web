<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Frontend\Controller;
use App\Http\Requests\ReservationRequest;
use Illuminate\Support\Facades\DB;

use App\Product;
use App\ProductCategory;
use App\ProductType;
use App\ProductColor;
use App\ProductYear;
use App\Domisili;
use App\Reservation;
use Response;
use Mail;
use Carbon\Carbon;

class ProductController extends Controller {

	/**
	 * Post/Article
	 */
	public function index() {
		$categories = ProductCategory::latest('created_at')->limit(4)->get();
		$products = Product::latest('created_at')->simplePaginate(12);
		return view('app.product.index', compact('products','categories'));
	}

	public function view($slug) {
		$product = Product::findBySlug($slug);
		if($product){
			$categories = ProductCategory::latest('created_at')->limit(5)->get();
			$category = $product->categories->first();
			return view('app.product.view', compact('product','categories','category'));
		}
		return redirect('/');
	}

	public function category($slug) {
			$category = ProductCategory::findBySlug($slug);
		if($category){
			$categories = ProductCategory::latest('created_at')->limit(5)->get();
			$products = $category->products()->simplePaginate(12);
			$productLatest = $category->products()->latest('created_at')->first();
			return view('app.product.category', compact('products','categories','category','productLatest'));

		}
		return redirect('/');
	}

	public function shop() {
		$domisilies = Domisili::latest('created_at')->pluck('title','id');
		$products = Product::latest('created_at')->pluck('title','id');
		return view('app.product.shop', compact('domisilies','products'));
	}

	public function reservation(ReservationRequest $request) {

		$now             = Carbon::now();
		$datenow         = $now->format('YmdHis');
		$reservation = Reservation::create($request->all());
		if(!is_null($request->file('ktp'))){
			$file            = $request->file('ktp');
			$ktp      		 = $file->getClientOriginalName();
			$ktpname         = preg_replace('/\s+/', '', $ktp);
			$ktp        	 = $datenow.'_'.$ktpname;
			$destinationPath = public_path().'/uploads/ktp';
			$file->move($destinationPath, $ktp);
			$reservation->ktp = $ktp;
		}
		if(!is_null($request->file('npwp'))){
			$file            = $request->file('npwp');
			$npwp      		 = $file->getClientOriginalName();
			$npwpname         = preg_replace('/\s+/', '', $npwp);
			$npwp        	 = $datenow.'_'.$npwpname;
			$destinationPath = public_path().'/uploads/npwp';
			$file->move($destinationPath, $npwp);
			$reservation->npwp = $npwp;
		}
		$reservation->update();

		$contactemail = getOption('reservation_email');
		//royalenfield@distributormotor.com
		Mail::send('app.email.booking', compact('reservation'), function ($message) use ($contactemail) {
				$message->from('noreply.distributormotor@gmail.com', 'ORDER');
				$message->to($contactemail)->subject('ORDER');
			});

		flash()->success('Thank you, we will contact you as soon as possible');

		return redirect()->back();
	}

}
