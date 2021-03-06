<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', ['as' => 'home', function () {
    return view('home');
}]);

Route::get('/faqs', ['as' => 'faqs', function () {
    return view('facts');
}]);

Route::get('/contact', ['as' => 'contact', function () {
    return view('contact');
}]);

Route::get('/sponsors', ['as' => 'sponsors', function () {
    return view('sponsors');
}]);

if (Setting::get('registrations') == "true") {
  Route::resource('register', 'RegistrationController');
}

//admin routes
Route::get('auth/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@getLogout']);

Route::group(['middleware' => 'auth'], function () {
	Route::resource('admin', 'AdminController');
  Route::resource('settings', 'SettingsController');
});
