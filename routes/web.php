<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name('home');

Auth::routes();

Route::resource('produk',ProdukController::class);

Route::resource('pelanggan',PelangganController::class);

Route::resource('kasir',KasirController::class);

Route::get('transaksi',[TransaksiController::class,'index'])->name('transaksi.index');
Route::post('transaksi/store',[TransaksiController::class,'store'])->name('transaksi.store');
Route::delete('transaksi/{id}',[TransaksiController::class,'destroy'])->name('transaksi.destroy');