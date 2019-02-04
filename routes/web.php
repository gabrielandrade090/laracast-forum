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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'threads'], function ()
{
    Route::get('', 'ThreadsController@index')->name('threads');
    Route::get('create', 'ThreadsController@create');
    Route::get('{thread}', 'ThreadsController@show');
    Route::post('', 'ThreadsController@store')->name('threads.store');
    Route::post('{thread}/replies', 'RepliesController@store');
});
