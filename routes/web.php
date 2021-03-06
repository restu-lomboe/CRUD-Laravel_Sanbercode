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

Route::get('/', function (){
    return view ('home');
});
Route::get('/data-tables', function (){
    return view ('data_table');
});

Route::get('/pertanyaan', 'PertanyaanController@index')->name('pertanyaan');
Route::get('/pertanyaan/create', 'PertanyaanController@create')->name('pertanyaan.create');
Route::post('/pertanyaan', 'PertanyaanController@post')->name('pertanyaan.post');
Route::get('/pertanyaan/{id}', 'PertanyaanController@detail')->name('pertanyaan.detail');
Route::get('/pertanyaan/{id}/edit', 'PertanyaanController@edit')->name('pertanyaan.edit');
Route::put('/pertanyaan/{id}', 'PertanyaanController@update')->name('pertanyaan.update');
Route::delete('/pertanyaan/{id}', 'PertanyaanController@delete')->name('pertanyaan.delete');

Route::get('/jawaban/{pertanyaan_id}', 'JawabanController@index')->name('jawaban');
Route::post('/jawaban/{pertanyaan_id}/post', 'JawabanController@post')->name('jawaban.post');

