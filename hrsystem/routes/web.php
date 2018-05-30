<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware'=>'web'],function(){
	Auth::routes();
	Route::get('/','FrontendController@index');
	Route::get('/loginTest','Auth\LoginController@showLoginForm');
	Route::post('/loginCheck','Auth\LoginController@login');
	Route::get('/home', 'HomeController@dashboard');
	Route::get('/reportdetail', 'ReportController@detial');

	Route::resource('/employee', 'EmployeesController');
	Route::resource('/setting', 'Setting');
	Route::resource('/report', 'ReportController');
	Route::post('/status_list', 'ReportController@getStatus');
	Route::post('/employee_list', 'ReportController@getEmployees');
	Route::post('/edit_employee', 'EmployeesController@updateEmployee');
	Route::post('/register', 'RegisterEmployeeController@store');
	Route::post('/organization', 'OrganizationsController@index');
	Route::post('/add_organization', 'OrganizationsController@store');
	Route::post('/delete_organization', 'OrganizationsController@delete');
	Route::post('/detail_employee', 'EmployeesController@openDetail');
	Route::post('/worktime', 'WorkTimeController@show');
	Route::post('/update_worktime', 'WorkTimeController@update');
	Route::post('/workday','WorkDayController@show');
	Route::post('/update_workday','WorkDayController@store');	
	Route::post('/request_report','ReportController@getData');	
	Route::post('/absent_today','HomeController@getToday');
	Route::post('/absent_employees','HomeController@getEmployees');
	Route::post('/manual_status','HomeController@getAbsentStatus');
	Route::post('/manual_absent','AbsentController@manualAbsent');
	// detial

	/*Scheduler*/
	Route::get('/absent-scheduler','SchedulerController@createAbsent');
	Route::get('/absent-close','SchedulerController@closeAbsent');

});

	