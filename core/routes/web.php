<?php

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
/* --------------------- Common/User Routes START -------------------------------- */
// Route::get('/coba', function () {
// });
Route::namespace('Umum')->group(function(){
    Route::get('/', 'HomeController@index');
    Route::namespace('Auth')->group(function(){

        //Login Routes
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login')->name('loginPost');
        Route::post('/logout','LoginController@logout')->name('logout');

        //Register Routes
        Route::get('/register','RegisterController@index')->name('register');
        Route::post('/registerPost','RegisterController@proses')->name('registerPost');

        // //Forgot Password Routes
        // Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        // Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');

        // //Reset Password Routes
        // Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
        // Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');

        // // Email Verification Route(s)
        // Route::get('email/verify','VerificationController@show')->name('verification.notice');
        // Route::get('email/verify/{id}','VerificationController@verify')->name('verification.verify');
        // Route::get('email/resend','VerificationController@resend')->name('verification.resend');
    });

    Route::name('user.')->prefix('user')->group(function () {
        Route::get('/profil','UserController@profil')->name('profil');
        Route::get('/pembayaran','UserController@pembayaran')->name('pembayaran');
        Route::get('/ordering','UserController@pesanan')->name('pesanan');

        Route::group(['prefix' => 'alamat'], function () {
            Route::get('/','AlamatController@index')->name('alamat');
            Route::post('/simpan', 'AlamatController@simpan')->name('alamat.simpan');
            Route::get('/edit/{id}', 'AlamatController@edit')->name('alamat.edit');
            Route::post('/update', 'AlamatController@update')->name('alamat.update');
            Route::get('/hapus/{id}', 'AlamatController@hapus')->name('alamat.hapus');
        });
    });

    Route::group(['prefix' => 'cart'], function () {
        Route::get('/', 'CartController@index')->name('cart');
        Route::post('/nav-cart-items', 'CartController@updateNavCart')->name('cart.nav_cart');
        Route::post('/show-cart-modal', 'CartController@showCartModal')->name('cart.showCartModal');
        Route::post('/addtocart', 'CartController@addToCart')->name('cart.addToCart');
        Route::post('/removeFromCart', 'CartController@removeFromCart')->name('cart.removeFromCart');
        Route::post('/updateQuantity', 'CartController@updateQuantity')->name('cart.updateQuantity');
        Route::post('/checkout', 'CartController@checkout')->name('cart.checkout');
    });

    Route::post('/variant_price', 'ProdukController@variant_price')->name('variant_price');

    Route::post('/top-data', 'KategoriController@cartTop_data')->name('cart.top_data');
    Route::group(['prefix' => 'kategori'], function () {
        Route::post('/sub_kategori_json', 'KategoriController@sub_kategori_json')->name('kategori.sub_kategori_json');
    });

    Route::get('{seller}', 'SellerController@index')->name('seller');
    Route::get('{bisnis}/{produk}', 'ProdukController@detail')->name('produk.detail');
});


// Auth::routes([ 'verify' => true ]);

// Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

/* --------------------- Common/User Routes END -------------------------------- */

// Route::post('json/wilayah','GeneralController@wilayah')->name('wilayah.json');
// Route::post('json/getPos','GeneralController@getPos')->name('getPos.json');
// Route::post('json/kategori-bisnis','GeneralController@bisnisKategori')->name('bisnisKategori.json');

