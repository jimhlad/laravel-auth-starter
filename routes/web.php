<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

// Public (anyone)
Route::get('account/verify/{token}', 'AccountController@verify');
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

// User-only routes
Route::group(['middleware' => 'auth'], function () {
    
    Route::get('logout', 'Auth\LoginController@logout');

    // Display global alerts
    Route::group(['middleware' => 'alerts'], function () {
        Route::get('home', 'HomeController@index');
    });

});

// Guest-only routes
Route::group(['middleware' => 'guest'], function () {
    Route::get('/', 'Auth\RegisterController@showRegistrationForm');
});