<?php

Route::get('dashboard', function() { return view('dashboard.index'); })->name('dashboard.index');
Route::get('dashboard/posts', function() { return view('dashboard.posts.index'); })->name('dashboard.posts.index');
Route::get('dashboard/users', function() { return view('dashboard.users.index'); })->name('dashboard.users.index');
Route::get('dashboard/categories', function() { return view('dashboard.categories.index'); })->name('dashboard.categories.index');
Route::get('dashboard/tags', function() { return view('dashboard.tags.index'); })->name('dashboard.tags.index');

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