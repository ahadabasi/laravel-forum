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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('threads', ['uses' => 'ThreadsController@index']);
Route::get('threads/create', ['uses' => 'ThreadsController@create']);
Route::get('threads/{channel}/{thread}', ['uses' => 'ThreadsController@show']);
Route::post('threads', ['uses' => 'ThreadsController@store']);

Route::post('threads/{channel}/{thread}/replies', 'RepliesController@store');

