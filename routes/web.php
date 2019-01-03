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
use App\Link;

Route::get('/', function () {
    //$links = Link::withAnyMachineTags('personal:family=fionn')->get();
    //print_r($links->pluck('title')->toArray());
    return view('welcome');
});
