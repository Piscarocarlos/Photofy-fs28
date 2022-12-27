<?php

use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
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

    // posts routes
    Route::resource('posts', PostController::class);
    Route::post('follow/{id}', [FollowerController::class, 'sendFollowRequest'])->name('follow.request');
    Route::post('followed/{id}', [FollowerController::class, 'deleteFollowRequest'])->name('followed.request');

});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('logout', [HomeController::class, 'logout'])->name('logout');

Route::get('verify/{id}', [HomeController::class, 'verify'])->name('verify');
Route::post('verify/{id}', [HomeController::class, 'verifyAccount'])->name('verify');
