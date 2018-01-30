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

//home page
Route::get('/', 'HomeController@index');

//auth routes
Auth::routes();


//auth middleware group

Route::middleware('auth')->group(function(){

//backend route
Route::get('/backend', 'BackendController@index');


Route::get('news/create', 'NewsController@create');
Route::post('news/create', 'NewsController@store');
Route::get('news/edit/{slug}', 'NewsController@edit');
Route::post('news/edit/{slug}', 'NewsController@update');
Route::get('news/delete/{slug}', 'NewsController@delete');

//event routes
Route::get('event/create', 'EventController@create');
Route::post('event/create', 'EventController@store');
Route::get('event/edit/{slug}', 'EventController@edit');
Route::post('event/edit/{slug}', 'EventController@update');
Route::get('event/delete/{slug}', 'EventController@delete');

Route::post('image/upload', 'ImageController@upload');

});

//news routes
Route::get('news/{slug}', 'NewsController@view'); //view news route

