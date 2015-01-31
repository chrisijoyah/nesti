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



Route::get('/', array('uses' => 'HomeController@index', 'as' => 'home'));
Route::get('/login', array('uses' => 'AuthenticationController@login', 'as' => 'login'));
Route::post('/login', array('uses' => 'AuthenticationController@handleLogin', 'as' => 'handle_login'));
Route::get('/logout', array('uses' => 'AuthenticationController@logout', 'as' => 'logout'));


Route::resource('listing', 'ListingController');
Route::post('/destroy-photo', array('uses' => 'ListingController@destroyPhoto', 'as' => 'destroy.photo'));
Route::resource('user', 'UserController');


Route::resource('bookmark', 'BookmarkController');


Route::get('/dashboard', array('uses' => 'DashboardController@index', 'as' => 'dashboard'));
Route::get('/users/search', array('uses' => 'SearchController@indexUsers', 'as' => 'users_search'));
Route::get('/inbox', array('uses' => 'InboxController@index', 'as' => 'inbox'));
Route::get('/search', array('uses' => 'SearchController@index', 'as' => 'search'));


Route::get('/signup', array('uses' => 'SignupController@getIndex', 'as' => 'signup.index'));
Route::post('/signup', array('uses' => 'SignupController@postIndex', 'as' => 'signup.create'));
Route::get('/activate/{activation_token}', array('uses' => 'SignupController@activate', 'as' => 'activate'));



Route::get('/settings', array('uses' => 'SettingsController@index', 'as' => 'settings'));






Route::get('/{page}', array('uses' => 'PageController@getPage', 'as' => 'page'));