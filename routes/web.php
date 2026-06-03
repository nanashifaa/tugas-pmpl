<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenelitianController;


// Login Routes
Route::get('/login',[LoginController::class,'showLoginForm'])->name('login');
Route::post('/login',[LoginController::class,'login']);
Route::post('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/', function () {
    return redirect('/penelitian');
});

Route::get('/penelitian', [PenelitianController::class, 'index'])->name('penelitian.index');
Route::get('/penelitian/create', [PenelitianController::class, 'create'])->name('penelitian.create');
Route::post('/penelitian', [PenelitianController::class, 'store'])->name('penelitian.store');