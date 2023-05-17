<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('member')->name('member.')->group(function () {
    Auth::routes(['register' => false, 'password.request' => false]);


    Route::get('/', function () {
        return view('welcome');
    });

    Route::middleware('auth:member')->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    });
});
