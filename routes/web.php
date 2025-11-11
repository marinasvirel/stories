<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'read'])->name('home');
Route::get('post/{id}', [PostController::class, 'readDetail'])->name('readDetail');

Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'authenticate'])->name('authenticate');
Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::get('create', [PostController::class, 'createView'])->name('createView');
Route::post('create', [PostController::class, 'create'])->name('create');
