<?php

use App\Http\Controllers\Admin\{BookController, MemberController, LoanController};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Auth::routes(['register' => false, 'password.request' => false]);

    Route::get('/', function () {
        return view('welcome');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::resource('books', BookController::class);
        Route::resource('members', MemberController::class);
        Route::resource('loans', LoanController::class);
    });
});
