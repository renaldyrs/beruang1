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

Route::get('/', function () {
    return view('welcome');
});
//---------------------------------USER------------------------------------------------------------------------------
Route::get('/viewawal', 'App\HTTP\Controllers\HalamanAwalController@viewawal');
Route::get('/viewbeli', 'App\HTTP\Controllers\HalamanAwalController@viewbeli');

Route::get('/login1', 'App\HTTP\Controllers\HalamanAwalController@login1');





//---------------------------------ADMIN------------------------------------------------------------------------------
Route::get('/adminbarang', 'App\HTTP\Controllers\AdminBarangController@adminbarang');
Route::post('/adminbarang/proses', 'App\HTTP\Controllers\AdminBarangController@proses_upload');
Route::get('/adminbarang/hapus/{id}', 'App\HTTP\Controllers\AdminBarangController@delete');

Route::get('/adminhome', 'App\HTTP\Controllers\AdminController@viewadminhome');





Route::get('/awal','App\HTTP\Controllers\UploadController@awal');

Route::get('/upload', 'App\HTTP\Controllers\UploadController@upload');
Route::post('/upload/proses', 'App\HTTP\Controllers\UploadController@proses_upload');

Route::get('/category','CategoryController@index');

Route::get('home','App\HTTP\Controllers\HomeController@home');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
