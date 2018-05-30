<?php

use Illuminate\Http\Request;
use App\Controllers\LoginMobile;
use App\Controllers\EmployeesController;

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
Route::post('check_in', 'AbsentController@checkIn');
Route::post('absent_history', 'AbsentController@getHistory');
Route::post('check_out', 'AbsentController@checkOut');
Route::post('absent_today', 'AbsentController@getToday');
Route::post('get_longlat', 'AbsentController@getLongLat');
Route::post('login_mobile', 'LoginMobile@login');
Route::post('employee', 'EmployeesController@show');
Route::post('change_pasword', 'EmployeesController@changePassword');
Route::post('charge','MidtransController@charge');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
