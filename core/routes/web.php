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

    Route::name('user.')->group(function(){
        Route::get('user/profil','UserController@profil')->name('profil');
        Route::get('/ordering','UserController@profil')->name('pesanan');
    });

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

