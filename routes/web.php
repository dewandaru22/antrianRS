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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/perawat/{id?}', 'PeriksaController@index')->name('perawat.index');

Route::get('/perawat/{id}', 'PeriksaController@edit');
Route::put('/perawat/{id}', 'PeriksaController@update')->name('perawat.update');
Route::get('/perawat/store', 'PeriksaController@store');

// Route::resource('perawat','PeriksaController');

Route::get('/awal', function () {
     return view('websignage');
});

// Route::get('/perawat', function () {
//     return view('perawat/perawat');
// });

Route::get('/landing', function () {
    return view('base/home_page');
});

Route::get('/infoantrian', 'PeriksaController@infoAntrian')->name('antrian');

Route::get('/websignage/{id?}', 'PeriksaController@signage')->name('websignage');

Route::get('/signagePeriksa', function () {
    return view('/signagePeriksa');
});


Route::get('/changePassword', function(){
    return view('perawat/changePassword');
});

Route::post('/change-password', 'ChangePasswordController@store')->name('change.password');

Route::get('/naikAntrian/{id}', 'AntrianController@naik')->name('naik.antrian');

Route::get('/turunAntrian/{id}', 'AntrianController@turun')->name('turun.antrian');

Route::get('/selesaiAntrian/{id}', 'PeriksaController@done')->name('selesai.antrian');