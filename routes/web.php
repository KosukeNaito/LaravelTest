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

Route::get('/', function () {
    return view('child');
});

Route::get('test/{id}/{pass}', function ($id, $pass) {
    return $id . " " .$pass;
});

Route::get('test/{msg?}', function ($msg='no message.') {
    return $msg;
});

Route::get('hello/index', 'App\Http\Controllers\HelloController@index');

Route::get('hello/other', 'App\Http\Controllers\HelloController@other');

Route::get('action/{id?}/{pass?}', 'App\Http\Controllers\ActionController');

Route::get('ReqRes', 'App\Http\Controllers\ReqResController');