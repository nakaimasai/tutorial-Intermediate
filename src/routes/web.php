<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/shops/1/lists', 'App\Http\Controllers\TasksController@index')->name('lists.index');

Route::get('/folders/tasks', 'App\Http\Controllers\TaskController@index')->name('tasks.index');

Route::get('/upload/upload', 'App\Http\Controllers\ImageController@upload')->name('upload.upload');

Route::get('/review/create', 'App\Http\Controllers\ReviewController@showCreateForm')->name('review.create');

Route::post('/review/confirm', 'App\Http\Controllers\ReviewController@create')->name('review.confirm');

Route::post('/review/complete', 'App\Http\Controllers\ReviewController@complete')->name('review.complete');

Auth::routes();

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

Route::post('/', 'App\Http\Controllers\HomeController@search')->name('home');

Route::get('/detail/{id}', 'App\Http\Controllers\HomeController@detail')->name('detail');

Route::post('/destroy/{id}', 'App\Http\Controllers\HomeController@destroy')->name('destroy');

Route::get('complete', 'App\Http\Controllers\HomeController@detail')->name('complete');
