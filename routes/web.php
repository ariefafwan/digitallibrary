<?php

use App\Http\Controllers\Admin\AdminController;
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
        Route::resource('/admin', AdminController::class);
    });
    
    
    //Middleware User
    Route::middleware(['user'])->group(function () {
        Route::resource('/user', UserController::class);
    });

Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
});