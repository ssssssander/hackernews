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

Route::get('/', 'ArticlesController@index');
Route::get('comments/{article}', 'ArticlesController@show');

Route::get('article/add', 'ArticlesController@add');
Route::post('article/add', 'ArticlesController@store');

Route::get('article/edit/{article}', 'ArticlesController@edit');
Route::patch('article/edit/{article}', 'ArticlesController@update');

Route::patch('vote/up/{article}', 'ArticlesController@upvote');
Route::patch('vote/down/{article}', 'ArticlesController@downvote');

Route::post('comments/add/{article}', 'CommentsController@store');

Route::get('comments/edit/{comment}', 'CommentsController@edit');
Route::patch('comments/edit/{comment}', 'CommentsController@update');

Auth::routes();