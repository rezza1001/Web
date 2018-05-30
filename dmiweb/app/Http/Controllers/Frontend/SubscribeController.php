<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Frontend\Controller;

use App\Subscribe;

use Auth;
use Request;
use Response;

class SubscribeController extends Controller {

	public function subscribe() {
		if (Request::ajax()) {
			$email = $_POST['email'];
			if ($this->hasSubscribe($email)) {
				$data = array(
					'email'  => $email,
					'status' => 1,
				);
				return Response::json($data);
			}
			if ($this->hasUnSubscribe($email)) {
				$subscribe         = Subscribe::where('email', '=', $email)->first();
				$subscribe->status = 1;
				$subscribe->update();
				$data = array(
					'email'  => $email,
					'status' => 2,
				);
				return Response::json($data);
			}
			$subscribe         = new Subscribe;
			$subscribe->email  = $email;
			$subscribe->status = 1;
			$subscribe->save();

			$data = array(
				'email'  => $email,
				'status' => 2,
			);

			return Response::json($data);
		}
	}
	public function hasUnSubscribe($email) {
		if (Subscribe::where('email', '=', $email)->where('status', '=', 2)->exists()) {
			return true;
		} else {
			return false;
		}
	}

	public function hasSubscribe($email) {
		if (Subscribe::where('email', '=', $email)->where('status', '=', 1)->exists()) {
			return true;
		} else {
			return false;
		}
	}

	public function subscribed() {
		if (Request::ajax()) {

			$email = $_POST['email_user'];

			if ($this->hasSubscribe($email)) {
				$data = array(
					'email'  => $email,
					'status' => 1,
				);
				return Response::json($data);
			}

			if ($this->hasUnSubscribe($email)) {
				$subscribe         = Subscribe::where('email', '=', $email)->first();
				$subscribe->status = 1;
				$subscribe->update();
				$data = array(
					'email'  => $email,
					'status' => 2,
				);
				return Response::json($data);
			}

			$subscribe         = new Subscribe;
			$subscribe->email  = $email;
			$subscribe->status = 1;
			$subscribe->save();

			$data = array(
				'email'  => $email,
				'status' => 2,
			);

			return Response::json($data);
		}
	}

	public function unsubscribe() {
		if (Request::ajax()) {
			$message            = $_POST['message'];
			$user               = Auth::user();
			$email              = $user->email;
			$subscribe          = Subscribe::where('email', '=', $email)->first();
			$subscribe->message = $message;
			$subscribe->status  = 2;
			$subscribe->update();
			$data = array(
				'email'  => $email,
				'status' => 2,
			);
			return Response::json($data);
		}
	}
}
