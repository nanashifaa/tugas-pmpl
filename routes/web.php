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
Route::get('/dashboard',[DashboardController::class,'index'])->middleware('auth');

// Penelitian CRUD
Route::get('/penelitian', [PenelitianController::class, 'index'])->name('penelitian.index')->middleware('auth');
Route::get('/penelitian/create', [PenelitianController::class, 'create'])->name('penelitian.create')->middleware('auth');
Route::post('/penelitian', [PenelitianController::class, 'store'])->name('penelitian.store')->middleware('auth');