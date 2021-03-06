<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\HelloMiddleware;
use App\Http\Middleware\HelloResMiddleware;

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

//view関数の戻り値はResponseインスタンス。テンプレートのレンダリング結果がコンテンツとして設定されている
Route::get('/', function () {
    return view('child');
});

Route::get('test/{id}/{pass}', function ($id, $pass) {
    return $id . " " .$pass;
});

Route::get('test/{msg?}', function ($msg='no message.') {
    return $msg;
});

Route::get('action/{id?}/{pass?}', 'App\Http\Controllers\ActionController');

Route::get('ReqRes', 'App\Http\Controllers\ReqResController');


//以下helloフォルダ

Route::get('hello/index', 'App\Http\Controllers\HelloController@index');
/*Route::get('hello/index', function() {
    return view('hello.index');
});*/

Route::get('hello/other', 'App\Http\Controllers\HelloController@other');

Route::get('hello/template/{id?}', 'App\Http\Controllers\HelloController@template');

Route::get('hello/blade', 'App\Http\Controllers\HelloController@blade');

Route::post('hello/post', 'App\Http\Controllers\HelloController@post');


//以下layoutsフォルダ

Route::get('layouts/index', function() {
    return view('layouts.index');
});

Route::get('components/index', function() {
    $data = [
        ['name'=>'山田太郎', 'mail'=>'taro@yamada'],
        ['name'=>'田中花子', 'mail'=>'hanako@flower'],
        ['name'=>'鈴木さちこ', 'mail'=>'sachiko@happy']
    ];
    return view('components/index', ['data'=>$data]);
});

//以下providerフォルダ
Route::get('provider/index', 'App\Http\Controllers\ProvideController@index');

Route::get('hello', 'App\Http\Controllers\HelloController@template')->middleware('helo');

//以下Validateフォルダ
Route::get('validate/index', 'App\Http\Controllers\ValidateController@queryValiPost');

Route::post('validate/index', 'App\Http\Controllers\ValidateController@valiPost');

Route::get('validate/index2', 'App\Http\Controllers\ValidateController@index2');

Route::post('validate/index2', 'App\Http\Controllers\ValidateController@post2');


//以下Cookie関係
Route::get('cookie', 'App\Http\Controllers\CookieController@index');

Route::post('cookie', 'App\Http\Controllers\CookieController@post');


//以下dbフォルダ
Route::get('db/index', 'App\Http\Controllers\DBController@index2');

Route::get('db/add', 'App\Http\Controllers\DBController@add');

Route::post('db/add', 'App\Http\Controllers\DBController@create');

Route::get('db/edit', 'App\Http\Controllers\DBController@edit');

Route::post('db/edit', 'App\Http\Controllers\DBController@update');

Route::get('db/del', 'App\Http\Controllers\DBController@del');

Route::post('db/del', 'App\Http\Controllers\DBController@remove');

Route::get('qbdb/index', 'App\Http\Controllers\DBController@qbIndex');

Route::get('qbdb/show', 'App\Http\Controllers\DBController@show');