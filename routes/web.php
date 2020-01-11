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
Route::get('/posts', 'PostController@index');
Route::get('/post/add', 'PostController@add');
Route::get('/post/update/{id}', 'PostController@update');
Route::get('/post/delete/{id}', 'PostController@delete');
Route::post('/post/save/{id?}', 'PostController@save');
Route::get('/post/{id}', 'PostController@show');

//Category routes
Route::get('/categories', 'CategoryController@index');
Route::get('/category/add', 'CategoryController@add');
Route::get('/category/update/{id}', 'CategoryController@update');
Route::post('/category/save/{id?}', 'CategoryController@save');
Route::get('/category/delete/{id}', 'CategoryController@delete');
Route::get('/category/{category}', 'CategoryController@posts')->name('showCategory');

//Comment
Route::post('/comment/category', 'CommentController@addCategoryComment')->name('addCategoryComment');
