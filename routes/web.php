<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/create', [UserController::class, 'index'])->name('user.index');
Route::post('/user/create', [UserController::class, 'create'])->name('user.create');


