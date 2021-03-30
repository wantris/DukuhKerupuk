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


// Route::get('/admin/subscriber/', 'SubscriberController@data_user')->name('data_user');

// User
Route::get('/', 'LandingController@index')->name('index');
// Route::get('/mitra', 'LandingController@mitra')->name('Mitra');
// Route::get('/agen', 'LandingController@agen')->name('Agen');
Route::get('/contact', 'LandingController@contact')->name('contact');
Route::get('/mitra/landing', 'LandingController@mitra')->name('mitra.page');
Route::get('/konsumen/landing', 'LandingController@konsumen')->name('konsumen.page');
Route::post('/subscriber', 'SubscriberController@register')->name('subscriber.post');
// Auth Mitra


// Konsumen
Route::group(['prefix' => 'konsumen'], function () {
    // auth
    Route::get('/register',   'Konsumen\AuthKonsumenController@registerMitra')->name('register.konsumen');
    Route::post('/register',   'Konsumen\AuthKonsumenController@saveKonsumen')->name('register.konsumen.post');
    Route::get('/cities/{province_id}', 'Konsumen\CheckoutController@getCities');
    Route::get('/verification', 'Konsumen\AuthKonsumenController@verificationView')->name('verification.konsumen');
    Route::post('/verification', 'Konsumen\AuthKonsumenController@verify')->name('verification.konsumen.post');
    Route::get('/login', 'Konsumen\AuthKonsumenController@loginKonsumen')->name('login.konsumen');
    Route::post('/login', 'Auth\LoginController@login')->name('login.konsumen.post');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout.konsumen');

    // 
    Route::group(['middleware' => 'users'], function () {
        Route::get('/account/profil', 'Konsumen\KonsumenController@profile')->name('profile.konsumen');
        Route::post('/account/profil', 'Konsumen\KonsumenController@profileSave')->name('profile.konsumen.update');

        Route::get('/account/alamat', 'Konsumen\KonsumenController@address')->name('address.konsumen');
        Route::post('/account/alamat', 'Konsumen\KonsumenController@addressSave')->name('address.konsumen.save');
        Route::post('/account/alamat/change-status', 'Konsumen\KonsumenController@changeStatus')->name('address.konsumen.status.change');
        Route::get('/account/alamat/delete/{id}', 'Konsumen\KonsumenController@delete')->name('address.konsumen.delete');
        Route::post('/account/update', 'Konsumen\KonsumenController@addressUpdate')->name('address.konsumen.update');

        Route::get('/account/password', 'Konsumen\KonsumenController@changePassword')->name('password.konsumen');
        Route::get('/account/purchase/type/{type}', 'Konsumen\KonsumenController@purchase')->name('purchase.konsumen');
        Route::get('/account/purchase/detail/{kd}', 'Konsumen\KonsumenController@detailPesanan')->name('purchase.konsumen.detail');
        Route::patch('/account/purchase/finish/{kd}', 'Konsumen\KonsumenController@finishTrans')->name('purchase.konsumen.finish');
        Route::get('/account/cities/{province_id}', 'Konsumen\CheckoutController@getCities');
    });


    //keranjang
    Route::get('/cart', 'Konsumen\KeranjangController@index')->name('cart.index');
    Route::post('/cart/add', 'Konsumen\KeranjangController@save')->name('cart.save');
    Route::get('/cart/delete/{id}', 'Konsumen\KeranjangController@delete')->name('cart.delete');
    Route::post('/cart/delete-multiple', 'Konsumen\KeranjangController@deleteMultiple')->name('cart.delete.multiple');
    Route::post('/cart/promo', 'Konsumen\KeranjangController@addPromo')->name('cart.addpromo');
});


// Produk Landing
Route::group(['prefix' => 'product'], function () {
    Route::get('/kategori/{categories}', 'ProdukController@listProduk')->name('produk');
    Route::get('/detail/{slug}', 'ProdukController@detailProduk')->name('detail.produk');
    Route::get('/sort-by/{value}', 'ProdukController@sortBy')->name('produk.sort');
    Route::post('/search', 'ProdukController@search')->name('produk.search');
});

