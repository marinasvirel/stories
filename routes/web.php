<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'authenticate'])->name('authenticate');

Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');

Route::get('logout', [UserController::class, 'logout'])->name('logout');
