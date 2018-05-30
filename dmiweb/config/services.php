<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, SparkPost and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	 */

	'mailgun' => [
		'domain' => env('MAILGUN_DOMAIN'),
		'secret' => env('MAILGUN_SECRET'),
	],

	'ses'     => [
		'key'    => env('SES_KEY'),
		'secret' => env('SES_SECRET'),
		'region' => 'us-east-1',
	],

	'sparkpost' => [
		'secret'   => env('SPARKPOST_SECRET'),
	],

	'stripe'  => [
		'model'  => App\User::class ,
		'key'    => env('STRIPE_KEY'),
		'secret' => env('STRIPE_SECRET'),
	],
	'facebook'       => [
		'client_id'     => '300460210385410',
		'client_secret' => 'b4681f8257fc6cc8e6aafa2745e0c9f4',
		'redirect'      => 'http://staging.breakingnews.co.id/callback/facebook',
	],
	'google'         => [
		'client_id'     => '237876536659-2hg2vdngh3mipn03o8e0pdp17os4925a.apps.googleusercontent.com',
		'client_secret' => 'rxru4cH460-vWkwfxKzgB2YV',
		'redirect'      => 'http://staging.breakingnews.co.id/callback/google',
	],

];
