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

//Post routes
Route::get('/', 'PostController@index')->name('home');
Route::get('/post/add', 'PostController@add')->name('postAdd');
Route::get('/post/update/{id}', 'PostController@update')->name('postUpdate');
Route::get('/post/delete/{id}', 'PostController@delete')->name('postDelete');
Route::post('/post/save/{id?}', 'PostController@save')->name('postSave');
Route::get('/post/{id}', 'PostController@show')->name('postShow');

//Category routes
Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/category/add', 'CategoryController@add')->name('categoryAdd');
Route::get('/category/update/{id}', 'CategoryController@update')->name('categoryUpdate');
Route::post('/category/save/{id?}', 'CategoryController@save')->name('categorySave');
Route::get('/category/delete/{id}', 'CategoryController@delete')->name('categoryDelete');
Route::get('/category/{category}', 'CategoryController@posts')->name('categoryShow');

//Comment
Route::post('/comment/category', 'CommentController@addCategoryComment')->name('addCategoryComment');
Route::post('/comment/post', 'CommentController@addPostComment')->name('addPostComment');
