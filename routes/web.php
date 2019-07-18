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
//Route::resource('links', 'LinkController');
Route::get('/import', 'LinkController@import');
//Route::get('/tagged/{machinetag}', 'TagController@index')->name('mtagged');
//Route::get('/tagged', 'TagController@list')->name('tags');
Route::get('/tagged/{machinetag}', 'DashboardController@list')->name('tagged');
Route::get('/', 'DashboardController@index')->name('dashboard');