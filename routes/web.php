<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CutiController;
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
    
     //Middleware Admin
     Route::middleware(['admin'])->group(function () {
        Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin');
        Route::get('admin/daftarmember', [AdminController::class, 'daftarmember'])->name('daftarmember');
        Route::get('admin/daftarmember/{id}/detail', [AdminController::class, 'detailmember'])->name('detailmember');
        Route::get('admin/daftarpegawai', [AdminController::class, 'daftarpegawai'])->name('daftarpegawai');
        Route::get('admin/daftarpegawai/{id}/detail', [AdminController::class, 'detailpegawai'])->name('detailpegawai');
        Route::get('admin/peminjaman', [AdminController::class, 'peminjaman'])->name('peminjaman');
        Route::get('admin/dendapinjam', [AdminController::class, 'dendapinjam'])->name('dendapinjam');
        Route::get('admin/laporanpinjam', [AdminController::class, 'laporanpinjam'])->name('laporanpinjam');
        Route::get('admin/editroles', [AdminController::class, 'editroles'])->name('roles');
        Route::post('admin/editroles/{id}/update', [AdminController::class, 'updaterole'])->name('updateroles');
        Route::post('admin/editroles/{id}/destroy', [AdminController::class, 'destroyrole'])->name('destroyroles');
        Route::resource('admin/cuti', CutiController::class);
        Route::get('admin/cutiditerima', [AdminController::class, 'cutiditerima'])->name('cutiditerima');
        Route::get('admin/cutiditolak', [AdminController::class, 'cutiditolak'])->name('cutiditolak');
    });
    
    //Middleware Pegawai
    Route::middleware(['pegawai'])->group(function () {
        Route::get('pegawai/dashboard', [PegawaiController::class, 'index'])->name('pegawai');
        Route::resource('pegawai/editpegawai', EditPegawaiController::class);
        Route::get('pegawai/izinterima', [PegawaiController::class, 'izinditerima'])->name('izinditerima');
        Route::resource('pegawai/izin', IzinPegawaiController::class);
        Route::get('pegawai/izinditolak', [PegawaiController::class, 'izinditolak'])->name('izinditolak');
        Route::resource('pegawai/pengarang', AuthorController::class);
        Route::resource('pegawai/penerbit', PenerbitController::class);
        Route::resource('pegawai/kategori', KategoriController::class);
        Route::resource('pegawai/book', BookController::class);
        Route::resource('pegawai/pinjam', PinjamController::class);
        Route::get('pegawai/denda', [PegawaiController::class, 'denda'])->name('denda');
        Route::get('pegawai/selesai', [PegawaiController::class, 'selesai'])->name('selesai');
    });

    //Middleware User
    Route::middleware(['user'])->group(function () {
        Route::get('user/dashboard', [UserController::class, 'index'])->name('user');
        Route::resource('user/member', MemberController::class);
        Route::get('user/record', [UserController::class, 'record'])->name('record');
    });

Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
});