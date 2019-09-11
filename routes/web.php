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


// Route::get('/', 'TodoController@getIndex');

// Route::post('/add', 'TodoController@postAdd');

// Route::get('/done/{id}', 'TodoController@getDone');

// Route::put('/update/{id}', 'TodoController@postUpdate');

// Route::delete('/delete/{id}', 'TodoController@getDelete');


//photos Routes
Route::get('/all', 'PhotoController@getAll')->name('all_images');

Route::get('/', 'PhotoController@getIndex')->name('index_page');

Route::post('/', 'PhotoController@postIndex')->name('index_page_post');

Route::get('/snatch/{id}', 'PhotoController@getSnatch')->name('get_image_information')->where('id', '[0-9]+');

Route::get('/delete/{id}', 'PhotoController@getDelete')->name('delete_image')->where('id', '[0-9]+');


