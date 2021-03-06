<?php

use Illuminate\Support\Facades\Route;

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

// Rotte pubbliche
Route::get('/', 'PostController@index')->name('home'); //pageController@index
Route::get('/blog', 'PostController@index')->name('blog.index');
Route::get('/blog/{slug}', 'PostController@show')->name('single-post.show');
Route::get('/vue-blog', 'VueController@index')->name('vue-blog.index');

// Rotte Autenticazione
Auth::routes();

// Rotte area Admin
Route::middleware('auth')->namespace('Admin')->name('admin.')->prefix('admin')->group(function(){

    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('posts', 'PostController');
    Route::resource('categories', 'CategoryController');
    Route::resource('tags', 'TagController');
});
