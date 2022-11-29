<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EditJabatanController;
use App\Http\Controllers\Admin\EditJabatanPemimpinController;
use App\Http\Controllers\Pemimpin\EditPemimpinController;
use App\Http\Controllers\Pemimpin\IzinPemimpinController;
use App\Http\Controllers\Pemimpin\PemimpinController;
use App\Http\Controllers\User\EditUserController;
use App\Http\Controllers\User\IzinController;
use App\Http\Controllers\User\UserController;
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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
     //Middleware Admin
     Route::middleware(['admin'])->group(function () {
        Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin');
        Route::resource('admin/daftarpegawai', EditJabatanController::class);
        Route::resource('admin/daftarpemimpin', EditJabatanPemimpinController::class);
    });
    
    //Middleware Pemimpin
    Route::middleware(['pemimpin'])->group(function () {
        Route::get('pemimpin/dashboard', [PemimpinController::class, 'index'])->name('pemimpin');
        Route::resource('pemimpin/editpemimpin', EditPemimpinController::class);
        Route::get('pemimpin/izinterima', [PemimpinController::class, 'izinditerima'])->name('izinditerima');
        Route::resource('pemimpin/izinpemimpin', IzinPemimpinController::class);
        Route::get('pemimpin/izinditolak', [PemimpinController::class, 'izinditolak'])->name('izinditolak');
        Route::get('pemimpin/datapegawai', [PemimpinController::class, 'users'])->name('users');
    });

    //Middleware User
    Route::middleware(['user'])->group(function () {
        Route::get('user/dashboard', [UserController::class, 'index'])->name('user');
        Route::resource('user/edituser', EditUserController::class);
        Route::get('user/diterima', [UserController::class, 'izinditerima'])->name('diterima');
        Route::resource('user/izin', IzinController::class);
        Route::get('user/ditolak', [UserController::class, 'izinditolak'])->name('ditolak');
    });

Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
});