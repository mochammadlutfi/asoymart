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

Route::prefix('mitra')->name('mitra.')->namespace('Mitra')->group(function() {
    Route::middleware(['CheckIfMitra'])->group(function () {
        Route::get('/', 'PendaftaranController@getRegister')->name('daftar');
        Route::post('/daftar-1', 'PendaftaranController@step1')->name('daftarStep1');
        Route::post('/daftar-2', 'PendaftaranController@step2')->name('daftarStep2');
        Route::post('/daftar/cek-username', 'PendaftaranController@postCheckUsername')->name('postCheckUsername');
        Route::post('/daftar/cek-email', 'PendaftaranController@postCheckEmail')->name('postCheckEmail');
    });

    Route::get('/beranda','BerandaController@index')->name('beranda');
    Route::get('/getTotal','BerandaController@getTotal')->name('beranda.getTotal');

    Route::group(['prefix' => 'produk'], function () {
        Route::get('/','ProdukController@index')->name('produk');
        Route::get('/tambah','ProdukController@tambah')->name('produk.tambah');
        Route::post('/simpan','ProdukController@simpan')->name('produk.simpan');
        Route::get('/edit/{id}','ProdukController@edit')->name('produk.edit');
        Route::post('/update','ProdukController@update')->name('produk.update');
        Route::get('/hapus/{id}','ProdukController@hapus')->name('produk.hapus');
        Route::get('/json','ProdukController@json')->name('produk.json');
        Route::post('/add_variasi','VariasiController@add_variasi')->name('variasi_update');
        Route::post('/get_variasi','VariasiController@get_variasi')->name('variasi_get');
    });

    Route::group(['prefix' => 'penjualan'], function () {
        Route::get('/','PenjualanController@index')->name('order');
    });

});
