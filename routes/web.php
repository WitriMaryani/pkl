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
    return view('pages.dashboard');
});

Auth::routes();
Route::get('kejuruan/','KejuruanController@index');
Route::post('kejuruan/','KejuruanController@update');
Route::resource('kejuruan','KejuruanController');

Route::resource('subkejuruan','SubKejuruanController');
Route::resource('program','ProgramController');
Route::resource('peserta','PesertaController');

Route::get('/home', 'HomeController@index')->name('home');


