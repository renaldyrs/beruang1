<?php

use Illuminate\Support\Facades\Route;

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
// Route::group(['middleware' => 'guest'], function () {
    

// });

//---------------------------------USER------------------------------------------------------------------------------

// Route::get('/viewbeli', 'App\HTTP\Controllers\HalamanAwalController@viewbeli');

// Route::get('/login1', 'App\HTTP\Controllers\HalamanAwalController@login1');
// ----------------------------------------------Customer-----------------------------------------------------------

Route::get('/','App\HTTP\Controllers\HalamanAwalController@viewawal' );
Route::get('/catalog','App\HTTP\Controllers\HalamanAwalController@catalog' );
Route::get('/keranjang','App\HTTP\Controllers\HalamanAwalController@keranjang' );
Route::get('/produk/{id}','App\HTTP\Controllers\HalamanAwalController@produk' );
Route::get('/profile','App\HTTP\Controllers\HalamanAwalController@profil' )->name('profile')->middleware('auth');
Route::get('/category/{id_category}', 'App\HTTP\Controllers\HalamanAwalController@category');
Route::get('/pembayaran', 'App\HTTP\Controllers\HalamanAwalController@pembayaran')->middleware('auth');
Route::get('/bayar', 'App\HTTP\Controllers\HalamanAwalController@bayar')->middleware('auth');
Route::get('/bayar/upload', 'App\HTTP\Controllers\HalamanAwalController@upload')->middleware('auth');

Route::get('/pembayaran/code', 'App\HTTP\Controllers\HalamanAwalController@code');
Route::post('/add-to-cart','App\HTTP\Controllers\CartController@add')->name('cart.add')->middleware('auth');
Route::get('/keranjang','App\HTTP\Controllers\CartController@index')->name('keranjang')->middleware('auth');
Route::get('/keranjang/change/{id}/{nilai}','App\HTTP\Controllers\CartController@change')->name('change')->middleware('auth');
Route::get('/keranjang/delete/{id}','App\HTTP\Controllers\CartController@delete')->name('delete')->middleware('auth');
Route::get('/keranjang/beli','App\HTTP\Controllers\CartController@beli')->name('beli')->middleware('auth');
Route::get('/checkout','App\HTTP\Controllers\CheckoutController@index')->name('checkout')->middleware('auth');
Route::get('/pengiriman','App\HTTP\Controllers\CheckoutController@pengiriman')->name('pengiriman')->middleware('auth');

Route::get('/getProvince','App\HTTP\Controllers\LocationController@getProvince')->name('provinsi');
Route::get('/getkota/{id}','App\HTTP\Controllers\LocationController@getkota')->name('kota');
Route::post('/getService','App\HTTP\Controllers\LocationController@getService')->name('rajaongkir.service');
Route::post('/getCost', 'App\HTTP\Controllers\LocationController@getCost')->name('rajaongkir.cost');
// Route::get('/tes','App\HTTP\Controllers\LocationController@getService');

//---------------------------------ADMIN------------------------------------------------------------------------------
Route::get('/adminbarang', 'App\HTTP\Controllers\AdminBarangController@adminbarang');
Route::post('/adminbarang/proses', 'App\HTTP\Controllers\AdminBarangController@proses_upload');
Route::get('/adminbarang/hapus/{id}', 'App\HTTP\Controllers\AdminBarangController@delete');
Route::get('/adminbarang/update/{id}', 'App\HTTP\Controllers\AdminBarangController@update');
Route::post('/adminbarang/update/proses/{id}', 'App\HTTP\Controllers\AdminBarangController@proses_update');

Route::get('/adminhome', 'App\HTTP\Controllers\AdminController@viewadminhome')->middleware(['role','auth']);
Route::get('/adminsupplier', 'App\HTTP\Controllers\AdminController@viewadminsup')->middleware(['role','auth']);
Route::get('/laporan', 'App\HTTP\Controllers\AdminController@laporan')->middleware(['role','auth']);

Route::get('/testing', function () {
    return view ('testing');
});



Route::get('/awal','App\HTTP\Controllers\UploadController@awal');

Route::get('/upload', 'App\HTTP\Controllers\UploadController@upload');
Route::post('/upload/proses', 'App\HTTP\Controllers\UploadController@proses_upload');


Route::get('home','App\HTTP\Controllers\HomeController@home');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

