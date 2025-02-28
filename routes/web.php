<?php

use App\Http\Controllers\UrlShortenerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/create', [UserController::class, 'index'])->name('user.index');
Route::post('/user/create', [UserController::class, 'create'])->name('user.create');

Route::get('/url/list', [UrlShortenerController::class, 'index'])->name('url_shortener.index');
Route::get('/url/create', [UrlShortenerController::class, 'create'])->name('url_shortener.create');


