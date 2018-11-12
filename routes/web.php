<?php

// auth
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// posts
Route::get('/', 'PostController@index')->name('posts.index');
Route::get('/categories/{slug}', 'PostController@category')->name('posts.category');
Route::get('/tags/{slug}', 'PostController@tag')->name('posts.tag');
Route::get('/post/{slug}', 'PostController@show')->name('posts.show');
