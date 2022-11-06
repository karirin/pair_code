<?php

use App\Http\Middleware\HelloMiddleware;
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

Route::post('upload', 'ImageController@upload');
Route::get('image', 'ImageController@index');

// /helloアクションはログインが必須になっている(->middleware('auth'))
Route::get('top', 'TopController@index');

Route::get('user/login', 'UserController@login');

Route::post('user/login', 'UserController@auth');
Route::post('user/test_login', 'UserController@test_login');
Route::get('user/add', 'UserController@add');
Route::post('user/edit', 'UserController@edit');

Route::post('user/add', 'UserController@create');

Route::get('user/logout', 'UserController@logout')->name('logout');

Route::get('person', 'PersonController@index');

Route::get('person/find', 'PersonController@find');
Route::post('person/find', 'PersonController@search');

Route::get('person/add', 'PersonController@add');
Route::post('person/add', 'PersonController@create');

Route::get('person/edit', 'PersonController@edit');
Route::post('person/edit', 'PersonController@update');

Route::get('person/del', 'PersonController@delete');
Route::post('person/del', 'PersonController@remove');

Route::get('board', 'BoardController@index');
Route::get('board/add', 'BoardController@add');
Route::post('board/add', 'BoardController@create');

Route::resource('rest', 'RestappController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::post('hello', 'HelloController@post');
// Route::get('hello', 'HelloController@index');

// Route::get('hello/show', 'HelloController@show');

// Route::get('hello/add', 'HelloController@add');
// Route::post('hello/add', 'HelloController@create');

// Route::get('hello/edit', 'HelloController@edit');
// Route::post('hello/edit', 'HelloController@update');

// Route::get('hello/del', 'HelloController@del');
// Route::post('hello/del', 'HelloController@remove');

// Route::get('hello/other', 'HelloController@other');

// Route::get('hello/auth', 'HelloController@getAuth');
// Route::post('hello/auth', 'HelloController@postAuth');

// Route::get('hello/rest', 'HelloController@rest');

// Route::get('hello/session', 'HelloController@ses_get');
// Route::post('hello/session', 'HelloController@ses_put');