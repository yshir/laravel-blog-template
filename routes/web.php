<?php

Route::prefix('dashboard')->namespace('Dashboard')->group(function() {
  // admin-higher
  Route::group(['middleware' => ['auth', 'can:admin-higher']], function () {
    Route::get('/users', 'UserController@index')->name('dashboard.users.index');
    Route::get('/users/create', 'UserController@create')->name('dashboard.users.create');
    Route::post('/users', 'UserController@store')->name('dashboard.users.store');
    Route::get('/users/edit/{id}', 'UserController@edit')->name('dashboard.users.edit');
    Route::put('/users/{id}', 'UserController@update')->name('dashboard.users.update');
    Route::delete('/users/{id}', 'UserController@destroy')->name('dashboard.users.destroy');
  });

  // user-higher
  Route::group(['middleware' => ['auth', 'can:editor-higher']], function () {
  });
  
  // editor-higher
  Route::group(['middleware' => ['auth', 'can:editor-higher']], function () {
    Route::get('/', function() { return view('dashboard.index'); })->name('dashboard.index');
    
    Route::get('/profile/edit', 'UserController@edit')->name('dashboard.profile.edit');

    Route::get('/posts', 'PostController@index')->name('dashboard.posts.index');
    // Route::get('/posts/show', 'PostController@show')->name('dashboard.posts.show');
    Route::get('/posts/create', 'PostController@create')->name('dashboard.posts.create');
    Route::post('/posts', 'PostController@store')->name('dashboard.posts.store');
    Route::get('/posts/edit/{id}', 'PostController@edit')->name('dashboard.posts.edit');
    Route::put('/posts/{id}', 'PostController@update')->name('dashboard.posts.update');
    Route::delete('/posts/{id}', 'PostController@destroy')->name('dashboard.posts.destroy');

    Route::get('/categories', 'CategoryController@index')->name('dashboard.categories.index');
    Route::get('/categories/create', 'CategoryController@create')->name('dashboard.categories.create');
    Route::post('/categories', 'CategoryController@store')->name('dashboard.categories.store');
    Route::get('/categories/edit/{id}', 'CategoryController@edit')->name('dashboard.categories.edit');
    Route::put('/categories/{id}', 'CategoryController@update')->name('dashboard.categories.update');
    Route::delete('/categories/{id}', 'CategoryController@destroy')->name('dashboard.categories.destroy');
    
    Route::get('/tags', 'TagController@index')->name('dashboard.tags.index');
    Route::get('/tags/create', 'TagController@create')->name('dashboard.tags.create');
    Route::post('/tags', 'TagController@store')->name('dashboard.tags.store');
    Route::get('/tags/edit/{id}', 'TagController@edit')->name('dashboard.tags.edit');
    Route::put('/tags/{id}', 'TagController@update')->name('dashboard.tags.update');
    Route::delete('/tags/{id}', 'TagController@destroy')->name('dashboard.tags.destroy');
  });

  // all-user
  Route::group(['middleware' => 'auth'], function () {
  });
});

// auth
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// posts
Route::get('/', 'PostController@index')->name('posts.index');
Route::get('/categories/{slug}', 'PostController@category')->name('posts.category');
Route::get('/tags/{slug}', 'PostController@tag')->name('posts.tag');
Route::get('/post/{slug}', 'PostController@show')->name('posts.show');