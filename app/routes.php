<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@getIndex');

Route::controller('user', 'UserController');
Route::controller('userrole', 'UserRoleController');
Route::controller('home', 'HomeController');
Route::controller('admin', 'AdminController');
Route::controller('vehicle', 'VehicleController');
Route::controller('reservation', 'ReservationController');
Route::controller('vehicleoption', 'VehicleOptionController');
Route::controller('review', 'ReviewController');