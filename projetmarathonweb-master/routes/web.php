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

use App\Genre;
use App\Http\Resources\GenreResource;
use App\Http\Resources\SerieResource;
use App\Serie;

Auth::routes();


Route::get('/login', 'MainController@login')->name('login');
Route::get('/register', 'MainController@register')->name('register');


Route::get('/', 'MainController@index')->name('home');


Route::get('/series/{id}', 'MainController@find')->name('serie');
Route::get('/series', 'MainController@listAllSeries')->name('series');


Route::get('/series/{id}/comments', 'MainController@comments');

Route::get('/serie/{id}/modifieFilm', 'MainController@modifieFilm');

//Route::get('/series/{id}/createCom', 'MainController@createCom')->name('series.create');
//Route::get('/series/{series}/createCom', 'MainController@createCom');

Route::get('/comments/create/{idSerie}', 'CommentController@create')->name('comments.create');
Route::POST("/series", 'CommentController@store')->name('comments.store');

Route::POST("/series/{id}/modifieFilm", 'CommentController@update')->name('comments.update');

Route::get('/avis/create/{idSerie}', 'CommentController@create')->name('avis.create');
Route::POST("avis/store", 'CommentController@store')->name('avis.store');

Route::get('/user/{idUser}', 'userController@show')->name('user.show');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/activatedCom/{idCom}','CommentController@activateCom');
Route::get('/destroyCom/{idCom}','CommentController@destroyCom');
