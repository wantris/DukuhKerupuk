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

//Admin
Route::get('/admin', 'AdminController@index');
Route::get('/admin/data_admin', 'AdminController@data_admin')->name('data_admin');
Route::get('/admin/create_admin', 'AdminController@create_admin')->name('create_admin');
Route::post('/admin/simpan_admin', 'AdminController@store')->name('simpan_admin');
Route::get('/admin/edit_admin/{id_admin}', 'AdminController@edit_admin')->name('edit_admin');
Route::put('/admin/update_admin/{id_admin}', 'AdminController@update_admin')->name('update_admin');
Route::get('/admin/delete_admin/{id_admin}', 'AdminController@delete_admin')->name('delete_admin');


//user
Route::get('/admin/user/data_user', 'UserController@data_user')->name('data_user');
Route::get('/admin/user/create_user', 'UserController@create_user')->name('create_user');
Route::post('/admin/user/simpan_user', 'UserController@store')->name('simpan_user');
Route::get('/admin/user/edit_user/{id_admin}', 'UserController@edit_user')->name('edit_user');
Route::put('/admin/user/update_user/{id_admin}', 'UserController@update_user')->name('update_user');
Route::get('/admin/user/delete_user/{id_admin}', 'UserController@delete_user')->name('delete_user');


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

// //proses logout admin
// Route::get('logout', 'AdminController@logout');
