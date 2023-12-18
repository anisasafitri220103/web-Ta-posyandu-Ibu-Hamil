<?php

use App\Http\Controllers\EdukasiController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Auth;
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

//kategori
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::get('/kategori/{id}/show', [KategoriController::class, 'show'])->name('kategori.show');
    Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::patch('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
    Route::delete('/kategori/destroy/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
    Route::delete('/kategori/{id_soal}/delete', [KategoriController::class, 'hapus'])->name('kategori.delete');

//edukasi //jurusan
        Route::get('/edukasi', [EdukasiController::class, 'index'])->name('edukasi.index');
        Route::get('/edukasi/create', [EdukasiController::class, 'create'])->name('edukasi.create');
        Route::get('/edukasi/{id}/show', [EdukasiController::class, 'show'])->name('edukasi.show');
        Route::get('/edukasi/{id}/edit', [EdukasiController::class, 'edit'])->name('edukasi.edit');
        Route::patch('/edukasi/{id}', [EdukasiController::class, 'update'])->name('edukasi.update');
        Route::post('/edukasi/store', [EdukasiController::class, 'store'])->name('edukasi.store');
        Route::delete('/edukasi/destroy/{id}', [EdukasiController::class, 'destroy'])->name('edukasi.destroy');