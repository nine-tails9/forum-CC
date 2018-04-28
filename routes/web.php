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

Route::get('/create', 'QuestionController@index');

Route::post('/create', 'QuestionController@save');

Route::get('/forum', 'forum@home');

Route::get('/forum/{id}', 'forum@question');

Route::post('/forum/answer/{id}', 'AnswerController@create');

Route::post('/forum/comment/{id}', 'CommentController@create');

Route::post('/fetch/{id}', 'axios@update');
Route::post('/fetch2/{id}', 'axios@update2');
