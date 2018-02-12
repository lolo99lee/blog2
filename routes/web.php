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

Route::get('/', ['uses' => 'PagesController@getIndex', 'as' => 'welcome']);

Route::get('contact', 'PagesController@getContact');

Route::post('contact', 'PagesController@postContact');

Route::get('about', 'PagesController@getAbout');

Route::resource('posts', 'PostsController');

Route::resource('categories', 'CategoryController', ['except' => 'create']);

Route::resource('tags', 'TagController');

//Comments

Route::resource('comments', 'CommentsController');

Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);

Route::get('blog/{slug}', ['uses' => 'BlogController@getSingle', 'as' => 'blog.single']);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
