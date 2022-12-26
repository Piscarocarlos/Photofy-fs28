<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function() {
    Route::get('/', function () {
        return view('welcome');
    });
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('logout', [HomeController::class, 'logout'])->name('logout');
