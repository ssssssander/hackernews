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

Route::get('/', 'ArticlesController@index')->name('index');
Route::get('comments/{article}', 'ArticlesController@show')->name('show_article');

Route::get('article/add', 'ArticlesController@add')->name('add_article');
Route::post('article/add', 'ArticlesController@store')->name('store_article');

Route::get('article/edit/{article}', 'ArticlesController@edit')->name('edit_article');
Route::patch('article/edit/{article}', 'ArticlesController@update')->name('update_article');

Route::get('article/delete/{article}', 'ArticlesController@delete')->name('delete_article');
Route::delete('article/delete/{article}', 'ArticlesController@destroy')->name('destroy_article');
Route::post('/', 'ArticlesController@cancel_delete')->name('cancel_delete_article');

Route::patch('vote/up/{article}', 'ArticlesController@upvote')->name('upvote_article');
Route::patch('vote/down/{article}', 'ArticlesController@downvote')->name('downvote_article');

Route::post('comments/add/{article}', 'CommentsController@store')->name('store_comment');

Route::get('comments/edit/{comment}', 'CommentsController@edit')->name('edit_comment');
Route::patch('comments/edit/{comment}', 'CommentsController@update')->name('update_comment');

Auth::routes();
