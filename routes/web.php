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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
//      \UniSharp\LaravelFilemanager\Lfm::routes();
//  });

Auth::routes();

Route::get('/', 'PostController@home');
Route::resource('/posts','PostController');

Route::resource('/blogs','BlogController');
Route::get('/blogs/toggleStat/{id}', 'BlogController@toggleStat');

Route::resource('/gifts','GiftController');
Route::get('/gifts/toggleStat/{id}', 'GiftController@toggleStat');

Route::resource('/podcasts','PodcastController');
Route::get('/podcasts/toggleStat/{id}', 'PodcastController@toggleStat');

Route::resource('/subscribes','SubscribeController');

Route::resource('/videos','VideoController');
Route::get('/videos/toggleStat/{id}', 'VideoController@toggleStat');
