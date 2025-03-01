<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UrlShortenerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

//authentication
Route::get('/', [AuthController::class, 'index'])->name('auth.index');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::get('/user/create', [UserController::class, 'index'])->name('user.index');
Route::post('/user/create', [UserController::class, 'create'])->name('user.create');

Route::get('/url/list', [UrlShortenerController::class, 'index'])->name('url_shortener.index');
Route::get('/url/create', [UrlShortenerController::class, 'create'])->name('url_shortener.create');
Route::post('/url/store', [UrlShortenerController::class, 'store'])->name('url_shortener.store');


