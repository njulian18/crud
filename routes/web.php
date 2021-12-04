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

// Route::get('/layout', function () {
//     return view('layout/app');
// });



Route::get('/','SubjectsController@index')->name('subjects');

##Create
Route::get('/create','SubjectsController@create')->name('subjects.create');
Route::post('/store','SubjectsController@store')->name('subjects.store');

##Update
Route::get('/{id}','SubjectsController@edit')->name('subjects.edit');
Route::post('/update/{id}','SubjectsController@update')->name('subjects.update');

##Delete
Route::get('/delete/{id}','SubjectsController@destroy')->name('subjects.delete');