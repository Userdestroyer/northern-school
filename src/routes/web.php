<?php

use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Writing\BookController;
use Illuminate\Support\Facades\Route;

// main page
Route::get('/', [ IndexController::class, 'index' ]);

// book list
Route::prefix('books')->group(function () {
    Route::get('/', [ BookController::class, 'list' ]);
    Route::get('/{bookLocalization}', [ BookController::class, 'book' ]);
    Route::get('/{bookLocalization}/{chapter}', [ BookController::class, 'chapter' ]);
});

// screenplay


// Route::get('/auth', [ GoogleAuthController::class, 'login' ])->name('google.auth');
// Route::get('/callback', [ GoogleAuthController::class, 'callback' ])->name('google.callback');
