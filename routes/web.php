<?php

// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
//      \UniSharp\LaravelFilemanager\Lfm::routes();
//  });

Auth::routes();

// Route::get('/', 'PostController@home');
// Route::resource('/posts','PostController');

Route::get('/', function () {
   return view('vueApp2');
})->name('home');

Route::group(['middleware' => 'auth'], function(){
   Route::get('/dashboard', function () {
       return view('vueApp');
   });
   Route::get('/home', function () {
       return redirect('/dashboard');
   });
});
