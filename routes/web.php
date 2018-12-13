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

Route::get('/translation/{id}', 'TranslationController@index');
Route::get('/send', 'SendController@index');
Route::post('/send', 'SendController@handle')->name('send');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/graph/', 'GraphController@index');
Route::get('/graph/get', 'GraphController@get');
