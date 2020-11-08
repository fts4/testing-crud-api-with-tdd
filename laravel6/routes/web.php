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

Route::get('/tdd', function() {
    return view('welcome');
})->name('tdd');

Route::group(['prefix' => 'posts'], function() {
    Route::get('/', 'PostController@index')->name('posts');
    Route::get('/{post}', 'PostController@show')->name('posts.show');
    Route::post('/', 'PostController@store')->name('posts.store');
    Route::put('/{post}', 'PostController@update')->name('posts.update');
    Route::delete('/{post}', 'PostController@delete')->name('posts.delete');
});


