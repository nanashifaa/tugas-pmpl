<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenelitianController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

// Halaman utama → redirect ke login
Route::get('/', function () {
    return redirect('/login');
});

// Login
Route::get('/login',[LoginController::class,'showLoginForm'])->name('login');
Route::post('/login',[LoginController::class,'login']);
Route::post('/logout',[LoginController::class,'logout'])->name('logout');

// Dashboard
Route::get('/dashboard',[DashboardController::class,'index'])->middleware('auth')->name('dashboard');

// Penelitian CRUD
Route::middleware('auth')->group(function () {
    Route::get('/penelitian',              [PenelitianController::class, 'index'])->name('penelitian.index');
    Route::get('/penelitian/create',       [PenelitianController::class, 'create'])->name('penelitian.create');
    Route::post('/penelitian',             [PenelitianController::class, 'store'])->name('penelitian.store');
    Route::get('/penelitian/{id}/edit',    [PenelitianController::class, 'edit'])->name('penelitian.edit');
    Route::put('/penelitian/{id}',         [PenelitianController::class, 'update'])->name('penelitian.update');
    Route::delete('/penelitian/{id}',      [PenelitianController::class, 'destroy'])->name('penelitian.destroy');
});
