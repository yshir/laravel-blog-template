<?php

// auth
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/home', 'HomeController@index')->name('home');

// posts
Route::get('/', 'PostController@index')->name('posts.index');
Route::get('/categories/{slug}', 'PostController@category')->name('posts.category');
Route::get('/tags/{slug}', 'PostController@tag')->name('posts.tag');
Route::get('/post/{slug}', 'PostController@show')->name('posts.show');

// editor-higher
Route::group(['middleware' => ['auth', 'can:editor-higher']], function () {
  Route::get('/posts/create', 'PostController@create')->name('posts.create');
  Route::post('/posts/store', 'PostController@store')->name('posts.store');
  Route::get('/posts/edit', 'PostController@edit')->name('posts.edit');
});

// user-higher
Route::group(['middleware' => ['auth', 'can:user-higher']], function () {
  
});

// admin-higher
Route::group(['middleware' => ['auth', 'can:admin-higher']], function () {
  
});

// system-higher
Route::group(['middleware' => ['auth', 'can:system-higher']], function () {
  
});