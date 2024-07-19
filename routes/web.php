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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('barang', App\Http\Controllers\BarangController::class);
Route::resource('barangmasuk', App\Http\Controllers\BarangmasukController::class);
Route::resource('barangkeluar', App\Http\Controllers\BarangkeluarController::class);
Route::resource('peminjaman', App\Http\Controllers\PinjamanController::class);
Route::resource('pengembalian', App\Http\Controllers\PengembalianController::class);


