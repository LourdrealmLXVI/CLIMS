<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard','DashboardController@index')->name('dashboard');

Route::group(['prefix' => 'patients'],function(){
    Route::get('/','PatientController@patients')->name('patient.index');
    Route::get('/edit','PatientController@edit')->name('patient.edit');
    Route::get('/create','PatientController@create')->name('patient.create');

    Route::post('/create','PatientController@store')->name('patient.name');

    Route::post('/update','PatientController@update')->name('patient.update');
    Route::post('/delete','PatientController@delete')->name('patient.delete');
    
});
