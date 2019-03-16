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

Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');

Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/create', 'QuestionController@index');

Route::post('/create', 'QuestionController@save');

Route::post('/updateQues/{id}', 'QuestionController@update');

Route::get('/forum', 'forum@home');

Route::get('/forum/{id}', 'forum@question');

Route::post('/forum/answer/{id}', 'AnswerController@create');

Route::post('/forum/comment/{id}', 'CommentController@create');

Route::post('/fetch/{id}/{id2}', 'axios@update');

Route::post('/fetch2/{id}/{id2}', 'axios@update2');

Route::get('/check/{id}', 'axios@check');


Route::post('/upvote/{id}', 'axios@upvote');

Route::post('/downvote/{id}', 'axios@downvote');

Route::get('pending', 'PendingAnsController@show');

Route::post('/approve/{id}', 'PendingAnsController@approve');


Route::post('/discard/{id}', 'PendingAnsController@discard');

Route::get('/myQues', 'QuestionController@myQues');


Route::get('/editQ/{id}', 'QuestionController@editQ');

Route::get('/search', 'QuestionController@tagSearch');

Route::get('/adminPanel', 'HomeController@admin')->middleware('adminCheck');

Route::post('/suspend/{id}', 'HomeController@suspend');

Route::post('/makeAdmin/{id}', 'HomeController@make');

Route::post('/bonus/{id}', 'HomeController@bonus');

Route::post('/active/{id}', 'HomeController@active');

Route::get('/notifications', 'MessageController@fetch')->middleware('auth');
