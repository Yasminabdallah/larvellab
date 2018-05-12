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

Route::get('/', function () {
    return view('welcome');
});
Route::get(
    'posts',
    'PostsController@index'

)->name('posts.index');

Route::get('posts/create','PostsController@create')->middleware('auth');
Route::post('posts','PostsController@store');
Route::get('posts/{id}','PostsController@show')->name('posts.show');
Route::delete('posts/{id}','PostsController@destroy')->name('posts.destroy');
Route::get('posts/{id}/edit','PostsController@edit')->middleware('auth');
Route::put('posts/{post}','PostsController@update')->middleware('auth');

Auth::routes();
Route::get('/admin', 'SocializerController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');