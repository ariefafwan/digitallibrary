<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Pemimpin\PemimpinController;
use App\Http\Controllers\User\EditUserController;
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
    });
    
    //Middleware Pemimpin
    Route::middleware(['pemimpin'])->group(function () {
        Route::get('pemimpin/dashboard', [PemimpinController::class, 'index'])->name('pemimpin');
    });

    //Middleware User
    Route::middleware(['user'])->group(function () {
        Route::get('user/dashboard', [UserController::class, 'index'])->name('user');
        Route::resource('user/edituser', EditUserController::class);
    });

Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
});