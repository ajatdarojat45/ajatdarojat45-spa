<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// backoffiec
// blogs
Route::resource('/blogs','BlogController');
Route::get('/blogs/toggleStat/{id}', 'BlogController@toggleStat');
// displayPicture
Route::resource('/displayPictures','DisplayPictureController');
Route::get('/displayPictures/toggleStat/{id}', 'DisplayPictureController@toggleStat');
// gifts
Route::resource('/gifts','GiftController');
Route::get('/gifts/toggleStat/{id}', 'GiftController@toggleStat');
// podcast
Route::resource('/podcasts','PodcastController');
Route::get('/podcasts/toggleStat/{id}', 'PodcastController@toggleStat');
// subscribe
Route::resource('/subscribes','SubscribeController');
// video
Route::resource('/videos','VideoController');
Route::get('/videos/toggleStat/{id}', 'VideoController@toggleStat');

// front office
// displayPicture
Route::get('/getDisplayPictureActive','DisplayPictureController@getDisplayPictureActive');
// blogs
Route::get('/getBlog/{slug}','BlogController@getBlog');
Route::get('/getBlogsActive','BlogController@getBlogActive');
// gifts
Route::get('/getGiftsActive','GiftController@getGiftsActive');
// podcast
Route::get('/getPodcastsActive','PodcastController@getPodcastsActive');
Route::get('/getPodcast/{slug}','PodcastController@getPodcast');
// video
Route::get('/getVideo/{slug}','VideoController@getVideo');
Route::get('/getVideosActive','VideoController@getVideosActive');
