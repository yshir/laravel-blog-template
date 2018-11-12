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

// posts
Route::get('/', 'PostController@index')->name('posts.index');
Route::get('/categories/{slug}', 'PostController@category')->name('posts.category');
Route::get('/tags/{slug}', 'PostController@tag')->name('posts.tag');
Route::get('/post/{slug}', 'PostController@show')->name('posts.show');
