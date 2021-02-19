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


Route::get('admin', 'AdminController@index');


// User
Route::get('/', 'LandingController@index');
Route::get('/mitra', 'LandingController@mitra')->name('Mitra');
Route::get('/agen', 'LandingController@agen')->name('Agen');

// Auth Mitra


// Konsumen
Route::group(['prefix' => 'konsumen'], function () {
    // auth
    Route::get('/register', 'Konsumen\AuthKonsumenController@registerMitra')->name('register.konsumen');
    Route::get('/verification', 'Konsumen\AuthKonsumenController@verificationView')->name('verification.konsumen');
    Route::get('/login', 'Konsumen\AuthKonsumenController@loginKonsumen')->name('login.konsumen');

    //keranjang
    Route::get('/cart', 'Konsumen\KeranjangController@index')->name('cart.index');
});


// Produk Landing
Route::group(['prefix' => 'product'], function () {
    Route::get('/', 'ProdukController@listProduk')->name('produk');
    Route::get('/detail', 'ProdukController@detailProduk')->name('detail.produk');
});

//Mitra landing
Route::group(['prefix' => 'mitra'], function () {
    Route::get('/detail', 'LandingController@detailMitra')->name('detail.mitra');
    Route::get('/produk', 'LandingController@produkMitra')->name('produk.mitra');
    Route::get('/produk/favorite', 'LandingController@produkMitraFav')->name('produk.mitra.favorite');
    Route::get('/register', 'Mitra\AuthMitraController@registerMitra')->name('register.mitra');
    Route::get('/verification', 'Mitra\AuthMitraController@verificationView')->name('verification.mitra');
    Route::get('/login', 'Mitra\AuthMitraController@loginMitra')->name('login.mitra');
});



Route::group(['prefix' => 'checkout'], function () {
    Route::get('/', 'Konsumen\CheckoutController@index')->name('checkout');
    Route::get('/cities/{province_id}', 'Konsumen\CheckoutController@getCities');
});
