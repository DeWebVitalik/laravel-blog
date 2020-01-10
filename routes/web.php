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
Route::get('/post/show/{id}', 'PostController@show');
Route::get('/posts/category/{category}', 'PostController@category');
Route::get('/post/add', 'PostController@add');
Route::get('/post/update/{id}', 'PostController@update');
Route::get('/post/delete/{id}', 'PostController@delete');
Route::post('/post/save/{id?}', 'PostController@save');