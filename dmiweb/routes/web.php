<?php
//BACK END
Route::group(['prefix' => 'backend', 'middleware' => ['web', 'can:all']], function () {
		
		Route::get('/dashboard', 'Backend\DashboardController@index');
		Route::get('/', 'Backend\DashboardController@index');
		Route::get('/subscriber', 'Backend\DashboardController@subscriber');
		Route::get('/export', 'Backend\DashboardController@export');
		Route::get('search/post/', 'Backend\PostController@search');
		Route::post('/delete-selected-post', 'Backend\PostController@deleteSelected');
		Route::post('/delete-selected-comment', 'Backend\CommentController@deleteSelected');

		//USER & PERMISSION
		Route::resource('user', 'Backend\UserController');
		Route::post('/user/delete', 'Backend\UserController@delete');
		Route::resource('permission', 'Backend\PermissionController');
		Route::resource('role', 'Backend\RoleController');
		Route::post('role/give-permission', 'Backend\RoleController@givepermission');
		Route::post('role/user-permission', 'Backend\RoleController@usergivepermission');
		Route::post('role/user-role', 'Backend\RoleController@usergiverole');

		//MODULE
		Route::resource('page', 'Backend\PageController');
		Route::resource('categories', 'Backend\CategoryController');
		Route::resource('post', 'Backend\PostController');
		Route::resource('career', 'Backend\CareerController');
		Route::resource('inbox', 'Backend\InboxController');
		Route::resource('option', 'Backend\OptionController');
		Route::resource('banner', 'Backend\BannerController');
		Route::resource('location', 'Backend\LocationController');
		Route::resource('locationcategory', 'Backend\LocationCategoryController');
		Route::resource('product', 'Backend\ProductController');
		Route::resource('productcategory', 'Backend\ProductCategoryController');
		Route::resource('productcolor', 'Backend\ProductColorController');
		Route::resource('productyear', 'Backend\ProductYearController');
		Route::resource('domisili', 'Backend\DomisiliController');
		Route::resource('/reservation', 'Backend\ReservationController');

		//MEDIA MODULE
		Route::resource('media', 'Backend\MediaController');

		//MEDIA
		Route::post('/store-media-page/{id}', 'Backend\PageController@storemedia');
		Route::post('/store-media-categories/{id}', 'Backend\CategoryController@storemedia');
		Route::post('/store-media-post/{id}', 'Backend\PostController@storemedia');
		Route::post('/store-media-career/{id}', 'Backend\CareerController@storemedia');
		Route::post('/store-media-banner/{id}', 'Backend\BannerController@storemedia');
		Route::post('/store-media-product/{id}', 'Backend\ProductController@storemedia');
		Route::post('/store-media-productcategory/{id}', 'Backend\ProductCategoryController@storemedia');
		Route::post('/store-media-location/{id}', 'Backend\LocationController@storemedia');
		Route::post('/store-media', 'Backend\MediaController@storepost');
		Route::post('/destroy-media', 'Backend\MediaController@destroy');
		Route::post('/destroy-media-all', 'Backend\MediaController@delete');
		Route::post('/remove-media', 'Backend\MediaController@removeMedia');
		Route::post('/uploadimage', 'Backend\MediaController@uploadimage');
});
//FRONTEND
Route::group(['middleware' => 'web'], function () {
		Auth::routes();
		//BACKEND LOGIN
		Route::get('/backend/login', 'Auth\LoginController@showLoginForm');

		//FRONT END
		Route::get('/', 'Frontend\FrontendController@index');
		Route::get('/home', 'Frontend\FrontendController@index');

		//Products 
		Route::get('/products', 'Frontend\ProductController@index');
		Route::get('/products/{slug}', 'Frontend\ProductController@view');
		Route::get('/shop', 'Frontend\ProductController@shop');
		Route::post('/reservation', 'Frontend\ProductController@reservation');
		Route::get('/products/category/{slug}', 'Frontend\ProductController@category');
		//Search
		Route::get('/search', 'Frontend\FrontendController@search');

		//NEWS
		Route::get('/news/read/{slug}', 'Frontend\PostController@view');
		//Category
		Route::get('/news', 'Frontend\PostController@index');
		Route::get('/news/{category}', 'Frontend\CategoryController@view');

		//Location 
		Route::get('/locations', 'Frontend\LocationController@index');
		Route::get('/locations/{slug}', 'Frontend\LocationController@view');
		Route::get('/location', 'Frontend\LocationController@location');

		//Page
		Route::get('/page/{slug}', 'Frontend\PageController@page');
		Route::post('/send', 'Frontend\PageController@send');

		//Subscribed
		Route::post('/subscribe', 'Frontend\SubscribeController@subscribe');
		Route::post('/subscribed', 'Frontend\SubscribeController@subscribed');
		Route::post('/unsubscribe', 'Frontend\SubscribeController@unsubscribe');
	});

