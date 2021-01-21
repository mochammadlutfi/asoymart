<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::namespace('Umum\API')->group(function(){
    Route::post('login', 'UserController@login');
    Route::post('register', 'UserController@register');
    Route::post('send_reset_link_email', 'UserController@sendResetLinkEmail');
    Route::get('user', 'UserController@user');
    Route::get('logout', 'UserController@logout');

    Route::get('/slides','SlideController@index');

    Route::group(['prefix' => 'kategori'], function () {
        Route::get('/','KategoriController@index');
        Route::get('/{id}','KategoriController@detail');
        Route::get('/produk/{id}','KategoriController@produk');
        Route::get('/toko/{id}','KategoriController@toko');
    });

    Route::get('produk/{id}','ProdukController@detail');

    // Route::get('toko/','@index');
    Route::group(['prefix' => 'toko'], function () {
        Route::get('/','TokoController@index');
        Route::get('/{id}','TokoController@detail');
        Route::get('/produk/{id}','TokoController@produk');
    });
});