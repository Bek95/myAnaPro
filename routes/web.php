<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UrlShortenerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


//authentication
Route::get('/', [AuthController::class, 'index'])->name('login.index');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/user/create', [UserController::class, 'index'])->name('user.index');
Route::post('/user/create', [UserController::class, 'create'])->name('user.create');

Route::middleware('auth')->group(function () {
    Route::get('/url/list', [UrlShortenerController::class, 'index'])->name('url_shortener.index');

    Route::get('/url/create', [UrlShortenerController::class, 'create'])->name('url_shortener.create');
    Route::post('/url/store', [UrlShortenerController::class, 'store'])->name('url_shortener.store');

    Route::get('/url/edit/{url}', [UrlShortenerController::class, 'edit'])->name('url_shortener.edit');
    Route::post('/url/update/{url}', [UrlShortenerController::class, 'update'])->name('url_shortener.update');

    Route::post('/url/destroy/{url}', [UrlShortenerController::class, 'destroy'])->name('url_shortener.destroy');
});





