<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EditJabatanController;
use App\Http\Controllers\Pegawai\Book\AuthorController;
use App\Http\Controllers\Pegawai\Book\BookController;
use App\Http\Controllers\Pegawai\Book\KategoriController;
use App\Http\Controllers\Pegawai\Book\PenerbitController;
use App\Http\Controllers\Pegawai\EditPegawaiController;
use App\Http\Controllers\Pegawai\IzinPegawaiController;
use App\Http\Controllers\Pegawai\PegawaiController;
use App\Http\Controllers\Pegawai\PinjamController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\MemberController;
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

Route::middleware(['auth'])->group(function () {

//umum

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/pengarang', AuthorController::class);
Route::resource('/penerbit', PenerbitController::class);
Route::resource('/kategori', KategoriController::class);
Route::resource('/book', BookController::class);
Route::resource('/pinjam', PinjamController::class);
Route::get('/denda', [PegawaiController::class, 'denda'])->name('denda');
Route::get('/selesai', [PegawaiController::class, 'selesai'])->name('selesai');
    
     //Middleware Admin
     Route::middleware(['admin'])->group(function () {
        Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin');
        Route::resource('admin/daftarpegawai', EditJabatanController::class);
    });
    
    //Middleware Pegawai
    Route::middleware(['pegawai'])->group(function () {
        Route::get('pegawai/dashboard', [PegawaiController::class, 'index'])->name('pegawai');
        Route::resource('pegawai/editpegawai', EditPegawaiController::class);
        Route::get('pegawai/izinterima', [PegawaiController::class, 'izinditerima'])->name('izinditerima');
        Route::resource('pegawai/izin', IzinPegawaiController::class);
        Route::get('pegawai/izinditolak', [PegawaiController::class, 'izinditolak'])->name('izinditolak');
    });

    //Middleware User
    Route::middleware(['user'])->group(function () {
        Route::get('user/dashboard', [UserController::class, 'index'])->name('user');
        Route::resource('user/member', MemberController::class);
        Route::get('user/record', [UserController::class, 'record'])->name('record');
    });

Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
});