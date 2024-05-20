<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;

// Menampilkan halaman welcome
Route::get('/', function () {
    return view('welcome');
});

// Redirect rute akar ke halaman daftar barang
Route::redirect('/','/barangs');

// Barang routes
Route::resource('barangs', BarangController::class);
Route::get('/barangs/create', [App\Http\Controllers\BarangController::class, 'create'])->name('barangs.create');


// Supplier routes
Route::resource('suppliers', SupplierController::class);


