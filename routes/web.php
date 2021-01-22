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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/admin', 'AdminController@index');
Route::get('admin', 'AdminController@index');


// User
Route::get('/', 'LandingController@index');
Route::get('/mitra', 'LandingController@mitra')->name('Mitra');
Route::get('/agen', 'LandingController@agen')->name('Agen');

// Auth Mitra
Route::get('/register/mitra', 'Mitra\AuthMitraController@registerMitra')->name('register.mitra');
Route::get('/verification/mitra', 'Mitra\AuthMitraController@verificationView')->name('verification.mitra');
Route::get('/login/mitra', 'Mitra\AuthMitraController@loginMitra')->name('login.mitra');

// Auth Konsumen
Route::get('/register/konsumen', 'Konsumen\AuthKonsumenController@registerMitra')->name('register.konsumen');
Route::get('/verification/konsumen', 'Konsumen\AuthKonsumenController@verificationView')->name('verification.konsumen');
Route::get('/login/konsumen', 'Konsumen\AuthKonsumenController@loginKonsumen')->name('login.konsumen');

