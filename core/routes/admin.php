<?php

/* ----------------------- Admin Routes START -------------------------------- */

Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){
    Route::namespace('Auth')->group(function(){

        //Login Routes
        Route::get('/','LoginController@showLoginForm');
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login');
        Route::post('/logout','LoginController@logout')->name('logout');

        //Register Routes
        // Route::get('/register','RegisterController@showRegistrationForm')->name('register');
        // Route::post('/register','RegisterController@register');

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

    Route::get('/beranda','BerandaController@index')->name('beranda');

    Route::group(['prefix' => 'mitra'], function () {
        Route::get('/','MitraController@index')->name('mitra');
        Route::match(['get', 'post'], '/tambah', 'MitraController@index')->name('mitra.tambah');
        Route::get('/edit/{id}','MitraController@edit')->name('mitra.edit');
        Route::post('/update','MitraController@update')->name('mitra.update');
        Route::get('/hapus/{id}','MitraController@hapus')->name('mitra.hapus');

        Route::group(['prefix' => 'kategori'], function () {
            Route::get('/','BisnisKategoriController@index')->name('Bisniskategori');
            Route::post('/json','BisnisKategoriController@json')->name('Bisniskategori.json');
            Route::post('/simpan','BisnisKategoriController@simpan')->name('Bisniskategori.simpan');
            Route::get('/edit/{id}','BisnisKategoriController@edit')->name('Bisniskategori.edit');
            Route::post('/update','BisnisKategoriController@update')->name('Bisniskategori.update');
            Route::get('/hapus/{id}','BisnisKategoriController@hapus')->name('Bisniskategori.hapus');
        });
    });

    Route::group(['prefix' => 'kategori'], function () {
        Route::get('/','KategoriController@index')->name('kategori');
        Route::post('/json','KategoriController@json')->name('kategori.json');
        Route::get('/tree','KategoriController@tree')->name('kategori.tree');
        Route::post('/simpan','KategoriController@simpan')->name('kategori.simpan');
        Route::get('/edit/{id}','KategoriController@edit')->name('kategori.edit');
        Route::post('/update','KategoriController@update')->name('kategori.update');
        Route::get('/hapus/{id}','KategoriController@hapus')->name('kategori.hapus');
    });



});

/* ----------------------- Admin Routes END -------------------------------- */
