<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'verify'])->group(function() {
    Route::get('/', [HomeController::class, 'welcome'])->name('index');

    // User routes
    Route::prefix('user/')->as('user.')->group(function (){
        Route::get('profile', [HomeController::class, 'showProfile'])->name('profile');
        Route::get('setting', [HomeController::class, 'showSetting'])->name('setting');
        Route::post('setting', [HomeController::class, 'updateSetting'])->name('setting');
    });

});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('logout', [HomeController::class, 'logout'])->name('logout');

Route::get('verify/{id}', [HomeController::class, 'verify'])->name('verify');
Route::post('verify/{id}', [HomeController::class, 'verifyAccount'])->name('verify');
