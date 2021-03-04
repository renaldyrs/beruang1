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
Route::get('/profile','App\HTTP\Controllers\HalamanAwalController@profile' );
Route::get('/category/{id_category}', 'App\HTTP\Controllers\HalamanAwalController@category');
Route::post('/add-to-cart','App\HTTP\Controllers\CartController@add')->name('cart.add')->middleware('auth');
Route::get('/keranjang','App\HTTP\Controllers\CartController@index')->name('keranjang')->middleware('auth');
Route::get('/keranjang/change/{id}/{nilai}','App\HTTP\Controllers\CartController@change')->name('change')->middleware('auth');
Route::get('/keranjang/delete/{id}','App\HTTP\Controllers\CartController@delete')->name('delete')->middleware('auth');

//---------------------------------ADMIN------------------------------------------------------------------------------
Route::get('/adminbarang', 'App\HTTP\Controllers\AdminBarangController@adminbarang');
Route::post('/adminbarang/proses', 'App\HTTP\Controllers\AdminBarangController@proses_upload');
Route::get('/adminbarang/hapus/{id}', 'App\HTTP\Controllers\AdminBarangController@delete');
Route::get('/adminbarang/update/{id}', 'App\HTTP\Controllers\AdminBarangController@update');
Route::post('/adminbarang/update/proses/{id}', 'App\HTTP\Controllers\AdminBarangController@proses_update');

Route::get('/adminhome', 'App\HTTP\Controllers\AdminController@viewadminhome')->middleware(['role','auth']);

Route::get('/testing', function () {
    return view ('testing');
});



Route::get('/awal','App\HTTP\Controllers\UploadController@awal');

Route::get('/upload', 'App\HTTP\Controllers\UploadController@upload');
Route::post('/upload/proses', 'App\HTTP\Controllers\UploadController@proses_upload');


Route::get('home','App\HTTP\Controllers\HomeController@home');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

