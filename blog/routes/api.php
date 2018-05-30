<?php

use Illuminate\Http\Request;
Use App\Article;
Use App\Http\Controllers\ArticleController;
Use App\Http\Controllers\TransHeaderControler;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('arts', 'ArticleController@index');
Route::get('articles/{id}', 'ArticleController@show');
Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');

Route::post('check', 'TransHeaderControler@check');
Route::post('insertth', 'TransHeaderControler@store');
Route::get('ths', 'TransHeaderControler@index');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