//Mitra landing
Route::group(['prefix' => 'mitra'], function () {
    Route::get('/detail', 'LandingController@detailMitra')->name('detail.mitra');
    Route::get('/produk', 'LandingController@produkMitra')->name('produk.mitra');
    Route::get('/produk/favorite', 'LandingController@produkMitraFav')->name('produk.mitra.favorite');

    // Auth
    Route::get('/register', 'Mitra\AuthMitraController@registerMitra')->name('register.mitra');
    Route::post('/register', 'Mitra\AuthMitraController@saveMitra')->name('register.mitra.post');
    Route::get('/verification', 'Mitra\AuthMitraController@verificationView')->name('verification.mitra');
    Route::post('/verification', 'Mitra\AuthMitraController@verify')->name('verify.mitra');
    Route::get('/login', 'Mitra\AuthMitraController@loginMitra')->name('login.mitra');
    Route::post('/post', 'Mitra\AuthMitraController@login')->name('login.mitra.post');
    Route::get('/logout', 'Mitra\AuthMitraController@logout')->name('mitra.logout');

    Route::group(['middleware' => 'mitra'], function () {
        Route::get('/portal', 'Mitra\MitraController@index')->name('portal.mitra');

        Route::get('/portal/produk/list', 'Mitra\ProductController@index')->name('portal.mitra.product.list');
        Route::get('/portal/produk/list/habis', 'Mitra\ProductController@habis')->name('portal.mitra.product.list.habis');
        Route::get('/portal/produk/list/arsip', 'Mitra\ProductController@arsip')->name('portal.mitra.product.list.arsip');
        Route::get('/portal/produk/add/', 'Mitra\ProductController@add')->name('portal.mitra.product.add');
        Route::post('/portal/produk/add/', 'Mitra\ProductController@save')->name('portal.mitra.product.save');
        Route::get('/portal/produk/edit/{slug}', 'Mitra\ProductController@edit')->name('portal.mitra.product.edit');
        Route::patch('/portal/produk/edit/{id}', 'Mitra\ProductController@update')->name('portal.mitra.product.update');
        Route::get('/portal/produk/delete/{id}', 'Mitra\ProductController@delete')->name('portal.mitra.product.delete');
        Route::post('/portal/produk/change-status', 'Mitra\ProductController@changeStatus')->name('portal.mitra.product.status');

        Route::get('/portal/promo/list/{type}', 'Mitra\PromoController@index')->name('portal.mitra.promo.list');
        Route::get('/portal/promo/add', 'Mitra\PromoController@create')->name('portal.mitra.promo.create');
        Route::post('/portal/promo/add', 'Mitra\PromoController@save')->name('portal.mitra.promo.save');
        Route::get('/portal/promo/edit/{id}', 'Mitra\PromoController@edit')->name('portal.mitra.promo.edit');
        Route::patch('/portal/promo/edit/{id}', 'Mitra\PromoController@update')->name('portal.mitra.promo.update');
        Route::get('/portal/promo/delete/{id}', 'Mitra\PromoController@delete')->name('portal.mitra.promo.delete');
        Route::post('/portal/promo/change-status', 'Mitra\PromoController@changeStatus')->name('portal.mitra.promo.status');

        Route::get('/portal/transaksi/list/{status}', 'Mitra\TransaksiController@index')->name('portal.mitra.trans.list');
        Route::patch('/portal/transaksi/change-status/{kd}', 'Mitra\TransaksiController@changeStatus')->name('portal.mitra.trans.status');
        Route::get('/portal/transaksi/detail/{kd}', 'Mitra\TransaksiController@detail')->name('portal.mitra.trans.detail');

        Route::get('/portal/transaksi/cod/{status}', 'Mitra\TransaksiController@getCod')->name('portal.mitra.trans.cod');
        Route::patch('/portal/transaksi/cod/change-status/{kd}', 'Mitra\TransaksiController@changeStatusCod')->name('portal.mitra.trans.status.cod');
    });
});



Route::group(['prefix' => 'checkout'], function () {
    Route::post('/create', 'Konsumen\CheckoutController@postCheckout')->name('checkout.post');
    Route::get('/cities/{province_id}', 'Konsumen\CheckoutController@getCities');
    Route::get('/{token}', 'Konsumen\CheckoutController@index');
    Route::post('/save', 'Konsumen\CheckoutController@saveCheckout')->name('checkout.save');
    Route::get('/bukti-transfer/{kd}', 'Konsumen\CheckoutController@getBukti')->name('checkout.bukti');
    Route::post('/bukti-transfer', 'Konsumen\CheckoutController@postBukti')->name('checkout.bukti.post');
    Route::get('/process/success', 'Konsumen\CheckoutController@success')->name('checkout.success');
    Route::get('/ubah-expired/{token}', 'Konsumen\CheckoutController@expired');
});
