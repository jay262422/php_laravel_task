<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FixedDepositController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('fixed_deposits', FixedDepositController::class);
    Route::resource('properties', PropertyController::class);
    Route::resource('stocks', StockController::class);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

//require __DIR__.'/auth.php';
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
