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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::post('upload', 'ImageController@upload');
Route::get('image', 'ImageController@index');

// /helloアクションはログインが必須になっている(->middleware('auth'))
Route::get('/', 'TopController@index');
Route::get('privacy_poricy', 'TopController@privacy_poricy');
Route::get('terms_of_service', 'TopController@terms_of_service');
Route::get('join', 'JoinController@index');
Route::get('tmpRegist', 'TmpRegistController@index');

Route::get('user/login', 'UserController@login');

Route::post('user/login', 'UserController@auth');
Route::get('user/auth2', 'UserController@auth2');
Route::get('user/auth3', 'UserController@auth3');
Route::get('user/reset', 'UserController@reset');
Route::get('user/reset_send', 'UserController@reset_password');
Route::post('user/reset_password_send', 'UserController@reset_password_send');
Route::post('user/reset_send', 'UserController@reset_send');
Route::post('user/test_login', 'UserController@test_login');
Route::get('user/add', 'UserController@add');
Route::post('user/edit', 'UserController@edit');
Route::get('user/profile', 'UserController@profile');

Route::post('user/add', 'UserController@create');

Route::post('user/edit_detail', 'UserController@edit_detail');
Route::post('user/edit_detail_twitter', 'UserController@edit_detail_twitter');
Route::post('user/edit_detail_google', 'UserController@edit_detail_google');
Route::post('user/edit_detail_line', 'UserController@edit_detail_line');

Route::get('/auth/redirect', 'GoogleLoginController@getGoogleAuth');
Route::get('/login/callback', 'GoogleLoginController@authGoogleCallback');

Route::get('user/logout', 'UserController@logout')->name('logout');

Route::get('user/skip', 'UserController@skip');

Route::get('user/register', 'UserController@register');

Route::get('user/add_match', 'UserController@add_match');

Route::get('match/match', 'MatchController@index');
Route::get('match/match_user', 'MatchController@match_user');

Route::get('message/message', 'MessageController@index');
Route::get('message/add', 'MessageController@index');
Route::post('message/add', 'MessageController@add');

Route::get('message/message_top', 'Message_relationController@index');

Route::post('/ajax_message_process', 'MessageController@ajax_message_process');

Route::post('/ajax_match_process', 'MatchController@ajax_match_process');

Route::post('/ajax_flg', 'UserController@ajax_flg');

Route::post('/ajax_m_flg', 'UserController@ajax_m_flg');

Route::post('/ajax_unmatch_process', 'MatchController@ajax_unmatch_process');

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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/linelogin', 'LineLoginController@lineLogin');
Route::get('/callback', 'LineLoginController@callback');

Route::prefix('auth')->group(function () {
    Route::get('twitter', 'AuthController@login');
    Route::get('twitter/callback', 'AuthController@callback');
});

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
