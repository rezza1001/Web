<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Frontend\Controller;

use App\Career;
use App\Page;
use App\Inbox;
use Mail;
use Request;
use Response;

class PageController extends Controller {
	/**
	 * Page
	 */
	public function page($slug) {
		$page = Page::findBySlug($slug);
		$careers = Career::latest('created_at')->get();
		if ($page) {
			return view('app.page.'.$page->type, compact('page','careers'));
		}
		return redirect('/');
	}
	public function send() {
		if (Request::ajax()) {
			$name    = $_POST['name'];
			$email   = $_POST['email'];
			$phone   = $_POST['phone'];
			$subject = $_POST['subject'];
			$message = $_POST['message'];

			$inbox          = new Inbox;
			$inbox->name    = $name;
			$inbox->email   = $email;
			$inbox->phone   = $phone;
			$inbox->subject = $subject;
			$inbox->message = $message;
			$inbox->save();

			$data = array('name' => $name,
				'email'             => $email,
				'phone'             => $phone,
				'subject'           => $subject,
				'message'           => $message,
			);

			$contactemail = getOption('contact_email');
			//royalenfield@distributormotor.com
			Mail::send('app.email.email', compact('data'), function ($message) use ($contactemail) {
					$inbox = Inbox::latest('created_at')->first();
					$message->from('noreply.distributormotor@gmail.com', 'CONTACT');
					$message->to($contactemail)->subject($inbox->subject);
				});

			return Response::json($data);
		}
	}
}
