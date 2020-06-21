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

Route::get('/', 'HomeController@index')->name('dashboard');
//Route::get('/home', 'HomeController@home')->name('home');
Route::prefix('data')->middleware(['auth', 'kecuali_role:mahasiswa'])->group(function () {
    Route::resource('user','UserController');
    Route::get('dosen', 'UserController@index_dosen')->name('data.dosen');
    Route::get('mahasiswa', 'UserController@index_mahasiswa')->name('data.mahasiswa');
    Route::resource('prodi','ProdiController');
    Route::resource('level-user','LevelUserController');
});
Route::prefix('manajemen')->middleware(['auth'])->group(function () {
    Route::resource('ta','TugasAkhirController');
    Route::resource('seminar-ta','SeminarTAController');
    Route::resource('sidang-ta','SidangTAController');
    Route::resource('yudisium','YudisiumController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
